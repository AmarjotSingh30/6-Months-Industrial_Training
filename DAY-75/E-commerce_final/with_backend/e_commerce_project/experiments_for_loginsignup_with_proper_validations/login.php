<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
session_start();

// Show errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "auth_system");
    if (!$conn) die("Database connection failed: " . mysqli_connect_error());

    // Fetch user
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Check if account locked
        if ($user['locked'] == 1) {
            $message = "❌ Your account is locked. Check your email to unlock it.";
        } else {

            // Verify password
            if (password_verify($password, $user['password'])) {

                // Check email verification
                if ($user['verified'] == 0) {
                    $message = "❌ Email not verified. Check your inbox.";
                } else {
                    // Successful login: reset attempts
                    $stmt2 = mysqli_prepare($conn, "UPDATE users SET login_attempts=0 WHERE email=?");
                    mysqli_stmt_bind_param($stmt2, "s", $email);
                    mysqli_stmt_execute($stmt2);

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    header("Location: dashboard.php");
                    exit;
                }

            } else {
                // Wrong password: increment attempts
                $attempts = $user['login_attempts'] + 1;
                $locked = 0;
                $token = $user['token'];

                if ($attempts >= 5) {
                    $locked = 1;
                    $token = bin2hex(random_bytes(16)); // unlock token

                    // Update DB first
                    $stmt3 = mysqli_prepare($conn, "UPDATE users SET login_attempts=?, locked=?, token=? WHERE email=?");
                    mysqli_stmt_bind_param($stmt3, "iiss", $attempts, $locked, $token, $email);
                    mysqli_stmt_execute($stmt3);

                    // Send unlock email
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = 'sandbox.smtp.mailtrap.io';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'c8ba9bed5121f4';
                        $mail->Password = 'ecb3e546217e8f';
                        $mail->Port = 2525;

                        $mail->setFrom('no-reply@yourwebsite.com', 'Your Website');
                        $mail->addAddress($email, $user['name']);

                        $mail->isHTML(true);
                        $mail->Subject = 'Unlock Your Account';
                        $unlockLink = "http://localhost/6_MONTHS_Training/experiments_for_loginsignup/unlock.php?email=$email&token=$token";
                        $mail->Body = "<h3>Hello {$user['name']}</h3>
                                       <p>Your account was locked due to multiple failed login attempts.</p>
                                       <p>Click below to unlock:</p>
                                       <a href='$unlockLink'>$unlockLink</a>";
                        $mail->send();
                        $message = "❌ Wrong password. Account locked! Check your email to unlock.";
                    } catch (Exception $e) {
                        $message = "❌ Wrong password. Account locked but email could not be sent!";
                    }

                } else {
                    // Update attempts in DB
                    $stmt3 = mysqli_prepare($conn, "UPDATE users SET login_attempts=? WHERE email=?");
                    mysqli_stmt_bind_param($stmt3, "is", $attempts, $email);
                    mysqli_stmt_execute($stmt3);

                    $message = "❌ Wrong password! Attempt $attempts of 5.";
                }
            }
        }

    } else {
        $message = "❌ Email not registered!";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background:#f0f2f5; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .login-card { background:#fff; padding:30px 40px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1); width:400px; text-align:center; }
        .login-card img { width:120px; margin-bottom:20px; }
        .login-card input { width:100%; padding:12px; margin:8px 0; border-radius:5px; border:1px solid #ccc; font-size:15px; }
        .login-card button { width:100%; padding:12px; background:#6c7ae0; color:#fff; border:none; border-radius:5px; font-size:16px; cursor:pointer; margin-top:10px; }
        .login-card button:hover { background:#5560c1; }
        .message { margin:15px 0; padding:12px; border-radius:5px; font-weight:bold; text-align:center; }
        .message.success { background:#d4edda; color:#155724; border:1px solid #c3e6cb; }
        .message.error { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; }
        .login-card small { display:block; margin-top:15px; color:#666; }
    </style>
</head>
<body>
<div class="login-card">
    <img src="images/ml-logo.png" alt="Logo">
    <?php if(!empty($message)): ?>
        <div class="message <?php echo strpos($message,'❌')!==false ? 'error':'success'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>
    <small><a href="forgot.php">Forgot Password?</a> | <a href="signup.php">Sign Up</a></small>
</div>
</body>
</html>
