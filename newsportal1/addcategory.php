<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="catagories";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 10%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="catagories.php">Categories</a></li>
      <li class="breadcrumb-item active">Add Categories</li>
    </ul>
  </div>

<h3>Add Category</h3>
<hr>
	<form action="addcategory.php" name="categoryform" onsubmit="return validateForm()" method="post">
  <div class="form-group">
    <label for="Category">Category</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category">
  </div>
  <div class="form-group">
  <label for="comment">Description</label>
  <textarea class="form-control" rows="5" id="comment" name="des"></textarea>
</div>
  <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
  <a href="http://localhost/newsportal/catagories.php"> <button type="button" class="btn btn-primary" name="back">Back</button></a>
  
</form>
<script>

   function validateForm() {
  var x = document.forms["categoryform"]["category"].value;
  if (x == "") {
    alert("Category must be filled out!");
    return false;
  }
}

</script>


</div>
<?php

include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit']))
 {
     $category_name=$_POST["category"];
     $Description=$_POST["des"];


$check=mysqli_query($conn,"select * from category where category_name='$category_name'");
      if (mysqli_num_rows($check)>0) {
        echo "<script> alert('Category name already taken!') </script>";
      }else{



$query= mysqli_query($conn,"INSERT INTO category(category_name,des) values('$category_name','$Description') ");

if ($query) {
    echo "<script> alert('Successful!') </script>";
            } else {
     echo "<script> alert('Unsuccessful!') </script>";
       }
     }     
}
