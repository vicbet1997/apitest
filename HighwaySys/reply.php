<?php 
    include("dbconfig.php");
    session_start();
?>
<?php 
if(isset($_GET["id"]))
{   
	
    if($_SESSION["name"]=="")
    {
        header("location:reg.php");

    }
    
}


?>
<?php
function timeAgo($time_ago){

            $time_ago = strtotime($time_ago);
            $cur_time   = time();
            $time_elapsed   = $cur_time - $time_ago;
            $seconds    = $time_elapsed ;
            $minutes    = round($time_elapsed / 60 );
            $hours      = round($time_elapsed / 3600);
            $days       = round($time_elapsed / 86400 );
            $weeks      = round($time_elapsed / 604800);
            $months     = round($time_elapsed / 2600640 );
            $years      = round($time_elapsed / 31207680 );
            // Seconds
            if($seconds <= 60){
                return "just now";
            }
            //Minutes
            else if($minutes <=60){
                if($minutes==1){
                    return "one minute ago";
                }
                else{
                    return "$minutes minutes ago";
                }
            }
            //Hours
            else if($hours <=24){
                if($hours==1){
                    return "an hour ago";
                }else{
                    return "$hours hrs ago";
                }
            }
            //Days
            else if($days <= 7){
                if($days==1){
                    return "yesterday";
                }else{
                    return "$days days ago";
                }
            }
            //Weeks
            else if($weeks <= 4.3){
                if($weeks==1){
                    return "a week ago";
                }else{
                    return "$weeks weeks ago";
                }
            }
            //Months
            else if($months <=12){
                if($months==1){
                    return "a month ago";
                }else{
                    return "$months months ago";
                }
            }
            //Years
            else{
                if($years==1){
                    return "one year ago";
                }else{
                    return "$years years ago";
                }
            }
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="../../favicon.ico">
 <title>Hoghway System</title>
 
 <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="components/bootstrap/dist/js/jquery.js"></script>
 <!-- Bootstrap core CSS -->
 <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
 <link rel="stylesheet" href="components/bootstrap/dist/css/postataskbox.css" />
 
    <link rel="stylesheet" href="components/bootstrap/dist/css/projectdes.css" />

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 <span class="sr-only">navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
 <ul class="nav navbar-nav navbar-right">
  

 <li><a href="#"><span class="glyphicon glyphicon-contact" aria-hidden="true"></span> Notification(0) </a></li>

 <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
 </ul>
 <form class="navbar-form navbar-right" action="" method="GET">
 <div class="input-group">
 <input type="text" class="form-control" placeholder="Search..." id="query" name="search" value="">
 <div class="input-group-btn">
 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
 

 </div>
 </div>
 </form>
 </div>
 </div>
 </nav>
 <div id="wrapper" class="toggled">
 <div class="container-fluid">
 <!-- Sidebar -->
 <div id="sidebar-wrapper">
 <ul class="sidebar-nav">
 <li class="sidebar-brand">
 <br>
 </li>
 <li class="sidebar-brand">
 <a href="#" class="navbar-brand">
              
 <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $userRow['name']; ?>
 
 </a>
 </li>
 <li>
 <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
 </li>
 <li>
  <a href="dposts.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> acc posts</a>
 </li>
 <li>
 
 <li>
 
 </ul>
 </div>
 </div>
 
 <!-- /#page-content-wrapper -->
 </div>
 </div>
 <!-- /#wrapper -->

  <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
 	   <div class="col-lg-4">
		<div class="list-group" style="margin-left:0px">
   <a href="user.php" class="list-group-item active" style="background-color:green;">
    Driving jobs</a>
  </a>
  <a href="dposts.php" class="list-group-item">acc posts
  </a>
  <a href="" data-toggle="modal" data-target="#squarespaceModal" class="list-group-item">
  	Post Driving job
  </a>
  <a href="notification.php" class="list-group-item">
  	Notification(<?php echo $count; ?>)
  </a>
  
  <a href="changepass.php" class="list-group-item">Change Password
  </a>
  <a href="logout.php" class="list-group-item">Log Out
  </a>
</div>
		</div>
 
 
 <div class="col-lg-8">
    <?php 
      if(isset($_POST["reply"]))
      {
         $comm=$_POST["contact"];
         $p_id=$_POST["po_id"];
         $c_id=$_POST["comment_id"];
      }
    ?>
  <?php
$title = $_GET['j_title'];
//$p_id = $_GET['id'];

$sql1=mysqli_query($con,"select * from posts where post_id='$p_id'");
                    while($comnt1=mysqli_fetch_array($sql1)){
                           $uid=$comnt1["usr_id_p"];
                        }
                        $sql2=mysqli_query($con,"select * from registration where usr_id='$uid'");
                    while($comnt2=mysqli_fetch_array($sql2))
					{
                           $im=$comnt2["image"];
                    }
					
?>   
<?php
$title = $_GET['j_title'];
$p_id = $_GET['id'];
echo $comm;
?>
                  
            </div>
        	<form action="applications.php" method="post">

            <div class="post-footer">
                <div class="input-group"> 
                    <textarea class="form-control" cols="100" rows="10" placeholder="send a reply text" type="text" name="applimsg"></textarea>
                    <input class="form-control"  type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">
                    <input class="form-control"  type="hidden" name="pid" value="<?php echo $p_id;?>">
                    <input class="form-control"  type="hidden" name="comme_id" value="<?php echo $c_id;?>">
                   	<div class="btn-group" role="group" style="margin-top:5px">
					<button type="submit" name="submit_comment"  class="btn btn-primary btn-hover-green" >send reply!</button>
				</div>
                </div>
                </form>
              
                
            </div>
        </div>
    </div>
</div>   
 </div>
 </div>
 </div>
 </div> 
<!-- Bootstrap Core JavaScript -->
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
 $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.status').click(function() { $('.arrow').css("left", 0);});
			$('.photos').click(function() { $('.arrow').css("left", 146);});
		});
	</script>
</body>
</html>