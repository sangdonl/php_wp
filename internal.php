<?php 
require_once('./header.php'); 
require_once('./UserDAO.php');

session_start();
session_regenerate_id(false);

$id = '';
$level = '';

if(isset($_SESSION['AdminID']) && isset($_SESSION['AdminLevel'])){
// isAuthenticated() does not exist. May be drupal only has.
//   	if(!$_SESSION['AdminID']->isAuthenticated()){
//   		header('Location:login.php'); 
//   	} else {
		$id = $_SESSION['AdminID'];
		$level = $_SESSION['AdminLevel'];
//	}
} else {
   	header('Location:login.php');
}
?>
            <div id="content" class="clearfix">
                <div class="main" style="width: 660px;">
                <?php
					echo "<h2>Admin ID: " . $id . "<br>";
					echo "<h2>Admin Level: " . $level;
       			?>
                </div><!-- End Main -->
            </div><!-- End Content -->
            
<?php  
	include './footer.php'; 
?>