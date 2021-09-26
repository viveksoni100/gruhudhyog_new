<?php
require_once('admin/config.php');

$query_for_fetching_all_record_from_cart = "SELECT * FROM cart";
$result = $conn->query($query_for_fetching_all_record_from_cart);
$product_dataset_cart = [];
if ($result->num_rows > 0) {
    $product_dataset_cart = $result->fetch_all(MYSQLI_ASSOC);
}

$query_for_fetching_total_cart_amount = "SELECT SUM(price) as TOTAL from cart";
$result = $conn->query($query_for_fetching_total_cart_amount);
$total_amount = $result->fetch_assoc();

$query_for_cart_count = "SELECT COUNT(*) as COUNT FROM cart";
$result = $conn->query($query_for_cart_count);
$count = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gruh Udhyog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand"> <span>Carts</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="#">
                        <i class="fas fa-cart-arrow-down" style="font-size: x-large; margin-top: 8px; cursor: pointer;">
                            <?php echo $count['COUNT']; ?>
                        </i></a>

                    <div class="nav-item dropdown">

                        <div class="dropdown-menu">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>

                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Price</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if (!empty($product_dataset_cart)) { ?>
                    <?php foreach ($product_dataset_cart as $cart_product) { ?>


                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
                            <div class="col-sm-10">

                                <h5><?php echo $cart_product['product_name']; ?></h5>
                                <h6>Category : <?php echo $cart_product['category_name']; ?></h6>
                            </div>
                        </div>
                    </td>

                    <td data-th="Quantity">
                        <h6><?php echo $cart_product['qty'].' gm';?>

                    </td>
                    <td data-th="Subtotal" class="text-center">
                        <h6><?php echo $cart_product['price'] ?></h6>
                    </td>
                    <td class="actions" data-th="">

                        <a class="btn btn-danger btn-sm" href="php/deleteFromCart.php?id=<?php echo $cart_product['id']; ?>" style="color: white;"><i class="fas fa-trash-alt"></i></a>
                    </td>


                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        Shipping Address :<br />
                        <textarea id="shippingAddress" class="form-control"></textarea>
                    </td>
                    <td class="hidden-xs text-center"><strong><?php echo 'Grand Total : '.$total_amount['TOTAL'] ?></strong></td>
                    <td><a href="php/stripePage.php" id="checkoutBtn" class="btn btn-success btn-block">
                        Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if ($("#shippingAddress").val() === "") {
            $("#checkoutBtn").hide();
        } else {$("#checkoutBtn").show();}
    });
    $("#shippingAddress").on("change keyup paste", function() {
       $("#checkoutBtn").show();
    });
</script>

</html>