<?php
include_once 'Activity.php';
include_once '../includes/headerforadmin.php';

if(!isset($_SESSION['username'])){
    //echo "test".$_SESSION['username'] ;    
    header("Location: ../login.php");
}
$activity=new Activity();
$respon=$activity->getCatagoryList();
if($respon['status']=='success'){
    $carray=$respon['message'];
 }

?>
<div id="content" role="main">

    <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
        <header class="page-header">
            <h1 class="entry-title">Modify Products </h1>
        </header>
        
        <div class="entry-content">
            <div class="wpcf7" id="wpcf7-f5-p44-o1">
                <form action="ctrl_modifyProduct.php" method="post" class="wpcf7-form" >
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
                    
                    <p>Product<br />
                        <span class="wpcf7-form-control-wrap" id="productnamespan" >
                            </span> </p>
                    <p>Price<br />
                        <span class="wpcf7-form-control-wrap"><input type="text" name="price" id="price" size="40" class="wpcf7-form-control wpcf7-text" /></span> </p>
                   
                    <p><input type="submit" name="Modify Product" value="Modify Products" class="wpcf7-form-control wpcf7-submit" onclick="return validate();" /></p>
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
    
    function validate(){
       //alert("alert called");
        
        var pri=document.getElementById("price").value;
        //alert("alert2"+pri);
        
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
        var pna=document.getElementById("pname").value;
        var pnamearr=pna.split(".");
        var pid=pnamearr[0];
        //alert("pid"+pid);
        if (pid==0)
        {
            alert("Please Enter Product Name");
            return false;
        }
        if (pri==null || pri=="")
        {
            alert("Please Enter Price");
            return false;
        }
       
        return true;
    }
   
    function getsubCatagoryList(){
        //alert("getSubcatagoryCalled");
        var cid=document.getElementById("cname").value;
        var cidarr=cid.split(".");
         cid=cidarr[0];
         //alert("cid value"+cid);
        $.ajax({
            type: 'POST',
            url: 'ctrl_getSubcatagoryListforProduct.php',
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
            url: 'ctrl_getProductListfromSubcatagory.php',
            data: {
                scid:scid
                
            },
            dataType: "text",
            success: function (response) {
               //alert(response); 
                $("#productnamespan").html(response);
                
                return true;
                               
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                
                return false;
            }
            
            
        });
    }
</script>
