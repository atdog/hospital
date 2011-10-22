<?
header("Content-type: text/javascript");
extract($_GET);
//echo "$url/register?doctor=$doctor&dept=$dept&id=$id&birthday=$birthday&time=$time&first=$first&name=$name&gender=$gender&nation=$nation&marriage=$marriage";
$response = file_get_contents ("$url/register?doctor=$doctor&dept=$dept&id=$id&birthday=$birthday&time=$time&first=$first&name=$name&gender=$gender&nation=$nation&marriage=$marriage"); 
if(isset($_GET['callback'])){
    echo $_GET['callback']."(".$response.")";
}
else {
    echo $response;
}
?>
