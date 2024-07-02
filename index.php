<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Digital Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
            require 'header.php';
           ?>
        
            
                
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    
                        <a href="products.php">
                        
                        </a>
                        <center>
                            <div class="caption">
                               
                            
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="img/watch.jpg" alt="Watch">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Watches</p>
                                <p>Original watches from the best brands.</p>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="img/pngegg.png" alt="Shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Mobiles</p>
                                <p>Best Quality Mobiles.</p>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="products.php">
                            <img src="img/1-3.png" alt="Shirt">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">All types of Products</p>
                                <p>Buy Best qualities of products.</p>
                            </div>
                        </center>
                    </div>
                </div>
                <center>  
                        <a href="products.php" class="btn btn-danger">Click to buy</a>
                    </div>
                </center>


            </div>
        </div>
        <br><br> <br><br><br><br>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Copyright &copy Shopping Store. All Rights Reserved. | Contact Us: +92 321 9891767</p>
                    <p>This website is developed by Danish Muzammil</p>
                </center>
            </div>
        </footer>
    </div>
</body>

</html>