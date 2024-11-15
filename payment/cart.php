<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Payment Page</title>
</head>
<body>
    <div class="container">
        <h1>Secure Payment</h1>
        <form id="paymentForm" action="process_payment.php" method="post">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

            <button type="submit">Pay Now</button>
        </form>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and process payment data
    $cardNumber = $_POST["cardNumber"];
    $expiryDate = $_POST["expiryDate"];
    $cvv = $_POST["cvv"];

    // Add your payment processing logic here
    // For example, you can use a payment gateway API for actual transactions

    // Redirect or show a success message
    header("Location: success_page.html");
    exit();
}
?>



    <script src="script.js"></script>
</body>
</html>
