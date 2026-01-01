<?php  
session_start();
    require 'config.php';
    $qry=$conn->prepare("SELECT * FROM product ORDER BY rand() LIMIT 8");
    $qry->execute();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EISER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- target for today[11-15-25]
     1) organize code
     2)change logo
     3) responsive
     4) add and try multiple effects i find interesting
     [features]:- i want for this project :-1) appealing look
     2) top notch features -->


    <!-- main div -->
    <div class="main">

        <!-- box 1 -->
        <!-- Top Info Bar -->
            <div class="top-bar">
                <div class="top-left">
                    <p>Free shipping, 30-day return or refund guarantee.</p>
                </div>

                <div class="top-right">
                    <a href="#">Gift Card</a>
                    <a href="#">Track Order</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>

        <!-- box 1 -->

        <!-- navbar -->
        <nav class="navbar">
            <div class="logo">
                <img src="images/leaf_logo (2).png" alt="logo">
            </div>

                        <!-- links -->
                        <div class="nav-links" id="navLinks">
                            <ul>
                                <li><a href="#">HOME</a></li>
                                <li><a href="shop.html">SHOP</a></li>
                                <li><a href="#">BLOG</a></li>
                                <li><a href="#">PAGES</a></li>
                                <li><a href="#">CONTACT</a></li>
                            </ul>
                        </div>

                        <!-- icons -->
                        <div class="icons">
                            <i class="fa-solid fa-magnifying-glass" id="icon_1"></i>
                            <i class="fa-solid fa-cart-shopping" id="icon_1"></i>
                            <i class="fa-regular fa-user" id="icon_1"></i>

                            <!-- hamburger -->
                            <div class="hamburger" id="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </nav>
                    <!-- navbar -->   
                <!-- javascript -->
                <script>
                    const hamburger = document.getElementById("hamburger");
                    const navLinks = document.getElementById("navLinks");

                    hamburger.addEventListener("click", () => {
                        navLinks.classList.toggle("active");
                    });
                </script>
                <!-- javascript -->

        <!-- navbar -->

        <!-- box3 -->
            <!-- HERO SECTION -->
                <section class="hero-slider">
                    <!-- Slide 1 -->
                    <div class="hero-slide active" style="background-image: url('images/slide-02.jpg');">
                        <div class="hero-content">
                            <h4>MEN COLLECTION</h4>
                            <h1><span class="green">Show</span> Your <span class="green">Style</span></h1>
                            <p>Pick your desire</p>
                            <button class="hero-btn">VIEW COLLECTION</button>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="hero-slide" style="background-image: url('images/slide-03.jpg');">
                        <div class="hero-content">
                            <h4>WOMEN COLLECTION</h4>
                            <h1><span class="green">Define</span> Your <span class="green">Elegance</span></h1>
                            <p>Discover your fashion</p>
                            <button class="hero-btn">SHOP NOW</button>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="hero-slide" style="background-image: url('images/slide-07.jpg');">
                        <div class="hero-content">
                            <h4>NEW ARRIVALS</h4>
                            <h1><span class="green">Upgrade</span> Your <span class="green">Wardrobe</span></h1>
                            <p>Fresh and trendy styles</p>
                            <button class="hero-btn">EXPLORE</button>
                        </div>
                    </div>

                    <!-- Arrows -->
                    <div class="hero-arrow left" onclick="prevSlide()">&#10094;</div>
                    <div class="hero-arrow right" onclick="nextSlide()">&#10095;</div>

                    <!-- Dots -->
                    <div class="hero-dots"></div>

                </section>

                <!-- javascript -->
                <script>
                let current = 0;
                const slides = document.querySelectorAll(".hero-slide");
                const dotContainer = document.querySelector(".hero-dots");

                // Create dots
                slides.forEach((_, i) => {
                    let dot = document.createElement("div");
                    dot.onclick = () => showSlide(i);
                    dotContainer.appendChild(dot);
                });
                const dots = dotContainer.querySelectorAll("div");

                function showSlide(i) {
                    slides.forEach(s => s.classList.remove("active"));
                    dots.forEach(d => d.classList.remove("active-dot"));

                    slides[i].classList.add("active");
                    dots[i].classList.add("active-dot");
                    current = i;
                }

                function nextSlide() {
                    current = (current + 1) % slides.length;
                    showSlide(current);
                }

                function prevSlide() {
                    current = (current - 1 + slides.length) % slides.length;
                    showSlide(current);
                }

                showSlide(0); // Default first slide

                // Auto Slide
                setInterval(nextSlide, 5000);

                // Swipe Support for Mobile
                let startX = 0;

                document.querySelector(".hero-slider").addEventListener("touchstart", e => {
                    startX = e.touches[0].clientX;
                });

                document.querySelector(".hero-slider").addEventListener("touchend", e => {
                    let endX = e.changedTouches[0].clientX;
                    if (startX - endX > 50) nextSlide();
                    if (endX - startX > 50) prevSlide();
                });
                </script>

<!-- javascript -->
        <!-- box3 -->

       <!-- box4 -->
            <section class="collections-section">
                <div class="collection-grid">

                    <!-- Card 1 -->
                    <div class="collection-card large">
                        <img src="images/banner-1.jpg" alt="">
                        <div class="overlay"></div>
                        <div class="collection-content">
                            <h3>Clothing</h3>
                            <p>Collection 2024</p>
                            <a href="#">SHOP NOW</a>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="collection-card small">
                        <img src="images/banner-2.jpg" alt="">
                        <div class="overlay"></div>
                        <div class="collection-content">
                            <h3>Accessories</h3>
                            <a href="#">SHOP NOW</a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="collection-card small">
                        <img src="images/banner-2.jpg" alt="">
                        <div class="overlay"></div>
                        <div class="collection-content">
                            <h3>New Arrivals</h3>
                            <a href="#">EXPLORE</a>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="collection-card large">
                        <img src="images/banner-3.jpg" alt="">
                        <div class="overlay"></div>
                        <div class="collection-content">
                            <h3>Shoe Spring</h3>
                            <p>2024</p>
                            <a href="#">SHOP NOW</a>
                        </div>
                    </div>

                </div>
            </section>
<!-- box4 -->



       <!-- BOX 5 -->
<!-- BOX 5 -->
<section class="featured-section">

    <h3>FEATURED PRODUCTS</h3>
    <div class="hz-line"></div>
    <p>Discover the best picks curated just for you.</p>

    <!-- FILTER LINKS -->
    <div class="filter-links">
        <span data-filter="best" class="active">Best Sellers</span>
        <span data-filter="new">New Arrivals</span>
        <span data-filter="hot">Hot Sales</span>
    </div>

    <!-- PRODUCT GRID -->
    <div class="product-grid" id="productGrid">

        <!-- 8 Cards -->
        <?php 
            while($row= $qry->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="product-card" data-type="best new hot">
            <img src="images/<?php echo $row['product_image_1'] ?>" style="width: 100%;height: 300px;">
            <h2><?php echo $row['name'] ?></h2>
            <div class="price">$<?php echo $row['price'] ?> <del>$<?php echo $row['price']+20 ?></del></div>
        </div>
        <?php 
            }
        ?>
    </div>
</section>

   
<!-- </section> -->

        
        <!-- box 6 -->
       <!-- BOX 6 -->
<div class="main-box6">
    <div class="main-box6-inbox1">
        <h4>Deal Of The Week</h4>
        <h1>Multi-pocket Chest Bag Black</h1>
    <!-- </div> -->
        <!-- COUNTDOWN TIMER -->
        <div class="countdown">
            <div class="time-box"><span id="days">00</span><p>Days</p></div>
            <div class="time-box"><span id="hours">00</span><p>Hours</p></div>
            <div class="time-box"><span id="minutes">00</span><p>Min</p></div>
            <div class="time-box"><span id="seconds">00</span><p>Sec</p></div>
        </div>

        <button>DISCOVER NOW</button>
        <p>Limited Time Offer</p>
    </div>
</div>
<!-- js -->
<script>
function startCountdown() {
    const endDate = new Date("2025-12-31 23:59:59").getTime();

    setInterval(() => {
        const now = new Date().getTime();
        const diff = endDate - now;

        if (diff <= 0) return;

        document.getElementById("days").innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
        document.getElementById("hours").innerText = Math.floor((diff / (1000 * 60 * 60)) % 24);
        document.getElementById("minutes").innerText = Math.floor((diff / (1000 * 60)) % 60);
        document.getElementById("seconds").innerText = Math.floor((diff / 1000) % 60);
    }, 1000);
}

startCountdown();
</script>

<!-- js -->
<!-- BOX 6 -->

        <!-- box6 -->

        <!-- box7 -->
        <div class="main-box7">
            <h2>NEW PRODUCTS</h2>
            <div class="hz-line1"></div>
            <p>lorem ipsum hello buy</p>
            <!-- inbox -->
            <div class="main-box7-inbox1">
                <!-- dbox -->
                <div class="main-box7-inbox1-dbox1">
                    <!-- upperbox -->
                    <div class="dbox1-upperbox">
                        <h4>COLLECTION OF 2019</h4>
                        <h2>MEN'S SUMMER T-SHIRT</h2>
                    </div>
                    <!-- lowerbox -->
                    <div class="dbox1-lowerbox">
                        <p>$20.00</p>
                        <button>ADD TO CART</button>
                    </div>
                </div>
                <!-- dbox2 -->
                <div class="main-box7-inbox1-dbox2">
                    <!-- upperbox -->
                    <div class="dbox2-upperbox">
                        <div class="upperbox-inbox1">
                            <img src="images/product-12.jpg">
                            <h5>NIKE LATEST SNEAKER</h5>
                            <p id="dollar">$25.00</p>
                            <p id="del-text"><del>$35.00</del></p>
                        </div>
                        <!-- 2nd upperbox -->
                        <div class="upperbox-inbox1">
                            <img src="images/n2.jpg">
                            <h5>NIKE LATEST SNEAKER</h5>
                            <p id="dollar">$25.00</p>
                            <p id="del-text"><del>$35.00</del></p>
                        </div>
                    </div>
                    <!-- lowerbox -->
                    <div class="dbox2-lowerbox">
                        <!-- inbox -->
                        <div class="upperbox-inbox1">
                            <img src="images/n3.jpg">
                            <h5>NIKE LATEST SNEAKER</h5>
                            <p id="dollar">$25.00</p>
                            <p id="del-text"><del>$35.00</del></p>
                        </div>
                        <!-- inbox -->
                        <div class="upperbox-inbox1">
                            <img src="images/n4.jpg">
                            <h5>NIKE LATEST SNEAKER</h5>
                            <p id="dollar">$25.00</p>
                            <p id="del-text"><del>$35.00</del></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- box7 -->

        <!-- box8 -->
<div class="inspired-section">
    <h3>INSPIRED PRODUCTS</h3>
    <div class="hz-line1"></div>
    <p>Your daily dose of premium inspired styles.</p>

    <div class="inspired-grid">

        <!-- CARD -->
        <?php 
            $qry1=$conn->prepare("SELECT * FROM product ORDER BY rand() LIMIT 8");
            $qry1->execute();
            while($row1= $qry1->fetch(PDO::FETCH_ASSOC)){
        ?>
        <a href="product_details.php?id=<?php echo $row1['product_id'] ?>">
        <div class="inspired-card">
            <span class="badge"><?php echo $row1['product_type'] ?></span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/<?php echo $row1['product_image_1'] ?>">
            <h4><?php echo $row1['name'] ?></h4>
            <div class="price-box">
                <span class="price">$<?php echo $row1['price'] ?></span>
                <span class="old-price">$<?php echo $row1['price']+20 ?></span>
            </div>
        </div>
        </a>        
        <?php 
            } 
        ?>
        <!-- <div class="inspired-card">
            <span class="badge">HOT</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-2.jpg">
            <h4>Classic Running Shoe</h4>
            <div class="price-box">
                <span class="price">$22.00</span>
                <span class="old-price">$32.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">TRENDING</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-3.jpg">
            <h4>Streetwear Sneaker</h4>
            <div class="price-box">
                <span class="price">$25.00</span>
                <span class="old-price">$40.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">SALE</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-1.jpg">
            <h4>Stylish Men's Shoe</h4>
            <div class="price-box">
                <span class="price">$18.00</span>
                <span class="old-price">$28.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">NEW</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-2.jpg">
            <h4>Daily Comfort Sneaker</h4>
            <div class="price-box">
                <span class="price">$20.00</span>
                <span class="old-price">$30.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">HOT</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-3.jpg">
            <h4>Urban Style Shoe</h4>
            <div class="price-box">
                <span class="price">$23.00</span>
                <span class="old-price">$33.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">SALE</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-1.jpg">
            <h4>Modern Street Sneaker</h4>
            <div class="price-box">
                <span class="price">$19.00</span>
                <span class="old-price">$27.00</span>
            </div>
        </div>

        <div class="inspired-card">
            <span class="badge">NEW</span>
            <span class="wish"><i class="fa-regular fa-heart"></i></span>
            <img src="images/f-p-2.jpg">
            <h4>Premium Sports Shoe</h4>
            <div class="price-box">
                <span class="price">$26.00</span>
                <span class="old-price">$40.00</span>
            </div>
        </div> -->

    </div>
</div>
<!-- box8 -->



        <!-- box9 -->
        <div class="main-box9">
            <h4>LATEST BLOG</h4>
            <div class="hz-line2"></div>
            <p>lorem ipsum hello</p>
            <!-- inbox -->
            <div class="main-box9-inbox1">
                <!-- dbox1 -->
               <div class="main-box9-inbox1-dbox1">
                <img src="images/blog-1.jpg">
                <h3>By Admin</h3>
                <h4><i class="fa-regular fa-comment"></i>2 comments</h4>
                <h3 id="ford">ford lorem ipsum hello world icon was good</h3>
                <p id="light-text">lorem ipsum hello world buy lappp check it out</p>
                <a href="#">LEARN MORE  <i class="fa-solid fa-arrow-right"></i></a>
               </div>
               <!-- dbox2 -->
               <div class="main-box9-inbox1-dbox1">
                <img src="images/blog-2.jpg">
                <h3>By Admin</h3>
                <h4><i class="fa-regular fa-comment"></i>2 comments</h4>
                <h3 id="ford">ford lorem ipsum hello world icon was good</h3>
                <p id="light-text">lorem ipsum hello world buy lappp check it out</p>
                <a href="#">LEARN MORE  <i class="fa-solid fa-arrow-right"></i></a>
               </div>
               <!-- dbox3 -->
               <div class="main-box9-inbox1-dbox1">
                <img src="images/blog-3.jpg">
                <h3>By Admin</h3>
                <h4><i class="fa-regular fa-comment"></i>2 comments</h4>
                <h3 id="ford">ford lorem ipsum hello world icon was good</h3>
                <p id="light-text">lorem ipsum hello world buy lappp check it out</p>
                <a href="#">LEARN MORE  <i class="fa-solid fa-arrow-right"></i></a>
               </div>
            </div>
        </div>
        <!-- box9 -->

       <!-- footer -->
<div class="footer">
    <div class="footer-inbox1">

        <!-- Column 1: Logo + Social + About -->
        <div class="footer-inbox-dbox1">
            <div class="footer-social">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-x-twitter"></i>
            </div>

            <h4>leafy <span id="dot"></span></h4>
            <p>The customer is at the heart of our unique business model, which includes design.</p>
            
            <div class="card-img-box">
                <img src="images/payment.png" alt="Payment Methods">
            </div>
        </div>

        <!-- Column 2: Shopping Links -->
        <div class="footer-inbox-dbox1">
            <h3>Shopping</h3>
            <p>Clothing Store</p>
            <p>Men's Fashion</p>
            <p>Accessories</p>
            <p>Sale</p>
        </div>

        <!-- Column 3: Top Products -->
        <div class="footer-inbox-dbox1">
            <h3>Top Products</h3>
            <p>Managed Website</p>
            <p>Power Tools</p>
            <p>Marketing Service</p>
            <p>Best Deals</p>
        </div>

        <!-- Column 4: Newsletter -->
        <div class="footer-inbox-dbox1">
            <h3>NEWSLETTER</h3>
            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
            <div class="newsletter-box">
                <input type="email" placeholder="Your email">
                <i class="fa-solid fa-envelope"></i>
            </div>
        </div>

    </div>

    <p id="copyright">© 2025 EISER — All Rights Reserved</p>
</div>
<!-- footer -->


     <!-- main -->
    </div>
    <!-- main -->
</body>
</html>