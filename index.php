
<?php
header("Content-Security-Policy: default-src https: object-src 'none' base-uri 'none' script-src 'unsafe-inline' img-src 'self' https://; ");      // defines assests to be loaded over https from any origin 
//object-src : defines where protected resource can load plugins and its set to none where it blocks use of plugin resource 
//base-uri blocks injection of base tags where it prevents attacker to change location of scripts from relative URLs
//sript-src inline scripts will be allowedd but external scripts will be blocked 
//img-src allows images from the same origin and external https website 
?>
<?php

           include ('database.php');
           $username = mysqli_real_escape_string($conn, $_POST['Username']);  // mysqli_real-escape_string is used to esacpe special characters in sql queries 
           $password = mysqli_real_escape_string($conn, $_POST['password']);
          $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
    
if ($_SESSION['csrf_token']) {
    if($password == $confirm_password){
        $password_hash = hash('sha256', $password);
        $password=$password_hash;

        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);// encodes special characters and preventes it to be viewed as code in the browser 
    $confirm_password = htmlspecialchars($confirm_password);

    $sql = "INSERT INTO users (username,password) VALUES ('$username, '$password)";

    if (mysqli_query($conn, $sql)) {
        echo'<p style="color:green;text-align:center;">Account successfully created</p>';

    }
    else{
        echo'<p style="color:red;text-align:center;">password does not match</p>';
    }
}
$csrfToken = $_SESSION['csrf_token'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .login{
        width: 382px;
        overflow: hidden;
        margin: auto;
        margin: 20 0 0 450px;
        padding: 80px;
        background: #9884f1;
        border-radius: 15px ;

}
    </style>
    <div class="login">
        <h2>Create Account</h2>
        <form id="login" method="post" action="login.php"  >
            <label><b>User Name
            </b>
            </label>
            <input type="email" name="Username"  placeholder="Username">
            <br><br>
            <label><b>Password
            </b>
            </label>
            <input type="Password" name="password"  placeholder="Password">
            <br><br>
            <label><b>Confirm password
            </b>
            </label>
            <input type="Password" name="confirm_password"  placeholder="Confirm Password">
            <br><br>
            <button type="submit" name="submit" style=" background-color: #3f5abc;">Signup</button> 
            </form>
            <p>Already have Account<a href="login.php"> login here</a></p>
            </div>
            
</body>
</html>