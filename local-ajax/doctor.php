<?
header("Content-type: text/javascript");
$id = $_GET['id'];
$deptId = $_GET['deptId'];
$response = file_get_contents ($_GET['url']."/doctor?id=".$id."&deptId=".$deptId); 
if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
