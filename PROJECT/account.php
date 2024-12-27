<?php
session_start();
include('server/connection.php'); // Correctly includes the database connection

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('location: login.php');
    exit;
}

// Logout logic
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location: login.php?message=' . urlencode('logged_out_successfully'));
    exit;
}

// Change Password Logic
if (isset($_POST['change_password'])) {
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? ''; 
    $user_email = $_SESSION['user_email'];

    // Validate input
    if (empty($password) || empty($confirmPassword)) {
        header('location: account.php?error=' . urlencode('Password fields cannot be empty'));
        exit;
    }

    // Password matching
    if ($password !== $confirmPassword) {
        header('location: account.php?error=' . urlencode('Passwords do not match'));
        exit;
    }

    // Minimum length check
    if (strlen($password) < 6) {
        header('location: account.php?error=' . urlencode('Password must be at least 6 characters'));
        exit;
    }

    // Hash and update password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('UPDATE users SET user_password=? WHERE user_email=?');
    
    if ($stmt) {
        $stmt->bind_param('ss', $hashed_password, $user_email);
        
        if ($stmt->execute()) {
            header('location: account.php?message=' . urlencode('Password has been updated successfully'));
            exit;
        } else {
            header('location: account.php?error=' . urlencode('Could not update password'));
            exit;
        }
    } else {
        header('location: account.php?error=' . urlencode('Failed to prepare database statement'));
        exit;
    }
}

//get orders
if(isset($_SESSION['logged_in'])){

   $user_id = $_SESSION['user_id'];
   $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

   $stmt->bind_param('i',$user_id);

   $stmt->execute();


   $orders = $stmt->get_result();//[]

}

// Close database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

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
            <img src="assets/css/js/imgs/logo.jpeg" width="80" height="80"/>
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




    <!--Account-->
    <section class="my-5 py-5">
    <div class="row container mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p class="text-center" style="color:green">
                <?php
                if (isset($_SESSION['login_success'])) {
                    echo $_SESSION['login_success'];
                    unset($_SESSION['login_success']); // Clear the message after displaying it
                }
                ?>
            </p>
            <p class="text-center" style="color:green">
                <?php if (isset($_GET['register_success']) && $_GET['register_success'] !== '') { echo $_GET['register_success']; } ?>
            </p>
            <p class="text-center" style="color:green">
                <?php if (isset($_GET['login_success']) && $_GET['login_success'] !== '') { echo $_GET['login_success']; } ?>
            </p>
            <h3 class="font-weight-bold">Account Info</h3>
            <hr class="max-auto">
            <div class="class-info">
                <p>Name:<span> <?php if (isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?></span></p>
                <p>Email:<span> <?php if (isset($_SESSION['user_email'])) { echo $_SESSION['user_email']; } ?></span></p>
                <p><a href="#orders" id="orders-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <form id="account-form" method="POST" action="account.php">
                <p class="text-center" style="color:red">
                    <?php if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']); // Clear the message after displaying it
                    } ?>
                </p>
                <p class="text-center" style="color:green"><?php if (isset($_GET['message'])) { echo $_GET['message']; } ?></p>
                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required />
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirm-password" placeholder="Confirm Password" required />
                    <small id="password-error" class="text-danger" style="display:none;">Passwords do not match</small>
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                </div>
            </form>
        </div>
    </div>
</section>



    <!--Orders-->
    <section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>
    <table class="table table-striped mt-5 pt-5">
        <thead>
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Order Cost</th>
                <th scope="col">Order status</th>
                <th scope="col">Order Date</th>
                <th scope="col">Order Details</th>
            </tr>
        </thead>
        <tbody>

            <?php while($row = $orders->fetch_assoc() ){ ?>

            <tr>
                <td>
                    <div class="d-flex align-items-center">                      
                        <div>
                            <p class="font-weight-bold mb-1"><?php echo $row['order_id']; ?></p>                          
                        </div>
                    </div>
                </td>

                <td>
                    <span><?php echo $row['order_cost']; ?></span>
                </td>

                <td>
                    <span><?php echo $row['order_status']; ?></span>
                </td>

                <td>
                    <span><?php echo $row['order_date']; ?></span>
                </td>

                <td>
                    <form method="POST" action="order_details.php">
                        <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"/>
                        <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id"/>
                        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details"/>
                    </form>

                </td>
            </tr>

            <?php } ?> 

        </tbody>
    </table>
</section>
               

<style>
    .badge-black {
        background-color: black; /* Sets the background color to black */
        color: white; /* Sets the text color to white for contrast */
    }
</style>

    
    <script>
    document.getElementById('account-form').addEventListener('submit', function(e) {
        const password = document.getElementById('account-password').value;
        const confirmPassword = document.getElementById('account-password-confirm').value;
        const errorMessage = document.getElementById('password-error');
    
        if (password !== confirmPassword) {
            e.preventDefault();
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
        }
    });
    
    document.getElementById('account-password-confirm').addEventListener('input', function() {
        const password = document.getElementById('account-password').value;
        const confirmPassword = this.value;
        const errorMessage = document.getElementById('password-error');
    
        if (password !== confirmPassword) {
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
        }
    });
    </script>









    <!--Footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx=auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo"
                    src="assets/css/js/imgs/logo.jpeg"
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





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Wo+RnCB+q2LbeEhzIwP/JFchVYcE9YG8EM5XbRgyY68gqWQ5g3dwo0FfGd40YIoL" crossorigin="anonymous"></script>
    </body>
    </html>