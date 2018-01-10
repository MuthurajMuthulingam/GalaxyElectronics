<?php
include_once 'Activity.php';
$activity=new Activity();

$pname='';

$pid='';

if(isset($_REQUEST['pname'])){
    $arr=  explode(".",$_REQUEST['pname'] );
    $pname=$arr[1];
    $pid=$arr[0];
}
else {
    header("Location:deleteOfferProduct.php");    
}
$response=$activity->deleteOfferProduct($pid);
if($response['status']=='success'){
    echo $response['message']; 
}  else {
    echo $response['message']; 
}
?>
