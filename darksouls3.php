<html>
    <head>
        <?php
        require 'header.php';
        include_once 'mysqli_connect.php';
        ?>
        <title>Dark Souls 3</title>
    </head>
    <body>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
                       <div id="wrapper">
			<section>
			<h1>Dark Souls 3</h1>
			<img src="banner2.jpg" />
                        <div id="gamecontent">
			<h2 class="mg">Summary</h2>
                        <p>Set in the Kingdom of Lothric, a bell has rung to signal that the First Flame, responsible for prolonging the Age of Fire, is dying out. As has happened many times before, the coming of the Age of Dark produces the undead, cursed beings that rise up after death. The Age of Fire can be prolonged with the linking of the fires, a ritual in which great lords and heroes sacrifice their souls to kindle the First Flame. Unlike the previous times though, this time the destined undead, Prince Lothric, has abandoned his duty and left the First Flame to die out.</p>
                        <h2 class="mg">Gameplay</h2>
                        <p>Dark Souls 3's gameplay design followed "closely from Dark Souls II". Players are equipped with a variety of weapons to fight against enemies, such as bows, throwable projectiles, and swords. Shields can act as secondary weapons but they are mainly used to deflect enemies' attacks and protect the player from suffering damage. Each weapon has two basic types of attacks, one being a standard attack, and the other being slightly more powerful that can be charged up, similar to FromSoftware's previous game, Bloodborne.</p>
                        </div>
                        <div id="video">
                        <iframe width="600" height="345" src="https://www.youtube.com/embed/_zDZYrIUgKE">
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



