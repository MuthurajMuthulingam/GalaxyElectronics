<?  include_once 'includes/header.php';
  include_once 'admin/Activity.php';
  $activity=new Activity();
  $offerProductlist=$activity->getAllOfferProductList();
  if($offerProductlist['status']=='success'){
      $offerproductArray=$offerProductlist['message'];
  }
?>

	<div id="content_container" class="group">
			<div id="content" role="main" class="home group">
            	<div id="slides">
                  <? for($i=0;$i<count($offerproductArray);$i++){
                      
                  }  
                  echo '<div class="slide">
                        <div class="product_description">
                            <h2>'.$offerproductArray[$i]['pname'].'</h2>
                            <p>'.$offerproductArray[$i]['pdesc'].'</p>
                            <p></p>
                        </div><!--close product_description-->
                        
                        <div class="featured_image">
                                                        <a href="shop/ipod-nano-blue/ipod-nano-blue.html" title="Buy Now"><img src="admin/uploaded_images/'.$offerproductArray[$i]['pimage'].'" width="500" height="500" alt="iPod Nano Blue" /></a>
                                                </div><!--close featured_image-->
                        
                        <div class="product_meta">
                            <div class="price">
                                <p><span class="amount">'.$offerproductArray[$i]['pprice'].'</span></p>
                                
                            </div><!--close price-->	
                        </div><!--close product_meta-->
                	</div>';?>
		             <!--   	<div class="slide">
                        <div class="product_description">
                            <h2>iPod Nano Blue</h2>
                            <p>Splashing Pixels' WordPress e-commerce themes offer the best e-commerce solution for online stores. Our highly customizable WordPress e-commerce theme design and technology is unlike anything else on the market. We put an amazing amount of care and detail into the design and functionality to ensure that we're creating the best user experience for your customers. Our user friendly backend system makes it easy for WordPress users of all levels to understand and our customer support forum is her...</p>
                            <p><a href="shop/ipod-nano-blue/ipod-nano-blue.html" title="More Info">More Info &gt;</a></p>
                        </div><!--close product_description-->
                        
                        <!--<div class="featured_image">
                                                        <a href="shop/ipod-nano-blue/ipod-nano-blue.html" title="Buy Now"><img src="wp-content/themes/mio/sp-framework/timthumb/timthumb.jpg" width="500" height="500" alt="iPod Nano Blue" /></a>
                                                </div><!--close featured_image-->
                        
                        <!--<div class="product_meta">
                            <div class="price">
                                <p><span class="amount">&pound;59.99</span></p>
                                <a href="shop/ipod-nano-blue/ipod-nano-blue.html" title="Buy Now" class="buynow"><span>Buy Now</span></a>
                            </div><!--close price-->	
                        <!--</div><!--close product_meta-->
                	<!--</div><!--close slide-->
                              <!--                    	<div class="slide">
                        <div class="product_description">
                            <h2>iPhone 5</h2>
                            <p>Splashing Pixels' WordPress e-commerce themes offer the best e-commerce solution for online stores. Our highly customizable WordPress e-commerce theme design and technology is unlike anything else on the market. We put an amazing amount of care and detail into the design and functionality to ensure that we're creating the best user experience for your customers. Our user friendly backend system makes it easy for WordPress users of all levels to understand and our customer support forum is her...</p>
                            <p><a href="shop/iphone-5/iphone-5.html" title="More Info">More Info &gt;</a></p>
                        </div><!--close product_description-->
                        
                       <!-- <div class="featured_image">
                                                        <a href="shop/iphone-5/iphone-5.html" title="Buy Now"><img src="wp-content/themes/mio/sp-framework/timthumb/timthumb.png" width="500" height="500" alt="iPhone 5" /></a>
                                                </div><!--close featured_image-->
                        
                        <!--<div class="product_meta">
                            <div class="price">
                                <p><span class="from">From: </span><span class="amount">&pound;599.99</span></p>
                                <a href="shop/iphone-5/iphone-5.html" title="Buy Now" class="buynow"><span>Buy Now</span></a>
                            </div><!--close price-->	
                        <!--</div><!--close product_meta-->
                	<!--</div><!--close slide-->
                             <!--                     	<div class="slide">
                        <div class="product_description">
                            <h2>Magic Mouse</h2>
                            <p>Splashing Pixels' WordPress e-commerce themes offer the best e-commerce solution for online stores. Our highly customizable WordPress e-commerce theme design and technology is unlike anything else on the market. We put an amazing amount of care and detail into the design and functionality to ensure that we're creating the best user experience for your customers. Our user friendly backend system makes it easy for WordPress users of all levels to understand and our customer support forum is her...</p>
                            <p><a href="shop/magic-mouse/magic-mouse.html" title="More Info">More Info &gt;</a></p>
                        </div><!--close product_description-->
                        
                       <!-- <div class="featured_image">
                                                        <a href="shop/magic-mouse/magic-mouse.html" title="Buy Now"><img src="wp-content/themes/mio/sp-framework/timthumb/timthumb_2.jpg" width="500" height="500" alt="Magic Mouse" /></a>
                                                </div><!--close featured_image-->
                        
                       <!-- <div class="product_meta">
                            <div class="price">
                                <p><span class="amount">&pound;89.99</span></p>
                                <a href="shop/magic-mouse/magic-mouse.html" title="Buy Now" class="buynow"><span>Buy Now</span></a>
                            </div><!--close price-->	
                       <!-- </div><!--close product_meta-->
                	<!--</div><!--close slide-->
                                                <!--</div><!--close slides-->
              <ul id="slide_menu" class="group">
              	                    <li class="menuItem act"><a href="mio-woo_splashingpixels_default.html#" title="1">1</a></li>
                                                      <li class="menuItem"><a href="mio-woo_splashingpixels_default.html#" title="2">2</a></li>
                                                      <li class="menuItem"><a href="mio-woo_splashingpixels_default.html#" title="3">3</a></li>
                                </ul>
                    <input type="hidden" value="8" class="homepage_slider_interval" />                           
                    <input type="hidden" value="scroll" class="homepage_slider_effects" /> 
                    <input type="hidden" value="500" class="homepage_slider_transition" /> 
                    <input type="hidden" value="linear" class="homepage_slider_easing" /> 
                    <input type="hidden" value="" class="homepage_slider_pause" />   
                    <input type="hidden" value="left" class="homepage_slider_direction" /> 
                    <input type="hidden" value="true" class="homepage_slider_touchswipe" />
                    
		                                    
                                    

</div><!--close content-->

	</div><!--close content_container-->

	<?  include_once 'includes/footer.php';?>