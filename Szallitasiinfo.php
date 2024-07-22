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


$page = 'Szállítási információk';
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
if($page == 'Szállítási információk')
{
   echo'
<div class="szall">

<section class="szallitas">

    <h2>Szállítási információk</h2>

        <h3>Szállitási módok</h3>

            <p>Az Állatmánia webáruház a megrendelt csomag házhozszállítását futárszolgálattal biztosítja. A GLS Hungary Kft. és a FoxPost Zrt. futárszolgálatok juttatják el otthonodhoz vagy a kért címre a megrendelésedet, de az átvétel helyszínéül GLS CsomagPontot is választhatsz.
            </p><br>
                <span>Házhoz szállítás futárszolgálattal</span><br>
            <p>A futárszolgálattal történő szállítás 2-3 munkanapon belül történik. Ezeket a csomagokat a GLS Hungary Kft. és a FoxPost Zrt. futárszolgálatok kézbesítik.<br><br>
            A kiszállítással kapcsolatban az alábbi értesítések alapján tudod nyomon követi a csomagodat. Az alábbi értesítések megérkezésének feltétele a megrendelésben helyesen megadott e-mail cím és sms-képes telefonszám.
            <br><br>
                <span>Értesítés kiszállításról e-mail :</span> Ezt az e-mailt akkor küldjük, amikor a csomagodat elkészítettük, és telephelyünkön átadtuk a futárszolgálatnak. A csomag érkezése másnapra várható.<br><br>
                <span>Mai kézbesítés sms és email:</span> Ezt az sms-t és e-mail-t a futárszolgálat küldi Neked a kézbesítés napján. Ebben az értesítésben jelzi a futárszolgálat a kézbesítés várható idejét egy 3 órás idő-intervallumra leszűkítve. Az üzenet tartalmazza a futár telefonszámát is, így ezen a számon közvetlenül a kézbesítést végző futárral tudsz egyeztetni a kézbesítés pontosításával kapcsolatban (pl. pontos kézbesítési időpont, helyszín). Nagyon fontos, hogy ehhez a vásárlási folyamatban helyesen add meg a mobilszámod és az e-mail címed.<br>
            <br>
                <span>Csomagkövetés:</span> Csomagazonosító-szám alapján a GLS Track&Trace oldalán illetve a FoxPost "csomagátvétel" oldalán nyomon követheted, hogy hol tart a csomag kiszállítása. GLS vevőszolgálat telefonszáma: +36-1-802-0265 (elérhető: hétfőtől péntekig 7:00 és 20:00 óra között). FoxPost ügyfélszolgálat az alábbi linkre kattintva érhető el. Csomagszámod után ügyfélszolgálatunkon érdeklődhetsz: +36 30 445 1513

            Ha a fenti értesítések alapján behatárolt várható kézbesítési időpontban vagy címen mégsem tudtad átvenni a csomagodat, akkor a GLS futárszolgálat az első sikertelen kézbesítés után e-mailt küld. A csomagazonosítóra hivatkozva rendelkezhetsz a csomag további sorsáról. (pl. más időpontban, más címre is kérheted)<br><br>
                <span>A futárszolgálat munkanapokon,</span> várhatóan<span> 8:00 és 17.00 óra között szállítja csomagodat.</span><br><br><br>
                <span>Szállítási díjak (Magyarországi szállítási cím esetén):</span><br><br>
            <table>
                <thead>
		            <tr>
                        <th></th>
			            <th class="tizezer">10.000 Ft alatti rendelés esetén</th>
			            <th class="felette">10.000 - 20.000 Ft közötti rendelés esetén</th>
			            <th class="huszezer">20.000 feletti rendelés esetén</th>
		            </tr>
	            </thead>
	            <tbody>
                    <tr>
                        <td class="gls">GLS Házhozszállítás esetén</td>
                        <td>1.490 Ft</td>
                        <td>1.490 Ft</td>
                        <td>ingyenes</td>
                    </tr>
                    <tr>
                        <td class="pont">GLS Csomagpontokon és csomagautomatánál történő átvétel esetén:</td>
                        <td>990 Ft</td>
                        <td>990 Ft</td>
                        <td>ingyenes</td>
                    </tr>
                    <tr>
                        <td class="fox">FoxPost Csomagpontokon történő átvétel esetén:</td>
                        <td>990 Ft</td>
                        <td>990 Ft</td>
                        <td>ingyenes</td>
                    </tr>
            </table>
            </p>
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
<?php  page_footer();?> 