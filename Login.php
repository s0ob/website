<html>
    <?php

include_once 'mysqli_connect.php';

require 'header.php';

if(isset($_SESSION['login_user'])!="")
{
	header("Location: Home.php");
	exit;
}

if(isset($_POST['login']))
{
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));

	$query="SELECT *FROM userregister WHERE email='$email' and password='$password'";
	
$result=mysqli_query( $MySQLi_CON,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);


// If the result is matched with $email and $password, table row must be 1 row\\
if($count==1)
{

$_SESSION['login_user']=$email;
header("location: Home.php");
}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp;email or password does not exists !
				</div>";
	}
	
	$MySQLi_CON->close();
	
}
?>
    <head>
        <script src="login.js"></script>
        
        <title>Login</title>
    </head>
    <body class="loginback">
        <div id="wrapper">
            <div class="modal" id="login-modal">
				
		<div class="loginmodal-container">
                   <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
                    

		   <h1>Login to Your Account</h1><br>
                   <form  id="login" action="Login.php" method="post" toggle="validator" onsubmit="return checkForm(this)" >
			  <input type="text" name="email" placeholder="E-mail">
			  <input type="password" name="password" placeholder="Password">
			  <input type="submit" name="login" class="login loginmodal-submit" value="Login">
		        </form>
			      <div class="login-help">
                                  <a href="Register.php">Register</a>  <a href="#">Forgot Password?</a>
			      </div>
				</div>
			</div>
		  </div>
            
           
          <?php
        require 'footer.php';
        ?>  
        </div>
    </body>
</html>