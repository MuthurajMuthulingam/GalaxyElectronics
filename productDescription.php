<? include_once 'includes/header.php';
 require_once 'admin/Activity.php';
 $activity=new Activity();
 $pid='';
 $opid='';
 if(isset($_REQUEST['pid'])){
     $pid=$_REQUEST['pid'];
     $productDesc=$activity->getProductDescribtion($pid);
 }elseif(isset($_REQUEST['opid'])){
     $opid=$_REQUEST['opid'];
     $productDesc=$activity->getOfferProductDescribtion($opid);
 }
 if($productDesc['status']=='success'){
     $prod_des=$productDesc['message'];
 }
 echo json_encode($productDesc);
?>

	<div id="content_container" class="group">

	<div id="container" class="group no-sidebars">
            <div id="content" role="main">
                    <div id="single_product_page_container">
    <div class="single_product_display group">
		
			

<div itemscope itemtype="http://schema.org/Product" id="product-195" class="post-195 product type-product status-publish hentry group featured instock">

	<div class="imagecol images">
	
		<a data-rel="prettyPhoto[195]" href="../../wp-content/uploads/sites/9/2012/09/iphone5-11.png" class="zoom thickbox preview_link" title="iPhone 4s" data-id="195" onclick="return false;">
                    <img width="500" height="500" class="product_image attachment-shop_single wp-post-image" alt="iPhone 4s" src="admin/uploaded_images/<?  echo $prod_des['pimage'];?>" />
        </a>

	            
  		<div class="wpcart_gallery group">
        <a href="../../wp-content/uploads/sites/9/2012/09/iphone5-11.png" title="iPhone 4s" class="thickbox preview_link" data-src="http://mio-woo.splashingpixels.com/wp-content/themes/mio/sp-framework/timthumb/timthumb.php?src=http://mio-woo.splashingpixels.com/wp-content/uploads/sites/9/2012/09/iphone5-11.png&amp;h=500&amp;w=500&amp;zc=1&amp;q=90&amp;a=c&amp;s=&amp;f=&amp;cc=&amp;ct=" data-rel="prettyPhoto[195]" onclick="return false;"><img src="../../wp-content/themes/mio/sp-framework/timthumb/timthumb_23.png" alt="iPhone 4s" width="80" height="80" class="sp-attachment-thumbnails" /></a><a href="../../wp-content/uploads/sites/9/2012/09/iphone5-21.png" title="iPhone 4s" class="thickbox preview_link" data-src="http://mio-woo.splashingpixels.com/wp-content/themes/mio/sp-framework/timthumb/timthumb.php?src=http://mio-woo.splashingpixels.com/wp-content/uploads/sites/9/2012/09/iphone5-21.png&amp;h=500&amp;w=500&amp;zc=1&amp;q=90&amp;a=c&amp;s=&amp;f=&amp;cc=&amp;ct=" data-rel="prettyPhoto[195]" onclick="return false;"><img src="../../wp-content/themes/mio/sp-framework/timthumb/timthumb_24.png" alt="iPhone 4s" width="80" height="80" class="sp-attachment-thumbnails" /></a><a href="../../wp-content/uploads/sites/9/2012/09/iphone5-41.png" title="iPhone 4s" class="thickbox preview_link" data-src="http://mio-woo.splashingpixels.com/wp-content/themes/mio/sp-framework/timthumb/timthumb.php?src=http://mio-woo.splashingpixels.com/wp-content/uploads/sites/9/2012/09/iphone5-41.png&amp;h=500&amp;w=500&amp;zc=1&amp;q=90&amp;a=c&amp;s=&amp;f=&amp;cc=&amp;ct=" data-rel="prettyPhoto[195]" onclick="return false;"><img src="../../wp-content/themes/mio/sp-framework/timthumb/timthumb_25.png" alt="iPhone 4s" width="80" height="80" class="sp-attachment-thumbnails" /></a>		</div><!--close wpcart_gallery-->
</div><!--close imagecol-->
	<div class="productcol">
        <div class="summary">
    
            <h1 itemprop="name" class="product_title entry-title prodtitle">iPhone 4s</h1><div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<p itemprop="price" class="price"><span class="from">From: </span><span class="amount">&pound;599.99</span></p>
	
	<link itemprop="availability" href="http://schema.org/InStock" />
	
</div>
<div itemprop="description" class="short-description">
	<p>Splashing Pixels&#039; WordPress e-commerce themes offer the best e-commerce solution for online stores. Our highly customizable WordPress e-commerce theme design and technology is unlike anything else on the market. We put an amazing amount of care and detail into the design and functionality to ensure that we&#039;re creating the best user experience for your customers.</p>
</div>
<form action="iphone-4s_2.html" class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="195" data-product_variations="[{&quot;variation_id&quot;:&quot;200&quot;,&quot;attributes&quot;:{&quot;attribute_pa_hd-size&quot;:&quot;16gb&quot;,&quot;attribute_pa_color&quot;:&quot;black&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;amount\&quot;&gt;&pound;599.99&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:0,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;},{&quot;variation_id&quot;:&quot;201&quot;,&quot;attributes&quot;:{&quot;attribute_pa_hd-size&quot;:&quot;16gb&quot;,&quot;attribute_pa_color&quot;:&quot;white&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;amount\&quot;&gt;&pound;599.99&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:0,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;},{&quot;variation_id&quot;:&quot;202&quot;,&quot;attributes&quot;:{&quot;attribute_pa_hd-size&quot;:&quot;32gb&quot;,&quot;attribute_pa_color&quot;:&quot;black&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;amount\&quot;&gt;&pound;699.99&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:0,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;},{&quot;variation_id&quot;:&quot;203&quot;,&quot;attributes&quot;:{&quot;attribute_pa_hd-size&quot;:&quot;32gb&quot;,&quot;attribute_pa_color&quot;:&quot;white&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;&lt;span class=\&quot;price\&quot;&gt;&lt;span class=\&quot;amount\&quot;&gt;&pound;699.99&lt;\/span&gt;&lt;\/span&gt;&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:0,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;}]">
	<table class="variations" cellspacing="0">
		<tbody>
							<tr>
					<td class="label"><label for="pa_color">Color</label></td>
					<td class="value"><select id="pa_color" name="attribute_pa_color">
						<option value="">Choose an option&hellip;</option>
						<option value="white" >White</option><option value="black" >Black</option>					</select></td>
				</tr>
	        				<tr>
					<td class="label"><label for="pa_hd-size">Hd-size</label></td>
					<td class="value"><select id="pa_hd-size" name="attribute_pa_hd-size">
						<option value="">Choose an option&hellip;</option>
						<option value="32gb" >32GB</option><option value="16gb" >16GB</option>					</select></td>
				</tr>
	        		</tbody>
	</table>
	<a class="reset_variations reset_variations_hook" href="iphone-4s.html#reset">Clear selection</a>	
	<div class="single_variation_wrap single_variation_wrap_hook">
		<div class="single_variation single_variation_hook group"></div>
		<div class="variations_button variations_button_hook">
			<input type="hidden" name="variation_id" value="" />
			<div class="quantity"><input name="quantity" data-min="" data-max="" value="1" size="4" title="Qty" class="input-text qty text" maxlength="12" /></div>            <div class="woo_buy_button_container group">
                <div class="input-button-buy"><span><button type="submit" class="single_add_to_cart_button button alt" data-product_id="195">Add to cart</button></span>
                </div><!--close input-button-buy-->
                <div class="loading_animation">
                    <img title="Loading" alt="Loading" src="../../wp-content/themes/mio/images/ajax-loader.gif" />
                </div><!--close wpsc_loading_animation-->                                        
            
            </div><!--close woo_buy_button_container-->
            
		</div>
	</div>
	<div><input type="hidden" name="product_id" value="195" /></div>

	
</form>
<div class="bottom-meta group">
<ul class="social group">

</ul>
			

</div><!--close bottom-meta-->

<div class="product_meta">

		
	 <span class="posted_in">Category: <a href="../../product-category/iphones.html" rel="tag">iPhones</a>.</span>	
	
</div>
    
        </div><!-- .summary -->
        
	</div><!--close productcol-->
				
</div><!-- #product-195 -->
	
	<div class="woocommerce-tabs">
		<ul class="tabs">
			
				<li class="description_tab">
					<a href="iphone-4s.html#tab-description">Description</a>
				</li>

			
				<li class="additional_information_tab">
					<a href="iphone-4s.html#tab-additional_information">Additional Information</a>
				</li>

					</ul>
		
			<div class="panel entry-content" id="tab-description">
				
<h2>Product Description</h2>

<p><? echo $prod_des['pdesc'];?></p>
<p>What can we say? Creating advanced and unique WordPress e-commerce themes is our passion and our unique e-commerce solutions give you more time to focus on yours.</p>
			</div>

		
			<div class="panel entry-content" id="tab-additional_information">
				
<h2>Additional Information</h2>

<table class="shop_attributes">
			
		
		
				
				
				
				
		<tr class="">
			<th>Color</th>
			<td><p>White, Black</p>
</td>
		</tr>
				
				
		<tr class="alt">
			<th>Hd-size</th>
			<td><p>32GB, 16GB</p>
</td>
		</tr>
				
		
</table>			</div>

			</div>


	<div class="related products group">
		<h2 class="section-title">Related Products:</h2>		
		<ul class="products">
			
					
				<li class="product related_grid_item first">
    
		        	<a href="../iphone-5/iphone-5.html" title="iPhone 5">
            			<img class="product_image" alt="iPhone 5" title="iPhone 5" src="../../wp-content/themes/mio/sp-framework/timthumb/timthumb_26.png" width="86" height="86" />	
		            </a>             
            <h2 class="prodtitle"><a href="../iphone-5/iphone-5.html" title="iPhone 5">iPhone 5</a></h2>      
            <div class="price_display"> 
                 <span class="from">From: </span><span class="amount">&pound;599.99</span>            </div><!--close price_display-->	
             
        <input type="hidden" value="204" class="hidden-id product-id" />
     
    
</li>	
							
		</ul>
		
	</div>
	

		    </div><!--close single_product_display-->	
    </div><!--close single_product_page_container-->
	</div><!-- #content --></div><!-- #container -->	
		
	</div><!--close content_container-->

  <? include_once 'includes/footer.php';?>	