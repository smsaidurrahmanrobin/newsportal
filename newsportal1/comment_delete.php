<?php
include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['delete'];
$query=mysqli_query($conn,"delete from comment where id='$id'");

if($query){
	 echo "<script> alert('Comment Deleted!') </script>";
	echo "<script>window.location='http://localhost/newsportal/comment.php'</script>";
}else{
	echo "Please Try Again!";
}
?>
