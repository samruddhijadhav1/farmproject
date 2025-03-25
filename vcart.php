<?php
include 'connection.php';
session_start();
$UID=$_SESSION["UID"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NomNom - Organic Farm Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-start">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-2"></i>
                    <h2 class="mb-0">8767125137</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.html" class="navbar-brand ms-lg-5">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Nom</span>Nom</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    <link rel="stylesheet" href="https://www.instagram.com/nom_nom1121?utm_source=qr&igsh=MWJxcHp2NnZnOWpiag==">
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


     <!-- Navbar Start -->
     <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">NOM</span>NOM</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
            <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Service</a>
                <a href="product.html" class="nav-item nav-link">Product</a> 

                <a href="order.php" class="nav-item nav-link">Order Product</a>             

                <a href="vcart.php" class="nav-item nav-link active">View Cart</a>
                <a href="logout.php" class="nav-item nav-link">logout</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <div class="container" >

  

                    <div class="row m-2">
                        <div class="col-md-8">

                                <?php
                                        if(isset($_POST['porder']))
                                        {
                                            $UID2=$_POST['txtuid'];

                                            $query=mysqli_query($con,"update mst_order set status='0' where UID='$UID2'");
                                        
                                            if($query)
                                            {
                                                echo '              
                                                            <div class="alert alert-info alerttrash alert-dismissable">
                                                                            Order Placed successfully
                                                                            </div>
                                                
                                                            ';
                                            }
                                        }
                                ?>

                                <table class="table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>     
                                                <th>Price</th>                                        
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                                $i = 1;
                                                $Total=0;

                                                    $sql = "SELECT o.*,p.Product_Name
                                                    FROM `mst_order` o
                                                    inner join mst_products p on o.PID=p.PID
                                                    where o.UID='$UID' and o.status='1'";
                                                    $result = mysqli_query($con, $sql) or die("sql query failed");

                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $OID = $row['OID'];
                                                        $Total = $Total+$row['Total'];

                                                    ?>
                                                        <tr id="<?php echo $OID ?>">
                                                                <td><?php echo $i ?> </td>
                                                                <td><?php echo $row['Product_Name'] ?> </td>
                                                                <td><?php echo $row['QTY'] ?> </td>  
                                                                <td><?php echo $row['Total'] ?> </td>                                                               

                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td colspan="3" style="text-align:right;font-weight:800">Total</td>
                                                        <td> <strong> <?php echo $Total?> </strong></td>
                                                    </tr>
                                        </tbody>

                                    
                                </table>

                                <form method="post">
                                         <input type="hidden" name="txtuid" value="<?php echo $UID?>">          
                                        <button type="submit" name="porder">Place Order</button>

                                </form>
    
                        </div>
                    </div>
                    </div>

     <!-- Footer Start -->
     <div class="container-fluid bg-footer bg-primary text-white mt-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-white mb-4">Get In Touch</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-white me-2"></i>
                                <p class="text-white mb-0">Rajarampuri 4th lane Kolhapur</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-white me-2"></i>
                                <p class="text-white mb-0">info@example.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="text-white mb-0">+91 9322902730</p>
                                <p class="text-white mb-0">+91 9421172386</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                                <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white mb-4">Popular Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                                <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                                <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">NOM</a>. All Rights Reserved. Designed by <a class="text-secondary fw-bold" href="https://htmlcodex.com">HTML Coders</a></p>
            <br>Distributed By: <a class="text-secondary fw-bold" href="https://themewagon.com" target="_blank">Champions</a>
        </div>
    </div>
  
    <script src="./index.js"></script>
    <!-- Footer End -->
