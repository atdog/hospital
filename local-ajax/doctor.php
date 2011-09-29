<?
$id = $_GET['id'];
$deptId = $_GET['deptId'];
$response = file_get_contents ($_GET['url']."/doctor?id=".$id."&deptId=".$deptId); 
echo $response;
?>
