<?php
include_once 'Activity.php';
$activity = new Activity();
$cid=$_REQUEST['cid'];
$response=$activity->getAllSubCatagory($cid);
 if($response['status']=='success'){
    $scarray=$response['message'];
    for($i=0;$i<count($scarray);$i++){
    $response.= '<option value="'.$scarray[$i]['scid'].'.'.$scarray[$i]['scname'].'" >'.$scarray[$i]['scname'].'</option>';
           }
        $response='<select name="scname" id="scname" onchange="getbrands();" ><option value="0.none">Select Subcatagory</option>'.$response.'</select>';   
 }else{
     $response="<option>No SubCatagory Found </option>";
     $response='<select name="scname" id="scname" onchange="getbrands();" >'.$response.'</select>';
 }
 echo $response;
?>
