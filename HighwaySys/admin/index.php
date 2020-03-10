<?php
session_start();
include("dbconnection.php");
{
$extra="husers.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
$extra="viewoffences.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
$extra="viewposts.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
?>


