<?php 


/*
  not paid
  shipped
  delivered
*/

include('server/connection.php');


if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

    $stmt->bind_param('i',$order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();
}else{

    header('location: account.php');
    exit; 

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="assets/css/js/imgs/logo1.jpeg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>

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




    <!--Order Details-->
    <section id="orders" class="orders container my-3 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
    </div>
    <table class="table table-striped mt-5 pt-5 mx-auto">
        <thead>
            <tr>
                <th scope="col">Product</th>              
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>

           
        <?php while($row= $order_details->fetch_assoc()){ ?>

<tr>
    <td>
        <div class="product-info">
            <img src="assets/css/js/imgs/<?php echo $row['product_image'];?>" style="width: 100px; height: auto;"/> 

            <div>
                <p class="mt-3"><?php echo $row['product_name'];?></p>                          
            </div>
        </div>
    </td>

    <td>
        <span>₱<?php echo $row['product_price'];?></span>
    </td>

    <td>
        <span><?php echo $row['product_quantity'];?></span>
    </td>

    
</tr>

<?php } ?>
            

        </tbody>
    </table>


    <?php if($order_status == "not paid"){?>
        <form style="float: right;">
            <input type="submit" class="btn btn-primary btn-lg" value="Pay Now"/>
        </form>


        <?php } ?>

        


</section>
               

<style>
    .badge-black {
        background-color: black; /* Sets the background color to black */
        color: white; /* Sets the text color to white for contrast */
    }
</style>


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