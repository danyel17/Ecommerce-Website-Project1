<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="stylesheet" href="assets/css/style.css">
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
                    <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                    <a href="account.html"><i class="fas fa-user-circle"></i></a>
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


<!--Search Button-->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Custom CSS to fix the search section on the right */
    #search {
        position: fixed;
        /* Fixes the position */
        top: 20px;
        /* Adjusted distance from the top */
        right: 20px;
        /* Distance from the right side */
        width: 400px;
        /* Set a longer width for the search form */
        background-color: #ffffff;
        /* White background for contrast */
        border: 1px solid #e0e0e0;
        /* Light border */
        border-radius: 10px;
        /* Rounded corners */
        padding: 20px;
        /* Increased padding for spaciousness */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Shadow for depth */
        z-index: 1000;
        /* Ensure it is above other content */
    }

    .form-check-label {
        margin-left: 10px;
        /* Space between radio inputs and labels */
    }

    .form-range {
        -webkit-appearance: none;
        /* Custom styling */
        appearance: none;
        width: 100%;
        height: 8px;
        background: #007bff;
        /* Custom track color */
        border-radius: 5px;
    }

    /* Style for the submit button */
    .btn-search {
        background-color: #28a745;
        /* Bootstrap green */
        color: #ffffff;
        /* White text */
    }

    /* Hover effect for button */
    .btn-search:hover {
        background-color: #218838;
        /* Darker green on hover */
    }

    /* Heading Style */
    #search h5 {
        font-weight: bold;
        /* Bold text */
        color: #333;
        /* Darker text color */
    }
</style>
</head>

<section id="search">
    <h5 class="text-center">Find Your Product</h5>
    <hr>

    <form>
        <div class="form-group">
            <label class="font-weight-bold">Select Category</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category_one" />
                <label class="form-check-label" for="category_one">Accessories</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="new_arrival" checked />
                <label class="form-check-label" for="new_arrival">New Arrival</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="guitar" />
                <label class="form-check-label" for="guitar">Electric Guitar and Acoustic</label>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Price Range</label>
            <input type="range" class="form-range" min="1000" max="30000" id="customRange2">
            <div class="d-flex justify-content-between">
                <span>₱100</span>
                <span>₱30000</span>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="keywords">Enter Keywords</label>
            <input type="text" class="form-control" id="keywords" placeholder="Search for products...">
        </div>

        <div class="form-group text-center">
            <input type="submit" name="search" value="Search" class="btn btn-search btn-block">
        </div>
    </form>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<!--Shop-->
<section id="featured" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto">
        <h5>Here you can checkout our products</h5>
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop1.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Ibanez Artwoord Guitar</h5>
            <h4 class="p-price">₱1790</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop2.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i> <!-- Half star -->
                <i class="far fa-star"></i> <!-- Empty star -->
            </div>
            <h5 class="p-name">Fender Modern Electric Guitar</h5>
            <h4 class="p-price">₱9000</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop3.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i> <!-- This is the empty star -->
            </div>
            <h5 class="p-name">MH-400FR Electric Guitar</h5>
            <h4 class="p-price">₱4880</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop4.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i> <!-- This is the empty star -->
                <i class="far fa-star"></i> <!-- This is the empty star -->
            </div>
            <h5 class="p-name">Ibanez GRG131DX Electric Guitar</h5>
            <h4 class="p-price">₱6599</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop5.jpeg" alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <h5 class="p-name">Gibson SG Electric Guitar</h5>
            <h4 class="p-price">₱13000</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop6.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h5 class="p-name">Fender CD-140SCE Guitar</h5>
            <h4 class="p-price">₱3990</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop7.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Ephiphone EL-00 Guitar</h5>
            <h4 class="p-price">₱6080</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop8.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Ibanez RG752 Electric Guitar</h5>
            <h4 class="p-price">₱12900</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12" style="margin-left: 20px; margin-right: 10px;"> <img class="img-fluid mb-3"
                src="assets/css/js/imgs/shop9.jpeg"
                alt="Product Image">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <h5 class="p-name">Ibanez JEM77P Electric Guitar</h5>
            <h4 class="p-price">₱17000</h4>
            <button class="btn btn-primary buy-btn">Buy Now</button>
        </div>




        <nav area-label="page naviagation example">
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="shop.php">Previous</a></li>
                <li class="page-item"><a class="page-link" href="shop.php">1</a></li>
                <li class="page-item"><a class="page-link" href="shoptwo.php">2</a></li>
                <li class="page-item"><a class="page-link" href="shopthree.php">3</a></li>
                <li class="page-item"><a class="page-link" href="shoptwo.php">Next</a></li>
            </ul>
        </nav>






    </div>
</section>
















<!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx=auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo"
                src="https://scontent.fwnp1-1.fna.fbcdn.net/v/t1.15752-9/462636518_551296974350980_2242343524009778183_n.png?_nc_cat=107&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGibnoYYZ8lAsUpOBOfumBrIfLAzTROzRch8sDNNE7NF2vY_PNEyTXkvLbgmnVN4dOVSYgBx4E9HIu20WrhFuwr&_nc_ohc=ptKYevSh7x0Q7kNvgE9l0Zy&_nc_zt=23&_nc_ht=scontent.fwnp1-1.fna&oh=03_Q7cD1QFXKoS-qtyBdkP_Skf_jgY3CCrE3cvOgGBVOgBLNAhUEQ&oe=67763553"
                alt="Description of the Image" style="width: 200px; height: auto; display: block; margin: 0 auto;">
            <h5 class="pb-2">The Garage Guitar</h5>
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
                <img src="https://dygtyjqp7pi0m.cloudfront.net/i/31422/27407273_1.jpg?v=8D4BB3B19F36A50"
                    class="img fluid w-50 h-100 mb-2" alt="Description of the image" />
                <img src="https://dygtyjqp7pi0m.cloudfront.net/i/31422/27407193_1.jpg?v=8D4BB2C78EC74C0"
                    class="img fluid w-50 h-100 mb-2" alt="Description of the image" />
            </div>
        </div>
    </div>

    <div class="copyright mt-5">
        <div class="row container mx-auto">
            <div class="col-lg-3 col-md col-sm-12 mb-4">
                <img src="https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo.png" alt="GCash Logo"
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>