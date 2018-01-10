<?php
include_once 'Activity.php';
include_once '../includes/headerforadmin.php';
if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
}
$activity=new Activity();
$respon = $activity->getCatagoryList();
if ($respon['status'] == 'success') {
    $carray = $respon['message'];
}
?>
<div id="content" role="main">
    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Add SubCatagory</h1>
        </header>
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_addSubCatagoryToCatagory.php" method="post" onsubmit="return validate();" class="wpcf7-form">
                    <p>Catagory Name<br />
                        <span class="wpcf7-form-control-wrap ">
                            <select id="cname" name="cname" >
                                <option value="0.none">select catagory</option>
                                <?
                                for ($i = 0; $i < count($carray); $i++) {
                                    echo '<option value="' . $carray[$i]['cid'] . '.' . $carray[$i]['cname'] . '" >' . $carray[$i]['cname'] . '</option>';
                                }
                                ?>
                            </select>        
                        </span> </p>
                    <p>SubCatagory Name<br />
                        <span class="wpcf7-form-control-wrap ">
                            <input type="text" name="scname" id="scname" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" />
                        </span> </p>

                    <p><input type="submit" value="add SubCatagory" class="wpcf7-form-control wpcf7-submit" /></p>

                </form>
                <p><input type="button" value="add Catagory" class="wpcf7-form-control" onclick="gotocatagory()" /></p>
            
            <p><input type="button" value="add Brand" class="wpcf7-form-control" onclick="gotobrand()" /></p>
            <p><input type="button" value="add Offer Product" class="wpcf7-form-control" onclick="gotoofferProduct()" /></p>
                <p><input type="button" name="add Product" value="add Products" class="wpcf7-form-control" onclick="gotoproduct()" /></p>
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
    function gotocatagory(){
        window.location.href ="addCatagory.php";
    }
    function gotosubcatagory(){
        window.location.href="addSubCatagoryToCatagory.php";
    }
    function gotobrand(){
        window.location.href="addBrandToProduct.php";
    }
    function gotoofferProduct(){
        window.location.href="addOfferProduct.php";
    }
    function validate(){
        var cname=document.getElementById("cname").value;
        var cnamearr=cname.split(".");
        var cid=cnamearr[0];
        if(cid==0){
            alert("Please select Catagory" );
            return false;
        }
        var scname=document.getElementById("scname").value;
        if(scname=='' || scname==null){
            alert("pls Enter SubCatagory name");  
            return false;
        }
        return true;
    }
</script>