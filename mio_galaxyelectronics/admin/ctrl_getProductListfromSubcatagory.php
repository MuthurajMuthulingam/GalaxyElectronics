<?php

include_once 'Activity.php';
$activity = new Activity();
$scid=$_REQUEST['scid'];
$bresponse=$activity->getAllproducts($scid);
 if($bresponse['status']=='success'){
    $barray=$bresponse['message'];
    
    for($i=0;$i<count($barray);$i++){
    $response .= '<option value="'.$barray[$i]['pid'].'.'.$barray[$i]['pname'].'" >'.$barray[$i]['pname'].'</option>';
                                }
     $response='<select name="pname" id="pname"><options value="0.none">Select Product</option>'.$response.'</select>';                           
 }  else {
    $response="<option>No Products Found </option>"; 
    $response='<select name="pname" id="pname">'.$response.'</select>';
 }
 echo $response;
?>
