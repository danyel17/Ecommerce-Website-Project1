<?php
// Database configuration
$host = 'localhost'; // change if necessary
$username = 'root'; // your database username
$password = ''; // your database password
$dbname = 'guitar_garage';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch featured products
$sql = "SELECT * FROM featured_products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='product text-center col-lg-3 col-md-4 col-sm-12'>";
        echo "<img class='img-fluid mb-3' src='" . $row['image_url'] . "' alt='" . $row['description'] . "'>";
        echo "<div class='star'>";
        for ($i = 0; $i < 5; $i++) {
            echo "<i class='fas fa-star'></i>";
        }
        echo "</div>";
        echo "<h5 class='p-name'>" . $row['name'] . "</h5>";
        echo "<h4 class='p-price'>₱" . number_format($row['price'], 2) . "</h4>";
        echo "<button class='btn btn-primary buy-btn'>Buy Now</button>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>