<?
header("Content-type: text/javascript");
$response = file_get_contents ("http://www.cs.nctu.edu.tw/~hcsu/hospital_db/cancel_register.php?rid=".$_GET['rid']); 
if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
