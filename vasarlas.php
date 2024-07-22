<?php session_start();

if(!empty($_SESSION['felhasználónév']))
{
$_SESSION['felhasználónév'];
}
else
{

    session_destroy();
}
if(!empty($_SESSION['kosár']))
{
$_SESSION['név'];
}

require_once 'Database.php';

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
    
</head>
<body>


<header class="kezdolap">
		
        <nav class="header">
            <div class="logo">
                
				<img src="Picture/logom.png" alt="Állatmánia logo"> 
				
         </div><span class="regis">
		
           </span> <ul>
                <li>
                    <a href="index.php">Főoldal</a>
                    <a href="">Profilom</a>
					
                  <?php  if(!empty($_SESSION['felhasználónév']))
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
                        ?>
            </li>
            </ul>
        </nav>
		
        <div class="bases">
           

           <form  role="keresés">
           <input  type="keresés" placeholder="keresés" aria-label="keresés">
           <button type="submit">Keresés</button>
         </form>
          </header>
<?php
$sikeres = false;
if(isset($_SESSION['felhasználónév'])){
	$sql = "SELECT id FROM users where username = '" . $_SESSION['felhasználónév']. "'";
	$query = $db->query($sql);
	$item = $query->fetch(PDO::FETCH_ASSOC);
	return $item;
	
	if ($item['username']){
		$userid = $item['id'];
	}else{
		echo 'hiba';
	}
	foreach($_SESSION['kosár'] as $value){
		
		$termekid = $value;
		$mennyiseg = 1;
		$allapot = 'megrendelve';
		
		//setlocale(LC_ALL, 'hun_hun');
		//$datum = strftime('%d-%b-%Y');
		
		$datum = date('d-m-Y G:i:s');
		$sql = "INSERT INTO VASARLAS (F_ID, T_ID, dátum, mennyiseg, allapot)
		VALUES( :F_ID, :T_ID, to_date(:dátum, 'DD-MM-YYYY HH24:MI:SS'), :mennyiseg, :allapot)";

		$compiled = $item;

		oci_bind_by_name($compiled, ':F_ID', $userid);
		oci_bind_by_name($compiled, ':T_ID', $value);
		oci_bind_by_name($compiled, ':dátum', $datum);
		oci_bind_by_name($compiled, ':mennyiseg', $mennyiseg);
		oci_bind_by_name($compiled, ':allapot', $allapot);
		
		oci_execute($compiled);
		$sikeres = true;
	}
}else{
	echo '<h1 style="color:red;"></center>A rendeléshez be kell jelentkeznie!</center></h1>';
}

if($sikeres){
	echo '<h1 style="color:green;"><center>Sikeres rendelés!</center></h1>';
}
?>

</body>
</html>