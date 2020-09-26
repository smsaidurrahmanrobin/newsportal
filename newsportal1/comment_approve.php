<?php
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['approve'];

$query=mysqli_query($conn,"select * from comment where id='$id'");
while($row=mysqli_fetch_array($query)){

	 $name=$row['name'];
     $email=$row['email'];
     $comment=$row['comment'];
     $postid=$row['postid'];

}
$query1= mysqli_query($conn,"INSERT INTO approved(post,name,email,comment) values('$postid','$name','$email','$comment') ");
if($query1){
	echo "<script> alert('Comment Approved!') </script>";
	echo "<script>window.location='http://localhost/newsportal/comment.php'</script>";
}
?>