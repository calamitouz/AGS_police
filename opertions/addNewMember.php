<?php
if(isset($_POST['signUp-submit'])) {
    require "../includes/db.php";
    $date = date("y.m.d");
    date_default_timezone_set("Asia/Riyadh");
    $time = date("h:i");
    $gameID = mysqli_escape_string($con,$_POST['id_game']);
    $name =mysqli_escape_string($con, $_POST['name']);
    $email = mysqli_escape_string($con,$_POST['email']);
    $hashedPwd = password_hash($email,PASSWORD_DEFAULT);
    $sector = 1;
    //$sector = mysqli_escape_string($con,$_POST['sector']);
    if(empty($gameID) ||empty($name) || empty($email) || empty($sector)){
        header("Location:../addNewMember.php?error=emptyfield&uid=".$gameID."&name=".$name."&mail=".$email."&sector=".$sector);
        exit();
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location:../addNewMember.php?error=invaildmail&uid=".$gameID."&name=".$name."&sector=.$sector");
        exit();
    }elseif (!preg_match("/^[0-9]*$/",$gameID)){
        header("Location:../addNewMember.php?error=invaildgameid&uid&name=".$name."&mail=".$email."&sector=".$sector);
        exit();
    }else{
        $checkIfUserExisting = $con ->query("SELECT * FROM users where game_id = '$gameID'");
        if (!$checkIfUserExisting){
            header("Location:../addNewMember.php?error=sql1error&uid&name=".$name."&mail=".$email."&sector=".$sector);
            exit();
        }else{
            if($checkIfUserExisting->num_rows ==0){
            $checkIfThereEmptyField = $con->query("SELECT * FROM users where sector_id='$sector' AND game_id ='0'");
            if(!$checkIfThereEmptyField){
                header("Location:../addNewMember.php?error=sql2error&uid&name=".$name."&mail=".$email."&sector=".$sector);
                exit();
            }else{
                $getResult = $checkIfThereEmptyField->fetch_assoc();
                $getResultRow = $getResult['reg_id'];
                $addNEWMember = $con->query("UPDATE  users SET game_id ='$gameID', name ='$name', email='$email',password='$hashedPwd',hire_date='$date',time = '$time' WHERE reg_id ='$getResultRow'");
                if (!$addNEWMember){
                    header("Location:../addNewMember.php?error=sql3error&uid&name=".$name."&mail=".$email."&sector=".$sector);
                    exit();
                }else{
                    header("Location:../addNewMember.php?register=success");
                    exit();
                }
            }
            }else{
                header("Location:../addNewMember.php?error=founduser&uid&name=".$name."&mail=".$email."&sector=".$sector);
                exit();
            }
        }
    }
    mysqli_close($con);
}else{
    header("Location: ../addNewMember.php");
    exit();
}

