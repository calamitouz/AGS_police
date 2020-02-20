<!DOCTYPE html>
<html lang="en">
<head>
    <title>مشاهدة</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet"  href="css/util.css">
    <link rel="stylesheet"  href="css/main.css">
    <link rel="stylesheet"  href="css/display.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                    <tr class=" display_table table100-head">
                        <th class="column1">رقم الهوية</th>
                        <th class="column2">القطاع</th>
                        <th class="column3">الأسم</th>
                        <th class="column4">الايميل</th>
                        <th class="column5">تاريخ التعيين</th>
                        <th class="column6"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $con=mysqli_connect('localhost','root','','ags_police');
                    mysqli_set_charset($con,"utf8");
                    if($con-> connect_error){
                        die("connection failed:".$con->connect_error);
                    }
                    $sql= "select * from users";
                    $result = $con->query($sql);
                    if($result-> num_rows>0){
                        while($row = $result-> fetch_assoc()){
                            ?>
                            <div hidden><?php echo $row['game_id'];?></div>
                                <td class="column1"><?php echo $row['game_id'];?></td>
                                <td class="column3"><?php echo $row['name'];?></td>
                            <td class=""><?php echo $row['rank'];?></td>
                            <td class="column2"><?php echo $row['sector'];?></td>
                                <td class="column4"><?php echo $row['code'];?></td>
                                <td class="column5"><?php echo $row['hire_date'];?></td>
                                <td class="column6"> <table><tr>
                                            <td><button type="button" class="btn btn-primary btn-success" id="promoteSub" >ترقية</button></td>
                                            <td><button type="button" class="btn btn-primary transferSub" id="transferSub">نقل الى قطاع اخر</button></td>
                                            <td><button type="button" class="btn btn-warning editInfoSub" id="editInfoSub">تعديل بيانات</button></td>
                                            <td><button type="button" class="btn btn-danger deletesSub" id="deletesSub">فصل</button></td>
                                    </tr> </table> </td></tr>
                            <?php
                        }
                        echo "</table>";
                    }else{
                        echo "no data";
                    }
                    $con->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>

<!--===============================================================================================-->
<script src="../../Downloads/Table_Responsive_v1/Table_Responsive_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../../Downloads/Table_Responsive_v1/Table_Responsive_v1/vendor/bootstrap/js/popper.js"></script>
<script src="../../Downloads/Table_Responsive_v1/Table_Responsive_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../../Downloads/Table_Responsive_v1/Table_Responsive_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../../Downloads/Table_Responsive_v1/Table_Responsive_v1/js/main.js"></script>
</body>
</html>