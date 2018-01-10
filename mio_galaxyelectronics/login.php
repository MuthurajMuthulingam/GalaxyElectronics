<?
include_once './admin/Activity.php';
include_once './includes/header.php';
$activity=new Activity();

$error = "";
if (isset($_REQUEST['submit'])) {
    if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
        $response=$activity->login($_REQUEST['username'],$_REQUEST['password']);
        if ($response['status']=='success') {
            $error="login success";
            header("location: ./admin/addCatagory.php");
        } else {
            $error = "Username or Password Incorrect";
        }
    } else {
        $error = "Please Enter Username and Password";
    }
}  else {
  //$error="Submit not set";    
}
?>
<div id="content_container" class="group">
    <div id="container" class="group sidebar-left">

        <div id="content" role="main">
            <article id="post-44" class="post-44 page type-page status-publish hentry group instock">
                <header class="page-header">
<? echo $error; ?>
                    <h1 class="entry-title">Login</h1>
                </header>
                <div class="entry-content">
                    <div class="wpcf7" id="wpcf7-f5-p44-o1">
                        <form action="" method="post" class="wpcf7-form" novalidate="novalidate">
                            
                            <p>Your Username<br />
                                <span class="wpcf7-form-control-wrap your-name"><input type="text" name="username" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" /></span> </p>
                            <p>Your Password<br />
                                <span class="wpcf7-form-control-wrap your-name"><input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" /></span> </p>

                            <p><input type="submit" name="submit" value="Login" class="wpcf7-form-control wpcf7-submit" /></p>
                            <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>

                </div><!-- .entry-content -->
            </article><!-- #post-## -->


        </div><!-- #content -->

    </div><!-- #container -->
</div><!--close content_container-->
