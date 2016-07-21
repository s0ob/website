<html>
    <?php
if(isset($_SESSION['login_user'])!="")
{
	header("Location: Home.php");
}
include_once 'mysqli_connect.php';

if(isset($_POST['submit']))
{
	$name = $MySQLi_CON->real_escape_string(trim($_POST['name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	

	
	$check_name = $MySQLi_CON->query("SELECT name FROM userregister WHERE name='$name'");
        $check_email = $MySQLi_CON->query("SELECT email FROM userregister WHERE email='$email'");
	$count=$check_name->num_rows;
        $count1=$check_email->num_rows;
	
	if($count==0 && $count1==0){
		
		
		$query = "INSERT INTO userregister(name,email,password) VALUES('$name','$email','$password')";

		
		if($MySQLi_CON->query($query))
		{
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}
		else
		{
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
	}
	else{
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	
	$MySQLi_CON->close();
}
?>


    <head>
        <?php
        require('header.php');
        
        ?>
        <title>Register</title>
        <script src="register.js"></script>
    </head>
    <body id="Resgister">
        <div id="wrapper">
            <div id="registerform">
                <div><h2> Register</h2></div>
                <?php if(isset($msg)) {
                    echo$msg;
                }
                ?>
            <form id="register"  action="" method="post" data-toggle="validator" onsubmit="return checkForm(this)" >
                <p>Name <input type="text" name="name" size="30" /></p>
                <p>Email Address: <input type="text" name="email" size="30" /></p>
                <p>Password: <input type="password" name="password" size="20"></p>
                <p>Confirm Password: <input type="password" name="confirm" size="20"></p>
                    <div id="registersumbit">
                    <input type="submit" name="submit" value="Submit" size="20"/>
                </div>
                    </form> 
        </div>
        </div>
            
          <?php
        require 'footer.php';
        ?>  
        
         
    </body>
</html>