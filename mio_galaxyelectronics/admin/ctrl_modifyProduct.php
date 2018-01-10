<?php
include_once 'Activity.php';
$activity=new Activity();
$cname='';
$pname='';
$pprice='';
$pid='';
$cid='';
$scid='';
$scname='';

if(isset($_REQUEST['cname'])){
    $arr=  explode(".",$_REQUEST['cname'] );
    $cname=$arr[1];
    $cid=$arr[0];
}

if(isset($_REQUEST['pname'])){
    $arr=  explode(".",$_REQUEST['pname'] );
    $pname=$arr[1];
    $pid=$arr[0];
    
}

if(isset($_REQUEST['price'])){
    $pprice=$_REQUEST['price'];
    
}

if(isset($_REQUEST['scname'])){
    $arr=  explode(".",$_REQUEST['scname'] );
    $scname=$arr[1];
    $scid=$arr[0];
}
else {
    header("Location:modifyProduct.php");    
}
$response=$activity->modifyProductPrice($pid,$pprice,$cid,$scid);
if($response['status']=='success'){
    echo $response['message']; 
}  else {
    echo $response['message']; 
}
?>
