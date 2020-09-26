<?php

$sabbir="shdgfawgiofgoiwghdfoiuhweihfio";

$conn =mysqli_connect("localhost","root", "","news");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->close();

?>
