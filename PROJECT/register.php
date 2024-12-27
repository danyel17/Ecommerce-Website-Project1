<?php

session_start();

include('server/connection.php');

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // If passwords do not match
    if($password !== $confirmPassword) {
        header('location: register.php?error=passwords do not match');
        exit();
    }
    
    // If password is less than 6 characters
    if(strlen($password) < 6) {
        header('location: register.php?error=password must be at least 6 characters');
        exit();
    }

    // Check if there is a user with this email or not 
    $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->fetch();
    $stmt1->close();

    // If there is already a user registered with this email 
    if($num_rows != 0) {
        header('location: register.php?error=user with this email already exists');
        exit();
    } else {
        // Create a new user 
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param('sss', $name, $email, $hashedPassword);
        
        // If account was created successfully 
        if($stmt->execute()) {
            $user_id = $stmt->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: account.php?register_success=You registered successfully');
        } else {
            header('location: register.php?error=could not create an account at the moment');
        }

        $stmt->close();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Now</title>

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
                        <a class="nav-link" href="index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
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




    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold" style="color: #333; font-size: 2.5rem;">Register</h2>
            <hr style="width: 100px; border: 2px solid #007bff; margin: 20px auto;">
        </div>
        <div class="mx-auto container" style="max-width: 600px;">
            <form id="register-form" method="POST"  action="register.php" style="background-color: white; padding: 50px; border-radius: 15px; box-shadow: 0 6px 20px rgba(0,0,0,0.15); width: 100%;">
                <p style="color: red;"><?php if (isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group" style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 15px; color: #555; font-weight: bold; font-size: 1.1rem;">Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" 
                        style="width: 100%; padding: 15px; border: 2px solid #ddd; border-radius: 8px; transition: all 0.3s ease; font-size: 1rem;"
                        required />
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 15px; color: #555; font-weight: bold; font-size: 1.1rem;">Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" 
                        style="width: 100%; padding: 15px; border: 2px solid #ddd; border-radius: 8px; transition: all 0.3s ease; font-size: 1rem;"
                        required />
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 15px; color: #555; font-weight: bold; font-size: 1.1rem;">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password"
                        style="width: 100%; padding: 15px; border: 2px solid #ddd; border-radius: 8px; transition: all 0.3s ease; font-size: 1rem;"
                        required />
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 15px; color: #555; font-weight: bold; font-size: 1.1rem;">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="ConfirmPassword"
                        style="width: 100%; padding: 15px; border: 2px solid #ddd; border-radius: 8px; transition: all 0.3s ease; font-size: 1rem;"
                        required />
                </div>
                <div class="form-group" style="margin-bottom: 30px;">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register"
                        style="width: 100%; padding: 15px; background-color: #007bff; color: white; border: none; border-radius: 8px; transition: background-color 0.3s ease; cursor: pointer; font-size: 1.1rem; font-weight: bold;"
                    />
                </div>
                <div class="form-group text-center">
                   <a id="login-url" class="btn" style="color: #007bff; text-decoration: none; transition: color 0.3s ease; font-size: 1rem;">
                       Do you have an account? Login
                   </a>
                </div>
            </form>
        </div>
    </section>
    

    





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