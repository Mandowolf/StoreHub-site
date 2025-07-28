<html>
    <head>
<title>Manual Checkout Page</title>
<style>
        /* Basic body styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Carousel styling for logos */
        .logos {
            overflow: hidden;
            padding: 20px 0;
            background: #e0e0e0;
            white-space: nowrap;
            position: relative;
            width: 100%;
        }

        /* Gradient effect at edges */
        .logos:before,
        .logos:after {
            position: absolute;
            top: 0;
            width: 250px;
            height: 100%;
            content: "";
            z-index: 2;
        }

        .logos:before {
            left: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 0), white);
        }

        .logos:after {
            right: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0), white);
        }

        /* Animation effect */
        @keyframes slide {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-100%);
            }
        }

        /* Reverse animation for bottom carousel */
        @keyframes slide-reverse {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }

        /* Logo images styling */
        .logos-slide {
            display: inline-block;
            animation: 50s slide infinite linear;
        }

        /* Apply the reverse animation to the bottom carousel */
        .logos.bottom .logos-slide {
            animation: 50s slide-reverse infinite linear;
            padding-bottom: 10px;
        }

        .logos-slide img {
            height: 150px;
            width: 300px;
            margin: 0;
        }

        /* Container with text and buttons */
        .container {
            text-align: center;
            font-size: 1.2em;
            color: #555;
            padding: 30px 0;
            width: 100%;
        }

        .message {
            font-size: 2em;
            color: #333;
            opacity: 0;
            animation: fadeIn 2s forwards;
            animation-delay: 0.5s;
        }

        .login-as {
            opacity: 0;
            animation: fadeIn 1s forwards;
            animation-delay: 0.8s;
            font-size: 1.2em;
            color: #555;
            margin-top: 15px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            opacity: 0;
            animation: fadeIn 2s forwards;
            animation-delay: 1.2s;
            margin-top: 15px;
        }

        .button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 1em;
            cursor: pointer;
            border: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body>
<?php
    session_start(); // Start the session at the beginning of each protected page
    if (!isset($_SESSION['employee_ID'])) {
        header("Location: employeelogin.php");
        exit();
    }
    ?>
<div class="logos">
        <div class="logos-slide">
            <img src="images/store1.jpg" alt="Image 1">
            <img src="images/store2.jpg" alt="Image 2">
            <img src="images/store3.jpg" alt="Image 3">
            <img src="images/store4.jpg" alt="Image 4">
            <img src="images/store5.jpg" alt="Image 5">
        </div>
        <div class="logos-slide">
            <img src="images/store1.jpg" alt="Image 1">
            <img src="images/store2.jpg" alt="Image 2">
            <img src="images/store3.jpg" alt="Image 3">
            <img src="images/store4.jpg" alt="Image 4">
            <img src="images/store5.jpg" alt="Image 5">
        </div>
    </div>
<php>
    <?php
        include "employeeNav.html";
        echo "<br>";
        include 'dbConnect.php';if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['cart_ID'];

            $query = "SELECT * from cart_items where cart_ID = $number AND is_sold=0";
            $result = $dbConn->query($query);
            echo "Items in cart by ID number: <br>";
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "ID: " . $row['cart_item_ID'] . " ";
        }
    } else {
        echo " There are no items in this cart";
    }
        }
    ?>
</php>
<p> <br></p>
 <form method="POST" action="checkoutDbAccess.php">
        <label for="userInput">Item's ID being checked out: </label>
        <input type="number" name="userInput" id="userInput" required>
        <button type="submit">Submit</button>
    </form>
    <p> <br></p>
    <form method="POST" action="emptyCart.php">
        <label for="userInput">If cart is empty enter cart ID and press Enter </label>
        <input type="number" name="userInput" id="userInput" required>
        <button type="submit">Enter</button>
    </form>
    <div class="logos bottom">
        <div class="logos-slide">
          <img src="images/store1.jpg" alt="Image 1">
          <img src="images/store2.jpg" alt="Image 2">
          <img src="images/store3.jpg" alt="Image 3">
          <img src="images/store4.jpg" alt="Image 4">
          <img src="images/store5.jpg" alt="Image 5">
        </div>
        <div class="logos-slide">
          <img src="images/store1.jpg" alt="Image 1">
          <img src="images/store2.jpg" alt="Image 2">
          <img src="images/store3.jpg" alt="Image 3">
          <img src="images/store4.jpg" alt="Image 4">
          <img src="images/store5.jpg" alt="Image 5">
        </div>
    </div>

</body>
</html>
