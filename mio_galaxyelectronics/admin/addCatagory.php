<?php
include_once 'Activity.php';
include_once '../includes/headerforadmin.php';
if(!isset($_SESSION['username'])){
    //echo "test".$_SESSION['username'] ;    
    header("Location: ../login.php");
}
?>
<div id="content" role="main">
    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Add Catagory</h1>
        </header>
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_addCatagory.php" method="post" onsubmit="return validate();" class="wpcf7-form">

                    <p>Catagory Name<br />
                        <span class="wpcf7-form-control-wrap ">
                            <input type="text" name="cname" id="cname" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" />
                        </span> </p>
                    <p><input type="submit" value="add Catagory" class="wpcf7-form-control wpcf7-submit" /></p>

                </form>
                
                <p><input type="button" name="add SubCatagory" value="add SubCatagory" class="wpcf7-form-control" onclick="gotosubcatagory()" /></p>
                <p><input type="button" name="add Brand" value="add Brand" class="wpcf7-form-control" onclick="gotobrand()" /></p>
                <p><input type="button" name="add Product" value="add Products" class="wpcf7-form-control" onclick="gotoproduct()" /></p>
                <p><input type="button" name="add Offer Product" value="add Offer Product" class="wpcf7-form-control" onclick="gotoofferProduct()" /></p>
            </div>
            <footer class="entry-meta">
            </footer><!-- .entry-meta -->
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>
<script type="text/javascript">
    function gotoproduct(){
        window.location.href="addProductToSubCatagory.php";
    }
    function gotosubcatagory(){
        window.location.href="addSubCatagorytoCatagory.php";
    }
    function gotobrand(){
        window.location.href="addBrandToProduct.php";
    }
    function gotoofferProduct(){
        window.location.href="addOfferProduct.php";
    }
    function validate(){
        var cname=document.getElementById("cname").value;
        if(cname==null || cname==""){
            alert("Please Enter a name for Catagory");
            return false;
        }
        return true;
    }
</script>