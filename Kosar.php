<?php
session_start();
require_once 'Elements.php';
require_once 'pages.php';
require_once 'functions.php';
require_once 'Database.php';

if(!empty($_SESSION['felhasználónév']))
{
$_SESSION['felhasználónév'];
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Állatmania</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome5/css/all.css">
    <script src="https://kit.fontawesome.com/915d3dc313.js" crossorigin="anonymous"></script>
    <SCRIPT Language="Javascript">
parent.document.title="Kosár";
</SCRIPT>
</head>

<?php pages_header();?>


       <main> <?php

              $összesen=0;
              $select_cart= "SELECT * FROM kosaram WHERE id= id ";
              $query= $db->prepare($select_cart);
              $query->execute();
              $item = $query->fetchAll(PDO::FETCH_ASSOC);
              
              
            
              if($query->RowCount() > 0)
              {
                while($fetch_cart= $query->fetch(PDO::FETCH_ASSOC))var_dump($query);
                {

                  $select_termek="SELECT * FROM termékek WHERE id= :id";
                  $query=$db->prepare($select_termek);
                  $query->execute([$fetch_cart[$termek_ID]]);
                  $item = $query->fetchAll(PDO::FETCH_ASSOC);

                   if($query->RowCount() > 0)
                  {
                    while($fetch_termek= $query->fetch(PDO::FETCH_ASSOC))
                    {

                  ?>
          <div>     
          <form class="box" method ="POST" action="">
						  <input type="hidden" value="<?= $fetch_termek['id'] ?>"  name=""/><br>
             	<img src="Picture/termek/<?= $fetch_termek['kép'] ?>"class="termekkep" alt="">
					    <h3 class="nev"> <?$fetch_termek['név'] ?> </h3>
           <div class="flex"> 
            	<p class="price"><?$fetch_termek['egységár']?></p>
					 <input class="darab" type="number" value="<?=$fetch_cart['darab']?>" readonly name="darab" maxlength="2" min="1" max="20" required/>
          <button type="submit" class="fas fa-edit" name="update_cart"></button>
          </div>     
              <p class="sub-total"> <?= $sub_total=($fetch_termek['egységár']*$fetch_cart['darab']);?></p>
              <input type="submit" value="sor törlése" class="delete-btn" name="sor_törlese" onlick="return confirm'biztos törli a terméket?')">          
					</form>	
  
            <?php
            $összesen += $sub_total;
                }}
                else{
                  echo'<p class="empty"> A kosarad üres!!</p>';
                    }
                  }
                }
                else
                { 
                  echo'<p class="empty"> A kosarad üres!!</p>';
                }               
?>
        </div>
        <?php if($összesen != 0) 
        {?>
            <div class="összesen">
              <p>Összesen: <span><?= $összesen ?></span></p>
              <a href="checkout.php">Fizetés</a>
              <form action="" method="POST">
                <input type="submit" name="" value="Üres kosár" id="" onclick="return confirm('Biztos törli a kosár tarlamát?');">
              </form>
            </div>
        <?php } ?>


















































       </main> </body> 
       
        