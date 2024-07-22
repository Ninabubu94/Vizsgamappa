<?php include 'begin.php';
require_once 'functions.php';
require_once 'Database.php';
require_once 'Elements.php';
require_once 'pages.php';
session_start();
      
if(!empty($_SESSION['felhasználónév']))
{
$_SESSION['felhasználónév'];
}

pages_header();

$page = 'Kapcsolat';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
$sql = "SELECT DISTINCT alkategóriák FROM termékek";
  $query = $db->prepare($sql);
  $query->execute();
  $alkategóriák = $query->fetchAll(PDO::FETCH_ASSOC);
  

         
         echo'<div class="bases">  <form class="Kereses" action="index.php" method="get">
      <input type="text" class="kulcs" name="kulcsszo" placeholder="Adjon meg egy kulcsszót" value="'; echo isset($_GET['kulcsszo']) ? $_GET['kulcsszo'] : ''; echo' ">
      <select max="1" name="alkategóriák">
        <option value="" >Összes alkategória</option>';
        foreach($alkategóriák as $alkategória):
         echo' <option value="<'; echo $alkategória['alkategóriák']; echo'"'; echo isset($_GET['alkategóriák']) && $_GET['alkategóriák'] == $alkategória['alkategóriák'] ;  echo' selected: "" >'; echo $alkategória['alkategóriák']; echo'</option>';
         endforeach; 
      echo'</select>
      <input class="car" type="submit" name="search" value="Keresés">
    </form>
  
    <a href="Kosar.php">
         <button class="car" >
             <span><i class="fas fa-shopping-cart"></i> Kosár </span>
         
         </button></a>
       </div> 
</header>';
if (isset($_GET['search'])) {
    
  $kulcsszo = $_GET['kulcsszo'];
  $alkategória = $_GET['alkategóriák'];

  if (empty($kulcsszo) && empty($alkategória)) {
    
    echo "<p>Kérjük, adjon meg egy kulcsszót vagy válasszon egy kategóriát.</p>";
  } else {
    
    $sql = "SELECT * FROM termékek WHERE";
    $params = [];
    if (!empty($kulcsszo)) {
    
      $sql .= " név LIKE :kulcsszo  OR leírás LIKE :kulcsszo  ";
      $params[':kulcsszo'] = "%$kulcsszo%";
    }
    if (!empty($alkategória)) {
   
      if (!empty($kulcsszo)) {
      
        $sql .= " AND ";
      }
      $sql .= " alkategóriák = :alkategoriak";
      $params[':alkategoriak'] = $alkategória;  
    } 
    $query = $db->prepare($sql);
    $query->execute($params);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
   }
echo '<p class="result">Talált '.count($results).' eredmények.</p>';

if(!empty($results)) {
  echo'<div class="results">';
  echo "<table>";
  echo "<tr>";
  
  echo "<th>Név</th>";
  echo "<th>Leírás</th>";
  echo "<th>Ár</th>";
  echo "<th>Alkategória</th>";
  echo "<th>Kiszerelés</th>";
  echo "</tr>";
  
  foreach($results as $result) {
    echo "<tr>";
    
    echo "<td>" . $result['név'] . "</td>";
    echo "<td>" . $result['leírás'] . "</td>";
    echo "<td>" . $result['egységár'] . "</td>";
    echo "<td>" . $result['alkategóriák'] . "</td>";
    echo "<td>" . $result['kiszerelés'] . "</td>";
    echo "</tr>";
  }
  echo "</table></div>";
}      }          
else{
if($page == 'Kapcsolat')
{
   echo '<div class="info">
  
    <section class="infok">

            <h2>Állatmánia Kft.</h2>
            <p> 2030 Érd, Kisbéka utca 2.<br>
                <span>E-mail:</span> allatmania@mania.hu <br>
		        <span>Telefon:</span> +36 20 586 12 98 <br>
                <span>Ügyfélszolgálat: H-P: 9:00 - 18:00</span>
            </p>
    </section>
</div>

<div class="hir">

    <section class="akcio">
        <h2>Iratkozz fel hírlevelünkre, nehogy lemaradj az akciós ajánlatunkról!</h2>';
      



 if(isset($_POST['name']))
	{

	$name = $_POST['name'];
	$email = $_POST['email'];
	

	if($name && $email)
 	{
		$sql = "INSERT INTO feliratkozasok VALUES (NULL, :name, :email)";
		$query = $db->prepare($sql);
		$query->execute([
			'name' => $name,
			'email' => $email,
		]);
        
    echo '<a name"msg"><p class="message
        success"><strong>E-mail cím tárolva!</strong> E-mail címedet rendszerünk rögzítette. Köszönjük a feliratkozást!</p>';
    }
else
{
    echo '<a name"msg"><p class="message
     error"><strong>Hibásan kitöltve!</strong> Név és e-mail cím megadása kötelező!</p>';
}	
}

 


   echo' <a name="input"></a>
	    <form action="" method="post"><br>
		
           
                <label for="name">Név</label><br>
                <input type="text" id="name" name="name" size="45"><br>
            
                <label for="email">E-mail cím</label><br>
                <input type="email" id="email" name="email" size="45" ><br><br>
            
                <input type="submit" name="Elküld">
        </form>

   </section>
</div>';}

else

  $page = get_page();
    switch($page)
{
    case 'termek': termek_page(); break;
    case 'alkategoria':alcategory_page(); break;
	case 'kategoria': category_page(); break;
    
}}

?>

<?php require_once 'end.php';?> 
    