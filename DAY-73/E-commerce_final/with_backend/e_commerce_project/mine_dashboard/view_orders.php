<!-- php code -->
<?php 
    include 'db.php';
    session_start();
    date_default_timezone_set('ASIA/KOLKATA');
    $qry=mysqli_query($conn,"SELECT * FROM orders ORDER BY order_id ASC");

    if(isset($_POST['status'])){
        echo $order_id=$_POST['order_id'];

        echo $order_status=$_POST['order_status'];
        
        $qry_update=mysqli_query($conn,"UPDATE orders SET order_status='$order_status' WHERE order_id='$order_id'");
        if($qry_update){
            echo "<script>alert('UPDATED SUCCESSFULLY');
            window.location.href='view_orders.php';
            </script>";
        }else{
            echo "<script>alert('ERROR!')</script>";
        }
    }
?>
<!-- php code -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>view orders</title>
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

    
        <!-- i need here a table 
         1.order id
         2.name
         3.time placed
         4.order status with 5 dropdown optins:-1.pending 2.confirm 3.packed 4.shipped 5.delievered
         5. action with update button  
         6.order details with view order button -->

         <!-- table -->
            <div class="order-table-container">
                <h2>Orders</h2>

            <table class="order-table">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Time Placed</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Order Details</th>
                </tr>
                </thead>

                <tbody>

                <tr>

                  <!-- php code -->
              <?php while($row=mysqli_fetch_assoc($qry)){ ?>
                  <!-- php code -->
                    <td data-label="Order ID"><?= $row['order_id']; ?></td>
                    <td data-label="Name"><?= $row['customer_name']; ?></td>
                    <td data-label="Time Placed"><?= $row['created_at']; ?></td>

                    <td data-label="Status">
                    <form method="POST">
                    <select class="status-select" name="order_status">
                    <option required <?php if($row['order_status'] == 'Pending'){
                      echo "selected=selected";
                    } ?> value="Pending">Pending</option>
                    <option required <?php if($row['order_status'] == 'Confirm'){
                      echo "selected=selected";
                    } ?> value="Confirm">Confirm</option>
                    <option required <?php if($row['order_status'] == 'Packed'){
                      echo "selected=selected";
                    } ?> value="Packed">Packed</option>
                    <option required <?php if($row['order_status'] == 'Shipped'){
                      echo "selected=selected";
                    } ?> value="Shipped">Shipped</option>
                    <option required <?php if($row['order_status'] == 'Delivered'){
                     echo "selected=selected";
                    } ?> value="Delivered">Delivered</option>
                        <!-- <option>Pending</option>
                        <option>Confirmed</option>
                        <option>Packed</option>
                        <option>Shipped</option>
                        <option>Delivered</option> -->
                    </select>
                    </td>

                    <td data-label="Action">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                    <button class="update-btn" name="status">Update</button>
                    </td>

                    <td data-label="Order Details">
                    <a href="track_products.php?order_id=<?php echo $row['order_id'] ?>"class="view-btn">View Order</a>
                      <!-- <button class="view-btn">View Order</button> -->
                    </form>
                    </td>
                </tr>

                <!-- php code end -->
                  <?php } ?>
                <!-- php code end -->

                <!-- Duplicate more rows as needed
                <tr>
                    <td data-label="Order ID">#1002</td>
                    <td data-label="Name">Mia Carter</td>
                    <td data-label="Time Placed">2025-01-20 11:10 AM</td>

                    <td data-label="Status">
                    <select class="status-select">
                        <option>Pending</option>
                        <option>Confirmed</option>
                        <option>Packed</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                    </select>
                    </td>

                    <td data-label="Action">
                    <button class="update-btn">Update</button>
                    </td>

                    <td data-label="Order Details">
                    <button class="view-btn">View Order</button>
                    </td>
                </tr> -->

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
