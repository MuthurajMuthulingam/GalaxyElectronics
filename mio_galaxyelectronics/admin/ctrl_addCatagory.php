<?php
include_once 'Activity.php';
$activity=new Activity();
$cname='';
if(isset($_REQUEST['cname'])){
    $cname=$_REQUEST['cname'];
    $res=$activity->addCatagory($cname);
    if($res['status']=='success'){
        
    }
}  else {
    header("Location:addCatagory.php");    
}
?>
