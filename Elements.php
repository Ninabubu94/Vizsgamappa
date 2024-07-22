<?php

function pages_header()
{echo'<header class="kezdolap">
		
	<nav class="header">
		<div class="logo">
			
			<img src="Picture/logom.png" alt="Állatmánia logo"> 
			
	 </div><span class="regis">';
	
	 echo '  </span> 
			
	 <ul>
	 <li>
				<a href="index.php"><i class="fa-solid fa-house fa-2xl" style="color: #f58eaa;"></i></a>';
				
				if(!empty($_SESSION['felhasználónév']))
					{
				   echo '<a href="kijelentkezes.php"><button >
					<span> Kijelentkezés </span>
				</button></a>';
					}
					else
					{
						echo '<a href="belepes.php"><button >
						<span> Belépés </span>
					</button></a>
					<a href="Regisztracio.php"><button >
						<span> Regisztráció </span>
					</button></a>';
					}
					echo'</li>
					</ul>
				</nav>';
           
       navigation();
	  }
 
function page_header()
{   
	echo'<header class="kezdolap">
		
        <nav class="header">
            <div class="logo">
                
				<img src="Picture/logom.png" alt="Állatmánia logo"> 
				</div>        
		 <ul>
		 <li>
                    <a class ="home" href="index.php"><i class="fa-solid fa-house fa-2xl" style="color: #f58eaa;"></i></a>';
                    
					
                    if(!empty($_SESSION['felhasználónév']))
						{
   					echo '<a href="kijelentkezes.php"><button >
                        <span> Kijelentkezés </span>
                    </button></a>';
						}
						else
						{
							echo '<a href="belepes.php"><button >
							<span> Belépés </span>
						</button></a>
						<a href="Regisztracio.php"><button >
							<span> Regisztráció </span>
						</button></a>';
						}


						
            echo'</li>
            </ul>
        </nav>';
		
     
       navigation();
       
       echo '</header>';
}
function navigation()
{
	echo '<div class="contiener">
			<ul class="menu">';
			$categories = get_categories();
			foreach($categories as $item)
			{
				echo'<li><a href="?page=kategoria&id='.$item['id'].'">'.$item['name'].'</a>';
			
			}			
			 echo'</li></ul>
			<div style="clear both"> </div>
		 </div>';	
  }

function page_footer()
{
	echo'<footer>
        <div class = "inside">
            <section><h3>Információk</h3></section>
            <section><h3>Biztonság</h3></section>
            <section><h3>Kövess minket!</h3></section>
            <section><h3>Legyél VIP tag!</h3></section>
        </div>
        <div class="packet">
          <section class="page">
                  <a href="Adatkezeles.php">Személyes adatok kezelése</a>
                  <a href="Rolunk.php">Rólunk</a>
                  <a href=""></a>
                  <a href="GYIK.php">GY.I.K.</a>
                  <a href="Szallitasiinfo.php">Szállítási információk</a>
                  <a href="Feltetelek.php">Általános szerződési feltételek</a>
                  <a href="velemenyek.php">Vélemyények</a>
                  <a href="Kapcsolat.php">Kapcsolat</a>
          </section>
          <section class="safes">
            <img src="Picture/ittvasarolhatsz_logo_500_kor.png" alt="biztonságos oldal">
            
          </section>
          <section class="kovess">
           <a href="https://www.instagram.com/" target="_blank">
           <i class="fa-brands fa-instagram fa-2xl"></i>
           </a>
           <a href="https://www.facebook.com/"target="_blank">
           <i class="fa-brands fa-facebook fa-2xl"></i>
           </a>
           <a href="https://www.tiktok.com/"target="_blank">
           <i class="fa-brands fa-tiktok fa-2xl"></i>
           </a>
          </section>
          <section class="hirlevel">
            <p><strong>Iratkozz fel!</strong></p>';
  
     
  feliratkozas();
  echo '<div><a name="input"></a>
        <form action="" method="post">

        <label for="name">Név</label><br>
        <input type="text" id="name" name="name" size="30"
		autocomplete="Add meg a neved!"><br>
        <label for="email">E-mail cím</label><br>
        <input type="email" id="email" name="email" size="30"
		autocomplete="Add meg az e-mail címed!"><br>
        <input type="submit" name="Elküld">
        </form></div>

        </section>
   </footer>
  </body>
  </html>';

}
function content_title($title, $text)
{
	echo '<h1>'. $title .'</h1><p>'. $text .'</p>';
}
function alkategoria_list($items, $max_count = 10000)
{
	echo '<div class="alkategoriak"><ul>';
	
	if($items)
	{
		foreach($items as $i => $alcategory)
		{
			if($i == $max_count)
			{
				break;
			}	
			echo '<li>		
					<div class="imagename">
						<a href="?page=alkategoria&id='. $alcategory ['id']  .'">
						<img src="Picture/'. $alcategory['cover'] .'" "<strong>'. $alcategory['title'] .'</strong></a>
					</div>
						</li>';
		}
	}
	else
	{
		echo '<li><strong>Nem található alkategória ebben a kategóriában</strong></li>';
	}
	echo '</ul></div>';
}


function termek_list($items, $max_count = 10000)
{
	echo '<div class="termek">';
	if($items)
	{
		foreach($items as $i => $termek)
		{
			if($i == $max_count)
			{
				break;
			}

			$db_user = 'root';
			$db_pass = 'mysql';
			$db_name = 'állatmánia';

			$dsn = 'mysql:host=localhost;dbname='. $db_name .';charset=utf8mb4';
			$db = new PDO($dsn, $db_user, $db_pass);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			error_reporting(E_ALL);

			
						
			
			
			echo'<li><form class="box" method ="POST" action="">
			 	
					 <input type="hidden" value="'. $termek['id'] .'"  name="termekid"/><br>
             		<img src="Picture/termek/'. $termek['kép'] .'"class="termekkep" alt="">
					<h3 class="nev">'. $termek['név'] .'</h3>
					<p class="kiszereles">'. $termek['leírás'] .'</p>
					
					<p class="kiszereles">'. $termek['kiszerelés'] .'</p>
            	 <div class="flex"> 
              		<p class="price">'. $termek['egységár'] .'Ft</p>
					
					<input class="darab" type="number"   name="darab" maxlength="2" min="1" max="20" required/><br>
               	 </div> 
                    <input class="btn"value="kosárba teszem" type="submit" name="submit"/>        
					</form>					
					
				</li>';
				
				
				if(isset($_POST['submit']))
			{
				$errors= array();
				$true = true;
				if(empty($_POST['darab']))
					{
					$true = false;
					array_push($errors, "Kérjük, adja meg a mennyiséget!");
					}

				if($true)
        		{	
					

					$termekid=$_POST['termekid'];
					$termekdarab=$_POST['darab'];
					$termeknev=$termek['név'];
					$termekar=$termek['egységár'];
					
					$users=get_users();
					foreach($users as $user)
					{
							$userid=$user['id'];
				     
				$sql="INSERT INTO kosaram VALUES (NULL,'$userid' ,'$termekid', '$termeknev', '$termekdarab', '$termekar') ";
				$query = $db->prepare($sql);
				$query->execute();
				
				
	
			}
			}}
		}
	}
	else
	{
		echo '<li><strong>Nem található termék ebben az alkategóriában</strong></li>';
	}
	
	echo'</div>';
}
function alcategory_view($item)
{
	echo '<article class="view">
			<section><img src="Picture/'. $item['cover'] .'">
			<h1><strong>'. $item['title'] .'</strong></h1></section>
			<p><i>'. $item['kategória'] .'</i></p>
			<p><strong>'. $item['leírás'] .'</strong></p>			
		</article>';
}
function termek_view($item)
{
	echo '<article class="product">
		<img src="Picture/'. $item['kép'] .'">
			<h1>'. $item['név'] .'</h1>
			<p><i>'. $item['alkategóriák'] .'</i></p>
			<p><strong>'. $item['leírás'] .'</strong></p>
			<p><strong>'. $item['egységár'] .'Ft</strong></p>
			<p><strong>'. $item['kiszerelés'] .'</strong></p>
		</article>';
}
function pagination($items, $count)
{
	$id = get_id();
	$step = get_step();
	$href = '?page=alkategoria&id='. $id .'&step=';
	
	echo '<div class="termek"><div class="pagination">';
	
	if($step > 1)
	{
		echo '<a href="'. $href . ($step - 1) .'" class="prev">&lt;&lt; Előző oldal</a>';
	}
	if(count($items) > $count)
	{
		echo '<a href="'. $href . ($step + 1) .'" class="next">Következő oldal &gt;&gt;</a>';
	}
	echo '</div></div>';
}
?>