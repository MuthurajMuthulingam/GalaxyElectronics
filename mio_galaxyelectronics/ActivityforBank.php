<?php
class Activity{
    var  $dbserver;
    var  $dbuser;
    var  $dbpassword;
    var  $dbname;

    function __construct() {
        //localhost
        /*$this->dbname='galaxyelectronics';
        $this->dbserver='localhost';
        $this->dbuser='root';
        $this->dbpassword='';*/
         //Server
        $this->dbname='galaxyelectronic';
        $this->dbserver='118.139.168.68';
        $this->dbuser='galaxyelectronic';
        $this->dbpassword='Galaxy@6898';
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
    function logintobank($username,$password){
        if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        }
        $insertquer=  sprintf("select * from bank_user where username='%s' and password='%s'",  mysql_real_escape_string($username),  mysql_real_escape_string($password));
               
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
        $i=0;
        $a=array();
        while($row=mysql_fetch_assoc($result)){
            
            $a[$i]['acc_no']=$row['acc'];
            $a[$i]['name']=$row['name'];
            $a[$i]['balance']=$row['balance'];
            
            $i++;
        }
        
        $res['status']='success';
        $res['message']=$a;
            return $res;
    }
    function tranfer($amt,$pin,$balance,$accNo){
         if(!$this->AdminDB()){
            $res['status']='failure';
            $res['message']="Error with Db login";
            return $res;
        }
        $balanceofdebit=((int)$balance)-((int)$amt);
        $updatequerty1=  sprintf("update bank_user set balance='%s' where acc_no='%s' and pin=''",$balanceofdebit,  mysql_real_escape_string($accNo));
        $res_update1=  mysql_query($updatequerty1);
        if(!$res_update1){
            $res['status']='failure';
            $res['message']="Error with Query".$updatequerty1;
            return $res;
        }
        
        $select=  sprintf("select balance from bank_user where acc_no='2'");
        $result=  mysql_query($select) or die(mysql_error());
        $balance= mysql_fetch_array($result,0);
        
        $balanceofcredit=((int)$balance)+((int)$amt);
        $updatequerty2=  sprintf("update bank_user set balance='%s' where acc_no='2'",$balanceofcredit);
        $res_update2=  mysql_query($updatequerty1);
        if(!$res_update2){
            $res['status']='failure';
            $res['message']="Error with Query".$updatequerty2;
            return $res;
        }
        $select2=  sprintf("select balance from bank_user where acc_no='2'");
        $result2=  mysql_query($select2) or die(mysql_error());
        $balance2= mysql_fetch_array($result2,0);
        $res['status']='success';
        $res['message']="";
        $res['balance']=$balance2;
            return $res;
    }
}
?>
