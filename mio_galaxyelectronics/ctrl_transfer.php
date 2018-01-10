<?php
include_once './ActivityforBank.php';
$activity=new Activity();
if (isset($_REQUEST['amt']) && isset($_REQUEST['pin']) && isset($_REQUEST['balance']) && isset($_REQUEST['accno'])) {
        $response=$activity->tranfer($_REQUEST['amt'],$_REQUEST['pin'],$_REQUEST['balance'],$_REQUEST['accno']);
        if ($response['status']=='success') {
            echo json_encode($response);
           
        } else {
            echo json_encode($response);
        }
    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
