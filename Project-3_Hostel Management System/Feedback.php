<?php 
session_start(); 
include('includes/config.php'); 
date_default_timezone_set('Asia/Kolkata'); 
include('includes/checklogin.php'); 
check_login(); 
$aid=$_SESSION['id']; 
if(isset($_POST['submit'])) 
{ 
// Posted Values 
$acceswardent=$_POST['acceswardent']; 
$accesmember=$_POST['accesmember']; 
$redproblem=$_POST['redproblem']; 
$Room=$_POST['Room']; 
$Mess=$_POST['Mess']; 
$hstelsor=$_POST['hstelsor']; 
$overall=$_POST['overall']; 
$feedback=$_POST['feedback']; 
// Query for insertion data into database 
$query="insert into  
feedback(AccessibilityWarden,AccessibilityMember,RedressalProblem,Room,Mess,HostelSurroundings,Overall
 Rating,FeedbackMessage,userId) values(?,?,?,?,?,?,?,?,?)"; 
$stmt = $mysqli->prepare($query); 
$rc=$stmt
>bind_param('ssssssssi',$acceswardent,$accesmember,$redproblem,$Room,$Mess,$hstelsor,$overall,$feedback,
 $aid); 
$stmt->execute(); 
echo "<script>alert('Feedback registered succesfully');</script>"; 
echo "<script type='text/javascript'> document.location = 'feedback.php'; </script>"; 
} 
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
<title>Feedback Registration</title> 
<link rel="stylesheet" href="css/font-awesome.min.css"> 
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">> 
<link rel="stylesheet" href="css/bootstrap-social.css"> 
<link rel="stylesheet" href="css/bootstrap-select.css"> 
<link rel="stylesheet" href="css/fileinput.min.css"> 
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css"> 
<link rel="stylesheet" href="css/style.css"> 
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script> 
<script type="text/javascript" src="js/validation.min.js"></script> 
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script> 
</head> 
<body> 
<?php include('includes/header.php');?> 
<div class="ts-main-content"> 
<?php include('includes/sidebar.php');?> 
<div class="content-wrapper"> 
<div class="container-fluid"> 
<div class="row"> 
<div class="col-md-12"> 
<h2 class="page-title">Feedback </h2> 
<div class="row"> 
<div class="col-md-12"> 
<div class="panel panel-primary"> 
<div class="panel-body"> 
$uid=$_SESSION['login']; 
$stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? || regno=? "); 
$stmt->bind_param('ss',$uid,$uid); 
$stmt->execute(); 
$stmt -> bind_result($email); 
$rs=$stmt->fetch(); 
$stmt->close(); 
if($rs) 
{  
$ret=$mysqli->prepare("SELECT id FROM feedback WHERE userId=? "); 
$ret->bind_param('i',$aid); 
$ret->execute(); 
$ret->bind_result($count); 
$ret->fetch(); 
if($count>0) 
{ 
$ret="SELECT * FROM feedback WHERE userId=? "; 
$stmt= $mysqli->prepare($ret); 
$stmt->bind_param('i',$aid); 
$stmt->execute() ; 
$res=$stmt->get_result(); 
$cnt=1; 
while($row=$res->fetch_object()) 
{ ?> 
<table id="zctb" class="table table-bordered " cellspacing="0" width="100%" border="1"> 
<tr> 
<td colspan="6" style="text-align:center; color:blue"><h4>Feedback Details</h4></td> 
</tr> 
<tr> 
<th>Feedback Registration Date</th> 
<td><?php echo $row->postinDate;?></td> 
</tr> 
<tr> 
<th>Accessibility to Warden </th> 
<?php 
<td><?php echo $row->AccessibilityWarden;?></td> 
</tr> 
<tr> 
<th>Accessibility to Hostel Committee members </th> 
<td><?php echo $row->AccessibilityMember;?></td> 
</tr> 
<tr> 
<th>Redressal of Problem </th> 
<td><?php echo $row->RedressalProblem;?></td> 
</tr> 
<tr> 
<th>Room </th> 
<td><?php echo $row->Room;?></td> 
</tr> 
<tr> 
<th>Mess </th> 
<td><?php echo $row->Mess;?></td> 
</tr> 
<tr> 
<th>Hostel Surroundings (eg Lawn etc.) </th> 
<td><?php echo $row->HostelSurroundings;?></td> 
</tr> 
<tr> 
<th>Overall Rating </th> 
<td><?php echo $row->OverallRating;?></td> 
</tr> 
<tr> 
<th>Feedback Message</th> 
<td><?php echo $row->FeedbackMessage;?></td> 
</tr> 
</table> 
<?php } 
} else { 
?> 
<form method="post" action="" name="complaint" class="form-horizontal" enctype="multipart/form-data"> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Accessibility to Warden </label> 
<div class="col-sm-8"> 
<input type="radio" name="acceswardent" value="Excellent" required>Excellent 
<input type="radio" name="acceswardent" value="Very Good" required>Very Good 
<input type="radio" name="acceswardent" value="Good" required>Good 
<input type="radio" name="acceswardent" value="Average" required>Average 
<input type="radio" name="acceswardent" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Accessibility to Hostel Committee members</label> 
<div class="col-sm-8"> 
<input type="radio" name="accesmember" value="Excellent" required>Excellent 
<input type="radio" name="accesmember" value="Very Good" required>Very Good 
<input type="radio" name="accesmember" value="Good" required>Good 
<input type="radio" name="accesmember" value="Average" required>Average 
<input type="radio" name="accesmember" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Redressal of Problems</label> 
<div class="col-sm-8"> 
<input type="radio" name="redproblem" value="Excellent" required>Excellent 
<input type="radio" name="redproblem" value="Very Good" required>Very Good 
<input type="radio" name="redproblem" value="Good" required>Good 
<input type="radio" name="redproblem" value="Average" required>Average 
<input type="radio" name="redproblem" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Room</label> 
<div class="col-sm-8"> 
<input type="radio" name="Room" value="Excellent" required>Excellent 
<input type="radio" name="Room" value="Very Good" required>Very Good 
<input type="radio" name="Room" value="Good" required>Good 
<input type="radio" name="Room" value="Average" required>Average 
<input type="radio" name="Room" value="Below Average" required>Below Average 
</div> 
</div>      
<div class="form-group"> 
<label class="col-sm-4 control-label">Mess</label> 
<div class="col-sm-8"> 
<input type="radio" name="Mess" value="Excellent" required>Excellent 
<input type="radio" name="Mess" value="Very Good" required>Very Good 
<input type="radio" name="Mess" value="Good" required>Good 
<input type="radio" name="Mess" value="Average" required>Average 
<input type="radio" name="Mess" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Hostel Surroundings (eg Lawn etc.) </label> 
<div class="col-sm-8"> 
<input type="radio" name="hstelsor" value="Excellent" required>Excellent 
<input type="radio" name="hstelsor" value="Very Good" required>Very Good 
<input type="radio" name="hstelsor" value="Good" required>Good 
<input type="radio" name="hstelsor" value="Average" required>Average 
<input type="radio" name="hstelsor" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Overall Rating</label> 
<div class="col-sm-8"> 
<input type="radio" name="overall" value="Excellent" required>Excellent 
<input type="radio" name="overall" value="Very Good" required>Very Good 
<input type="radio" name="overall" value="Good" required>Good 
<input type="radio" name="overall" value="Average" required>Average 
<input type="radio" name="overall" value="Below Average" required>Below Average 
</div> 
</div> 
<div class="form-group"> 
<label class="col-sm-4 control-label">Feedback Message (if any)</label> 
<div class="col-sm-8"> 
<textarea name="feedback" id="feedback"  class="form-control"></textarea> 
</div> 
</div> 
 
<div class="col-sm-6 col-sm-offset-4"> 
 
<input type="submit" name="submit" Value="Submit" class="btn btn-primary"> 
</div> 
</form> 
<?php }} else {?> 
 <div>You are not eligible for Feedback. Once you book the hostel, you will be eligible for 
feedback.</div> 
<?php }?> 
         </div> 
         </div> 
        </div> 
       </div> 
      </div> 
       </div> 
      </div> 
     </div> 
    </div>   
   </div> 
  </div> 
 </div> 
 <script src="js/jquery.min.js"></script> 
 <script src="js/bootstrap-select.min.js"></script> 
 <script src="js/bootstrap.min.js"></script> 
 <script src="js/jquery.dataTables.min.js"></script> 
 <script src="js/dataTables.bootstrap.min.js"></script> 
 <script src="js/Chart.min.js"></script> 
 <script src="js/fileinput.js"></script> 
 <script src="js/chartData.js"></script> 
 <script src="js/main.js"></script> 
</body> 
 
 
</html> 
