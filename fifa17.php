<html>
    <head>
        <?php
        require 'header.php';
        include_once 'mysqli_connect.php';
        ?>
        <title>FIFA 17</title>
    </head>
    <body>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
                       <div id="wrapper">
			<section>
			<h1>FIFA 17</h1>
                        <div id="gamecontent">
			<img src="banner4.jpg" />
			<h2 class="mg">Summary</h2>
                        <p>Alex Hunter is a 17-year-old multiracial male from humble beginnings in Clapham, London. Hunter's grandfather is a former English striker Jim Hunter (20 goals in the 1966–67 season). Under his grandfather's guidance, Hunter has decided to play as a footballer in the Premier League.</p>
                        <h2 class="mg">Gameplay</h2>
                        <p> EA Sports announced at E3 2016 that they will have all 20 Premier League managers' likenesses in the game (face scan, etc.).The game will also feature a new single player story campaign mode titled The Journey (similar to MyCareer mode in NBA 2K), where players assume the role of Alex Hunter, a young footballer trying to make his mark in the Premier League. The player will be able to select one of 20 Premier League clubs to play for at the beginning of the season. The story mode also features a dialogue wheel.</p>
                        </div>
                        <div id="video">
                        <iframe width="600" height="345" src="https://www.youtube.com/embed/P9LHzVEPodg">
                        </iframe> 
                        </div>
			</section>
                       </div>

                        <div id="commentarea">
    <form action="" id="comment" method="post">
    <textarea id="textarea" cols="100" rows="2" name="comment" placeholder="comment.........."></textarea>
    <input type='hidden' name='id' id='articleid' value='<?php echo $_GET["id"]; ?>' /><br>          
    <input type="submit" name="submit" id="commentsubmit"/>
</form>
</div>
<?php
   if(isset($_POST['submit']))
           {
                    if(isset($_SESSION['login_user']) )
	{
             
             $comment = $MySQLi_CON->real_escape_string(trim($_POST['comment']));
              $name = $MySQLi_CON->real_escape_string(trim($_SESSION['login_user']));
                $articleid = $_GET['id'];
	$query = "INSERT INTO comments(name,comment,postid) VALUES( '$name','$comment',$articleid)";
        if($MySQLi_CON->query($query))
		{
          $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Thank you for the comment!
					</div>";
            
        }
        else{
            $msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; cannot comment !
				</div>";
        }  
           }
        }
            if(!isset($_SESSION['login_user']) &&(isset($_POST['submit'])))
           {
	{
                   echo "<script>
alert('Login Your Account to comments');
window.location.href='Login.php';
</script>";
	  
	}
        }
     
     ?>   
<hr id="hrcomment">
        <div id="usercomment">
       <p><?php echo $name ?></p>
       <p><?php echo $comment ?></p>
        </div>
                        <?php
                        require'footer.php';
                        ?>

    </body>
</html>






