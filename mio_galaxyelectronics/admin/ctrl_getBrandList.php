<?php

include_once 'Activity.php';
$activity = new Activity();
$scid=$_REQUEST['scid'];
$bresponse=$activity->getAllBrands($scid);
 if($bresponse['status']=='success'){
    $barray=$bresponse['message'];
    for($i=0;$i<count($barray);$i++){
    $response .= '<option value="'.$barray[$i]['bid'].'.'.$barray[$i]['bname'].'" >'.$barray[$i]['bname'].'</option>';
                                }
     $response='<select name="bname" id="bname"><options value="0.none">Select Brand</option>'.$response.'</select>';                           
 }  else {
    $response="<option>No Brands Found </option>"; 
    $response='<select name="bname" id="bname">'.$response.'</select>';
 }
 echo $response;
?>
