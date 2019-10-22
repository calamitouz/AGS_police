<?php



        $db=mysqli_connect('localhost','root','root','ags_police');
mysqli_set_charset($con,"utf8");
        $req_type = $_POST['req_type'];
        $plate = $_POST['plate'];
        $car_type= $_POST['car_type'];
        $car_color = $_POST['car_color'];
        $person_desc = $_POST['req_desc'];
         $req_desc = $_POST['req_desc'];
        $code_no = $_POST['code_no'];


        $sql = "INSERT  INTO request_police (req_type,plate,car_type,car_color,person_desc,req_desc,code_no) VALUES ('$req_type','$plate','$car_type','$car_color','$person_desc','$req_desc','$code_no');";
        mysqli_query($db, $sql);

