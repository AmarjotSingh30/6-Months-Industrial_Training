<!-- php code here -->
<?php
include 'db.php';

$sql = "SELECT * FROM product WHERE is_deleted=0";
$result = mysqli_query($conn, $sql);
?>

<!-- php code here -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>view products</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="container">

  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">

    <div class="logo">Prism</div>

    <div class="profile-box">
      <div class="profile-img"></div>
      <div class="profile-text">
        <h3>Jerry</h3>
        <p>Admin</p>
      </div>
    </div>

    <div class="menu-title">Navigation</div>

    <div class="menu-item"><i class="fa-solid fa-chart-line"></i><a href="dashboard.php">Dashboard</a></div>
    <div class="menu-item"><i class="fa-solid fa-shop"></i><a href="#">Vendors</a></div>
    <div class="menu-item"><i class="fa-solid fa-users"></i><a href="#">Users</a></div>
    <div class="menu-item"><i class="fa-solid fa-plus"></i><a href="add_products.php">Add Products</a></div>
    <div class="menu-item"><i class="fa-solid fa-box"></i><a href="view_products.php">Products</a></div>
    <div class="menu-item"><i class="fa-solid fa-bag-shopping"></i><a href="view_orders.php">Orders</a></div>

  </div>

  <!-- RIGHT SECTION -->
  <div class="right-section">

    <div class="topbar">
      <i class="fa-solid fa-bars hamburger" id="hamburger"></i>

      <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input type="text" placeholder="Search…">
      </div>

      <i class="fa-solid fa-moon theme-toggle" id="themeToggle"></i>

      <div class="profile-right">
        <div class="profile-right-img"></div>
        <i class="fa-solid fa-caret-down" id="dropdownToggle"></i>

        <ul class="dropdown" id="dropdownMenu">
          <li>Profile Management</li>
          <li>Logout</li>
        </ul>

      </div>
    </div>

    <!-- table-->
     <!-- add php here and make this form look better  -->
    <div class="table-container">
      <h2>Product List</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['product_id']; ?></td>

          <td>
            <img src="uploads/<?= $row['product_image_1']; ?>" 
                 style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
          </td>

          <td><?= $row['name']; ?></td>
          <td><?= $row['product_title']; ?></td>
          <td>
                <?= $row['desc']; ?>

          </td>
          <td>$<?= $row['price']; ?></td>
          <td><?= $row['total_stock']; ?></td>

          <td>

             <div class="action-btns">
                <!-- edit btn -->
                <a href="edit_products.php?edit=<?= $row['product_id']; ?>" class="edit-btn">
                  <i class="fa-solid fa-pen-to-square"></i> 
                </a> 
                
                <!-- delete btn -->
                <a href="delete_products.php?delete=<?= $row['product_id']; ?>" class="delete-btn"
                  onclick="return confirm('Are you sure you want to delete this product?');">
                  <i class="fa-solid fa-trash"></i>
                </a>
             </div>

          </td>
        </tr>
      <?php } ?>


          <!-- More product rows can be added here -->
        </tbody>
      </table>
    </div>
    <!-- table -->
    
    
    <div class="footer">
        <p style="color:white; text-align:center; padding-top:30px;">&copy; 2024 Prism Dashboard. All rights reserved.</p>  
  </div>



</div>

<script src="script.js"></script>


</body>
</html>
