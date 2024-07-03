<?php 
session_start(); 
include('includes/config.php'); 
include('includes/checklogin.php'); 
check_login(); 
?> 
<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
<meta charset="UTF-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum
scale=1"> 
<meta name="description" content=""> 
<meta name="author" content=""> 
<meta name="theme-color" content="#3e454c"> 
<title>Room Details</title> 
<link rel="stylesheet" href="css/font-awesome.min.css"> 
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css"> 
<link rel="stylesheet" href="css/bootstrap-social.css"> 
<link rel="stylesheet" href="css/bootstrap-select.css"> 
<link rel="stylesheet" href="css/fileinput.min.css"> 
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css"> 
<link rel="stylesheet" href="css/style.css"> 
<link rel="stylesheet" href="css/font-awesome.min.css"> 
<script language="javascript" type="text/javascript"> 
var popUpWin=0; 
function popUpWindow(URLStr, left, top, width, height) 
{ 
if(popUpWin) 
{ 
if(!popUpWin.closed) popUpWin.close(); 
} 
popUpWin = open(URLStr,'popUpWin', 
'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,widt
 h='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+''); 
} 
</script> 
</head> 
<body> 
<?php include('includes/header.php');?> 
<div class="ts-main-content"> 
<?php include('includes/sidebar.php');?> 
<div class="content-wrapper"> 
<div class="container-fluid"> 
<div class="row" id="print"> 
Report</h2> 
Details</div> 
<?php 
$uid=$_GET['uid']; 
<div class="col-md-12"> 
<h2 class="page-title" style="margin-top:4%">Feedback 
<div class="panel panel-default"> 
<div class="panel-heading">Feedback Report 
<div class="panel-body"> 
$ret="SELECT * FROM feedback  "; 
$stmt= $mysqli->prepare($ret); 
$stmt->bind_param('i',$uid); 
$stmt->execute() ; 
$res=$stmt->get_result(); 
$cnt=1; 
?> 
<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1"> 
<?php  
while($row=$res->fetch_object()) 
{ ?> 
<tr> 
<th>Feedback Registration Date</th> 
<td><?php echo $row->postinDate;?></td> 
</tr> 
<?php } ?> 
</table> 
</div> 
</div> 
</div> 
</div> 
</div> 
</div> 
</div> 
<script> 
<!-- Loading Scripts --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap-select.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/dataTables.bootstrap.min.js"></script> 
<script src="js/Chart.min.js"></script> 
<script src="js/fileinput.js"></script> 
<script src="js/chartData.js"></script> 
<script src="js/main.js"></script> 
$(function () { 
$("[data-toggle=tooltip]").tooltip(); 
}); 
function CallPrint(strid) { 
var prtContent = document.getElementById("print"); 
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0'); 
WinPrint.document.write(prtContent.innerHTML); 
WinPrint.document.close(); 
WinPrint.focus(); 
WinPrint.print(); 
WinPrint.close(); 
} 
</script> 
</body> 
</html>
