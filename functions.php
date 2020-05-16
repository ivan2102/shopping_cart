<?php 

// Helper functions //

function last_id(){

    global $connection;

    return mysqli_insert_id($connection);
}

function set_message($message) {

    if(!empty($message)) {

        $_SESSION['message'] = $message;
    }else {

        $message = "";
    }
}

function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset ($_SESSION['message']);
    }
}


function redirect($location) {

    header("Location: $location");
}

function query($sql) {

    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($result) {

    global $connection;

    if(! $result) {

        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string) {

    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {

 return mysqli_fetch_array($result);
}

//End Helper Functions //

//IP address code starts //

function getRealUserIp() {

    switch(true) {

        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

//IP address code ends //

// add_cart Function Starts //

function add_cart() {

    if(isset($_GET['add_cart'])) {

    $product_id = $_GET['add_cart'];

        $ip_address = getRealUserIp();
        $quantity = $_POST['quantity'];

        

        $check_product = query("SELECT * FROM cart WHERE ip_address='$ip_address' AND product_id='$product_id' ");
        confirm($check_product);

        if(mysqli_num_rows($check_product) > 0) {

            echo "<script>alert('This product has already been added in cart')</script>";
            echo "<script>window.open('cart.php?product_id=$product_id','_self')</script>";
        }else {

            $query_insert_cart = query("INSERT INTO cart(product_id,ip_address,quantity) VALUES('$product_id','$ip_address','$quantity')");
            confirm($query_insert_cart);

            echo "<script>window.open('cart.php?product_id=$product_id','_self')</script>";
        }
    }
}

// add_cart Function Ends //

// add Items Function Starts //

function items() {

    $ip_address = getRealUserIp();

    $query_items = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
    confirm($query_items);

    $count_items = mysqli_num_rows($query_items);
    echo $count_items;
}

// add Items Function Ends //

//Function total_price Starts //

function total_price() {

    $ip_address = getRealUserIp();

    $total = 0;

    $query_cart = query("SELECT * FROM cart WHERE ip_address='$ip_address'");
    confirm($query_cart);

    while($row = fetch_array($query_cart)) {

        $product_id = $row['product_id'];
        $quantity = $row['quantity'];

        $query_product = query("SELECT * FROM products WHERE product_id='$product_id'");
        confirm($query_product);

        while($row = fetch_array($query_product)) {

            $sub_total = $row['product_price'] * $quantity;
            $total += $sub_total;
        }
    }

    echo "$" . $total;
}

//Function total_price Ends








?>

