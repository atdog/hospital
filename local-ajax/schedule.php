<?
$response = file_get_contents ("http://www.cs.nctu.edu.tw/~hcsu/hospital_db/schedule.php?idJson=".$_GET['idJson']); 
echo $response;
?>
