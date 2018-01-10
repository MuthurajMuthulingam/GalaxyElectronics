<?php
include_once 'admin/Activity.php';
$activity=new Activity();

$search='';

if(isset($_REQUEST['search'])){
    $search=$_REQUEST['search'];
}
else {
    header("Location:shop.php");    
}
$response=$activity->searchProduct($search);
if($response['status']=='success'){
    echo json_encode($response); 
}  else {
    echo $response['message']; 
}
?>
