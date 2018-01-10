<?php
include_once 'Activity.php';
$activity=new Activity();
$cname='';
$bname='';
$cid='';
$scid='';
$scname='';
if(isset($_REQUEST['cname'])){
    $arr=  explode(".",$_REQUEST['cname'] );
    $cname=$arr[1];
    $cid=$arr[0];
}


if(isset($_REQUEST['scname'])){
    $arr=  explode(".",$_REQUEST['scname'] );
    $scname=$arr[1];
    $scid=$arr[0];
}if(isset($_REQUEST['bname'])){
   $bname=$_REQUEST['bname']; 
}

$response=$activity->addBrandToSubCatagory($bname,$cname, $cid,$scid,$scname);
if($response['status']=='success'){
    echo $response['message']; 
}  else {
    echo $response['message']; 
}
?>
