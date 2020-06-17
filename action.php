<?php
session_start();
include 'config.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $photo=$_FILES['image']["name"];
    $upload="uploads/".$photo;

    $query="Insert into crud(name,email,phone,photo)values(?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("ssss",$name,$email,$phone,$upload);
    $stmt->execute();
    move_uploaded_file($_FILES["image"]["tmp_name"], $upload);

    header("location:index.php");
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";
}
?>