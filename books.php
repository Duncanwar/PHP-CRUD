<?php
include 'config.php';
if(isset($_POST['addcat'])){
    $cat_id=$_POST['cat_id'];
    $cat_name=$_POST['cat_name'];

    $query="insert into bookCategory values(?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ss",$cat_id,$cat_name);
    $stmt->execute();
}
if(isset($_POST['add_book'])){
    $id=$_POST['id'];
    $name=$_POST['book_name'];
    $title=$_POST['book_title'];
    $house=$_POST['pubHouse'];
}
?>