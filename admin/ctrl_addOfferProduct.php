<?php
include_once 'Activity.php';
$activity=new Activity();
$cname='';
$pname='';
$pprice='';
$pdesc='';
$pimage='';
$cid='';
$scid='';
$scname='';
if(isset($_REQUEST['cname'])){
    $arr=  explode(".",$_REQUEST['cname'] );
    $cname=$arr[1];
    $cid=$arr[0];
}
if(isset($_REQUEST['pname'])){
    $pname=$_REQUEST['pname'];
    
}

if(isset($_REQUEST['pprice'])){
    $pprice=$_REQUEST['pprice'];
    
}
if(isset($_REQUEST['pdesc'])){
    $pdesc=$_REQUEST['pdesc'];
    
}
if(isset($_REQUEST['scname'])){
    $arr=  explode(".",$_REQUEST['scname'] );
    $scname=$arr[1];
    $scid=$arr[0];
}
if(isset($_REQUEST['pimage'])){
    $pimage=$_REQUEST['pimage'];
    
}else {
    header("Location:addProductToSubCatagory.php");    
}
$response=$activity->addOfferProduct($pname, $pprice, $pdesc, $pimage, $cname, $cid,$scid,$scname);
if($response['status']=='success'){
    echo $response['message']; 
}  else {
    echo $response['message']; 
}
?>
