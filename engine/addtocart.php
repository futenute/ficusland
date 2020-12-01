<?php
session_start();
include "../config.php";
$sqlGood = "select * from goods where id={$_GET['id']}";
$resGood = mysqli_query($connect, $sqlGood);
if ($resGood === false) {
  echo mysqli_error($connect);
}
$dataGood = mysqli_fetch_assoc($resGood);

$sessionId = session_id();

$sqlRows = mysqli_query($connect, "select count(*) FROM cart WHERE session_id='$sessionId' and good_id={$_GET['id']}") or die();
$row = mysqli_fetch_row($sqlRows);
if ($row[0] > 0)
{
    $sqlAdd = "update cart set count = count + 1 where good_id={$_GET['id']}";
} else {
    $sqlAdd = "insert into cart (session_id, good_id, count) values('$sessionId', {$_GET['id']}, 1)";
}

$resAdd = mysqli_query($connect, $sqlAdd);
if ($resAdd === false) {
  echo mysqli_error($connect);
}

header("Location: catalog.php");
?>