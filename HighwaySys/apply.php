<?php 
    include("dbconfig.php");
    session_start();
?>
<?php 
  
	
    if($_SESSION["name"]=="")
    {
        header("location:reg.php");

    }
?>
<?php
 if(isset($_POST["uid"]))
 {
   $cont=$_POST["contact"];
   $appmsg=$_POST["applimsg"];
   $comenterid=$_POST["comme_id"];

   //$u_id=$_POST["uid"];
   $p_id=$_POST["pid"];
   $uid=$_SESSION["id"];
   $sql2=mysqli_query($con,"select usr_id_p from posts where post_id='$p_id'");
   while($row=mysqli_fetch_array($sql2))
   {
      $user=$row["usr_id_p"];
       
   }
    $sql= mysqli_query($con,"insert into applications(post_id_c,user_id_c,contact,applimsg,app_time) values('$p_id','$uid','$cont','$appmsg',now())");
    $sql1= mysqli_query($con,"insert into notification(pos_id,post_usr,cont_user,contact,applimsg,time) 
      values('$p_id','$user','$uid','$cont','$appmsg',now())");
   //$sql=mysqli_query($con,"insert into applications(post_id_c,user_id_c,contact,app_time) values('$p_id','$uid','$cont',now())");
    if($sql)
    {
      header("location:nuser.php");

    }
 }   
?>