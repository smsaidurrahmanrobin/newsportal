<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="Reporter";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="reporter.php">Reporter</a></li>
      <li class="breadcrumb-item active">Add Reporter</li>
    </ul>
  </div>

<h3>Add Reporter</h3>
<hr>
	<form action="addreporter.php" name="reporterform" onsubmit="return validateForm()" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Name"name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" required>
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    
      <select name="category" class="form-control">
         <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $query=mysqli_query($conn,"SELECT * FROM category");
    while($row=mysqli_fetch_array($query)){
    ?>
    

      <option><?php echo $row['category_name'];?></option>

<?php } ?>
      </select>
  </div>
   <div class="form-group">
    <label for="Category">Password</label>
    <input type="text" class="form-control" placeholder="New Password"name="new" id="pass" >
  </div>
    <div class="form-group">
    <label for="Category">Confirm Password</label>
    <input type="text" class="form-control" placeholder="Confirm Password"name="Confirm" id="pass">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Add Reporter</button>

  
</form>
<script>

   function validateForm() {
  var x = document.forms["reporterform"]["name"].value;
  if (x == "") {
    alert("Name must be filled out!");
    return false;
  }
    var y = document.forms["reporterform"]["email"].value;
  if (y == "") {
    alert("Email must be filled out!");
    return false;
  }
    var z = document.forms["reporterform"]["new"].value;
  if (z == "") {
    alert("New password must be filled out!");
    return false;
  }
    var w = document.forms["reporterform"]["Confirm"].value;
  if (w == "") {
    alert("Confirm password must be filled out!");
    return false;
  }
  if(document.changeform.new.value!= document.changeform.Confirm.value)
{
alert("Password and Confirm Password Field do not match!");
document.changeform.Confirm.focus();
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
     $name=$_POST["name"];
     $email=$_POST["email"];
     $category=$_POST["category"];
     $password=$_POST["new"];

     
$query= mysqli_query($conn,"INSERT INTO reporter(name,email,category,password) values('$name','$email','$category','$password') ");

if ($query) {
    echo "<script> alert('Successful!') </script>";
            } else {
     echo "<script> alert('Unsuccessful!') </script>";
       }
     }     

