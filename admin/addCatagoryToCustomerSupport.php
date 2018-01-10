<?php
include_once '../includes/headerforadmin.php';
?>
<div id="content" role="main">
    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Add Catagory To Customer Support</h1>
        </header>
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_addCatagoryToCustomerSupport.php" method="post" onsubmit="return validate();" class="wpcf7-form">

                    <p>Catagory Name<br />
                        <span class="wpcf7-form-control-wrap ">
                            <input type="text" name="cs_cname" id="cs_cname" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" />
                        </span> </p>
                    <p><input type="submit" value="add Catagory" class="wpcf7-form-control wpcf7-submit" /></p>

                </form>
                <p><input type="button" name="add Product" value="add Products" class="wpcf7-form-control" onclick="gotoproduct()" /></p>
            </div>
            <footer class="entry-meta">
            </footer><!-- .entry-meta -->
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>
<script type="text/javascript">
    function gotoproduct(){
        window.location.href="addProductToCatagory.php";
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