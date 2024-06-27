<?php
    include_once('connect.php');

    if(empty($_POST)){
        header('location:create.php');
    }

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $max_teams = $_POST['max_teams'];
    $banner = $_FILES['banner']['name'];

    if($banner != null){
        copy($_FILES['banner']['tmp_name'] , './images/'.$_FILES['banner']['name']);
    }

    $sql = "SELECT * FROM competitions c WHERE c.slug = '$slug'";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['alert']['msg'] = "This slug is already in use";
        $_SESSION['alert']['css'] = "alert-danger";
        header('location:create.php');
    }

    $sql = "INSERT INTO competitions 
        VALUES(NULL,'$name','$slug','$max_teams','$banner')";
    $inserted = $conn->query($sql);
    $insert_id = mysqli_insert_id($conn);

    foreach($_POST['allowed_Provinces'] as $province_id){
        $sql = "INSERT INTO allowed_provinces VALUES(NULL,'$insert_id','$province_id')";
        $inserted = $conn->query($sql);
    }

    $_SESSION['alert']['msg'] = "Competition Create Success";
    $_SESSION['alert']['css'] = "alert-success";
    header('location:detail.php?competition_slug='.$slug);
?>