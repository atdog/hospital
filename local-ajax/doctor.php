<?
$id = $_GET['id'];
$response = file_get_contents ($_GET['url']."/doctor?id=".$id); 
echo $response;
?>
