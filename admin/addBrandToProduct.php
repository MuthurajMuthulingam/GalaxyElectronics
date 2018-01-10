<?php
include_once '../includes/headerforadmin.php';
include_once 'Activity.php';
$activity=new Activity();
$respon=$activity->getCatagoryList();
if($respon['status']=='success'){
    $carray=$respon['message'];
 }
 $response=$activity->getAllSubCatagory();
 if($response['status']=='success'){
    $scarray=$response['message'];
 }
 

// make a note of the location of the upload handler script 

?>
<div id="content" role="main">

    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Add Products to SubCatagory</h1>
        </header>
        
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_addBrandToProduct.php" method="post" class="wpcf7-form" >
                    
                    <p>Product Catagory<br />
                        <span class="wpcf7-form-control-wrap">
                            <select name="cname" id="cname">
                                <?for($i=0;$i<count($carray);$i++){
    echo '<option value="'.$carray[$i]['cid'].'.'.$carray[$i]['cname'].'" >'.$carray[$i]['cname'].'</option>';
                                }
                                ?>
                                
                            </select></span> </p>
                      <p>Product SubCatagory<br />
                        <span class="wpcf7-form-control-wrap">
                            <select name="scname" id="scname">
                                <?for($i=0;$i<count($scarray);$i++){
    echo '<option value="'.$scarray[$i]['scid'].'.'.$scarray[$i]['scname'].'" >'.$scarray[$i]['scname'].'</option>';
                                }
                                ?>
                                
                            </select></span> </p>      
                    
                    <p>Brand Name<br />
                        <span class="wpcf7-form-control-wrap"><input type="text" name="bname" id="bname" size="40" class="wpcf7-form-control wpcf7-text" /></span> </p>
                    
                    <p><input type="submit" name="add Brand" value="add Brand" class="wpcf7-form-control wpcf7-submit" onclick="return validate();" /></p>
                    <div class="wpcf7-response-output wpcf7-display-none"></div></form>

            </div>

            <p><input type="button" value="add Catagory" class="wpcf7-form-control" onclick="gotocatagory()" /></p>
            <p><input type="button" value="add SubCatagory" class="wpcf7-form-control" onclick="gotosubcatagory()" /></p>
            <footer class="entry-meta">
            </footer><!-- .entry-meta -->
        </div><!-- .entry-content -->
    </article><!-- #post-## -->
</div>
<script type="text/javascript">
    function uploadfile(){
        window.location.href="uploadprocessor.php";
    }
    function gotocatagory(){
        window.location.href ="addCatagory.php";
    }
    function gotosubcatagory(){
        window.location.href="addSubCatagoryToCatagory.php";
    }
    function getFilename(){
        var fname=document.getElementById("file").value;
        alert("file name"+fname);
        $('#filename').val(fname);
        alert("file name"+fname);
        var file=document.getElementById("filename").value;
        alert("file name"+fname);
        alert("file name after "+file);
        return false;
    }
    function validate(){
   
        var pna=document.getElementById("pname").value;
        var pri=document.getElementById("price").value;
        var des=document.getElementById("desc").value;
        var incrementing=document.getElementById("imageforproduct").value;
        if(incrementing==""){
            alert("pls Add the Product Image");  
            return false;
        }
        if (pna==null || pna=="")
        {
            alert("Please Enter Product Name");
            return false;
        }
        if (pri==null || pri=="")
        {
            alert("Please Enter Price");
            return false;
        }
        if (des==null || des=="")
        {
            alert("Please Enter Product Description");
            return false;
        }
        return true;
    }
    function validate_file_format(field_name, allowed_ext){
        var incrementing=document.getElementById("imageforproduct").value;
        var extens=(/[.]/.exec(incrementing)) ? /[^.]+$/.exec(incrementing) : undefined;
        var ext=incrementing.split('.');
        alert("ext"+extens);
        if(extens!="jpg"||extens!="png"||extens!="jpeg"){
            return true;
        }else{
            alert("pls add image file only");  
            return false;
        }
    }
</script>
