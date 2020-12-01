<?php
session_start();
include "../config.php";
include "../templates/blocks/header.php";

$sql = "select * from goods";
$res = mysqli_query($connect, $sql);

include "../templates/admin.tpl.php";

