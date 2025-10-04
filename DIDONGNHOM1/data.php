<?php
//api php lấy tất cả thông tin trả về client
require_once("server.php");

$sql="SELECT `BookId`, `BookName`, `BookPrice`, `BookPage`, `BookDes` FROM `book` WHERE 1";
$rs=mysqli_query($conn,$sql);
$mang=array();
while($rows=mysqli_fetch_array($rs)){
	$usertemp['BookId']=$rows['BookId'];
	$usertemp['BookName']=$rows['BookName'];
	$usertemp['BookPrice']=$rows['BookPrice'];
	$usertemp['BookPage']=$rows['BookPage'];
	$usertemp['BookDes']=$rows['BookDes'];
	array_push($mang,$usertemp);
}
$jsondata['items']=$mang;
echo json_encode($jsondata);
mysqli_close($conn); 
?>