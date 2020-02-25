<?php
$serverName='localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'ags_police';
$con= mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
mysqli_set_charset($con,"utf8");
