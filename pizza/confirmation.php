<?php
    $first = $_POST["firstName"];
    $last = $_POST["lastName"];
    $address = $_POST["address"];
    $delOption = $_POST["method"];
    $pizzaSize = $_POST["size"];
    $toppings = $_POST["toppings[]"]
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poppa's Pizza</title>
</head>
<body>
    <h1>Thank you for your order</h1>
    <h2>Order Summary:</h2>
    <p>First Name:
        <?php echo $first ?>
    </p>
    <p>Last Name:
        <?php echo $last ?>
    </p>
    <p>Address:
        <?php echo $address ?>
    </p>
    <p>Pickup Options:
        <?php echo $delOption ?>
    </p>
    <p>Size:
        <?php echo $pizzaSize ?>
    </p>
    <p>Toppings:
        <?php echo $toppings ?>
    </p>
    <pre>
    <?php
        //send order by email
        //Note: this will probably go to your spam folder
        $email = "olegrovin@gmail.com";

        $email_body = "Order Summary --\r\n";
        $email_body .= "Name: $first $last \r\n";
        $email_body .= "Address:$address \r\n";
        $email_body .= "Pick-up: $delOption \r\n";
        $email_body .= "Pizza Size: $pizzaSize \r\n";

        $email_subject = "New Order Placed";
        $to = $email;

        $headers = "from: $email\r\n";
        $headers.= "Reply-to: $email \r\n";
        $success = mail($to, $email_subject, $email_body, $headers);

        //Print final confirmation
        $msg = $success ? "Your order was successfully placed."
            : "We're sorry. There was a problem with your order.";
        echo "<p>$msg</p>";
    ?>
    </pre>
</body>
</html>