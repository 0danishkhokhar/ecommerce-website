<?php
    session_start();
    require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="container">
        <div class="jumbotron custom-jumbotron">
            <h1 class="display-4">Digital Store Admin Panel</h1>
        </div>
        <div class="container">

            <!-- Bootstrap Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Item</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form action="submit_category.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="categoryTitle">Category Title</label>
                                    <input type="text" class="form-control" id="categoryTitle" name="categoryTitle"
                                        placeholder="Enter category title" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName"
                                        placeholder="Enter category name" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoryPrice">Category Price</label>
                                    <input type="number" class="form-control" id="categoryPrice" name="categoryPrice"
                                        placeholder="Enter category price" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoryPicture">Category Picture</label>
                                    <input type="file" class="form-control-file" id="categoryPicture"
                                        name="categoryPicture" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
                            </form>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  
        $sql = "SELECT * FROM items";
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));


        
        // echo "<script>window.location.reload();</script>";


        // Handle delete operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
  $idToDelete = $_POST["delete"];

  // Perform delete operation in the database
  $deleteSql = "DELETE FROM items WHERE id = $idToDelete";
  if ($con->query($deleteSql) === TRUE) {
   
   
   

      // echo "Record deleted successfully.";
  } else {
      // Error
      echo "Error deleting record: " . $con->error;
  }
}

        ?>

        <div class="container">
            <h2>Data Table</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Item_Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                // Iterate through the fetched data and display it in the table
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["category_type"] . "</td>";
                        echo "<td><form method='POST' style='display:inline-block;'><input type='hidden' name='delete' value='" . $row["id"] . "'><button type='submit' class='btn btn-danger'>Delete</button></form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Item</button>
    </div>

</body>





</html>