<?
header("Content-type: text/javascript");
$response = file_get_contents ("http://www.cs.nctu.edu.tw/~hcsu/hospital_db/newUser.php?id=".$_GET['id']."&birthday=".$_GET['birthday']); 
if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
