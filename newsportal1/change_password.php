<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="change_password";

include('include/header.php');


?>


<div style="margin-left: 25%; margin-top: 10%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="Admin_profile.php">Admin Profile</a></li>
      <li class="breadcrumb-item active">Change Password</li>
    </ul>
  </div>

<form action="change_password.php" name="changeform" onsubmit="return validateForm()" method="post">
  <div class="form-group">
    <label for="Category">Current Password</label>
    <input type="text" class="form-control" placeholder="Current Password"name="current" id="pass" value="">
  </div>
  <div class="form-group">
    <label for="Category">New Password</label>
    <input type="text" class="form-control" placeholder="New Password"name="new" id="pass" >
  </div>
    <div class="form-group">
    <label for="Category">Confirm Password</label>
    <input type="text" class="form-control" placeholder="Confirm Password"name="Confirm" id="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update Password</button>
  
  
</form>

</div>
<script>

   function validateForm() {
  var x = document.forms["changeform"]["current"].value;
  if (x == "") {
    alert("Current password must be filled out!");
    return false;
  }
    var y = document.forms["changeform"]["new"].value;
  if (y == "") {
    alert("New password must be filled out!");
    return false;
  }
    var z = document.forms["changeform"]["Confirm"].value;
  if (z == "") {
    alert("Confirm password must be filled out!");
    return false;
  }
  if(document.changeform.new.value!= document.changeform.Confirm.value)
{
alert("Password and Confirm Password Field didn't match!");
document.changeform.Confirm.focus();
return false;
}
}

</script>
<?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $email=$_SESSION['email'];
    $query=mysqli_query($conn,"SELECT * FROM admin_login where email='$email'");
    while($row=mysqli_fetch_array($query)){

      $datapass=$row['password'];

    }
    ?>

<?php

$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit'])){
   
   $email=$_SESSION['email'];
   $password=$_POST['current'];
   $newpass=$_POST['new'];
   $dbpassword=$datapass;
  $query1= mysqli_query($conn,"update admin_login set password='$newpass' where
email='$email'");

if($password==$dbpassword){

  if($query){
    echo "<script> alert('Successful!') </script>";
    echo "<script>window.location='http://localhost/newsportal/admin_profile.php'</script>";
  }
}else{
  echo "<script> alert('Unsuccessful!') </script>";
}
}

?>