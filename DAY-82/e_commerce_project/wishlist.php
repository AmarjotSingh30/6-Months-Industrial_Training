<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
    SELECT p.*
    FROM wishlist w
    JOIN product p ON w.product_id = p.product_id
    WHERE w.user_id = ?
");
$stmt->execute([$user_id]);
$wishlist_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>My Wishlist</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<style>
.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 20px;
}
.wishlist-card {
    border: 1px solid #eee;
    padding: 15px;
    position: relative;
}
.wishlist-card img {
    width: 100%;
}
.remove-wish {
    position: absolute;
    top: 10px;
    right: 10px;
    color: red;
    cursor: pointer;
}
</style>
</head>

<body>

<h2>❤️ My Wishlist</h2>

<?php if (empty($wishlist_items)): ?>
    <p>Your wishlist is empty.</p>
<?php else: ?>
<div class="wishlist-grid">
<?php foreach ($wishlist_items as $item): ?>
    <div class="wishlist-card">
        <i class="fa-solid fa-xmark remove-wish"
           onclick="removeWish(<?= $item['product_id'] ?>)"></i>

        <img src="images/<?= $item['product_image_1'] ?>">
        <h4><?= $item['name'] ?></h4>
        <p>$<?= $item['price'] ?></p>
        <a href="product_details.php?id=<?= $item['product_id'] ?>">View Product</a>
    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>

<script>
function removeWish(id) {
    fetch('wishlist_toggle.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'product_id=' + id
    }).then(() => location.reload());
}
</script>

</body>
</html>
