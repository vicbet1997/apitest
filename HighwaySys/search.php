<?php 
    include("dbconfig.php");
?>
<?php
  session_start();
  if($_SESSION['name']=='')
  {
     header('location:reg.php');
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
<?php 
  if(isset($_POST["submit"]))
  {  
  	 $job_t=$_POST["job_title"];
     $des=$_POST["descriptions"];
     $uid=$_SESSION["id"];
     $sql=mysqli_query($con,"insert into posts(usr_id_p,job_title,descriptions,post_time) 
     	values('$uid','$job_t','$des',now());");
     if($sql)
     {
     	echo '<script>alert("driving job posted successfully..");</script>';
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
 
 <!-- http://draganzlatkovski.com/code-projects/toggle-jquery-side-bar-menu-in-bootstrap-free-template/ -->
 
 <title>hms page </title>
 
 <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="components/bootstrap/dist/js/jquery.js"></script>
 
  
 
 <!-- Bootstrap core CSS -->
 <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/postmodal.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/fbbox.css" rel="stylesheet">
</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 <span class="sr-only"> navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
    <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">
    <font style="font-size:13px"> <?php echo $_SESSION["name"]; ?></font> </label>
   <?php  include("header.php"); ?>
 </div>
 </nav>
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Nature of driving job</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			  <form action="" method="post" enctype="multipart/form-data">

			   						
              <div class="form-group">
                <label for="exampleInputEmail1">Driving job Title</label>
                <textarea   name="job_title" class="form-control" placeholder="like a psv driver etc"></textarea>
                  
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Descriptions about the job</label>
         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Detailed information about the job..." rows="6" name="descriptions" required></textarea>
                                </div>
                            </div>
                           </div>

		
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="submit" name="submit"  class="btn btn-default btn-hover-green" value="Post">Post</button>
				</div>
			</div>
		</div>
		</div>	
	</div>
  </div>
</div>
</form>
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
 <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <font style="color:white"> Home </font></a>
 </li>
 <li>
  <a href="dposts.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> acc posts</a>
 </li>
 
 <li>
 
 <li>
 
 </ul>
 </div>
 </div>
 <!-- /#wrapper -->

  
  <!-- Page Content -->
 <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
 <br>

 </div>
 </div>
 <div class="row">
 <div class="col-lg-12">

     <div>
</div>
 </div>
 </div>
 </div>
 </div>
  
  
  <!-- this is div for user post -->
<div class="fluid-container">
<div class="row" style="clear:both">
 <div class="col-lg-12">
 	    <div class="col-lg-4"><div class="list-group" style="margin-left:0px">
  <a href="user.php" class="list-group-item active" style="background-color:blue;">
    Driving jobs
  </a>
  <a href="dposts.php" class="list-group-item">acc posts
  </a>
  <a href="" data-toggle="modal" data-target="#squarespaceModal" class="list-group-item">
  	Post driving job
  </a>
  
  <a href="changepass.php" class="list-group-item">Change Password
  </a>
  <a href="logout.php" class="list-group-item">Log Out
  </a>
</div></div>
 	     <div class="col-lg-8">

            <!--left-content-->
			<div class="center">
				<div class="posts">
					<div class="create-posts">
						<?php 
						   $sear=$_POST["search"];
                            $sql=mysqli_query($con,"select * from posts  where job_title like '%$sear%'");
                            if(mysqli_num_rows($sql))
                            {
                                while($row=mysqli_fetch_array($sql))
                               {
     	                           $id=$row["post_id"];
     	                           $up=$row["usr_id_p"];
     	                           $time=$row["post_time"];
     	                           $sql5=mysqli_query($con,"select * from registration  where usr_id='$up'");
                             while($row5=mysqli_fetch_array($sql5))
                               {
                                  $imp=$row5['image'];
                               }

						echo '<div class="post-show">
									<div class="post-show-inner">
										<div class="post-header">
											<div class="post-left-box">
												<div class="id-img-box"><img src="profpic/'.$imp.'"></img></div>
												<div class="id-name">
													<ul>
													<b>	'.$row['name'].' </b>
														<li><small>'.timeAgo($time).'</small></li>
													</ul>
												</div>
											</div>
											<div class="post-right-box"></div>
										</div>
									
											<div class="post-body">
											<div class="post-header-text">
							 <a href="postdes.php?id='.$id.'&s_title=' . $row['descriptions'] . '">
							  '.$row['job_title'].'</a>
							  
							                 <p>'.$row['descriptions'].'</p>

											 <br/><br/>';
										$sql1=mysqli_query($con,"select * from applications where post_id_c='$id'");
										while($row1=mysqli_fetch_array($sql1))
										{	 
                                            $ct=$row1["app_time"];
                                            $c=$row1["contact"];
                                            $uid=$row1["user_id_c"];
                                            $sql2=mysqli_query($con,"select * from registration where usr_id='$uid'");
                                            while($row2=mysqli_fetch_array($sql2))
										     {
                                                 $n=$row2["name"];
                                                 $img=$row2["image"];
										     }
										echo '<div style="margin-left:50px">
										<img style="height:20px; width="20px" src="profpic/'.$img.'"></img>
										&nbsp; &nbsp;'.$c.'
											 </div>
											 <div style="margin-left:50px"><div class="id-name">
													<ul>
													
														<small>'.timeAgo($ct).'</small> &nbsp; &nbsp; &nbsp;<font style="color:blue"> applied by :</font> <font style="font-size:12px"> '.$n.'</font>
													</ul>
											</div>
										</div>';
									   }
							echo '</div>

									</div>
								</div><br> ';	
     	                           
                               }
                            }
                            else
                            {
                            	$messa='<h1 style="color:red">No Post Found...</h1>';
                            	
								
                            }
                             
     
     
                              ?>

 	     </div>
 	   <?php echo $messa ?>
     <div>

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