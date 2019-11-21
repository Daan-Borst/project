<?php 
    include($_SERVER['DOCUMENT_ROOT']."/bin/db.php");
    if(isset($_SESSION['username'])){session_destroy();die();}
    require($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_heading.xml");
    include($_SERVER['DOCUMENT_ROOT']."/pages/_includes/_navbarsmall.php");
?>

<html>
    <head>
        <title><?php echo($WebName) ?> - Login</title>
    </head>
    <body style="background:white">
        <div class=wrapper>
            <form class="loginform" method="post" action="login">
                <input type="text" id="email" name="email" placeholder="Voer uw Email in." required/>
                <input type="submit" class="login" name="sendresettoken" value="Verstuur"/><br/>
                <label class="awrap">
            </form>
        </div>
    </body>

</html>