<?
$response = file_get_contents ("http://www.cs.nctu.edu.tw/~hcsu/hospital_db/cancel_register.php?rid=".$_GET['rid']); 
echo $response;
?>