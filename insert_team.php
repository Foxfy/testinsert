<?php
    include_once('connect.php');

    if(empty($_POST)){
        header('location:team_create.php');
    }

    $team_name = $_POST['team_name'];
    $province = $_POST['province'];
    $logo_team = $_FILES['logo_team']['name'];

    if($logo_team != null){
        copy($_FILES['logo_team']['tmp_name'] , './images/logo_teams/'.$_FILES['logo_team']['name']);
    }
    try{
        $sql = "INSERT INTO teams VALUES(NULL,'$team_name','$province','$logo_team')";
        $inserted = $conn->query($sql);

        $_SESSION['alert']['css'] = "alert-success"; 
        $_SESSION['alert']['msg'] = "Create teams success";
        header('location:index.php');
    }catch(Excaption $e){
        $_SESSION['alert']['css'] = "alert-danger"; 
        $_SESSION['alert']['msg'] = "Create teams fail";
        header('location:team_create.php');
    }
?>