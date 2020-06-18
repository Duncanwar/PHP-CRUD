<?php
session_start();
include 'config.php';

        $id="";
        $name="";
        $email="";
        $phone="";
        $photo="";
        $update= false;

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
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $sql="select photo from crud";
        $stmt2= $conn->prepare($sql);
        $stmt2->bind_param("i".$id);
        $stmt2->execute();
        $result2= $stmt2->get_result();
        $row= $result2->fetch_assoc();

        $imagepath=$row['photo'];
        unlink($imagepath);

        $query = "delete from crud where id=?";
        $stmt= $conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        header("location:index.php");
        $_SESSION['response']="Successfully deleted in the database!";
        $_SESSION['res_type']="danger";
    }

    if(isset($_GET['edit'])){
        $id=$_GET['edit'];

        $query="Select * from crud where id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $phone=$row['phone'];
        $photo=$row['photo'];

        $update=true;
    }
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $photo=$_POST['photo'];
        $oldimage=$_POST['oldimage'];

        if(isset($_FILES['image']['name'])&&($_FILES["image"]["name"]!="")){
            $newimage=$_FILES['image']['name'];
            unlink($oldimage);
            move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
        }
        else{
            $newimage=$oldimage;
        }
        $query= "update crud set name=?,email=?,phone=?,photo=? where id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("ssssi",$name,$email,$phone,$newimage,$id);
        $stmt->execute();
        $stmt->execute();

        $_SESSION['response']="Update Successfully";
        $_SESSION['res_type']="primary";
        header('location:index.php');
    }
    if(isset($_GET['details'])){
        $id=$_GET['details'];
        $query="select * from crud where id=?";
        $stmt= $conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $vid=$row['id'];
        $vname=$row['name'];
        $vemail=$row['email'];
        $vphone=$row['phone'];
        $vphoto=$row['photo'];
    }

?>