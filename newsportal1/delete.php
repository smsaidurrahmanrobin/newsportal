<?php
include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['delete'];
$query=mysqli_query($conn,"delete from category where id='$id'");

if($query){
	 echo "<script> alert('Category Deleted!') </script>";
	echo "<script>window.location='http://localhost/newsportal/catagories.php'</script>";
}else{
	echo "Please Try Again!";
}
?>
