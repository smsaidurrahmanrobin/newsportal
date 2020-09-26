<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
  header('location:login');

$page="catagories";

include('include/header.php');

?>

<?php

$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['edit'];

$query=mysqli_query($conn,"SELECT * FROM category WHERE id='$id' ");

while($row=mysqli_fetch_array($query)){

  $category=$row['category_name'];
  $des=$row['des'];
}
?>



<div style="margin-left: 25%; margin-top: 10%; width: 50%;">

<h3>Update Category</h3>
<hr>
  <form action="edit.php" name="categoryform" onsubmit="return validateForm()" method="post">
  <div class="form-group">
    <label for="Category">Category</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="category" value="<?php echo $category;?>">
  </div>
  <div class="form-group">
  <label for="comment">Description</label>
  <textarea class="form-control" rows="5" id="comment" name="des"><?php echo $des;?></textarea>
</div>
<input type="hidden" name="id" value="<?php echo $_GET['edit']?>">
  <button type="submit" class="btn btn-primary" name="Submit">Update Category</button>
  
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
$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit'])){

 $Category=$_POST['category'];
 $Description=$_POST['des'];
 $Id=$_POST['id'];

 $query1= mysqli_query($conn,"update category set category_name='$Category' , des='$Description' where
  id='$Id'");

 if($query1){
  echo "<script> alert('Successful!') </script>";
  echo "<script>window.location='http://localhost/newsportal/catagories.php'</script>";
 }else{
   echo "<script> alert('Unsuccessful!') </script>";
}


}
?>
