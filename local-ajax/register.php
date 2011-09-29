<?
$hospitalId = $_GET['hospitalId'];
$doctorId = $_GET['doctorId'];
$deptId = $_GET['deptId'];
$hospital = $_GET['hospital'];
$dept = $_GET['dept'];
$doctor = $_GET['doctor'];
$id = $_GET['id'];
$birthday = $_GET['birthday'];
$time = $_GET['time'];
$first = $_GET['first'];
$response = file_get_contents ("http://www.cs.nctu.edu.tw/~hcsu/hospital_db/register.php?hospitalId=$hospitalId&doctorId=$doctorId&deptId=$deptId&hospital=$hospital&dept=$dept&doctor=$doctor&id=$id&birthday=$birthday&time=$time&first=$first"); 
echo $response;
?>
