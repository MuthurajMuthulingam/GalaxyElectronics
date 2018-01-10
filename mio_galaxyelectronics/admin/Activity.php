<?php
include_once 'sessionFunction.php';
class Activity{
    var  $dbserver;
    var  $dbuser;
    var  $dbpassword;
    var  $dbname;

    function __construct() {
        //localhost
        $this->dbname='galaxyelectronics';
        $this->dbserver='localhost';
        $this->dbuser='root';
        $this->dbpassword='';
         //Server
        /*$this->dbname='galaxyelectronic';
        $this->dbserver='118.139.168.68';
        $this->dbuser='galaxyelectronic';
        $this->dbpassword='Galaxy@6898';*/
    }
    
    function AdminDB() {
  
       
       $connection = mysql_connect($this->dbserver, $this->dbuser, $this->dbpassword);

        if (!$connection) {
            HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
            return false;
        }
        if (!mysql_select_db($this->dbname, $connection)) {
            $HandleDBError('Failed to select database: ' . $database . ' Please make sure that the database name provided is correct');
            return false;
        }
        if (!mysql_query("SET NAMES 'UTF8'", $connection)) {
            $HandleDBError('Error setting utf8 encoding');
            return false;
        }
        return true;
    }
    function login($username,$password){
        if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        }
        $insertquer=  sprintf("select * from user where username='%s' and password='%s'",  mysql_real_escape_string($username),  mysql_real_escape_string($password));
               
        $result=mysql_query($insertquer);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertquer;
            return $res;
        }
        $numrows=  mysql_num_rows($result);
        if($numrows==0){
            $res['status']='failure';
            $res['message']="Login Failure";
            return $res;
        }
        $_SESSION['username']='admin';    
        $res['status']='success';
            $res['message']="Successful Login";
            return $res; 
    }
    
    function addProductToSubCatagory($pname,$pprice,$pdesc,$pimage,$cName,$cid,$scid,$scname,$bid,$bname){
        if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        }
        $insertquer=  sprintf("insert into products(name,price,description,image,cid,cname,scid,scname,bid,bname) values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$pname,$pprice
                ,$pdesc,$pimage,$cid,$cName,$scid,$scname,$bid,$bname);
        $result=mysql_query($insertquer);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertquer;
            return $res;
        }
        $res['status']='success';
            $res['message']="Successful insertion";
            return $res;
    }
    function modifyProductPrice($pid,$pprice,$cid,$scid){
        if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        } 
        $insertquer=  sprintf("update products set price='%s' where cid='%s' and scid='%s' and pid='%s'",$pprice
                ,$cid,$scid,$pid);
        $result=mysql_query($insertquer);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertquer;
            return $res;
        }
        $res['status']='success';
            $res['message']="Successful Modification";
            return $res;
    }
    function  addOfferProduct($pname,$pprice,$pdesc,$pimage,$cName,$cid,$scid,$scname){
        if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        }
        $insertquer=  sprintf("insert into offers(pname,pimage,pprice,pdesc,scid,scname,cid,cname) values('%s','%s','%s','%s','%s','%s','%s','%s')",$pname,$pimage
                ,$pprice,$pdesc,$scid,$scname,$cid,$cName);
        $result=mysql_query($insertquer);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertquer;
            return $res;
        }
        $res['status']='success';
            $res['message']="Successful insertion";
            return $res;
    }
    function  getCatagoryList(){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $selectquery=  sprintf("select * from catagories");
        $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['cid']=$row['cid'];
            $a[$i]['cname']=$row['cname'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        return $res;
    }
    function getSubCatagoryList($cid){
         if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $selectquery=  sprintf("select scid,scname from subcatagories where cid='%s'",  mysql_real_escape_string($cid));
        $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['scid']=$row['scid'];
            $a[$i]['scname']=$row['scname'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        return $res;
    }
    function getAllSubCatagory($cid){
         if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $selectquery=  sprintf("select scid,scname from subcatagories where cid='%s'",  mysql_real_escape_string($cid));
        $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['scid']=$row['scid'];
            $a[$i]['scname']=$row['scname'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        return $res;
    }
    
    function getAllBrands($scid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $selectquery=  sprintf("select bid,bname from brandnameforproduct where scid='%s'",  mysql_real_escape_string($scid));
        $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['bid']=$row['bid'];
            $a[$i]['bname']=$row['bname'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        return $res;
    }
    function getBrandNameforSubCatagory($scid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $selectquery=  sprintf("select bid,bname from brandnameforproduct where scid='%s'",  mysql_real_escape_string($scid));
        $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['bid']=$row['bid'];
            $a[$i]['bname']=$row['bname'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        return $res;
    }


    function addCatagory($cname){
      if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }  
        $insertQuery=  sprintf("insert into catagories(cname) values('%s')",  mysql_real_escape_string($cname));
        $result=  mysql_query($insertQuery);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertQuery;
            return $res;
        }
        $res['status']='success';
        $res['message']="successful Insertion";
        return $res;
    }
    
    function addCatagoryToCustomerSupport($cname){
      if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }  
        $insertQuery=  sprintf("insert into customersupport(cname) values('%s')",  mysql_real_escape_string($cname));
        $result=  mysql_query($insertQuery);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertQuery;
            return $res;
        }
        $res['status']='success';
        $res['message']="successful Insertion";
        return $res;
    }
    function addSubCatagoryToCatagory($scname,$cname,$cid){
      if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }  
        $insertQuery=  sprintf("insert into subcatagories(scname,cid,cname) values('%s','%s','%s')",  mysql_real_escape_string($scname),mysql_real_escape_string($cid), mysql_real_escape_string($cname));
        $result=  mysql_query($insertQuery);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertQuery;
            return $res;
        }
        $res['status']='success';
        $res['message']="successful Insertion";
        return $res;
    }
    
    function addBrandToSubCatagory($bname,$cname, $cid,$scid,$scname){
      if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }  
        $insertQuery=  sprintf("insert into brandnameforproduct(bname,cid,cname,scid,scname) values('%s','%s','%s','%s','%s')",  mysql_real_escape_string($bname),mysql_real_escape_string($cid), mysql_real_escape_string($cname),mysql_real_escape_string($scid),mysql_real_escape_string($scname));
        $result=  mysql_query($insertQuery);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertQuery;
            return $res;
        }
        $res['status']='success';
        $res['message']="successful Insertion";
        return $res;
    }
    
    function deleteOfferProduct($pid){
      if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }  
        $insertQuery=  sprintf("delete from offers where pid='%s'",mysql_real_escape_string($pid));
        $result=  mysql_query($insertQuery);
        if(!$result){
            $res['status']='failure';
            $res['message']="Error with Query".$insertQuery;
            return $res;
        }
        $res['status']='success';
        $res['message']="successful Deletion";
        return $res;
    }
    function getProductListforSubCatagory($cid,$scid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,name,price,description,image from products where cid='%s' and scid='%s'",  mysql_real_escape_string($cid),  mysql_real_escape_string($scid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          $res['count']=0;
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            $a[$i]['pdesc']=$row['description'];
            $a[$i]['pimage']=$row['image'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
    
    function getProductListForCatagory($cid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,name,price,description,image from products where cid='%s'",  mysql_real_escape_string($cid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          $res['count']=0;
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            $a[$i]['pdesc']=$row['description'];
            $a[$i]['pimage']=$row['image'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res;
    }
    function getProductList($cid,$scid,$bid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,name,price,description,image from products where cid='%s' and scid='%s'and bid='%s'",  mysql_real_escape_string($cid),  mysql_real_escape_string($scid),mysql_real_escape_string($bid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          $res['count']=0;
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            $a[$i]['pdesc']=$row['description'];
            $a[$i]['pimage']=$row['image'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res;
    }
    function getAllProductList(){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,name,price,description,image from products");
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          $res['count']=0;
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            $a[$i]['pdesc']=$row['description'];
            $a[$i]['pimage']=$row['image'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res;
    }
    function getAllproducts($scid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,name,price from products where scid='%s'",$scid);
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          $res['count']=0;
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res;
    }
    function searchProduct($search){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
        $search_qur="name like '%".mysql_real_escape_string($search)."%' or cname like '%".mysql_real_escape_string($search)."%' or scname like '%".mysql_real_escape_string($search)."%'";
        $search_for_offers="pname like '%".mysql_real_escape_string($search)."%' or cname like '%".mysql_real_escape_string($search)."%' or scname like '%".mysql_real_escape_string($search)."%'";
       $selectquery=sprintf("select pid,name,price,description,image from products where %s",$search_qur);
       $search_offerTable=  sprintf("select pid,pname,pprice,pdesc,pimage from offers where %s",$search_for_offers);
       
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $resul_offer=  mysql_query($search_offerTable);
        if(!$resul_offer){
            $res['status']='failure';
            $res['message']="Error with Query".$search_offerTable;
            return $res;
        }
        
        $i=0;
        $a=array();
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['name'];
            $a[$i]['pprice']=$row['price'];
            $a[$i]['pdesc']=$row['description'];
            $a[$i]['pimage']=$row['image'];
            $i++;
        }
        while ($row_offer=  mysql_fetch_assoc($resul_offer)){
           $a[$i]['pid']=$row_offer['ppid'];
            $a[$i]['pname']=$row_offer['pname'];
            $a[$i]['pprice']=$row_offer['pprice'];
            $a[$i]['pdesc']=$row_offer['pdesc'];
            $a[$i]['pimage']=$row_offer['pimage'];
            $i++;
        }
        $numrows=count($a);
        if($numrows==0){
            $res['status']='failure';
            $res['count']='0';
        $res['message']='No Products Found';
        return $res;
        }
        
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
    function getOfferProductList($cid,$scid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,pname,pprice,pdesc,pimage from offers where cid='%s' and scid='%s'",  mysql_real_escape_string($cid),  mysql_real_escape_string($scid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='success';
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['pname'];
            $a[$i]['pprice']=$row['pprice'];
            $a[$i]['pdesc']=$row['pdesc'];
            $a[$i]['pimage']=$row['pimage'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
    
    
    function getAllOfferProductList(){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,pname,pimage,pprice,pdesc from offers ");
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='success';
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['pname'];
            $a[$i]['pimage']=$row['pimage'];
            $a[$i]['pprice']=$row['pprice'];
            $a[$i]['pdesc']=$row['pdesc'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
    function getAllOfferProductListforSlide(){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pid,pname,pimage,pdesc from offers ");
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='success';
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
            
            $a[$i]['pid']=$row['pid'];
            $a[$i]['pname']=$row['pname'];
            $a[$i]['pimage']=$row['pimage'];
            $a[$i]['pdesc']=$row['pdesc'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
    function getProductDescribtion($pid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select name,price,description,image from products where pid='%s'",  mysql_real_escape_string($pid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='success';
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while ($row=mysql_fetch_assoc($resul)){
        $a[$i]['pname']=$row['name'];
        $a[$i]['pprice']=$row['price'];
        $a[$i]['pdesc']=$row['description'];
        $a[$i]['pimage']=$row['image'];
        $i++;
        }
        
           
       
        $res['status']='success';
        $res['message']=$a;
        
        return $res; 
    }
    function getOfferProductDescribtion($opid){
        if(!$this->AdminDB()){
          $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;  
        }
       $selectquery=  sprintf("select pname,pprice,pdesc,pimage from offers where pid='%s'",  mysql_real_escape_string($opid));
        
       $resul=  mysql_query($selectquery);
        if(!$resul){
            $res['status']='failure';
            $res['message']="Error with Query".$selectquery;
            return $res;
        }
        $numrows=  mysql_num_rows($resul);
        if($numrows==0){
          $res['status']='failure';
          
        $res['message']='No Products Found';
        return $res;
        }
        $i=0;
        while($row=mysql_fetch_assoc($resul)){
         
            $a[$i]['pname']=$row['pname'];
            $a[$i]['pprice']=$row['pprice'];
            $a[$i]['pdesc']=$row['pdesc'];
            $a[$i]['pimage']=$row['pimage'];
            $i++;
        }
        $res['status']='success';
        $res['message']=$a;
        $res['count']=$numrows;
        return $res; 
    }
}
?>
