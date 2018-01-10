<?php
include_once 'Activity.php';
$activity=new Activity();
$cs_cname='';
if(isset($_REQUEST['cs_cname'])){
    $cs_cname=$_REQUEST['cs_cname'];
    $res=$activity->addCatagoryToCustomerSupport($cs_cname);
    if($res['status']=='success'){
       echo json_encode($res); 
    }
}  else {
    echo json_encode($res);
    //header("Location:addCatagory.php");    
}
?>
