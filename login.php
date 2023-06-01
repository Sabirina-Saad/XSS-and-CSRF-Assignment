

<?php
           include('database.php');
           
           if ($_POST){

            $username = mysqli_real_escape_string($conn, $_POST['Username']);  // mysqli_real-escape_string is used to esacpe special characters in sql queries 
            $password = mysqli_real_escape_string($conn, $_POST['password']);
          
            $username = htmlspecialchars($username);
            $password = htmlspecialchars($password);// encodes special characters and preventes it to be viewed as code in the browser 

            $sql="SELECT * from users where username=$username and password= $password_hash";
            $result= mysqli_query($conn,$sql)or die("Error in data retrival");
            if(mysqli_num_rows($result)>0){
                $rows = $mysqli_fetch_assoc($result);
                $_SESSION['sessionId'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("location:index.php");
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
            }
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
        <form id="login" method="post" action="student.php"  >
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
            <button type="submit" name="submit" style=" background-color: #3f5abc;">LOGIN</button> 
            </form>
            </div>
            
</body>
</html>