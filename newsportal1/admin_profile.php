<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="admin_profile";

include('include/header.php');

?>
<?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $email=$_SESSION['email'];
    $query=mysqli_query($conn,"SELECT * FROM admin_login where email='$email'");
    while($row=mysqli_fetch_array($query)){

      $admin=$row['name'];

    }
    ?>

<div style="margin-left: 30%; margin-top: 10%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active">Admin Profile</li>
    </ul>
  </div>

<h3>Admin Profile</h3>
<hr>
	<form action="Admin_profile.php" name="profileform" method="post">
    <div class="form-group">
  <img src="image/admin.png"class="img img-thumbnail" height="100" width="100" >
  </div>
  <div class="form-group">
    <label for="Category">Admin Name:</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category" value="<?php echo $admin;?>">
  </div>
   <div class="form-group">
    <label for="Category">Admin Email:</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category" value="<?php echo $_SESSION['email'];?>"style=" ">
  </div>
  
  <a href="http://localhost/newsportal/change_password.php"> <button type="button" class="btn btn-primary" name="back">Change Password</button></a>
  
</form>



