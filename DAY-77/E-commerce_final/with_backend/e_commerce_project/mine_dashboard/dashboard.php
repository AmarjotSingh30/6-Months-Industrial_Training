<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
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

    <!-- CARDS -->
    <div class="cards">
      <div class="card">
        <i class="fa-solid fa-box"></i>
        <h2>Total Products</h2>
        <p>120</p>
      </div>

      <div class="card">
        <i class="fa-solid fa-bag-shopping"></i>
        <h2>Total Orders</h2>
        <p>85</p>
      </div>

      <div class="card">
        <i class="fa-solid fa-indian-rupee-sign"></i>
        <h2>Revenue</h2>
        <p>₹45,230</p>
      </div>

      <div class="card">
        <i class="fa-solid fa-money-bill-wave"></i>
        <h2>Daily Expense</h2>
        <p>₹3,250</p>
      </div>
    </div>


    <!-- table -->
    <table class="order-status-table">
  <thead>
    <tr>
      <th>Client Name</th>
      <th>Order No</th>
      <th>Product Cost</th>
      <th>Payment Mode</th>
      <th>Payment Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>#1023</td>
      <td>₹1,250</td>
      <td>Credit Card</td>
      <td><button class="status completed">Completed</button></td>
    </tr>
    <tr>
      <td>Jane Smith</td>
      <td>#1024</td>
      <td>₹850</td>
      <td>UPI</td>
      <td><button class="status pending">Pending</button></td>
    </tr>
    <tr>
      <td>Mike Johnson</td>
      <td>#1025</td>
      <td>₹2,300</td>
      <td>Cash</td>
      <td><button class="status rejected">Rejected</button></td>
    </tr>
  </tbody>
</table>

    <!-- table -->

    <div class="right-section-3-cards">
      <!-- here i need 3 boxes in one main box 1st box show messages design it ur way 2.box kinda portfolio slide 3rd box full functional todo list in which user can add and delete  -->
       <!-- 1. Messages Box -->
  <div class="card messages-box">
    <h3>Messages</h3>
    <ul class="messages-list">
      <li><strong>John:</strong> Hey! How are you?</li>
      <li><strong>Jane:</strong> Meeting at 4 PM.</li>
      <li><strong>Mike:</strong> Project files uploaded.</li>
    </ul>
  </div>

  <!-- 2. Portfolio Slide Box -->
  <div class="card portfolio-box">
    <h3>Portfolio</h3>
    <div class="portfolio-slider">
      <div class="slide active"><img src="https://picsum.photos/300/150?random=1" alt="1"></div>
      <div class="slide"><img src="https://picsum.photos/300/150?random=2" alt="2"></div>
      <div class="slide"><img src="https://picsum.photos/300/150?random=3" alt="3"></div>
    </div>
    <div class="slider-controls">
      <button id="prevSlide">&lt;</button>
      <button id="nextSlide">&gt;</button>
    </div>
  </div>

  <!-- 3. To-Do List Box -->
  <div class="card todo-box">
    <h3>To-Do List</h3>
    <div class="todo-input">
      <input type="text" id="todoInput" placeholder="Add new task...">
      <button id="addTodo">Add</button>
    </div>
    <ul id="todoList"></ul>
  </div>

    </div>

    <div class="right-section-visitor-box">
      <!-- here i need two boxes in one main box on left side show visitor name their country flag ratio on right side box a map  -->
       <!-- Left: Visitor List -->
  <div class="visitor-list-box">
    <h3>Visitors</h3>
    <ul class="visitor-list">
      <li><img src="https://flagcdn.com/us.svg" alt="USA"> John Doe</li>
      <li><img src="https://flagcdn.com/in.svg" alt="India"> Priya Singh</li>
      <li><img src="https://flagcdn.com/gb.svg" alt="UK"> Michael Smith</li>
      <li><img src="https://flagcdn.com/ca.svg" alt="Canada"> Sarah Lee</li>
      <li><img src="https://flagcdn.com/au.svg" alt="Australia"> Liam Brown</li>
    </ul>
  </div>

  <!-- Right: Map -->
  <div class="visitor-map-box">
    <h3>Visitor Map</h3>
    <iframe
      src="https://www.google.com/maps/d/embed?mid=1RkJwPjzQO4a0HhT5xTg6B1g9hZc&hl=en"
      width="100%"
      height="300"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

    </div>
    
    <div class="footer">
        <p style="color:white; text-align:center; padding-top:30px;">&copy; 2024 Prism Dashboard. All rights reserved.</p>  
  </div>



</div>

<script src="script.js"></script>


</body>
</html>
