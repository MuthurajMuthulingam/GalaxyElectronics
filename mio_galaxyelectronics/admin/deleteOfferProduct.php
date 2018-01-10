<?php
include_once 'Activity.php';
include_once '../includes/headerforadmin.php';
if(!isset($_SESSION['username'])){
    //echo "test".$_SESSION['username'] ;    
    header("Location: ../login.php");
}
$activity = new Activity();
$respon = $activity->getAllOfferProductList();
if ($respon['status'] == 'success') {
    $carray = $respon['message'];
}

// make a note of the location of the upload handler script 

?>
<div id="content" role="main">

    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Delete Offer Products </h1>
        </header>

        

        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_deleteOfferProduct.php" method="post" class="wpcf7-form" >
                    
                    <p>Product name<br />
                        <span class="wpcf7-form-control-wrap">
                            <select name="pname" id="pname">
                                <?
                                for ($i = 0; $i < count($carray); $i++) {
                                    echo '<option value="' . $carray[$i]['pid'] . '.' . $carray[$i]['pname'] . '" >' . $carray[$i]['pname'] . '</option>';
                                }
                                ?>

                            </select></span> </p>
                        
                    <p><input type="submit" name="Delete Offer Product" value="Delete Offer Product" class="wpcf7-form-control wpcf7-submit" onclick="return validate();" /></p>
                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                </form>

            </div>

            <p><input type="button" value="add Catagory" class="wpcf7-form-control" onclick="gotocatagory()" /></p>
            <p><input type="button" value="add SubCatagory" class="wpcf7-form-control" onclick="gotosubcatagory()" /></p>
            <footer class="entry-meta">
            </footer><!-- .entry-meta -->
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>
<script type="text/javascript">
   
    function gotocatagory(){
        window.location.href ="addCatagory.php";
    }
    function gotosubcatagory(){
        window.location.href="addSubCatagoryToCatagory.php";
    }
    
    function validate(){
   
        var pna=document.getElementById("pname").value;
       
        if (pna==null || pna=="")
        {
            alert("Please Enter Product Name");
            return false;
        }
        
        return true;
    }
    
</script>
