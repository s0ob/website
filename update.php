<html>
    <head>
        
<?php
require 'header.php';
include_once 'mysqli_connect.php';
?>
<title>Update Info</title>
</head>   
<body>
    <div class="update-container">
<h1 id="uinfo">Update Info!</h1>
        <form id="upinfo" action='update.php' method='POST'>
	<table id="chginfotable">
            <tbody>
			<tr>
				<td>Current Name: </td><td><input type='text' name='currName' /></td>
			</tr>
			<tr>
				<td>New Name: </td><td><input type='text' name='newName' /></td>
			</tr>
			<tr>
				<td></td><td><input type='submit' value='Change Name' name='changeNew' id="change" /></td>
			</tr>
		</tbody>
	</table>
</form>
    </div>
<?php
include_once("mysqli_connect.php");
if (isSet($_POST['changeNew']) && isSet($_POST['newName']) && isSet($_POST['currName']) && $_POST['currName'] != '' && $_POST['newName'] != '') {
	$new = $_POST['newName'];
	$new = $new;
	$curr = $_POST['currName'];
	$curr = $curr;
	$email = $_SESSION['login_user'];
	$res ="SELECT * FROM userregister where email='$email' ";
                  $result=mysqli_query($MySQLi_CON,$res);
	if (mysqli_num_rows($result) > 0) {
		$info = mysqli_fetch_array($result);
		if ($info['name'] == $curr) {
			$qq = mysqli_query($MySQLi_CON, "UPDATE `userregister` SET `name`='$new' WHERE `email`='$email'");
                                                           
			if ($qq) {
                                echo 'Info Updated !';
                                header('userpro.php');      
			}else
				echo '<p id=chgpassp>Failed to update your Info.<p>';
		}else
			echo '<p id=chgpassp>Your entered current name was not correct. Please try again.<p>';
	}else
		echo '<p id=chgpassp>Your name was not found in our users database!<p>';
}
?>
<?php
require'footer.php';
?>
</body>
</html>