<?php

include('server/connection.php');

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);

    $stmt->execute();


    $product = $stmt->get_result(); //[]

    //no product id was given
} else {

    header('location: index.php');
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar Garage</title>

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


    <!--Single Product-->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
            <?php while ($row = $product->fetch_assoc()) { ?>

                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img class="img-fluid w-100 pb-1"
                        src="assets/css/js/imgs/<?php echo $row['product_image']; ?>"
                        id="mainImg" />
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="assets/css/js/imgs/<?php echo $row['product_image']; ?>"
                                width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/css/js/imgs/<?php echo $row['product_image2']; ?>"
                                width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/css/js/imgs/<?php echo $row['product_image3']; ?>"
                                width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/css/js/imgs/<?php echo $row['product_image4']; ?>"
                                width="100%" class="small-img">
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-12 col-12">
                    <h6>Acoustic Guitar</h6>
                    <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                    <h2>₱<?php echo $row['product_price']; ?></h2>


                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />




                            <input type="number" name="product_quantity" value="1" />
                            <button class="btn btn-primary" type="submit" name="add_to_cart">Add to Cart</button>
                            <h4 class="mt-5 m-5">Product Details</h4>
                            <span><?php echo $row['product_description']; ?>
                            </span>
                </div>


                </form>

            <?php } ?>
        </div>
    </section>






    <!--Related Products-->
    <section id="related-products" class="my-5 py-5">
        <div class="container text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3"
                    src="https://c1.zzounds.com/media/productmedia/fit,2018by3200/quality,85/8_Full_Left_Front_NA-81e49fad9a1e52fd88ddee7d20ce4961.jpg"
                    alt="Product Image">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">New Arrival</h5>
                <h4 class="p-price">₱1790</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3"
                    src="https://c1.zzounds.com/media/productmedia/fit,2018by3200/quality,85/8_Full_Left_Front_NA-0ae3654f8ce0eb1c073d2da86b54e238.jpg"
                    alt="Product Image">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">New Arrival</h5>
                <h4 class="p-price">₱9000</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3"
                    src="https://c1.zzounds.com/media/productmedia/fit,2018by3200/quality,85/2_Body_Straight_Front_NA-83f6f2fbce9929221796fefe3a3b230c.jpg"
                    alt="Product Image">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">New Arrival</h5>
                <h4 class="p-price">₱4880</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3"
                    src="https://c1.zzounds.com/media/productmedia/fit,2018by3200/quality,85/8_Full_Left_Front_NA-7b1b1111a26f09fb4901102f2ad1ba8a.jpg"
                    alt="Product Image">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">New Arrival</h5>
                <h4 class="p-price">₱6599</h4>
                <button class="btn btn-primary buy-btn">Buy Now</button>
            </div>
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

    <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img");

        for (let i = 0; i < smallImg.length; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }
    </script>


</body>

</html>