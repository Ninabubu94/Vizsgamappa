<?php
include 'begin.php';
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


$page = 'Vélemények';
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
if($page == 'Vélemények')
{
  if(isset($_POST['submit']))
  {
      $sikeres=array();
      $errors= array();
      $true = true;
      if(empty($_POST['velemeny']))
      {
          $true = false;
          array_push($errors, "Kérjük, irja meg véleményét!");
      }
      
      if($true)
      {
          $velemeny= $_POST['velemeny'];
          
          $sql  = "INSERT INTO vélemények(id,velemeny, created, status)  VALUES  (NULL,'$velemeny', NOW(), 0)";
            $query = $db->query($sql);
            
            
          
      }
  }
echo'<div class="velemeny"> <h1>Vevői vélemények</h1> 
<div class="rating"> <form   name="velemenyek" action="velemenyek.php" method ="POST"  enctype="multipart/form-data">

      <h2>Írja meg véleményét, észrevételeit!</h2>
      
     <br> <textarea rows="10" placeholder="Írd le a véleményed..."  cols="120" maxlength="2000" required name="velemeny"/></textarea><br>
      <input class="button2" value="Vélemény küldése" type="submit" name="submit"/>
        
</form></div></div>
<section class="velemenyek"><div>';
            
   $sql="SELECT velemeny FROM vélemények WHERE status= 1 LIMIT 40  ";
   $query = $db->query($sql);
   $row = $query->fetchAll(PDO::FETCH_ASSOC);
  
   foreach($row as $item)
    {
  
           echo' <li><i class="fa-solid fa-quote-right fa-2xl" style="color: #ed7d3a;"></i>  '.$item['velemeny'].'</li>';
      
    }
            echo'</div> </section>';       
   
  }
else

  $page = get_page();
    switch($page)
{
    case 'termek': termek_page(); break;
    case 'alkategoria':alcategory_page(); break;
	case 'kategoria': category_page(); break;
    
}}

?>
<?php
page_footer();?>


