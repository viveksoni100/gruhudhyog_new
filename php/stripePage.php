<?php

require_once('../vendor/autoload.php');
require_once('../admin/config.php');
\Stripe\Stripe::setApiKey('sk_test_kfQBJauZkXiXn1YNELy00zC200XaEVhSJL');

$query_for_fetching_all_record_from_cart = "SELECT * FROM cart";
$result = $conn->query($query_for_fetching_all_record_from_cart);
$product_dataset_cart = [];
if ($result->num_rows > 0) {
    $product_dataset_cart = $result->fetch_all(MYSQLI_ASSOC);
}

$line_items = array();

foreach ($product_dataset_cart as $product) {
    $line_items[] = [
        'price_data' => [
        'currency' => 'inr',
        'product_data' => [
        'name' => $product['product_name'],
        ],
        'unit_amount' => $product['price'] * 100,
        ],
        'quantity' => 1
    ];
}


$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [$line_items],
    'mode' => 'payment',
    'success_url' => 'http://localhost:4242/success',
    'cancel_url' => 'http://example.com/cancel',
]);

?>

<html>

<head>
    <title>Buy cool new product</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(function(e) {
            var stripe = Stripe('pk_test_7hMTOVOfhHIxmmlIVI2B5yek00Emz0FSjK');
            stripe.redirectToCheckout({
                sessionId: "<?php echo $session->id; ?>"
            });
        });
    </script>
</body>

</html>