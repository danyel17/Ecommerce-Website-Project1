<?php
session_start();

// Function to calculate total cart value
function calculateTotalCart() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $total += $product['product_price'] * $product['product_quantity'];
        }
    }
    $_SESSION['total'] = $total;
}

// Adding a product to the cart
if (isset($_POST['add_to_cart'])) {
    // Check if the cart already exists
    if (isset($_SESSION['cart'])) {
        $product_ids = array_column($_SESSION['cart'], "product_id");
        // Check if the product is already in the cart
        if (!in_array($_POST['product_id'], $product_ids)) {
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );
            $_SESSION['cart'][$_POST['product_id']] = $product_array;
        } else {
            $_SESSION['notification'] = "Product is already in the cart.";
        }
    } else {
        // If the cart doesn't exist, add the product
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        );
        $_SESSION['cart'][$_POST['product_id']] = $product_array;
    }
    calculateTotalCart();
}

// Removing a product from the cart
if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    calculateTotalCart();
}

// Editing the quantity of a product in the cart
if (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    // Validate quantity
    if ($product_quantity > 0) {
        $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
    } else {
        unset($_SESSION['cart'][$product_id]); // Remove product if quantity is 0 or less
    }
    calculateTotalCart();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>

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


    <!--Cart-->
    <section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
        <?php if (isset($_SESSION['notification'])): ?>
            <div class="notification"><?php echo htmlspecialchars($_SESSION['notification']); unset($_SESSION['notification']); ?></div>
        <?php endif; ?>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>

        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                <tr>
                    <td>
                        <div class="project-info">
                            <img src="assets/css/js/imgs/<?php echo htmlspecialchars($value['product_image']); ?>" alt="<?php echo htmlspecialchars($value['product_name']); ?>" />
                            <div>
                                <p><?php echo htmlspecialchars($value['product_name']); ?></p>
                                <small><span>₱</span><?php echo htmlspecialchars($value['product_price']); ?></small>
                                <br>
                                <form method="POST" action="">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>" />
                                    <input type="submit" name="remove_product" class="remove-btn" value="Remove" />
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <input type="number" name="product_quantity" value="<?php echo htmlspecialchars($value['product_quantity']); ?>" style="width: 50px; height: 20px;" />
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>" />
                            <input type="submit" class="edit-btn" value="Edit" name="edit_quantity" />
                        </form>
                    </td>
                    <td>
                        <span>₱</span>
                        <span class="product_price"><?php echo htmlspecialchars($value['product_quantity'] * $value['product_price']); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="cart-total">
        <table>
            <tr>
                <td>Total</td>
                <td>₱ <?php echo isset($_SESSION['total']) ? htmlspecialchars($_SESSION['total']) : '0'; ?></td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
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