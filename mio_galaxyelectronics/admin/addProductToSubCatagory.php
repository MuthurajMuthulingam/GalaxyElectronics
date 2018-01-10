<?php
include_once 'Activity.php';
include_once '../includes/headerforadmin.php';
if(!isset($_SESSION['username'])){
    header("Location: ../login.php");
}
$activity=new Activity();
$respon=$activity->getCatagoryList();
if($respon['status']=='success'){
    $carray=$respon['message'];
 }
 
 
 $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

// make a note of the location of the upload handler script 
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'uploadProcessor.php'; 
$location='http://' . $_SERVER['HTTP_HOST'] . $directory_self .'addProductToSubCatagory.php';
// set a max file size for the html upload form 
$max_file_size = 10485760;
?>
<div id="content" role="main">

    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Add Products to SubCatagory</h1>
        </header>
        
        <form id="Upload" action="<? echo $uploadHandler; ?>" enctype="multipart/form-data" method="post"> 
             <input type="hidden" name="location" id="location" value="<?echo $location ?>" />
        <p> 
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"> 
        </p> 
         
        <p> 
            <label for="file">Product image</label> 
            <input id="file" type="file" name="file"> 
        </p> 
                 
        <p> 
             
            <input id="submit" type="submit" onclick=" return getFilename()" name="submit" value="Upload"> 
        </p> 
     
    </form>
     
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_addProductToSubCatagory.php" method="post" class="wpcf7-form" >
                    <input type="hidden" id="filename" name="pimage" />
                    <p> 
            <label for="file">Product image</label> 
            <input id="pimage" type="file" name="file"> 
        </p>
                    <p>Product Name<br />
                        <span class="wpcf7-form-control-wrap"><input type="text" name="pname" id="pname" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" /></span> </p>
                    <p>Product Catagory<br />
                        <span class="wpcf7-form-control-wrap">
                            <select name="cname" id="cname" onchange="getsubCatagoryList();" >
                                <option value="0.none">select catagory</option>
                                <?for($i=0;$i<count($carray);$i++){
    echo '<option value="'.$carray[$i]['cid'].'.'.$carray[$i]['cname'].'" >'.$carray[$i]['cname'].'</option>';
                                }
                                ?>
                                
                            </select></span> </p>
                      <p>Product SubCatagory<br />
                        <span class="wpcf7-form-control-wrap" id="subcatagoryspan" >
                            </span> </p>      
                    <p>Product Brand<br />
                        <span class="wpcf7-form-control-wrap" id="brandnamespan" >
                            </span> </p>
                    <p>Price<br />
                        <span class="wpcf7-form-control-wrap"><input type="text" name="pprice" id="price" size="40" class="wpcf7-form-control wpcf7-text" /></span> </p>
                    <p>Product Description<br />
                        <span class="wpcf7-form-control-wrap your-message"><textarea name="pdesc" cols="40" rows="10" id="desc" class="wpcf7-form-control wpcf7-textarea"></textarea></span> </p>

                    <p><input type="submit" name="add Product" value="add Products" class="wpcf7-form-control wpcf7-submit" onclick="return validate();" /></p>
                    <div class="wpcf7-response-output wpcf7-display-none"></div></form>

            </div>

            <p><input type="button" value="add Catagory" class="wpcf7-form-control" onclick="gotocatagory()" /></p>
            <p><input type="button" value="add SubCatagory" class="wpcf7-form-control" onclick="gotosubcatagory()" /></p>
            <p><input type="button" value="add Brand" class="wpcf7-form-control" onclick="gotobrand()" /></p>
            <p><input type="button" value="add Offer Product" class="wpcf7-form-control" onclick="gotoofferProduct()" /></p>
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
        window.location.href="addSubCatagorytoCatagory.php";
    }
    function gotobrand(){
        window.location.href="addBrandToProduct.php";
    }
    function gotoofferProduct(){
        window.location.href="addOfferProduct.php";
    }
    function getFilename(){
        var fname=document.getElementById("file").value;
        //alert("file name"+fname);
        $('#filename').val(fname);
        //alert("file name"+fname);
        var file=document.getElementById("filename").value;
        //alert("file name"+fname);
        //alert("file name after "+file);
        return true;
    }
    function validate(){
   
        var pna=document.getElementById("pname").value;
        var pri=document.getElementById("price").value;
        var des=document.getElementById("desc").value;
        var incrementing=document.getElementById("pimage").value;
        var cname=document.getElementById("cname").value;
        var cnamearr=cname.split(".");
        var cid=cnamearr[0];
        //alert("cid"+cid);
        
        
        if(cid==0){
            alert("pls select product catagory");  
            return false;
        }
        var scname=document.getElementById("scname").value;
        var scnamearr=scname.split(".");
        var scid=scnamearr[0];
        //alert("scid"+scid);
        if(scid==0){
            alert("pls select product Subcatagory");  
            return false;
        }
        
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
        var incrementing=document.getElementById("file").value;
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
    function getsubCatagoryList(){
        //alert("getSubcatagoryCalled");
        var cid=document.getElementById("cname").value;
        var cidarr=cid.split(".");
         cid=cidarr[0];
         //alert("cid value"+cid);
        $.ajax({
            type: 'POST',
            url: 'ctrl_getSubCatagoryList.php',
            data: {
                cid:cid
                
            },
            dataType: "text",
            success: function (response) {
               //alert(response); 
                $("#subcatagoryspan").html(response);
                
                return true;
                               
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                
                return false;
            }
            
            
        });
    }
    function getbrands(){
    //alert("getSubcatagoryCalled");
        var scid=document.getElementById("scname").value;
        var scidarr=scid.split(".");
         scid=scidarr[0];
         //alert("scid value"+scid);
        $.ajax({
            type: 'POST',
            url: 'ctrl_getBrandList.php',
            data: {
                scid:scid
                
            },
            dataType: "text",
            success: function (response) {
               //alert(response); 
                $("#brandnamespan").html(response);
                
                return true;
                               
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                
                return false;
            }
            
            
        });
    }
</script>
