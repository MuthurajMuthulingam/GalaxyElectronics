<?php 
 include_once 'admin/Activity.php';
 $headertext="csupport";
 include_once 'includes/header.php';
 $activity=new Activity();
 //$res=$activity->getCustomerSupportDetails();
?>

<div id="content_container" class="group">
    <div id="container" class="group sidebar-right">
        <div id="content" role="main">
            <p><h1>Select Details</h1></p>
        <p><ul class="product">
            <li class="product product_grid_item">
                <select><option>option 1</option><option>option 2</option></select>
            </li>
         <li class="product product_grid_item">
             <select>
                 <option>option 1</option>
                 <option>option 2</option>
             </select>
         </li>
        </ul></p>
           
            <p> Customer Support Details........</p>
        </div><!-- #content -->

    </div><!--close content_container-->
    <? include_once 'includes/footer.php'; ?>
