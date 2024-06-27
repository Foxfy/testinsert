<?php
    include_once('connect.php');

    if(empty($_POST)){
        header('location:jointeam.php');
    }

    $slug = $_POST['competition_slug'];
    $team_id = $_POST['team_id'];
    
    var_dump($slug);
    exit();
        // get competition_id
        $get_competition_id = "SELECT id , max_teams FROM competitions WHERE slug = '$slug';";
        $reslug_competition = $conn->query($get_competition_id)->fetch_assoc();
        $competition_id = $reslug_competition['id'];

        // check team is not allowed
        $checkTeamAllowed = "SELECT * 
        FROM teams t 
        LEFT JOIN allowed_provinces ap ON t.province_id = ap.provinces_id 
        LEFT JOIN join_teams jt ON jt.competitions_id = ap.competitions_id 
        WHERE t.id = '$team_id'";
        $checkTeam = $conn->query($checkTeamAllowed)->fetch_assoc();
        if($checkTeam['id'] == null){
            $_SESSION['alert']['msg'] = "team is not allowed";
            $_SESSION['alert']['css'] = "alert-danger text-center";
            header('location:jointeam.php?competition_slug='.$slug);
        }

        // check team aleady join
        $checkAleadyJoin = "SELECT * 
        FROM join_teams 
        WHERE competitions_id = '$competition_id' AND id = '$team_id'";
        $checkJoin = $conn->query($checkAleadyJoin)->fetch_assoc();
        if($checkJoin){
            $_SESSION['alert']['msg'] = "team aleady join";
            $_SESSION['alert']['css'] = "alert-danger text-center";
            header('location:jointeam.php?competition_slug='.$slug);
        }

        // check aleady full
        $checkAleadyFull = "SELECT count(competitions_id) AS max_teams 
        FROM join_teams 
        WHERE competitions_id = '$competition_id'";
        $checkAleadyFull = $conn->query($checkAleadyFull)->fetch_assoc();
        $max_team = $reslug_competition['max_teams'];
        // var_dump($max_team);
        // exit();
        if($checkAleadyFull['max_teams'] >= $max_team){
            $_SESSION['alert']['msg'] = "team aleady full";
            $_SESSION['alert']['css'] = "alert-danger text-center";
            header('location:jointeam.php?competition_slug='.$slug);
        }

        // register competition
        $sql = "INSERT INTO join_teams VALUES(NULL,'$competition_id','$team_id')";
        $inserted = $conn->query($sql);

        if($inserted){
            $_SESSION['alert']['msg'] = "Join team successfully";
            $_SESSION['alert']['css'] = "alert-success text-center";
            header('location:detail.php?competition_slug='.$slug);
        }else{
            header('location:detail.php?competition_slug='.$slug);
        }

    // try{
    // }catch(Exception $e){
    //     $_SESSION['alert']['msg'] = "Join team failled";
    //     $_SESSION['alert']['css'] = "alert-danger text-center";
    //     header('location:jointeam.php?competition_slug='.$slug);
    // }
?>