<?php 
    include("dbconfig.php");
?>
<?php 
  if(isset($_POST["btn-login"]))
  {
      $email=$_POST["txt_uname_email"];
      $pass=$_POST["txt_password"];
      
      $sql=mysqli_query($con,"select * from registration where email='$email' and password='$pass'");
      if(mysqli_num_rows($sql))
      {
          while($row=mysqli_fetch_array($sql))
          {   
              $name=$row["name"];
              $id=$row["usr_id"];
              $type = $row['type'];
              session_start();
              $_SESSION["name"]=$name;
              $_SESSION["id"]=$id;
              $_SESSION["email"]=$email;
              //normal user page
              if($type == "NORMAL"){
              	header("location: nuser.php");
              }
              //direction of super admin
              else if($type == "SUPER_ADMIN"){
              	header("location: user.php");
              }
          }
        //header("location:user.php");
      }
      else{
         //$error="";
         echo '<script>alert("incorrect username or password retry ");</script>';
      }

  }

?>
<?php
if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$lname = strip_tags($_POST['txt_lname']);
  $contact = strip_tags($_POST['tel_contact']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);
	$usertype=$post_["usertype"];
	$pic=$_FILES["img"]["name"];
  $tmp=$_FILES["img"]["tmp_name"];
  $type=$_FILES["img"]["type"];
   
  $path="profpic/".$pic;
	$icon="warning";
	$class="danger";
	
	if($uname=="")	{
		$error[] = "provide first name";	
	}
	if($lname=="")	{
		$error[] = "provide last name";	
	}
  if($contact=="")  {
    $error[] = "enter your phone number"; 
  }
	else if($type=="application/pdf" || $type=="application/pdf" || $type=="application/x-zip-compressed")	{
		$error[] = "this type of file does not supported !";
		echo '<script>alert("unsurported file format");</script>';	
	}
	else if($pic=="")	{
		$error[] = "No image selected";	
	}
	else if($umail=="")	{
		$error[] = "enter valid email address";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address';
	}
	else if($upass=="")	{
		$error[] = "provide password";
	}

	else
	{
		//$sql="insert into registration values();"
		$sql= mysqli_query($con,"insert into registration(name,lname,contact,email,image,password) values('$uname','$lname','$contact','$umail','$pic','$upass')");
		if($sql)
		{  
       move_uploaded_file($tmp,$path);
		   $error[] = "Registered successfully";
		   echo '<script>alert("Registred  successfully");</script>';
		   $icon="success";
	     $class="success";	
		}
	}	
}

?>
<?php
if(isset($_POST['btn-offence']))
{
	$offence = strip_tags($_POST['txt_offence']);
	$loc = strip_tags($_POST['txt_loc']);
	$carreg = strip_tags($_POST['txt_carreg']);
	$party = strip_tags($_POST['txt_party']);
	$pic=$_FILES["img"]["name"];
  $tmp=$_FILES["img"]["tmp_name"];
  $type=$_FILES["img"]["type"];
   
  $path="profpic/".$pic;
	$icon="warning";
	$class="danger";
	
	if($offence=="")	{
		$error[] = "provide offence";	
	}
	if($loc=="")	{
		$error[] = "provide location of incidence";	
	}
	else if($type=="application/pdf" || $type=="application/pdf" || $type=="application/x-zip-compressed")	{
		$error[] = "this type of file does not supported !";
		echo '<script>alert("this type of file does not supported !");</script>';	
	}
	else if($pic=="")	{
		$error[] = "No Evidence  selected";	
	}
	else if($carreg=="")	{
		$error[] = "enter car registration number";	
	}
	else if($party=="")	{
		$error[] = "enter parties involved in the offence";
	}

	else
	{
		//$sql="insert into offences values();"
		$sql= mysqli_query($con,"insert into offences(offence,location,carreg,evidence,parties) values('$offence','$loc','$carreg','$pic','$party')");
		if($sql)
		{  
            move_uploaded_file($tmp,$path);
		   $error[] = "Please retry";
		   echo '<script>alert("offence was reported successfully");</script>';
		   $icon="success";
	       $class="success";	
		}
	}	
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<title>Highway Management System</title>
<!-- mobile version -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/green.css" id="colors">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" id="colors">
<body>
<div id="wrapper">
<!-- header navigation bar -->
<header class="transparent sticky-header full-width">
<div class="container">
	<div class="sixteen columns">
		<div id="logo" style="margin-top:20px">
			<h1><a href="index.php"><font style="font-size:30px; color:green">Highway Management  System</font></a></h1>
		</div>
		<!-- Menu items of the system -->
		<nav id="navigation" class="menu">
      <ul class="float-right">
        <li><a data-toggle = "modal" data-target = "#offenceModal"></i>Report road offence</a></li>
        <li><a data-toggle = "modal" data-target = "#signupModal"></i> Sign Up</a></li>
        <li><a data-toggle = "modal" data-target = "#myModal"></i> Log In</a></li>
      </ul>

    </nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>
	</div>
</div>
</header>
<div class="clearfix"></div>
<!-- background image -->
<div id="banner" class="with-transparent-header parallax background" style="background-image:
 url(images/img10.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
	<div class="container">
		<div class="sixteen columns">
			<div class="search-container">
			</div>
		</div>
	</div>
</div>
<!-- modals for login sign up and case/offfence modals.... etc -->
<!-- Modal for login -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   <script type='text/javascript' src="js/validation.js"></script>
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                 
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Login form
            </h4>
         </div>
         <form class="form-signin" method="post" id="login-form" enctype="multipart/form-data" onsubmit=" return validateLogIn()">
         
         <div class = "modal-body">
            <input id="email" type="email" name="txt_uname_email" placeholder="enter email address" />
         </div>
         <div class = "modal-body">
            <input id="pass" type="password" name="txt_password" placeholder="password" />
         </div>
         
         <div class = "modal-footer">
             <p id='messagelogin'></p>
                <p id='messagelogin'></p>
            <input type = "submit" class = "btn btn-primary" name="btn-login" value="LOG IN">
               
            </input>
			<button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            
        </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

<!-- Modal for login -->
<div class = "modal fade" id = "signupModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
     <script type='text/javascript' src="js/validation.js"></script>
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Sign up form
            </h4>
             <form method="post" class="form-signin" enctype="multipart/form-data" onsubmit=" return validateRegister()">
           <!--  <form method="post" class="form-signin" enctype="multipart/form-data" > -->
         </div>
         <div class = "modal-body">
           First Name: <input id="name" type="text" name="txt_uname" placeholder="enter first name" required/>
         </div>
         <div class = "modal-body">
            last Name: <input id="lname" type="text" name="txt_lname" placeholder="enter  last name" required/>
         </div>
          <div class = "modal-body">
            phone number <input id="phone" type="text" name="tel_contact" placeholder="Enter correct phone number" required/>
         </div>
         <div class = "modal-body">
            Email : <input type="email" name="txt_umail" placeholder="enter  email here" required/>
         </div>
         <div class = "modal-body">
            Password: <input type="password" name="txt_upass" placeholder="enter  password" required/>
         </div>
         <div class = "modal-body">
            Add prof picture: <input type="file" name="img" required/>
         </div>
         <div class = "modal-footer">
                <p id='messagesignup'></p>
                <p id='message2'></p>
            <input type = "submit" class = "btn btn-primary" value="SIGN UP" name="btn-signup">
			 <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
           
		   
            </input>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

<!-- Modal for offence reporting -->
<div class = "modal fade" id = "offenceModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Offence reporting page and road crime
            </h4>
            <form method="post" class="form-signin" enctype="multipart/form-data">
         </div>
         <div class = "modal-body">
            Type of offence <input type="text" name="txt_offence" placeholder="like bribe, overspeed etc" required/>
         </div>
         
         <div class = "modal-body">
            Location of incident <input type="text" name="txt_loc" placeholder="Name of location of incident like (Nakuru)" required/>
         </div>
         <div class = "modal-body">
            Car Registration number<input type="text" name="txt_carreg" placeholder="car registration number and sacco name if psv" required/>
         </div>
         <div class = "modal-body">
            parties involved<input type="text" name="txt_party" placeholder="like between police and driver" required/>
         </div>
         <div class = "modal-body">
            Evidence in picture or video format: <input type="file" name="img" required/>
         </div>
         <div class = "modal-footer">
            
            <input type = "submit" class = "btn btn-primary" value="Report offence" name="btn-offence">
			 <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            </input>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<!-- end -->
<div class="container">
	<!-- Recent Jobs -->
	<h3 class="text-center"><strong>Highway Management System tasks</strong></h3>
	<div class="eleven columns">
	<div class="padding-right">
		<ul class="job-list full">
			<?php 
           $sql=mysqli_query($con,"select * from posts join registration where posts.usr_id_p=registration.usr_id order by posts.post_time desc limit 1,6");
                             while($row=mysqli_fetch_array($sql))
                               {
                                        $title=$row["job_title"];
                                        $status=$row["descriptions"];
                                        $img=$row["image"];
                                        $name=$row["name"];
                                        $time=$row["name"];
                                        $time_ago=$row["post_time"];
                                      echo '<li><a href="#">';
				                          echo '<img src="profpic/'.$img.'" alt="">';
				                             echo '<div class="job-list-content">';
					                           echo '<h4>'.$title.'</h4>';
					                            echo '<h4>'.$status.'</h4>';
					                           echo '</div>';
					                           echo '<div class="job-icons" style="margin-left:100px">';
				                               echo '</div>';
				                                echo '</a>';
				                          echo '<a data-toggle = "modal" data-target = "#myModal" class="btn btn-default" >Interested to take task click here</a>';
				                          echo '<br/><br/>';
			                            echo '</li>';

                               }
           ?>
			
		</ul>
		<div class="clearfix"></div>
		<div class="pagination-container">	
		</div>
	</div>
	</div>
    <!-- Widgets -->
  <div class="five columns">
          
    <!-- Alerrt type-->
    <div class="widget">
      <h5><strong>Announcement regarding our roads today</strong></h5>

      <ul class="checkboxes">
        <li>
         <!--  <img src="images/img9.jpg" height="100px" width="100px"/> -->
          
        </li>
        
      </ul>

    </div>
  </div>
  <!-- Widgets / End -->
</div>

<!-- scripts -->
<script src="scripts/jquery-2.1.3.min.js"></script>
<script src="scripts/custom.js"></script>
<script src="scripts/jquery.superfish.js"></script>
<script src="scripts/jquery.themepunch.tools.min.js"></script>
<script src="scripts/jquery.themepunch.revolution.min.js"></script>
<script src="scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="scripts/jquery.flexslider-min.js"></script>
<script src="scripts/chosen.jquery.min.js"></script>
<script src="scripts/jquery.magnific-popup.min.js"></script>
<script src="scripts/waypoints.min.js"></script>
<script src="scripts/jquery.counterup.min.js"></script>
<script src="scripts/jquery.jpanelmenu.js"></script>
<script src="scripts/stacktable.js"></script>
<script src="scripts/headroom.min.js"></script>
<script src="bootstrap/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>		
</div>
</body>
</html>