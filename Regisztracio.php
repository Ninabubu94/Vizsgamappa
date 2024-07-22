<?php
    require_once 'begin.php';
    require_once 'Database.php';
    require_once 'Elements.php';
    require_once 'pages.php';

    

    if(isset($_POST['submit']))
    {
        $errors= array();
        $true = true;
        if(empty($_POST['felhasználónév']))
        {
            $true = false;
            array_push($errors, "Kérjük, adja meg felhasználónevét!");
        }
        else{
        
           if(!preg_match("/^[a-zA-Z-0-9'-. ]*$/", $_POST['felhasználónév'])) {
                array_push($errors, "A felhasználónév csak betűt és szóközt tartalmazhat!");
            }}
        if(empty($_POST['email']))
        {
            $true = false;
            array_push($errors, "Kérjük, adjon meg egy érvényes e-mail-címet!");
        }
        else
        {
            $email = ($_POST['email']);
    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Érvénytelen e-mail cím formátum!");
            }
        }
        if(empty($_POST['jelszó']))
        {
            $true = false;
            array_push($errors, "Kérjük, adjon meg egy jelszót!");
        }
        if(empty($_POST['jelszó2']))
        {
            $true = false;
            array_push($errors, "Kérjük, erősítse meg  jelszavát!");
        }
        if(!($_POST['jelszó'] == $_POST['jelszó2']))
        {
            $true = false;
            array_push($errors, "A jelszavak nem egyeznek!");
        }
       

        if($true)
        {
            $username= trim( $_POST['felhasználónév']);
            $password= $_POST['jelszó'];
            $email=$_POST['email'];
            $password= md5($password);           

            $sql  = "INSERT INTO users(username, email, password, date)  VALUES  ('$username','$email', '$password', NOW())";
            $query = $db->query($sql);
            
            if($query->rowCount()>0)
            {
		   session_start();
           $_SESSION['felhasználónév'] = "$username, Üdvözöljük a webáruházunkban!";
           header('location: index.php');}
        } 
        
    }
 
?>
   <html>
<head>

</head>
<body>
   <header class="regis">
   <img src="Picture/logom.png" alt="Logo">  </header> 
    
        <main>  
            <form class="reg" method ="POST" action="regisztracio.php" >   

                    Felhasználónév *<br><input type="text"  required maxlength="25" name="felhasználónév"/><br>
                    E-mail cím *<br><input type="email" required maxlength="35" name="email"/><br>
                    Jelszó *<br><input type="password"required maxlength="25" name="jelszó"/><br>
                    Jelszó újra *<br><input type="password" required maxlength="25" name="jelszó2"/><br>
                    <p class="vedelem">
                    <input type="checkbox" name="ÁSZF" id="ÁSZF" value="igen" required>
                    <label for="ÁSZF">Elolvastam és elfogadom az Állatmánia.hu webáruház <a href="Feltetelek.php">Általános szerződési feltételeit</a> és <a href="Adatkezeles.php">Adatvédelmi szabályzatát</a> * </label>
                     </p>
                    <input class=""value="Regisztráció" type="submit" name="submit"/>

            </form>
          
        </main> 
        <footer class="register">
    <p>Mindenünk az állatok!</p>
    </footer></body> 
        <?php

        if( !empty($errors))
        {
            foreach($errors as $key)
            {
                echo ''.$key.' <br>';
            }
        }
        ?>
