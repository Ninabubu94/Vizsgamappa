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


$page = 'GY.I.K.';
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
if($page == 'GY.I.K.')
{

   echo' <div class="kerdesek">';
        
              
          if(isset($_POST['submit']))
    {
        $errors= array();
        $true = true;
        if(empty($_POST['tipus']))
        {
            $true = false;
            array_push($errors, "Kérjük, adja meg milyen állattal kapcsolatos a kérdése!");
        }     
        
        if(empty($_POST['jellege']))
        {
            $true = false;
            array_push($errors, "Kérjük, adjon meg milyen jellegű a kérdése!");
        }

        if(empty($_POST['kerdes']))
        {
            $true = false;
            array_push($errors, "Kérjük, tegyen fel kérdést!");
        }   

        if($true)
        {
            $tipus= $_POST['tipus'];
            $jellege= $_POST['jellege'];
            $kerdes=$_POST['kerdes'];
            $valasz=$_POST['valasz'];
                  

            $sql  = "INSERT INTO kerdesek( kerdes,típus, jellege,valasz, created, status)  VALUES  ( '$kerdes','$tipus','$jellege','$valasz', NOW(), 1 )";
            $query = $db->query($sql);
		   
       
        } 
      
    }
      echo' <h1>GY.I.K.</h1> 
             <div class="iv"> <form   name="gyik" action="GYIK.php" method ="POST"  enctype="multipart/form-data">
                

                    <h2>Tegye fel Ön is kérdését!</h2>
                    Milyen állattal kapcsolatos?<input type="hidden"  id="tipus"   required name="tipus"/><br>
                       Macska<input type="radio" value="macska" size="10" id="tipus" required name="tipus"/>
                       Kutya<input type="radio" value="kutya" id="tipus" required name="tipus"/>
                       Kisemlős<input type="radio" value="kisemlos" id="tipus" required  name="tipus"/>
                        Madár<input type="radio" value="madar" id="tipus" required name="tipus"/><br><br>
                  <input type="hidden" value="válaszra vár"  name="valasz"/><br>
                    Kérdés jellege:<input type="hidden" required id="jellege" name="jellege"/><br>
                    Állatorvosi jellegű<input type="radio" value="orvosi" required id="jellege" name="jellege"/>
                    Termékkel kapcsolatos<input type="radio" value="termek" required id="jellege" name="jellege"/>
                    Rendeléssel kapcsolatos<input type="radio"value="rendeles" required id="jellege" name="jellege"/><br>                           
                    <textarea rows="12"  placeholder="Kérdés..."  cols="100" maxlength="600" required name="kerdes"/></textarea><br>
                    <input class="button1"value="Kérdés küldése" type="submit" name="submit"/>
                    
                
            </form></div>
            </div>';
            
           
            
  
   echo' <section class="kerdes"><div>';
            
   $sql="SELECT kerdes,valasz FROM kerdesek WHERE status= 1 LIMIT 20  ";
   $query = $db->query($sql);
   $row = $query->fetchAll(PDO::FETCH_ASSOC);

  
  
   foreach($row as $item)
    {
        
      
           echo' <ul><p>  '.$item['kerdes'].'</p><br><br>
                <li> '.$item['valasz'].'</li></ul>';}
          
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
<?php  page_footer();?> 
