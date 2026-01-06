<?php
session_start();
require 'config.php';

$cart = $_SESSION['cart'] ?? [];
$coupon_code = $_SESSION['coupon'] ?? '';
$message = '';
$coupon_applied = false;
$subtotal = 0;
$discount = 0;
$total_amount = 0;

// Available coupons
$available_coupons = [
    "SAVE10" => ["type" => "percent", "value" => 10],
    "OFF20" => ["type" => "percent", "value" => 20],
    "FLAT100" => ["type" => "flat", "value" => 100]
];

// Apply coupon
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_coupon'])) {
    $coupon_code = strtoupper(trim($_POST['coupon_code']));
    if (isset($available_coupons[$coupon_code])) {
        $_SESSION['coupon'] = $coupon_code;
        $coupon_applied = true;
    } else {
        $message = "Invalid coupon code!";
        $coupon_applied = false;
    }
}

// Calculate subtotal
foreach ($cart as $item) {
    $subtotal += ($item['quantity'] * $item['price']);
}

// Apply discount
if ($coupon_code && isset($available_coupons[$coupon_code])) {
    $coupon_applied = true;
    $coupon = $available_coupons[$coupon_code];
    if ($coupon['type'] === 'percent') {
        $discount = ($subtotal * $coupon['value']) / 100;
    } else {
        $discount = $coupon['value'];
    }
}

$total_amount = max($subtotal - $discount, 0);

// Handle order placement
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {

    if (empty($cart)) die("Cart is empty.");

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $zip_code = $_POST['zip_code'] ?? '';
    $payment_mode = $_POST['payment_mode'] ?? '';

    $customer_name = trim($first_name . " " . $last_name);
    $is_coupon = $coupon_applied ? 1 : 0;

    // Insert Order
    $stmt = $conn->prepare("INSERT INTO orders 
        (customer_name,email,phone,address,zip_code,order_amount,payment_mode,
         order_status,payment_status,created_at,is_coupon)
         VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending', 'Pending', NOW(), ?)");
    $stmt->execute([
        $customer_name, $email, $phone, $address,
        $zip_code, $total_amount, $payment_mode, $is_coupon
    ]);

    $order_id = $conn->lastInsertId();

    // Insert order details
    $stmt_details = $conn->prepare(
        "INSERT INTO order_details (order_id, product_id, product_amount, quantity) 
         VALUES (?, ?, ?, ?)"
    );

    foreach ($cart as $item) {
        $stmt_details->execute([
            $order_id, $item['product_id'], $item['price'], $item['quantity']
        ]);
    }

    unset($_SESSION['cart'], $_SESSION['coupon']);

    // Redirect to confirm_order page
    header("Location: confirm_order.php?order_id=" . $order_id);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>
<body>
<div class="shop-main">

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-left"><p>Free shipping, 30-day return or refund guarantee.</p></div>
        <div class="top-right"><a href="#">Gift Card</a> <a href="#">Track Order</a> <a href="#">Contact Us</a></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo"><img src="images/logo.png" alt="logo"></div>
        <div class="nav-links" id="navLinks">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="shop.html">SHOP</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">PAGES</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
        </div>
        <div class="icons">
            <i class="fa-solid fa-magnifying-glass"></i>
            <i class="fa-solid fa-cart-shopping"></i>
            <i class="fa-regular fa-user"></i>
            <div class="hamburger" id="hamburger"><span></span><span></span><span></span></div>
        </div>
    </nav>

<script>
document.getElementById("hamburger").addEventListener("click", () => {
    document.getElementById("navLinks").classList.toggle("active");
});
</script>

<!-- Header -->
<div class="shop-box1">
    <span class="shop-tag">Category: All Products</span>
    <h4 class="shop-title">Checkout</h4>
    <p class="shop-breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-angle-right"></i> <span>Checkout</span></p>
</div>

<!-- Checkout Content -->
<div class="checkout-box">

    <!-- LEFT -->
    <div class="checkout-left">
        <form method="POST">

        <div class="coupon-box">
            <p><i class="fa-solid fa-tag"></i> Have a coupon?</p>
            <a href="javascript:void(0);" id="showCouponForm">Click here to apply</a>

            <div id="couponForm" style="display:none; margin-top:10px;">
                <input type="text" name="coupon_code" placeholder="Enter coupon code" value="<?= htmlspecialchars($coupon_code) ?>">
                <button type="submit" name="apply_coupon">APPLY</button>
                <?php if($message): ?>
                    <p style="color:red;margin-top:5px;"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <h3 class="section-title">Billing Details</h3>

        <div class="two-input">
            <div class="input-group"><label>First Name</label><input type="text" name="first_name" required></div>
            <div class="input-group"><label>Last Name</label><input type="text" name="last_name" required></div>
        </div>

        <div class="input-group"><label>Address</label><input type="text" name="address" required></div>
        <div class="input-group"><label>City</label><input type="text" name="city" required></div>
        <div class="input-group"><label>State</label><input type="text" name="state" required></div>
        <div class="input-group"><label>Postcode / ZIP</label><input type="text" name="zip_code" required></div>

        <div class="two-input">
            <div class="input-group"><label>Phone</label><input type="text" name="phone" required></div>
            <div class="input-group"><label>Email</label><input type="email" name="email" required></div>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="checkout-right">
        <h3 class="order-title">YOUR ORDER</h3>
        <div class="divider"></div>

        <div class="order-items">
            <?php foreach($cart as $item): ?>
            <div class="row">
                <p><?= htmlspecialchars($item['name'] ?? 'Product') ?> x <?= $item['quantity'] ?></p>
                <span>$<?= number_format($item['quantity'] * $item['price'],2) ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="divider"></div>
        <div class="order-total">
            <div class="row"><p>Subtotal</p><span>$<?= number_format($subtotal,2) ?></span></div>

            <?php if ($coupon_applied): ?>
            <div class="row"><p>Discount</p><span style="color:green;">-$<?= number_format($discount,2) ?></span></div>
            <?php endif; ?>

            <div class="row total-bold"><p>Total</p><span>$<?= number_format($total_amount,2) ?></span></div>
        </div>

        <div class="divider"></div>

        <div class="payment-box">
            <label><input type="radio" name="payment_mode" value="Paypal" required> Paypal</label>

                    <p>Lorem ipsum send it on the way</p>
                </div>
                <button type="submit" name="place_order" class="place-order">Place Order</button>
            </form>
            <?php if(isset($success_message)): ?>
                <p style="color:green; font-weight:bold; margin-top:10px;"><?= htmlspecialchars($success_message) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer (unchanged) -->
    <div class="footer">
        <div class="footer-inbox1">
            <div class="footer-inbox-dbox1">
                <div class="footer-social">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                </div>
                <h4>EISER <span id="dot"></span></h4>
                <p>The customer is at the heart of our unique business model, which includes design.</p>
                <div class="card-img-box"><img src="images/payment.png" alt="Payment Methods"></div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("showCouponForm").addEventListener("click", function() {
    var form = document.getElementById("couponForm");
    form.style.display = (form.style.display === "none") ? "block" : "none";
});
</script>
</body>
</html>

<!-- orders(order_id,customer_name,email,phone,address,zip_code,order_amount,payment_mode,txn_id,order_status,
payment_status,created_at,updated_at,is_coupon)

order_details(id,order_id,product_id,product_amount,quantity) -->