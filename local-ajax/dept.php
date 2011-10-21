<?
header("Content-type: text/javascript");
$id = $_GET['id'];
$response;
if($id == "") {
    $response = file_get_contents ($_GET['url']."/dept"); 
}
else {
    $response = file_get_contents ($_GET['url']."/dept?id=".$id); 
}

if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
