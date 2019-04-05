<?php
require_once('./header.php'); 
require_once('./UserDAO.php');

session_start();

if(isset($_SESSION['AdminID']) && isset($_SESSION['AdminLevel'])){
    if($_SESSION['AdminID']->isAuthenticated()){
        session_write_close();
        header('Location:intenal.php');
    }
}

$is_submitted = false;
	
// check whether the form needs validation or not
if (isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["password"])) {
		
	$is_submitted = true;
		
	// Initialize error array by each field	
	$error = array( 'username'=>false, 'password'=>false ); 
	$emsg = array( 'username'=>'', 'password'=>'' );
		
	$username = $_POST["username"];
	$password = $_POST["password"];	
	
    // Check for a valid user name
  	if (empty($username)) {
		$emsg['username'] = 'You forgot to enter USER name.';
		$error['username'] = true;
	}
	// Check for a valid password
	if (empty($password)) {
		$emsg['password'] = 'You forgot to enter PASSWORD.';
		$error['password'] = true;
	}
	
	// check if there are some errors
	$errcount = 0;
	foreach ($error as $er) {
		if ($er == true) {
			$errcount++;
			break;
		}
	}

	if ($errcount == 0) {
		$userDAO = new UserDAO();
		if(!$userDAO->hasDbError()){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$userDAO->authenticate($username, $password);
			if($userDAO->isAuthenticated()){
				$_SESSION['AdminID'] = $userDAO->getAdminID();
				$_SESSION['AdminLevel'] = $userDAO->getAdminLevel();
				header('Location:internal.php');
			} else {
				$errcount = 1;
				$emsg['username'] = "can't find a user which USER name and PASSWORD match!";
				$error['username'] = true;
			}
		} else {
			$errcount = 1;
			$emsg['username'] = "can't open Database!";
			$error['username'] = true;
		}
    }
}
?>
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <table>
                            <tr>
                                <td style="width: 120px;">User Name:</td>
                                <td><input type="text" 
									<?php if ($is_submitted) { if ($error['username']) echo "class='error-input'"; 
									else echo "class='norm-input'"; echo "value='$username'"; }
									else echo "class='norm-input'"; ?> name="username" id="username" size='20'></td>
                            </tr>
                            <tr>
                            	<td></td>
                            	<td><?php if ($is_submitted && $error['username']) echo "<span class='error-text'>" . $emsg['username'] . 
									"</span>"; ?></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password"  
									<?php if ($is_submitted) { if ($error['password']) echo "class='error-input'"; 
									else echo "class='norm-input'"; echo "value='$password'"; }
									else echo "class='norm-input'"; ?> name="password" id="password" size='20'></td>
                            </tr>
                            <tr>
                            	<td></td>
                            	<td><?php if ($is_submitted && $error['password']) echo "<span class='error-text'>" . $emsg['password'] . 
									"</span>"; ?></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input class='myButton' type='submit' name='submit' id='submit' value='Login'>&nbsp;&nbsp;
                                <input class='myButton' type='reset' name='reset' id='reset' value='Reset'></td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
            
<?php 
	include './footer.php'; 
?>
