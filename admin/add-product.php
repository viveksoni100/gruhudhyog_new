<?php
require_once('config.php');

$qery_for_fetching_product_dataset = "SELECT id, name, category_id, price, qty, seller_id, image_name, image_path, category_name, seller_name FROM product";
$result = $conn->query($qery_for_fetching_product_dataset);
$product_dataset = [];
if ($result->num_rows > 0) {
    $product_dataset = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../index.html">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Category
                        </a>
                        <a class="nav-link" href="product.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Product
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="">Product</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="productName" style="margin-bottom: 10px;">Product Name</label>
                                <input type="text" class="form-control" id="productName" required>
                                <label for="categoryName" style="margin-bottom: 10px;">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" required>
                                <label for="price" style="margin-bottom: 10px;">Price</label>
                                <input type="number" class="form-control" id="price" required>
                                <label for="qty" style="margin-bottom: 10px;">Qty</label>
                                <input type="number" class="form-control" id="qty" required>
                                <label for="seller" style="margin-bottom: 10px;">Seller</label>
                                <input type="text" class="form-control" id="seller" required>
                                <label for="image" style="margin-bottom: 10px;">Image</label>
                                <input type="file" class="form-control" id="image" required>
                                <button class="btn btn-primary" onclick="addInProduct()" style="margin-top: 20px;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; 2021 Developed by : Janvi Ranpara</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/datatables-simple-demo.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        });
    </script>
    <script type="text/javascript">
        function addInProduct() {
            let productName = document.getElementById('productName').value;
            let categoryName = document.getElementById('categoryName').value;
            let price = document.getElementById('price').value;
            let qty = document.getElementById('qty').value;
            let seller = document.getElementById('seller').value;
            let image = document.getElementById('image').value;
            $.ajax({
                type: "GET",
                url: "/gruhudhyog_new/php/addProduct.php",
                data: "productName=" + productName + "&categoryName=" + categoryName +
                "&price=" + price + "&qty=" + qty + "&seller=" + seller + "&image=" + image,
                dataType: "json"
            }).done(function() {
                console.log("Success...!");
            });
            window.location = "product.php";
        }
    </script>


</body>

</html>