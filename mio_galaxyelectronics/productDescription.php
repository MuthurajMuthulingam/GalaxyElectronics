<?
require_once 'admin/Activity.php';
$headertext="shop";
include_once 'includes/header.php';

$activity = new Activity();
$pid = '';
$opid = '';
if (isset($_REQUEST['pid'])) {
    $pid = $_REQUEST['pid'];
    $productDesc = $activity->getProductDescribtion($pid);
} else if (isset($_REQUEST['opid'])) {
    $opid = $_REQUEST['opid'];
    $productDesc = $activity->getOfferProductDescribtion($opid);
}

//echo json_encode($productDesc);
?>

<div id="content_container" class="group">

    <div id="container" class="group no-sidebars">
        <div id="content" role="main">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a class="home" href="index.php">Home</a><?if (isset($_REQUEST['pid'])) {
    echo '<a href="shop.php">Shop</a><a href="#">Product Description</a>';
} else if (isset($_REQUEST['opid'])) {
    echo '<a href="offers.php">Offers</a><a href="#">Product Description</a>';
    
}?> </nav>

            <? 
            if ($productDesc['status'] == 'success') {
    $productDesc = $productDesc['message'];
    for($i=0;$i<count($productDesc);$i++){
              echo '<div id="single_product_page_container">
                                <div class="single_product_display group">

                    <div itemscope itemtype="http://schema.org/Product" id="product-195" class="post-195 product type-product status-publish hentry group featured instock">

                        <div class="imagecol images">
 
                            <img width="250" height="250" class="product_image attachment-shop_single wp-post-image" alt="'.$productDesc[$i]['pname'].'" src="admin/uploaded_images/'.$productDesc[$i]['pimage'].'" />
                           
                        </div><!--close imagecol-->
                        <div class="productcol">
                            <div class="summary">

                                <h1 itemprop="name" class="product_title entry-title prodtitle">'.$productDesc[$i]['pname'].'</h1><div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <p itemprop="price" class="price"><span class="from">From: </span><span class="amount"> Rs '.$productDesc[$i]['pprice'].'</span></p>

                                    <link itemprop="availability" href="http://schema.org/InStock" />

                                </div>
                                <div itemprop="description" class="short-description">
                                    <p>'.$productDesc[$i]['pdesc'].'</p>
                                </div>

                                <div class="bottom-meta group">
                                    <ul class="social group">

                                    </ul>


                                </div><!--close bottom-meta-->



                            </div><!-- .summary -->

                        </div><!--close productcol-->

                    </div><!-- #product-195 -->

                </div><!--close single_product_display-->	
            </div>';
            }
}
            
?>
            
            
            <!--close single_product_page_container-->
        </div><!-- #content --></div><!-- #container -->	

</div><!--close content_container-->

<? include_once 'includes/footer.php'; ?>	