<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='css/index.css' />
<script type='text/javascript' src='js/jquery-1.5.2.min.js'></script>
<script type='text/javascript' src='js/jquery.jsoncookie.js'></script>
<script type='text/javascript' src='js/json2.js'></script>
<script type='text/javascript' src='js/jquery.template.js'></script>
<script type='text/javascript' src='js/fullcalendar.js'></script>
<script type='text/javascript' src='js/index_ui.js'></script>
<script>
	function backIndex() {
		window.location = "index.htm";
	}
	$(document).ready(function() {
		//$('#List').html("<div class='white'><div class='loading'>讀取中...</div></div>");
		setHospital();
	});
	function setHospital() {
		$('#List').html("<div class='white'><div class='loading'>讀取中...</div></div>");
		$.ajax({
			type : "GET",
			url : "local-ajax/hospital.php",
			dataType : "json",
			success : function(response) {
				$('#List').html("<div id='photoTitle' class='title'>醫院</div>");
				for ( var i = 0; i < response.length; ++i) {
					var name = response[i]['name'];
					var url = response[i]['url'];
					$('#List').append(
							'<div class="item" onClick="chooseHospital(\''
									+ name + '\',\'' + url + '\')">' + name
									+ '</div>');
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
	}
	function chooseHospital(name, url) {
		$('#List').html("<div class='white'><div class='loading'>讀取中...</div></div>");
		$.ajax({
			type : "GET",
			url : "local-ajax/dept.php",
            data: {
                "url": url
            },
			dataType : "json",
			success : function(response) {
				$('#List').html("");
				$('#List').html("<div id='photoTitle' class='title'>科別</div>");
				for ( var i = 0; i < response.length; ++i) {
                    var id;
                    for(var key in response[i]) {
                        id = key;
                    }
					var deptName = response[i][id];
					$('#List').append(
							'<div class="item" onClick="chooseDept(\''
									+ deptName + '\',\'' + url + '\',\''
									+ id + '\')">' + deptName
									+ '</div>');
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
		$('#inputHospital').val(name);
		$('#inputDept').val('');
		$('#inputDoctor').val('');
		$('#inputTime').val('');
		$('#inputHospital').bind('click', setHospital);
		$('#hospitalId').val('1');
	}
	function chooseDept(name, url, id) {
		$('#List').html("<div class='white'><div class='loading'>讀取中...</div></div>");
		$.ajax({
			type : "GET",
			url : "local-ajax/dept.php",
            data : {
                "id": id,
                "url": url
            },
			dataType : "json",
			success : function(response) {
				$('#List').html("");
				$('#List').html("<div id='photoTitle' class='title'>醫生</div>");
				doctorList = response[2]['doctor'];
				for ( var i = 0; i < doctorList.length; ++i) {
					for ( var key in doctorList[i]) {
						doctorName = doctorList[i][key];
						doctorId = key
						$('#List')
								.append(
										'<div class="item" onClick="chooseDoctor(\''
												+ key + '\',\'' + doctorName
												+ '\',\'' + url + '\')">'
												+ doctorName + '</div>');
					}
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
		$('#inputDept').val(name);
		$('#inputDoctor').val('');
		$('#inputTime').val('');
		$('#deptId').val(id);
		$('#inputDept').bind('click', function() {
			chooseHospital($('#inputHospital').val(), url);
		});
	}

	function chooseDoctor(id, name, url) {
		$('#List').html("<div class='white'><div class='loading'>讀取中...</div></div>");
		$.ajax({
			type : "GET",
			url : "local-ajax/doctor.php",
            data : {
                "id": id,
                "url": url
            },
			dataType : "json",
			success : function(response) {
				$('#List').html("");
				$('#List').html("<div id='photoTitle' class='title'>時間</div>");
				time = response[3].time;
                for(var i = 0; i < time.length; ++i) {
            		$('#List')
            				.append(
            						'<div class="item" onClick="chooseTime(\''+time[i]+'\')">'+time[i]+'</div>');
                }
			},
			error : function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		});
		$('#inputDoctor').bind('click', function() {
			chooseDept($('#inputDept').val(), url, $('#deptId').val());
		});
		$('#inputDoctor').val(name);
		$('#inputTime').val('');
		$('#doctorId').val(id);
	}
	function chooseTime(time) {
		$('#inputTime').val(time);
	}
	function submitRegister() {
		if ($('#inputHospital').val() == "" || $('#inputDept').val() == ""
				|| $('#inputDoctor').val() == "" || $('#inputTime').val() == "") {
			alert("Empty column.");
			return;
		}
		$
				.ajax({
					type : "GET",
					url : "local-ajax/register.php",
					dataType : "json",
					data : {
						'hospitalId' : $('#hospitalId').val(),
						'doctorId' : $('#doctorId').val(),
						'deptId' : $('#deptId').val(),
						'hospital' : $('#inputHospital').val(),
						'dept' : $('#inputDept').val(),
						'doctor' : $('#inputDoctor').val(),
						'id' : $('#hiddenId').val(),
						'birthday' : $('#hiddenBirthday').val(),
						'time' : $('#inputTime').val(),
						'first' : 'true'
					},
					success : function(response) {
						var row = $
								.template('<div class="row"><div class="left">${item}</div><div class="right">${value}</div><div class="clear"></div></div>');
                        $('#checkRegister').html("");
                        $('#checkRegister').append('<div id="title">掛號成功</div>');
						$('#checkRegister').append(row, {
							item : '醫院:',
							value : $('#inputHospital').val()
						});
						$('#checkRegister').append(row, {
							item : '科別:',
							value : $('#inputDept').val()
						});
						$('#checkRegister').append(row, {
							item : '醫生:',
							value : $('#inputDoctor').val()
						});
						$('#checkRegister').append(row, {
							item : '時段:',
							value : $('#inputTime').val()
						});
						$('#checkRegister').append(row, {
							item : '診號:',
							value : response['message']
						});
		                $('#checkRegister').append('<div id="check" onClick="backIndex()">確認完成</div>');
						$('#checkRegister').removeClass('hidden');
						$('#transparent').removeClass('hidden');
					},
					error : function(xhr, ajaxOptions, thrownError) {
						alert("Error. back to main page");
						window.location="/";
					}
				});

	}
	function lastPage() {
		$("body").append('<div id="loadingNewPage">載入中...</div>');
		window.location='register.html';
	}
</script>
</head>

<body>
	<div id="transparent" class="hidden">
        <div id="checkRegister" class="hidden"></div>
    </div>
	<div id="List">
	</div>
	<div id="Form">
		<div class="redTitle">填寫掛號資訊</div>
		<form id="registerForm" method="get" action="/">
			<div class="formData">
				<div class="inputTextLeft">醫院：</div>
				<div class="inputTextRight">
					<input type="text" id="inputHospital" readonly="readonly"
						placeholder="請點擊後選擇..."></input><input type="hidden"
						id="hospitalId" name="hospitalId"></input>
				</div>
				<div class="clear"></div>
				<div class="inputTextLeft">科別：</div>
				<div class="inputTextRight">
					<input type="text" id="inputDept" readonly="readonly"
						placeholder="請點擊後選擇..."></input> <input type="hidden" id="deptId"
						name="deptId"></input>
				</div>
				<div class="clear"></div>
				<div class="inputTextLeft">醫生：</div>
				<div class="inputTextRight">
					<input type="text" id="inputDoctor" readonly="readonly"
						placeholder="請點擊後選擇..."></input><input type="hidden" id="doctorId"
						name="doctorId"></input>
				</div>
				<div class="clear"></div>
				<div class="inputTextLeft">時段：</div>
				<div class="inputTextRight">
					<input type="text" id="inputTime" readonly="readonly"
						placeholder="請點擊後選擇..."></input>
				</div>
				<div class="clear"></div>
			</div>
			<input type="hidden" id="hiddenId" value="<?=$_POST['id']?>"></input> <input type="hidden" id="hiddenBirthday" value="<?=$_POST['birthday']?>"></input> 
			<a	class="button" onClick="lastPage();" style="float: left">上一頁</a>
			<a class="button" onClick="javascript:submitRegister();" style="float: right;">送出</a>
			<div class="clear"></div>

		</form>
	</div>
	<div class="clear"></div>
</body>
</html>
