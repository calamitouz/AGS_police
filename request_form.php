
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بلاغ جديد</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/request_form.css" rel="stylesheet">
    <?php
    if(isset($_POST['req_sub'])){
        $db=mysqli_connect('localhost','root','','ags_police');

        $req_type =mysqli_real_escape_string($db,$_POST['req_type']);
        $plate =mysqli_real_escape_string($db,$_POST['plate']);
        $car_type =mysqli_real_escape_string($db,$_POST['car_type']);
        $car_color =mysqli_real_escape_string($db,$_POST['car_color']);
        $person_desc =mysqli_real_escape_string($db,$_POST['req_desc']);
        $code_no =mysqli_real_escape_string($db,$_POST['code_no']);
        $req_st =mysqli_real_escape_string($db,$_POST['req_st']);


        $sql = "insert  into request_police (req_type,plate,car_type,car_color,person_desc,code_no,req_st) values($req_type,$plate,$car_type,$car_color,$person_desc,$code_no,$req_st);";
        mysqli_query($db,$sql);
    }
    ?>
</head>
<body>
<div class="request_form">
<form class="" post id="request" action="request_form.php">
    <h2>تسجيل بلاغ جديد</h2>
    <input class="form-control" type="text" name="req_type" id="req_type" placeholder="نوع البلاغ"><br>
    <input class="form-control" type="text" name="plate" id="plate" placeholder="رقم اللوحة"><br>
    <input class="form-control" type="text" name="car_type" id="car_type" placeholder="نوع السيارة"><br>
    <input class="form-control" type="text" name="car_color" id="car_color" placeholder="لون السيارة"><br>
    <input class="form-control" type="text_" name="person_desc" id="person_desc" placeholder="وصف الشخص"><br>
    <input class="form-control" type="text" name="req_desc" id="req_desc" placeholder="تفاصيل البلاغ"><br>
    <input class="form-control" type="text" name="code_no" id="code_no" placeholder="كود النداء"><br>
    <select  name="req_st" id="req_st" form-control">
        <option selected>عاجل جدا</option>
        <option>عاجل</option>
        <option>عادى</option>
    </select>
    <button id="req_sub" name="req_sub" type="button" class="btn btn-primary">ارسال البلاغ</button>

</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>