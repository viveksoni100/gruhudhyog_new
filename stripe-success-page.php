<?php
require_once('admin/config.php');

$query_for_emptying_cart = "DELETE FROM cart";
if ($conn->query($query_for_emptying_cart) === TRUE) {
    /*echo '<script type="text/javascript"> window.location = "../stripe-success-page.php" </script>';*/
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

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
            <a href="index.html" class="navbar-brand">Gruh <span>Udhyog</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="notification.html" class="nav-item nav-link">Update</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="login.html" class="nav-item nav-link loginBtn">Login</a>
                    <a href="Register.html" class="nav-item nav-link regBtn">Register</a>
                    <a href="login.html" class="nav-item nav-link" style="display: none;" id="loggedInUser">Hi, Vivek</a>
                    <a href="cart.php"><i class="fas fa-cart-arrow-down" style="font-size: x-large; margin-top: 8px; cursor: pointer;">
                        <span id="cartCount">0</span>
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
    <!-- Nav Bar End -->

    <center>
    <h2 style="margin-top: 15%;">Thank you for shopping from Gruhudhyog.com</h2>
    <h3>The ordered products will be at your doorsteps whithin 3-4 days 😀</h3>
    </center>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const getFlag = urlParams.get('login');
            const user = urlParams.get('user');
            if (getFlag === 'success') {
                $(".loginBtn").html("Logout");
                $(".loginBtn").attr("href", "index.html");
                $(".regBtn").html("Hi " + user);
                $(".regBtn").attr("href", "#");
            }
        });

        function showPapads() {
            $("#papads").css("display", "block");
            $("#khakhras").css("display", "none");
            $("#pickles").css("display", "none");
        }

        function showKhakhras() {
            $("#papads").css("display", "none");
            $("#khakhras").css("display", "block");
            $("#pickles").css("display", "none");
        }

        function showPickles() {
            $("#papads").css("display", "none");
            $("#khakhras").css("display", "none");
            $("#pickles").css("display", "block");
        }
    </script>

    <script type="text/javascript">
        $(function() {
            $('.addToCart').click(function() {
                let elem = $(this);
                let id = elem.prop('id')
                $.ajax({
                    type: "GET",
                    url: "/gruhudhyog_new/php/addToCart.php",
                    data: "id=" + elem.attr('data-productId') + "&productName=" + elem.attr('data-productName') +
                        "&categoryName=" + elem.attr('data-categoryName') +
                        "&price=" + elem.attr('data-price') +
                        "&qty=" + elem.attr('data-qty') +
                        "&sellerName=" + elem.attr('data-sellerName') +
                        "&imageName=" + elem.attr('data-imageName'),
                    dataType: "json"
                }).done(function() {
                    console.log("Success...!");
                });
                document.getElementById(id).innerHTML = "Added";
                document.getElementById(id).disabled = true;

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let count = this.responseText;
                        document.getElementById("cartCount").innerHTML = count;
                    }
                }
                xmlhttp.open("GET", "/gruhudhyog_new/php/cartCounter.php", true);
                xmlhttp.send();
                return false;
            });
        });
    </script>
</body>

</html>