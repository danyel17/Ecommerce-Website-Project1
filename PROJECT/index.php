<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar Garage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/css/js/script.js"></script>
</head>

<body>


    <!--Nabvar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
        <div class="container">
            <img src="assets/css/js/imgs/logo.jpeg" width="80" height="80" />
            <h4>The Guitar Garage</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>


                    <i class="nav-item"></i>
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <a href="account.php"><i class="fas fa-user-circle"></i></a>
                    </li>



                </ul>

            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and dependencies (Popper.js, jQuery) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

  




    <!--Home-->
    <section id="home">
        <div class="container">           
            <h6>NEW ARRIVAL</h6>
            <h1><span>Promo For December</span></h1>
            <p><h6>Guitar Garage offers the best Product</h6></p>
            <button class="btn btn-primary btn-lg">Shop Now</button>          
        </div>
    </section>

    <!--Brand-->
    <style>
        .blend-multiply {
            mix-blend-mode: multiply;
        }
    </style>
    
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 blend-multiply" src="assets/css/js/imgs/brand1.jpeg" alt="Fender Logo">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 blend-multiply" src="assets/css/js/imgs/brand2.jpeg" alt="Description of the Image">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 blend-multiply" src="assets/css/js/imgs/brand3.jpeg" alt="Ibanez Logo">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12 blend-multiply" src="assets/css/js/imgs/brand4.jpeg" alt="Gibson Logo">
        </div>
    </section>
    <!--New-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--One-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/css/js/imgs/display1.jpeg">
                <div class="details">
                    <h2>Affordable and Quality Guitar</h2>
                    <button class="btn btn-primary btn-lg text-uppercase">Shop Now</button>

                </div>
            </div>
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/css/js/imgs/display2.jpeg">
                <div class="details">
                    <h2>Acoustic Guitar</h2>
                    <button class="btn btn-primary btn-lg text-uppercase">Shop Now</button>
                </div>
            </div>

            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/css/js/imgs/display3.jpeg">
                <div class="details">
                    <h2>Electric Guitar</h2>
                    <button class="btn btn-primary btn-lg text-uppercase">Shop Now</button>
                </div>
            </div>
        </div>
    </section>



    <!--Featured-->
    <section id="featured" class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto">
            <p>Here is responsive you can checkout here</p>
        </div>
        <div class="row mx-auto container-fluid">
    
            <?php include('server/get_featured_products.php'); ?>
    
            <?php while($row = $featured_products->fetch_assoc()) { ?> 
    
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">₱ <?php echo $row['product_price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>">
                    <button class="btn btn-primary buy-btn">Buy Now</button>
</a>
                </div>
    
            <?php } ?>
            
        </div>
    </section>

    <!--Banner-->
    <section id="banner" class="my-5 py-5">
        <div class="container">
            <h4>DECEMBER SALE</h4>
            <h1>Christmas Collection <br> UP to 30% OFF</h1>
            <button class="btn btn-primary buy-btn">Shop Now</button>
        </div>
    </section>

    <!--Guitar Accessories-->
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Accessories</h3>
            <hr class="mx-auto">
            <p>Here you can checkout our Accessories</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/css/js/imgs/accessories1.jpeg" alt="Celluloid Medley Guitar Picks">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Guitar Pick</h5>
                <h4 class="p-price">₱212</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/css/js/imgs/accessories2.jpeg" alt="Guitar Picks Preview">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Guitar Clamp</h5>
                <h4 class="p-price">₱203</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/css/js/imgs/accessories3.jpeg" alt="Guitar Picks Aplus Automation">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Amplifier</h5>
                <h4 class="p-price">1479</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/css/js/imgs/accessories4.jpeg" alt="Guitar Picks Preview">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Guitar Strap</h5>
                <h4 class="p-price">₱488</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
        </div>
    </section>

    <!--Footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx=auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo"
                    src="assets/css/js/imgs/logo.jpeg"
                    alt="Description of the Image" style="width: 200px; height: auto; display: block; margin: 0 auto;">
                <h5 class="pb-2">The Guitar Garage</h5>
                <p>Cheap and Quality Products</p>

            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Acoustic Guitar</a></li>
                    <li><a href="#">Electric Guitar</a></li>
                    <li><a href="#">New Arrival</a></li>
                    <li><a href="#">Big Sales</a></li>
                    <li><a href="#">Christmas Sales</a></li>
                </ul>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>Daet, Camarines Norte</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone Number</h6>
                    <p>0951 187 4805</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>GarageGuitar@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img src="assets/css/js/imgs/instagram1.jpeg"
                        class="img fluid w-50 h-100 mb-2" alt="Description of the image" />
                    <img src="assets/css/js/imgs/instagram2.jpeg"
                        class="img fluid w-50 h-100 mb-2" alt="Description of the image" />

                        
                </div>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md col-sm-12 mb-4">
                    <img src="assets/css/js/imgs/gcashlogo.jpeg" alt="GCash Logo"
                        width="50" />
                    <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2"></div>
                    <p>eCommerce @2025 All Rights Reserved</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        </div>
        

    </footer>