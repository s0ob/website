<html>
    <head>
       <?php
       require 'header.php';
       ?>
        <title>Change Password</title>
    </head>
    <body>
        <h1 id="chgpassh">Change Your Password:</h1>
        <form id="chgpassf" action='changepass.php' method='POST'>
	<table id="chgpasstable">
		<tbody>
			<tr>
				<td>Current Password: </td><td><input type='password' name='currPass' /></td>
			</tr>
			<tr>
				<td>New Password: </td><td><input type='password' name='newPass' /></td>
			</tr>
			<tr>
				<td></td><td><input type='submit' value='Change Password' name='changePass' /></td>
			</tr>
		</tbody>
	</table>
</form>
<?php
include_once("mysqli_connect.php");
if (isSet($_POST['changePass']) && isSet($_POST['newPass']) && isSet($_POST['currPass']) && $_POST['currPass'] != '' && $_POST['newPass'] != '') {
	$new = $_POST['newPass'];
	$new = $new;
	$curr = $_POST['currPass'];
	$curr = $curr;
	$email = $_SESSION['login_user'];
	$res ="SELECT * FROM userregister where email='$email' ";
                  $result=mysqli_query($MySQLi_CON,$res);
	if (mysqli_num_rows($result) > 0) {
		$info = mysqli_fetch_array($result);
		if ($info['password'] == $curr) {
			$qq = mysqli_query($MySQLi_CON, "UPDATE `userregister` SET `password`='$new' WHERE `email`='$email'");
                                                       
			if ($qq) {
                                echo 'Updated password!';
                                header('userpro.php');
                                
                                
			}else
				echo '<p id=chgpassp>Failed to update your password.<p>';
		}else
			echo '<p id=chgpassp>Your entered current password was not correct. Please try again.<p>';
	}else
		echo '<p id=chgpassp>Your username was not found in our users database!<p>';
}
?>
    </body>
    <?php
require 'footer.php';
    ?>
</html>