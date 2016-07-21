<html>
    <head>
        <?php
        session_start();
         ?>
        <link rel="stylesheet" href="css.css" />
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/default/default.css" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src="jquery.nivo.slider.pack.js" type="text/javascript"></script>
                
    </head>
<body id="home">
		<div id="wrapper">
		
			<!--__--__--__--__--__--  L O G O  &   N A V    B A R --__--___--__--__--__-->
			<header>
				<div id="logo">
                                    <h1><a href="Home.php">Frost</a></h1>
				</div>
				<nav>
					<ul>
                                            <li><span><a href="Home.php" id="homenav">Home</a></span></li>
                                                <li><span><a href="News.php" id="blognav">News</a></span></li>
						<li><span><a href="Review.php" id="fullwidthnav">Review</a></span></li>
						<li><span><a href="Games.php">Games</a></span></li>
                                                <li><form action="search.php" class="navbar-form" role="search" method="post">
                                                      <div class="form-group">
                                                          <input type="text" class="form-control" name="search" placeholder="Search">
                                                      <button type="submit" name="submit" class="search">Search</button>
                                                       </div></form></li>
                                                 <?php
                            if(isset($_SESSION['login_user'])){
         $login_session=$_SESSION['login_user'];
	echo '<li ><a href="userpro.php" id="welcome">'."My Profile".'</a>'.'</li>'.'<li>'.'<a>'.'|'.'</a>'.'</li>'
                 .'<li><a href="logout.php">Logout</a>'.'</li>';
        
	}
        else{
           echo '<li><a href="login.php">Login</a>'.'</li>'.'<li>'.'<a>'.'|'.'</a>'.'</li>'
                   . '<li><a href="register.php">Register</a>'.'</li>';
        }
      
	?>           
					</ul>
                                    
				</nav>
                           
            
        }
			</header>
                </div>
    
    <div id="headerhr">
    <hr>
    </div>
 </body>
 </html>

