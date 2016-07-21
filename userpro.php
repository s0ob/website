<html>
    <head>
        <title>User Profile</title>
      <?php
require 'header.php';
include_once 'mysqli_connect.php';
?>  
    </head>
    <body>
        <?php
        if(isset($_SESSION['login_user'])){
        
        $query="SELECT name,email,password FROM userregister";
        $result=mysqli_query($MySQLi_CON,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        }
        ?>
        <div>
            <h1 id="userprofileh">User Profile</h1>
            <form method="get" class="profilef" id="userprofile">
                <h2>Name</h2><br>
                <p><?php echo $row['name']?></p><br>
                <h2>Email</h2><br>
                <p><?php echo $row['email']?></p><br>
                <h2>Password</h2><br>
                <p><?php echo $row['password']?></p><br>
                
                <a href="changepass.php">Change password</a><a id="update" href="update.php">Update Info</a>
        
            </form>
        </div>
       
        <?php
require 'footer.php';
        ?>
    </body>
</html>

