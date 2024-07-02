<?php
session_start();
require 'connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $categoryTitle = $_POST['categoryTitle'];
  $categoryName = $_POST['categoryName'];
  $categoryPrice = $_POST['categoryPrice'];

  // File upload handling
  $categoryPicture = $_FILES['categoryPicture'];

  // Validate the inputs (perform additional checks as per your requirements)
  if (empty($categoryTitle) || empty($categoryName) || empty($categoryPrice) || empty($categoryPicture)) {
    echo "Please fill in all the fields.";
  } else {
    // Process the uploaded file
    $uploadDirectory = "uploads/"; // Directory to store the uploaded files
    $allowTypes = array('jpg','png','jpeg','gif'); 
    $uploadedFileName = $_FILES['categoryPicture']['name'];
    $uploadedFileTmp = $_FILES['categoryPicture']['tmp_name'];
    $uploadedFilePath = $uploadDirectory . $uploadedFileName;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($uploadedFileTmp, $uploadedFilePath)) {
      // File upload success, perform further actions
      // For example, save the form data to a database
       $admin_adding_query="insert into items(name,price,category_type , file_name) values ('$categoryName','$categoryPrice','$categoryTitle' , '$uploadedFileName')";
 

        $user_registration_result=mysqli_query($con,$admin_adding_query) or die(mysqli_error($con));
        header("Location: adminPanel.php");
        echo "User successfully registered";

      
      // Display a success message or redirect the user to a different page
      echo "Category added successfully.";
    } else {
      // File upload failed
      echo "Failed to upload the category picture.";
    }
  }
}
?>