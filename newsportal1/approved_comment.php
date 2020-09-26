<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="approved";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
	 <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active">Approval Comment</li>

    </ul>
  </div>
	<div class="text-right">
	</div>
   <table class="table table-bordered">
   	<tr>
   		<th>Id</th>
   		<th>User Name</th>
   		<th>User Email</th>
      <th>User Comment</th>
   		<th>Delete</th>
   	</tr>
   	<?php

   	$conn =mysqli_connect("localhost","root", "","news");
   	$query=mysqli_query($conn,"SELECT * FROM approved");
    while($row=mysqli_fetch_array($query)){
   	?>
   	<tr>
     <td><?php echo $row['id'];?></td>
     <td><?php echo $row['name'];?></td>
     <td><?php echo $row['email'];?></td>
     <td><?php echo $row['comment'];?></td>
     <td><a href="approved_comment_delete.php? delete=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a></td>
    </tr>
<?php } ?>
   </table>


</div>


