<?php
include_once 'Activity.php';
$activity=new Activity();
$scname='';
$cname='';
$cid='';
if (isset($_REQUEST['cname'])){
    $cnamearr=  explode(".",$_REQUEST['cname']);
    $cname=$cnamearr[1];
    $cid=$cnamearr[0];
}
if(isset($_REQUEST['scname'])){
    $scname=$_REQUEST['scname'];
    
    $res=$activity->addSubCatagoryToCatagory($scname, $cname, $cid);
    if($res['status']=='success'){
        echo 'Successfull Insertion';
    }else {
        echo "cname".$cname."cid".$cid;
        echo json_encode($res);
    }
}else {
    header("Location:addCatagory.php");    
}
?>
