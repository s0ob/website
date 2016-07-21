<html>
    <head>
        <?php
        require 'header.php';
        include_once 'mysqli_connect.php';
        ?>
        <title>DOOM</title>
    </head>
    <body>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
                       <div id="wrapper">
			<section>
			<h1>DOOM</h1>
			<img src="banner3.jpg" />
                        <div id="gamecontent">
			<h2 class="mg">Summary</h2>
                        <p>Doom is set in a research facility on Mars owned by the Union Aerospace Corporation. The director of the facility is Samuel Hayden, whose mind now lives in an android body after he lost his original one to brain cancer. The researchers attempted to draw energy from Hell in order to solve an energy crisis on Earth. This was done with the Argent Tower, which not only siphons energy from Hell, but allows travel to and from there.Hayden has already led multiple expeditions into Hell, bringing back captive demons and artifacts for study. One artifact was a sarcophagus containing the Doom Slayer, whom the demons imprisoned after his rampage through Hell. </p>
                        <h2 class="mg">Gameplay</h2>
                        <p>the game allows players to perform movements such as double-jumps and ledge-climbs. The approach is known as "push-forward combat", which discourages players, playing from the "Doom Slayer"'s perspective, from taking cover behind obstacles or resting to regain health. Players instead collect health and armour pick-ups scattered throughout levels or kill enemies to regain health. "Glory Kills" is a newly introduced melee execution system wherein, when enough damage has been dealt to an enemy, the game will highlight it and allow the player to perform a quick and violent melee takedown.</p>
                        </div>
                        <div id="video">
                        <iframe width="600" height="345" src="https://www.youtube.com/embed/SgSrpnW0EmU">
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

                        





