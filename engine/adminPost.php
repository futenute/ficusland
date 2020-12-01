<?php
include "../config.php";


if($_GET['action']=='delete') {
	$id = $_GET['id'];
	$sql = "delete from goods where id=$id";
	if (mysqli_query($connect, $sql) == false) {
		echo("Error description: " . mysqli_error($connect));
		die;
	}
	header("Location: admin.php");
	return;
}

$pathSmall = '';
$smallSql = '';
if ($_FILES['small_img']['tmp_name']) {
	$pathSmall = "../public/img/small/".time().".jpg";
	move_uploaded_file($_FILES['small_img']['tmp_name'], $pathSmall);
	$smallSql = ", small_img='$pathSmall'";
}

$pathBig = '';
$bigSql = '';
if ($_FILES['big_img']['tmp_name']) {
	$pathBig = "../public/img/big/".time().".jpg";
	move_uploaded_file($_FILES['big_img']['tmp_name'], $pathBig);
	$bigSql = ", big_img='$pathBig'";
}

$name = $_POST['name'] ? strip_tags($_POST['name']) : "";
$price = $_POST['price'] ? strip_tags($_POST['price']) : "";
$shortDesc = $_POST['short_desc'] ? strip_tags($_POST['short_desc']) : "";
$longDesc = $_POST['long_desc'] ? strip_tags($_POST['long_desc']) : "";
$id = $_POST['id'] ? strip_tags($_POST['id']) : "";

if($id) {
	$sql = "update goods set name='$name', price='$price', short_desc='$shortDesc', long_desc='$longDesc' $smallSql $bigSql where id='$id'";
} else {
	$sql = "insert into goods (name, price, short_desc, long_desc, small_img, big_img) values ('$name', '$price', '$shortDesc', '$longDesc', '$pathSmall', '$pathBig')";
}

$res = mysqli_query($connect, $sql);

header("Location: admin.php");

