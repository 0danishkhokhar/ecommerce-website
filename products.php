<?php
    session_start();
    require 'connection.php';
    require 'check_if_added.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Digital Prducts</title>
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

<?php
$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<body>
    <div>
        <?php
                require 'header.php';
            ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to Digital Electronic Store!</h1>
                <p>We have the best cameras, watches, mobile and All Digital Electroincs for you. No need to hunt
                    around, we have all in one
                    place.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/'.$row["file_name"];
                    ?>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="cart.php">
                            <img src="<?php echo $imageURL; ?>" alt="" />
                        </a>
                        <center>
                            <div class="caption">

                                <?php
                                echo "<h3>" . $row['name'] . "</h3>";
                                echo "<p>" . $row['price'] . "</p>";
                                // echo "<p>" . $row['id'] . "</p>";

                                $item_id = $row['id'];
                                $url = "cart_add.php?id=" . urlencode( $item_id);
                                ?>
                                <?php if(!isset($_SESSION['email'])){  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($item_id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                <a href="<?php echo $url; ?>" class=" btn btn-block btn-primary" name="add" value="add"
                                    class="btn btn-block btr-primary">Add to cart</a>
                                <?php
                                            }
                                        }
                                        ?>

                            </div>
                        </center>
                    </div>
                    <!-- // Add more echo statements for additional columns -->
                </div>
                <?php } ?>
            </div>

        </div>
        <br><br><br><br><br><br><br><br>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Copyright &copy Lifestyle Store. All Rights Reserved. | Contact Us: +92 321 9891767</p>
                    <p>This website is developed by Danish Muzammil</p>
                </center>
            </div>
        </footer>
    </div>
</body>

</html>