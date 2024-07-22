<?php
require_once 'begin.php';
require_once 'Database.php';

require_once 'pages.php';
session_start();
if(!empty($_SESSION['felhasználónév']))
{
    header('location: index.php');
}
else
{

    session_destroy();
}


if(isset($_POST['submit']))
    {
        $errors= array();
        $true = true;
        if(empty($_POST['felhasználónév']))
        {
            $true = false;
            array_push($errors, "Kérjük, adja meg felhasználónevét!");
        }
        if(empty($_POST['jelszó']))
        {
            $true = false;
            array_push($errors, "Kérjük, adjon meg egy jelszót!");
        }
        if($true)
        {
            $username= $_POST['felhasználónév'];
            $password= $_POST['jelszó'];
            $password= md5($password);

            $sql= "SELECT *FROM users WHERE username= '$username' AND password='$password'";
            $query = $db->query($sql);
           
            if($query->RowCount() >0)
            {   
                session_start();
                $_SESSION['felhasználónév'] = "'$username'";
                header('location: index.php');
            }
            else
            {
                array_push($errors, "A felhasználónév és/vagy a jelszó nem megfelelő!");
            }
        }
    }

?>
<html>
<head>

</head>
<body>
<header class="belep">
   <img src="Picture/logom.png" alt="Logo">  </header> 
    
    
<main> 
   

  
                <form class="login"  name="form"action="belepes.php" method ="POST"  enctype="multipart/form-data">
                <input type="hidden" value=""  name="userid"/><br>
                    Felhasználónév*<br><input type="text" required name="felhasználónév"/><br>
                    Jelszó*<br><input type="password" required name="jelszó"/><br>
                    <input value="Bejelentkezés" type="submit" name="submit"/>
                
                </form>
            
            <div class="psw">Elfelejtette a <a href="elfelejtett.php">jelszavát?</a></div>
              
             
            <?php
            if(!empty($errors))
            {
                foreach($errors as $key)
                {
                   echo ''.$key.' <br>';
                }
            }
            ?>
        </main>
        <footer class="labresz">
    <p>Mindenünk az állatok!</p>
    </footer></body>

</html>