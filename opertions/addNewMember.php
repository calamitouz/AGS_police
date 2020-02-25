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
    $sector=mysqli_escape_string($con,$_POST['sector']);
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
            if ($sector == "الشرطة"){
                $sector = 1;
                $rankID = 1;
            }else if ($sector == "القوات الخاصة"){
                $sector = 2;
                $rankID = 18;
            }else if ($sector == "أمن الطرق"){
                $sector = 3;
                $rankID = 1;
            }
            if($checkIfUserExisting->num_rows ==0){
            $checkIfThereEmptyField = $con->query("SELECT * FROM users where sector_id='$sector' AND game_id ='0'");
            if(!$checkIfThereEmptyField){
                header("Location:../addNewMember.php?error=sql2error&uid&name=".$name."&mail=".$email."&sector=".$sector);
                exit();
            }elseif($checkIfThereEmptyField->num_rows>0){
                $getResult = $checkIfThereEmptyField->fetch_assoc();
                $getResultRow = $getResult['reg_id'];
                $addNEWMember = $con->query("UPDATE  users SET game_id ='$gameID', name ='$name', rank_id='$rankID', email='$email',password='$hashedPwd',hire_date='$date',time = '$time' WHERE reg_id ='$getResultRow'");
                if (!$addNEWMember){
                    header("Location:../addNewMember.php?error=sql3error&uid&name=".$name."&mail=".$email."&sector=".$sector);
                    exit();
                }else{
                    header("Location:../addNewMember.php?register=success");
                    exit();
                }
            }else{
                $getNewCode = $con->query("SELECT  * FROM  users WHERE sector_id = '$sector' ORDER BY reg_id DESC LIMIT 1 ");
                $newCode= $getNewCode->fetch_assoc();
                $newCode= $newCode['code']+1;
                //$rankID = '';
                //$sectorID = '';
                $addNEWMember = $con->query("INSERT INTO users (game_id, name, code, sector_id,rank_id,email,password,hire_date,time) VALUES ('$gameID','$name','$newCode','$sector','$rankID','$email','$hashedPwd','$date','$time')");
                if (!$addNEWMember){
                    echo $addNEWMember;
                    header("Location:../addNewMember.php?error=sql4error&uid&name=".$name."&mail=".$email."&sector=".$sector);
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

