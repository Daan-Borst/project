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
                <input type="text" id="username/email" name="username/email" placeholder="Email of Gebruikersnaam" required/>
                <input type="password" id="password" name="password" placeholder="Wachtwoord" maxlength="16" required/>
                <label class="containere"><input type="checkbox" id="rememberme" name="rememberme" checked="checked"><span class="checkmark"></span></label> 
                <label class="xy2">Mij onthouden</label>
                <input type="submit" class="login" name="login_user" value="Login"/><br/>
                <label class="awrap">
                <a class="forgotlabel" href="forgot">Wachtwoord Vergeten?</a></label>
            </form>
            <label class=vontainer>
            <label class="xy1">Nog geen account?</label><br/>
            <a class="buttonnoac" href="/register">Maak een nieuwe account aan.</a></label>
        </div>
    </body>

</html>