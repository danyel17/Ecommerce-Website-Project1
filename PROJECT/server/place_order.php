<?php

session_start();

include('connection.php');

if(isset($_POST['place_order'])) {
    // Validate user ID from session
    if (!isset($_SESSION['user_id'])) {
        die("Error: You must be logged in to place an order.");
    }
    $user_id = $_SESSION['user_id']; // Use the user ID from the session

    // Check if user exists
    $userCheckStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_id = ?");
    $userCheckStmt->bind_param('i', $user_id);
    $userCheckStmt->execute();
    $userCheckStmt->bind_result($exists);
    $userCheckStmt->fetch();
    $userCheckStmt->close();

    if ($exists == 0) {
        die("Error: User does not exist.");
    }

    // Get user info and store it in the database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "not paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');

    // Prepare and execute statement to insert order
    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date)
                            VALUES (?, ?, ?, ?, ?, ?, ?);");

    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

    if ($stmt->execute()) {
        // Store the order ID
        $order_id = $stmt->insert_id;

        // Get products from cart (from session)
        foreach($_SESSION['cart'] as $key => $value) {
            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];

            // Prepare and execute statement to insert into order_items
            $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date)
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);
            $stmt1->execute();
        }

        // Optional: Clear the cart after the order has been placed
        // unset($_SESSION['cart']);

        // Redirect the user with success message
        header('Location: ../payment.php?order_status=order placed successfully');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements
    $stmt->close();
}

// Close database connection
$conn->close();

?>