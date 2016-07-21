<html>
    <head>
        <?php
        require 'header.php';
        include_once 'mysqli_connect.php';
        ?>
        <title>Dishonored 2</title>
    </head>
    <body>
<!--__--__--__--__--  M A I N   C O N T E N T  --__--__--__--___--__--__-->
                       <div id="wrapper">
			<section>
			<h1>Dishonored 2</h1>
			<img src="banner1.jpg" />
                        <div id="gamecontent">
			<h2 class="mg">Summary</h2>
                        <p> Fifteen years after the Dunwall Plague, the Empire begins to plunge into chaos after Empress Emily Kaldwin is suddenly dethroned by an "otherworldly usurper",and becomes an outlaw to society. Determined to claim it back, Emily follows in the steps of her royal protector and father, Corvo Attano, by becoming an assassin. Bearing the Outsider's mark - a mysterious mark granted by a mythic being that grants her supernatural and otherwordly powers - and an array of weapons and gadgets, she intends to reclaim her title and restore power to what has been lost.</p>
                        <h2 class="mg">Gameplay</h2>
                        <p>After playing as Empress Emily Kaldwin during the prologue of Dishonored 2, players can decide to play either as Kaldwin or as Corvo Attano (the protagonist from the previous game). Players can choose whether to play stealthily or not, and can finish the game without killing. Dishonored 2 introduces non-lethal combat moves, and features the "chaos" system used in the first game. The amount of chaos accrued affects the dialogue used by Emily and Corvo, as well as the general world itself.Insects called "bloodflies" make nests in corpses, leading to an increase in bloodflies the more people are killed and encouraging the player to hide bodies from them.</p>
                        </div>
                        <div id="video">
                        <iframe width="600" height="345" src="https://www.youtube.com/embed/l1jyUAtxh-8">
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
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Error cannot comment !
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

