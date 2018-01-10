<?php include_once 'includes/header.php';
 include_once 'admin/Activity.php';
 $activity=new Activity();
 
$cid='';
$scid='';
if(isset($_REQUEST['cid'])){
    $cid=$_REQUEST['cid'];
}
if(isset($_REQUEST['scid'])){
    $scid=$_REQUEST['scid'];
}
$responseforProductlist=$activity->getProductList($cid,$scid);
if($responseforProductlist['status']=='success'){
    $productlist=$responseforProductlist['message'];
}
echo json_encode($responseforProductlist);
?>

<div id="content_container" class="group">

    <div id="container" class="group sidebar-right"><div id="content" role="main">
            
            <h1 class="page-title">
                All Products					</h1>

            <div class="page-description"></div>						

            <p class="woocommerce-result-count">
                Showing <?  echo $responseforProductlist['count'];?> results</p>
            

            <ul class="products">

                <?
                for($i=0;$i<count($productlist);$i++){
                    echo '<li class="product product_grid_item ">

                    <div class="item_image">                    	
                        <a title="iPhone 4s" href="productDescription.php?pid='.$productlist[$i]['pid'].'">
                            <img class="product_image" alt="'.$productlist[$i]['pimage'].'" title="iPhone 4s" src="admin/uploaded_images/'.$productlist[$i]['pimage'].'" width="132" height="132" />	
                        </a>
                    </div><!--close item_image-->
                    <div class="grid_product_info">
                        <h2 class="prodtitle"><a href="productDescription.php?pid='.$productlist[$i]['pid'].'" title="iPhone 4s">'.$productlist[$i]['pname'].'</a></h2>
                        <div class="price_container">
                            <p class="pricedisplay"><span class="from">From: </span><span class="amount">'.$productlist[$i]['pprice'].'</span></p>
                        </div><!--close price_container-->
                    </div><!--close grid_product_info-->

                </li>';
                }
                
                ?>
            </ul>
            
        </div><!-- #content -->
        <div id="sidebar-right" class="sidebar">
            <div class="widget-wrapper">

                <div id="product_categories-2" class="widget-container woocommerce widget_product_categories group"><h3 class="widget-title">Product Categories </h3><ul class="product-categories"><li class="cat-item cat-item-31"><a href="product-category/accessories.html">Accessories</a></li>
                        <li class="cat-item cat-item-30"><a href="product-category/ipads.html">iPads</a></li>
                        <li class="cat-item cat-item-28"><a href="product-category/iphones.html">iPhones</a></li>
                        <li class="cat-item cat-item-26"><a href="product-category/ipods.html">iPods</a></li>
                        <li class="cat-item cat-item-24"><a href="product-category/macbooks.html">MacBooks</a></li>
                        <li class="cat-item cat-item-21"><a href="product-category/imacs.html">iMacs</a>
                            <ul>
                                <li class="cat-item cat-item-21"><a href="product-category/imacs.html">iMacs</a></li>
                            </ul></li>
                    </ul></div>    

            </div><!--close widget-wrapper-->
        </div><!--close sidebar--></div><!-- #container -->

</div><!--close content_container-->

<? include_once 'includes/footer.php'; ?>