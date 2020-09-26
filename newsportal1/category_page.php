<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>News Channel</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="style/blog.css" rel="stylesheet">
    
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </head>

  <body>

    <div class="container" style="">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="#"><div id="google_translate_element"></div></a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">OnlineNews24</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            
            <a class="btn btn-sm btn-outline-secondary" id="button1" href="#">Register</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=World#">World</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Technology#">Technology</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Design#">Design</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Culture#">Culture</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Business#">Business</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Politics#">Politics</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Science#">Science</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Health#">Health</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Style#">Style</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Travel#">Travel</a>
          <a class="p-2 text-muted" href="http://localhost/newsportal/category_page.php?%20category=Sports#">Sports</a>
        </nav>
      </div>

     <div class="card" style="width:100%; height: 400px;">
  <img class="card-img-top" src="image/news1.jpg" alt="Card image" style="height: 400px;">
  <div class="card-img-overlay">
    
  </div>
</div>

      <div class="row mb-2">
<?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $query=mysqli_query($conn,"SELECT * FROM published  order by id desc limit 0,2");
    while($row=mysqli_fetch_array($query)){
    ?>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?php echo $row['category'];?></strong>
              <h3 class="mb-0">
                <a class="text-dark" href="single_page.php? page=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
              </h3>
              <div class="mb-1 text-muted"><?php echo $row['date'];?></div>
              <p class="card-text mb-auto"><?php echo substr( $row['description'],0,50);?></p>
              <a href="single_page.php? page=<?php echo $row['id'];?>">Continue Reading</a>
            </div>
            <img  class="card-img-right flex-auto d-none d-md-block" src="image/<?php echo $row['thumbnail'];?>"alt="Card image cap" width="160">
          </div>
         
        </div>
<?php }?>
      </div>
    
    </div>
      <div class="popup" id="popup" style="background: rgba(0,0,0,0.6);width: 100%;height: 100%;position: absolute;top:0;justify-content: center;align-items: center;display:none;">
      <form method="post" action="category_page.php">
      <div class="popup-content" style="  height: 350px;width: 500px;background: white;padding: 20px;border-radius: 5px;position: relative; margin-top: 50px;margin-top: 150px;margin-left: 500px;">
        <img src="image/dlt.jpg"class="close" style="margin-left: 45%;position: absolute;top: -15px;right: -15px;background: #fff;height: 20px;width: 20px;border-radius: 50%;cursor: pointer;
        ">
<img src="image/user1.png" height="60" width="60" style="margin-left: 45%;">
<h3 style="margin-left: 40%;margin-top:10px; ">Register</h3>
  <input type="text" name="name" placeholder="Username" style="display: block;width: 50%;padding: 8px; border:1px solid gray;margin: 20px auto;"required>
  <input type="email" name="email" placeholder="Email" class="form-control" style="display: block;width: 50%;padding: 8px; border:1px solid gray;margin: 20px auto;"required>
  <input type="submit" name="submit" value="Submit"style="margin-left: 42%;background: #fff;padding: 10px 15px;color: #34495e;font-weight: bolder;text-transform: uppercase;font-size: 18px;border-radius: 5px;">
       
      </div>
      </form>
    </div>
     <?php 
$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST["email"];
  $password=$_POST["password"];

  $query=mysqli_query($conn,"insert into user(name,email,password)values('$name','$email','$password')");
  if($query){
   $_SESSION['email']=$email;
   echo "<script> alert('Successfull!')</script>";
  }
}
?>
      <script>

        document.getElementById("button1").addEventListener("click",function(){
  document.querySelector(".popup").style.display="block";
});

                document.querySelector(".close").addEventListener("click",function(){
          document.querySelector(".popup").style.display="none";
        });


      </script>
 </div>
    
      

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the OnlineNews24
          </h3>
    <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $cat=$_GET['category'];
    $query=mysqli_query($conn,"SELECT * FROM published where category='$cat'");
    while($row=mysqli_fetch_array($query)){
    ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo $row['date'];?><a href="#"><?php echo $row['admin'];?></a></p>

            <p><img src="image/<?php echo $row['thumbnail'];?>" class="img img-thumbnail"></p>
            <hr>
            <p><?php echo substr( $row['description'],0,100);?></p>
            <a href="single_page.php? page=<?php echo $row['id'];?>" class="btn btn-primary">Read More</a>


          </div><!-- /.blog-post -->

<?php } ?>

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">OnlineNews24 is the most popular online news portal of Bangladesh. It is also popular all over the world. All the latest news are published here 24x7</p>
          </div>
   
          <div class="p-3">

            <h4 class="font-italic">Categories</h4>
                               <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $query=mysqli_query($conn,"SELECT * FROM category");
    while($row=mysqli_fetch_array($query)){
    ?>
            <ol class="list-unstyled mb-0">
              <li><a href="category_page.php? category=<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></a></li>
            </ol>
          <?php }?>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="www.github.com">GitHub</a></li>
              <li><a href="www.twitter.com">Twitter</a></li>
              <li><a href="www.facebook.com">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
      <p>© OnlineNews24 2020</p>
      <p>
        <a href="#">Back To Top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
