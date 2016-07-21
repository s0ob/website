<?php
require 'header.php';
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "userinfo";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
$search=$_POST['search'];
$query = $pdo->prepare("select * from search where title LIKE '%$search%' LIMIT 0 , 10");//get the data from database that similar to user search\\
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
// Display user search result\\
         if (!$query->rowCount() == 0) {
             ?>
		 <h2 id="resul">Search Result</h2>		        
             		<?php	
            while ($results = $query->fetch()) {
                 ?>
        
        
         <div id="result">
          <div class="row">
            <div class="col-md-4 portfolio-item">
<a href=<?php echo $results['url']; ?>><b> <?php echo $results['title']; ?></b></a><br>
<h3> <?php echo $results['description']; ?></h3><hr>
</div>
          </div>
         </div>
<?php					
        }
        }
        else{
        $email = $MySQLi_CON->real_escape_string(trim($_SESSION['login_user']));
$res ="SELECT * FROM userregister where email='$email' ";
$result=mysqli_query( $MySQLi_CON,$res);
$row=mysqli_fetch_array($result);
       
echo "<script>
alert('Nothing Found');
window.location.href='Home.php';
</script>";
        }
?>
<?php
?>
