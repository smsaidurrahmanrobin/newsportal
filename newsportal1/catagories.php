<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="catagories";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
	 <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active">Categories</li>
    </ul>
  </div>
	<div class="text-right">
		<button class="btn"><a href="addcategory.php">Add Category</a></button>
	</div>
   <table class="table table-bordered">
   	<tr>
   		<th>Id</th>
   		<th>Category Name</th>
   		<th>Description</th>
   		<th>Edit</th>
   		<th>Delete</th>
   	</tr>
   	<?php
   	include('db/connection.php');
   	$conn =mysqli_connect("localhost","root", "","news");
   	$query=mysqli_query($conn,"SELECT * FROM category");
    while($row=mysqli_fetch_array($query)){
   	?>
   	<tr>
   		<td><?php echo $row['id'];?></td>
   		<td><?php echo $row['category_name'];?></td>
   		<td><?php echo $row['des'];?></td>
   		<td><a href="edit.php? edit=<?php echo $row['id'];?>"class="btn btn-info">Edit</a></td>
   		<td><a href="delete.php? delete=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a></td>
    </tr>
<?php } ?>
   </table>


</div>


