<?php
require_once('admin/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$qery_for_fetching_distinct_seller_email = "SELECT c.product_name, c.category_name, c.price, c.qty, c.seller_name, u.email FROM cart c LEFT JOIN user u ON c.seller_name = u.name";
$result = $conn->query($qery_for_fetching_distinct_seller_email);
$seller_email_dataset = [];
if ($result->num_rows > 0) {
    $seller_email_dataset = $result->fetch_all(MYSQLI_ASSOC);
}

foreach ($seller_email_dataset as $seller) {
    $email_content = "<!DOCTYPE html>
<html lang='en' >
<head>
  <meta charset='UTF-8'>
  <title>CodePen - Email template: general</title>
</head>
<body>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<meta http-equiv='content-type' content='text/html; charset=utf-8'>
  	<meta name='viewport' content='width=device-width, initial-scale=1.0;'>
 	<meta name='format-detection' content='telephone=no'/>
	<style>
body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
#outlook a { padding: 0; }
.ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
@media all and (min-width: 560px) {
	.container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px;}
}
a, a:hover {
	color: #127DB3;
}
.footer a, .footer a:hover {
	color: #999999;
}
 	</style>
	<title>Get this responsive email template</title>
</head>
<body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: #000000;'
	bgcolor='#F0F0F0'
	text='#000000'>
<table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
	bgcolor='#F0F0F0'>
<table border='0' cellpadding='0' cellspacing='0' align='center'
	width='560' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;' class='wrapper'>
	<tr>
		<td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 20px;
			padding-bottom: 20px;'>
			<div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
			color: #F0F0F0;' class='preheader'>
				</div>
		</td>
	</tr>
</table>
<table border='0' cellpadding='0' cellspacing='0' align='center'
	bgcolor='#FFFFFF'
	width='560' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;' class='container'>
	<tr>
		<td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 25px;
			color: #000000;
			font-family: sans-serif;' class='header'>
				<a target='_blank' style='text-decoration: none;'
				href='https://github.com/konsav/email-templates/'><img border='0' vspace='0' hspace='0'
				src='https://raw.githubusercontent.com/viveksoni100/images.blogs/master/other/GU_Logo.JPG'
				width='100' height='30'
				alt='Logo' title='Logo' style='
				color: #000000;
				font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;' /></a>
		</td>
	</tr>
	<tr>
		<td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #000000;
			font-family: sans-serif;' class='subheader'>
				Order is placed
		</td>
	</tr>
	<tr>
		<td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
			padding-top: 20px;' class='hero'><a target='_blank' style='text-decoration: none;'
			href='https://github.com/konsav/email-templates/'><img border='0' vspace='0' hspace='0'
			src='https://raw.githubusercontent.com/viveksoni100/images.blogs/master/other/email_image_gu.jpg'
			alt='Please enable images to view this content' title='Hero Image'
			width='560' style='
			width: 100%;
			max-width: 560px;
			color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
	</tr>
	<tr>
		<td align='left' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 25px; 
			color: #000000;
			font-family: sans-serif;' class='paragraph'>";
    $email_name = $seller['seller_name'];
    $post_name_content = ", <br>
            below is the detail of order placed on gruhudhyog.com portal, kindly ship them as early as possible.
		</td>
	</tr>
	<tr>	
		<td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 25px;' class='line'><hr
			color='#E0E0E0' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
		</td>
	</tr>
	<tr>
		<td align='left' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 25px; 
			color: #000000;
			font-family: sans-serif;' class='paragraph'>";
    
    
    /*echo $seller['product_name'];
    echo $seller['category_name'];
    echo $seller['price'];
    echo $seller['qty'];
    echo $seller['seller_name'];
    echo $seller['email'];*/
    try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'janu28project@gmail.com';        
    $mail->Password   = '28janu28';                          
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;  
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom('vivek.fullstack.dev@gmail.com', 'ADMIN');
    $mail->addAddress($seller['email'], $seller['seller_name']);     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Order Update Mail';
    $mail->Body    = $email_content.$email_name.$post_name_content.'Product Name : '.$seller['product_name'].' <br/>'.
        'Category Name : '.$seller['category_name'].' <br/>'.
        'Price : '.$seller['price'].' <br/>'.
        'Qty. : '.$seller['qty'];
    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
}
}



/*$query_for_emptying_cart = "DELETE FROM cart";
if ($conn->query($query_for_emptying_cart) === TRUE) {
    echo '<script type="text/javascript"> window.location = "../stripe-success-page.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

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