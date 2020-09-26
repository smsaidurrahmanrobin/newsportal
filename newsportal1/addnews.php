<?php
session_start();
if($_SESSION['email']==true){
}else
  header('location:login');
$page="news";
include('include/reporter_header.php');
?>
<div style="margin-left: 25%; margin-top:5%; width: 50%;">
  <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="reporter_home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="report_news.php">News</a></li>
      <li class="breadcrumb-item active">Add News</li>
    </ul>
  </div>
<h3>Add News</h3>
<hr>
<div class="frm-addnews">
	<form action="addnews.php" name="newsform" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" placeholder="Title"name="title" id="title">
  </div>
 <div class="form-group">
  <label for="comment">Description</label>
  <textarea class="form-control" rows="5" id="comment" name="des"></textarea>
</div>
    <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" placeholder="Date"name="date" id="date">
  </div>
    <div class="form-group">
    <label for="file">File</label>
    <input type="file" class="form-control img-thumbnail" placeholder="File"name="file" id="file">
  </div>
    <div class="form-group">
    <label for="category">Category</label>
      <select name="category" class="form-control">
         <?php
    include('db/connection.php');
    $admin=$_SESSION['name'];
    $conn =mysqli_connect("localhost","root", "","news");
    $query=mysqli_query($conn,"SELECT * FROM reporter where name='$admin'");
    while($row=mysqli_fetch_array($query)){
      $cat=$row['category'];
    }
    ?>
      <option><?php echo $cat;?></option>
	  </select>
  </div>
  <div class="form-group">
    <level for="admin">Reporter</level>
    <input type="text"class="form-control" disabled value="<?php echo $_SESSION['name'];?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Add News</button>
</form>
</div>
<script>
   function validateForm() {
  var x = document.forms["newsform"]["title"].value;
  var x = document.forms["newsform"]["des"].value;
  var x = document.forms["newsform"]["date"].value;

  if (x == "") {
    alert("All section must be filled out!");
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
     $title=$_POST["title"];
     $date=$_POST["date"];
     $file=$_FILES["file"]['name'];
     $admin=$_SESSION['name'];
	 if(file_exists("image/$file")){
      $uploadOk=0;
     }else{
move_uploaded_file($_FILES["file"]["tmp_name"],"image/$file" );}
$query1= mysqli_query($conn,"INSERT INTO news(title,description,date,category,thumbnail,admin) values('$title','$Description','$date','$category_name','$file','$admin') ");
if ($query1) {
    echo "<script> alert('Successfull!') </script>";
            } else {
     echo "<script> alert('Unsuccessfull!') </script>";
       }
     }