<?php
include_once './ActivityforBank.php';
$activity=new Activity();
if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        $response=$activity->logintobank($_REQUEST['username'],$_REQUEST['password']);
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
