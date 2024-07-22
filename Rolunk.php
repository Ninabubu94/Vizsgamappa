<?php include 'begin.php';
        require_once 'functions.php';
        require_once 'Database.php';
        require_once 'Elements.php';
        require_once 'pages.php'; 

pages_header();

$page = 'Rolunk';
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

if($page == 'Rolunk')
{
   echo' <div class="we">
       <section class="mi"> 
            <h1>ISMERJEN MEG BENNÜNKET!</h1>
        

            <p> Az ÁLLATMÁNIA.HU webáruház üzemeltetője a ÁLLATMÁNIA Kft. <br><br><br>

            <span>Átvételi Pontunk címe:</span> 2030 Érd, Kisbéka utca 2.<br><br><br>

            Adószám: 13926856-2-43<br>
            Cégjegyzékszám: 001-09-888217<br>
            Bejegyző hatóság: Budapest Környéki Törvényszék Cégbírósága<br>
            Bankszámlaszám: Raiffeisen Bank: 12020144-01588439-00220006<br>
            IBAN Szám: HU43-12020144-01588439-00220006<br>
            </p>
            <p>
                Lorem, ipsum dolor sit amet <span>consectetur adipisicing elit</span>. Voluptatibus optio consequatur adipisci, distinctio velit cumque tempore dolorum ipsam non ea harum dolores reiciendis eos. Sit beatae veniam cum ducimus consectetur ea, voluptate quibusdam explicabo dolores dolor iste, officiis eius doloribus earum maxime nihil doloremque et vero commodi tempore omnis quod modi! Nemo neque perferendis, at alias maiores cumque dolore sunt similique itaque ex iste tempora magni accusamus. Fuga quos dolor voluptates debitis sit doloremque nulla quaerat architecto molestiae odit, perferendis voluptatem perspiciatis aut cum facere minima consequatur. Soluta excepturi rem minus quasi hic, error adipisci velit accusamus vero voluptates deleniti odio numquam beatae illo vel officia quis magnam accusantium libero qui possimus. In, voluptatibus nostrum id deleniti libero, tempore reiciendis autem repellat quibusdam quam impedit. <br><br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non ratione placeat doloribus nihil. Quis corrupti iste molestiae! Dicta magni illo amet commodi atque reiciendis fugiat exercitationem odio hic autem illum<span> vel minima officia esse,</span> quidem repellendus nihil laborum facere cupiditate. Tenetur, beatae amet? Harum excepturi illo blanditiis ullam nulla assumenda veritatis asperiores accusamus obcaecati reiciendis. <br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, exercitationem? Blanditiis eveniet molestias fuga cumque exercitationem beatae culpa magni voluptatem?
        </section>

    </div>';
}
else

  $page = get_page();
    switch($page)
{
    case 'termek': termek_page(); break;
    case 'alkategoria':alcategory_page(); break;
	case 'kategoria': category_page(); break;
    
}?>
<?php page_footer(); ?>
