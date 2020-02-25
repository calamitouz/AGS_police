<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تسجيل جديد</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/request_form.css" rel="stylesheet">
</head>
<body>
<?php
$sector="اختر قطاع";
$uid = "";
$name = "";
$mail = "";
if(isset($_GET['sector'])){
    $sector=$_GET['sector'];
}
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
}
if(isset($_GET['name'])){
    $name=$_GET['name'];
}
if(isset($_GET['mail'])){
    $mail=$_GET['mail'];
}

?>
<div class="request_form">
<form action="opertions/addNewMember.php" method="POST">
    <h2>تسجيل فرد جديد</h2>
    <?php
    if (isset($_GET['sector'])||isset($_GET['uid'])||isset($_GET['name'])||isset($_GET['mail'])) {

        ?>
        <br>
        <h5 style="color: red;margin-left: 450px; margin-bottom: 30px; font-family:'bold'; font-size: 17px;">*تاكد من المعلومات المدخلة</h5>
        <?php
    }else if(isset($_GET['register'])) {
        ?>
        <br>
        <h5 style="color:green;margin-left: 25px; margin-bottom: 30px; font-family:'bold'; font-size: 20px;">تم التسجيل بنجاح</h5>
        <?php
    }
    ?>
    <select  on class="form-control" name="sector" id="sector" >
        <option selected><?php echo $sector;?></option>
    <option>الشرطة</option>
    <option>القوات الخاصة</option>
    <option>أمن الطرق</option><br>
    </select>
    <input class="form-control" type="text" name="id_game" id="id_game" value="<?php echo $uid;?>" placeholder="رقم الهوية"><br>
    <input class="form-control" type="text" name="name" id="name" value="<?php echo $name;?>" placeholder="الاُسم"><br>
    <input class="form-control" type="text" name="email" id="email" value="hed@hotmail.com" placeholder="الايميل"><br>
    <button id="signUp-submit" name="signUp-submit" type="submit" class="btn btn-primary">تسجيل</button>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>