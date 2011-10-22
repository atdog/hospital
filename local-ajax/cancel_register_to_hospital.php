<?
header("Content-type: text/javascript");
extract($_GET);
//echo "$url/cancel_register?doctor=$doctor&dept=$dept&id=$id&birthday=$birthday&time=$time&nation=$nation";
$response = file_get_contents ("$url/cancel_register?doctor=$doctor&dept=$dept&id=$id&birthday=$birthday&time=$time&nation=$nation"); 
if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
