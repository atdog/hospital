<?
$id = $_GET['id'];
$response;
if($id == "") {
    $response = file_get_contents ($_GET['url']."/dept"); 
}
else {
    $response = file_get_contents ($_GET['url']."/dept?id=".$id); 
}
echo $response;
?>
