<?php 
include_once 'admin/Activity.php';
$headertext="offers";
include_once 'includes/header.php';
$activity=new Activity();
 
$cid='';
$scid='';
if(isset($_REQUEST['cid'])){
    $cid=$_REQUEST['cid'];
}
if(isset($_REQUEST['scid'])){
    $scid=$_REQUEST['scid'];
}
$responseforProductlist=$activity->getAllOfferProductList();

//echo json_encode($responseforProductlist);
?>

<div id="content_container" class="group">

    <div id="container" class="group sidebar-right">
        <div id="content" role="main">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a class="home" href="index.php">Home</a> <a href="offers.php">Offers</a></nav>

            <h1 class="page-title">
                All Products					</h1>
					

            <p class="woocommerce-result-count">
                Showing <?  echo $responseforProductlist['count'];?> results</p>
            
            <ul class="products">


                		
                <?
                if($responseforProductlist['status']=='success'){
                    $offerProductlist=$responseforProductlist['message'];
                    for($i=0;$i<count($offerProductlist);$i++){
                    echo '<li class="product product_grid_item ">

                    <div class="item_image">                    	
                        <a title="'.$offerProductlist[$i]['pname'].'" href="productDescription.php?opid='.$offerProductlist[$i]['pid'].'">
                            <img class="product_image" alt="'.$offerProductlist[$i]['pname'].'" title="'.$offerProductlist[$i]['pname'].'" src="admin/uploaded_images/'.$offerProductlist[$i]['pimage'].'" width="132" height="132" />	
                        </a>
                    </div><!--close item_image-->
                    <div class="grid_product_info">
                        <h2 class="prodtitle"><a href="productDescription.php?opid='.$offerProductlist[$i]['pid'].'" title="'.$offerProductlist[$i]['pname'].'">'.$offerProductlist[$i]['pname'].'</a></h2>
                        <div class="price_container">
                            <p class="pricedisplay"><span class="amount">Rs '.$offerProductlist[$i]['pprice'].'</span></p>
                        </div><!--close price_container-->
                    </div><!--close grid_product_info-->

                </li>';
                }
                }
               
                
                ?>
            </ul>
            
        </div><!-- #content -->
        <div id="sidebar-right" class="sidebar">
            <div class="widget-wrapper">

                <div id="product_categories-2" class="widget-container woocommerce widget_product_categories group">
                    <h3 class="widget-title">Product Categories </h3>
                    <ul class="product-categories">
                         <? for($i=0;$i<count($catagorylist);$i++){
     echo '<li class="cat-item cat-item-24"><a href="shop.php?cid='.$catagorylist[$i]['cid'].'">'.$catagorylist[$i]['cname'].'</a></li>';
                        }
?>
                    </ul></div>    

            </div><!--close widget-wrapper-->
        </div><!--close sidebar--></div><!-- #container -->

</div><!--close content_container-->

<? include_once 'includes/footer.php'; ?>