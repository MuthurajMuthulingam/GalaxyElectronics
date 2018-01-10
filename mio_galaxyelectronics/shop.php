<?php 
include_once 'admin/Activity.php';
$headertext="shop";
include_once 'includes/header.php';
 
 $activity=new Activity();
 $cid='';
$scid='';
$bid='';
$search='';
if(isset($_REQUEST['cid'])){
    $cid=$_REQUEST['cid'];
    if(isset($_REQUEST['scid'])){
        $scid=$_REQUEST['scid'];
      if(isset($_REQUEST['bid'])){
    $bid=$_REQUEST['bid'];
    $responseforProductlist=$activity->getProductList($cid,$scid,$bid);
}else{
    $responseforProductlist=$activity->getProductListforSubCatagory($cid,$scid);
}  
    }else{
       $responseforProductlist=$activity->getProductListForCatagory($cid); 
    }
}else if(isset ($_REQUEST['search'])){
    $search=$_REQUEST['search'];
    $responseforProductlist=$activity->searchProduct($search);

}else {
    $responseforProductlist=$activity->getAllProductList();
}
//echo json_encode($responseforProductlist);
?>

<div id="content_container" class="group">

    <div id="container" class="group sidebar-right"><div id="content" role="main">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a class="home" href="index.php">Home</a> <a href="shop.php">Shop</a></nav>
            <h1 class="page-title">
                All Products					</h1>

            <div class="page-description"></div>						

            <p class="woocommerce-result-count">
                Showing <?  echo $responseforProductlist['count'];?> results</p>
            

            <ul class="products">
                
                <?
                if($responseforProductlist['status']=='success'){
    $productlist=$responseforProductlist['message'];
    for($i=0;$i<count($productlist);$i++){
                    echo '<li class="product product_grid_item ">

                    <div class="item_image">                    	
                        <a title="'.$productlist[$i]['pimage'].'" href="productDescription.php?pid='.$productlist[$i]['pid'].'">
                            <img class="product_image" alt="'.$productlist[$i]['pimage'].'" title="iPhone 4s" src="admin/uploaded_images/'.$productlist[$i]['pimage'].'" width="132" height="132" />	
                        </a>
                    </div><!--close item_image-->
                    <div class="grid_product_info">
                        <h2 class="prodtitle"><a href="productDescription.php?pid='.$productlist[$i]['pid'].'" title="iPhone 4s">'.$productlist[$i]['pname'].'</a></h2>
                        <div class="price_container">
                            <p class="pricedisplay"><span class="from"></span><span class="amount">Rs '.$productlist[$i]['pprice'].'</span></p>
                        </div><!--close price_container-->
                    </div><!--close grid_product_info-->

                </li>';
                }
}  else {
    echo $responseforProductlist['message'];
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