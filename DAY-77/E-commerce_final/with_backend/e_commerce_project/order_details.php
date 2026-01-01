<?php
require 'config.php';

$order_id = $_GET['order_id'] ?? '';

if (!$order_id) {
    die("Invalid order.");
}

$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch();

$stmt2 = $conn->prepare("
    SELECT od.*, p.name 
    FROM order_details od
    JOIN products p ON p.id = od.product_id
    WHERE od.order_id = ?
");
$stmt2->execute([$order_id]);
$items = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Details</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="order-success-container">

    <div class="checkmark-wrapper">
        <svg class="checkmark" viewBox="0 0 52 52">
            <path class="checkmark-circle" d="M26 2 C12.8 2 2 12.8 2 26 s10.8 24 24 24 s24 -10.8 24 -24 S39.2 2 26 2" />
            <path class="checkmark-check" d="M14 27 l8 8 l16 -16" />
        </svg>
    </div>

    <h2>Thank You for Your Order!</h2>

    <p class="highlight">Order ID: <?= htmlspecialchars($order_id) ?></p>
    <p class="highlight">Total Amount: $<?= htmlspecialchars(number_format($amount,2)) ?></p>

    <p>You will receive a confirmation email shortly.</p>

    <a href="order_details.php?order_id=<?= $order_id ?>" class="home-btn">View Order Details</a>
    <br><br>
    <a href="index.html" class="home-btn">Back to Home</a>
</div>


</body>
</html>
