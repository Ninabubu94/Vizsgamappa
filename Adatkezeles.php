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

$page = 'Személyes adatok kezelése';
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
if($page == 'Személyes adatok kezelése')
{
echo'<div class="securite">
    <article class="safe">
    
                <h1>ADATKEZELÉSI TÁJÉKOZTATÓ</h1><br>
        
                <p>Adatkezelő kiemelt figyelmet fordít arra, hogy adatkezelése során a rendszerében található személyes adatok kezelése tekintetében a természetes személyeknek a személyes adatok kezelése tekintetében történő védelméről és az ilyen adatok szabad áramlásáról, valamint a 95/46/EK Irányelv hatályon kívül helyezéséről (általános adatvédelmi rendelet) szóló az EURÓPAI PARLAMENT ÉS A TANÁCS (EU) 2016/679 Rendelet („Rendelet”) rendelkezéseinek megfelelően kezelje, tárolja, felhasználja.<br><br>
                Az adatok kezelésével összefüggésben Adatkezelő ezúton tájékoztatja a honlap látogatóit, a honlapon vásárlókat (a továbbiakban: „Felhasználó”) az általa kezelt személyes adatokról, a személyes adatok kezelése körében követett elveiről és gyakorlatáról, valamint Felhasználó jogai gyakorlásának módjáról és lehetőségeiről.<br><br>
                Felhasználó jogosult az Adatkezelőhöz intézett írásos bejelentés útján az adatkezeléshez adott hozzájárulását részlegesen vagy teljesen visszavonni, illetve az adatai törlését kérni a tájékoztatóban meghatározott módon.<br><br>
                A Felhasználó az adatkezeléshez való hozzájárulását bármikor visszavonhatja, mely esetben Adatkezelő a rendszerből törli az Felhasználó valamennyi személyes adatát.<br><br>
                Visszavonás hiányában az adatkezelés időtartama az egyes adatkezeléssel járó esetekben a jelen tájékoztatóban meghatározott határidő.</p><br>

            <h2>1. ADATKEZELŐ MEGNEVEZÉSE</h2><br>
            <p><span class="cím">Állatmánia Kft.</span><br>
                Székhely: 2030 Érd, Kisbéka utca 2.<br>
                Cégjegyzékszám: Cg.01-09-888217<br>
                Adószám: 13926856-2-43<br>
                Bejegyző cégbíróság: Budapest Környéki Törvényszék Cégbírósága<br>
                Levelezési cím: 2030 Érd, Pf.: 58<br>
                E-mail cím: info@mania.hu<br>
                Telefonszám: +36-70-9236336<br><br>
                Honlap:<a href="index.php"> www.allatmania.hu</a></p><br>

        <h2>2. ADATKEZELÉSI ESETEK</h2><br>

        <h3>2.1 Regisztráció</h3><br>

            <p>A Honlapon történő vásárlás regisztrációhoz kötött, melynek érdekében Adatkezelő az alábbi adatokat kezeli.<br><br>

                <span>Kezelt adatok köre:</span><br><br>
                Vezetéknév<br>
                Keresztnév<br>
                Telefonszám<br>
                E-mail cím<br>
                Szállítási és Számlázási cím:<br>
                Ország, Irányítószám, Város, Utca, házszám<br>
                <br>
                    <span>Adatkezelés célja: </span><br><br>
                
                    
                        <li>Adatkezelő meggyőződjön arról, hogy valóban az email cím tulajdonosa kívánja igénybe venni a honlap szolgáltatásait azáltal, hogy egy megerősítő link használatával regisztrációját megerősíti.
                        </li>
                        <li> Honlapon ténő vásárlási lehetőség biztosítása,
                        </li>
                        <li> kényelmi lehetőség biztosítása a Felhasználó számára (a regisztrált Felhasználónak csak egyszer kell a vásárláshoz szükséges összes adatát megadnia, utána már automatikusan betölti a rendszer a vásárláshoz szükséges adatokat, illetve a vásárlásait nyomon tudja követni, amely adott esetben megkönnyíti az igényérvényesítést számára.)
                        </li>
                        <li>szerződés teljesítését követően jogi igények előterjesztése.</li></p><br>
                <p><span>Adatkezelési ideje:</span><br><br>
                A regisztráció során kötelezően megadott személyes adatok kezelése a regisztrációval kezdődik és annak kérelemre történő törléséig tart. Ez vonatkozik mind a kötelező, mind pedig a nem kötelezően megadott adatokra egyaránt. Ha a Felhasználó nem kéri regisztrációjának törlését, úgy Adatkezelő a Honlap megszűnését követő legkésőbb 30 nap elteltével törli rendszeréből. A regisztrációt Adatkezelő törli, amennyiben a Felhasználó erre vonatkozó igényét emailben vagy írásban postai úton erre vonatkozó kérelmét elküldi.<br><br>
                Amennyiben a Felhasználó regisztrál, de nem vásárol és felhasználói fiókját 1 évig nem használja, úgy felhasználói fiókja és a regisztráció során megadott személyes adatai törlésre kerülnek 1 év elteltével.
                <br><br>
                <span>Adatkezelés jogalapja:</span>A regisztráció a Rendelet 6. cikk (1) bekezdés f) pontja alapján jogos érdek. <br><br>
                <span>Érdekmérlegelési teszt eredménye</span><br><br>
                Adatkezelő a jogos érdek mint jogalap miatt érdekmérlegelési tesztet készített, melynek eredménye – elérhető Adatkezelőnél - során Adatkezelő úgy értékelte, hogy a társaság a kötelező regisztráció során megvalósított adatkezelési tevékenysége szorosan kapcsolódik a később megkötött szerződés teljesítéséhez fűződő jogi igények teljesítéséhez, mely mind az Adatkezelő, mind pedig az érintett jogos érdekét szolgálja és megfelel a GDPR 6. cikk (1) bekezdés f) pontjában foglalt jogos érdeknek, illetve az Adatkezelő által nyújtott, érintettek jogait biztosító intézkedések következtében nem sérülnek az érintettek érdekei vagy alapvető jogai és szabadságai oly módon, hogy felülírnák Adatkezelő jogos érdekét. Adatkezelő kezelheti tehát a kötelező regisztráció során megadott személyes adatokat Adatkezelő és az érintettek kényelmi vásárlási lehetőségének biztosítása, illetve a megkötött szerződés teljesítését követő jogi igények érvényesítése érdekében, mert jogalap tekintetében megfelel a GDPR 6. cikk (1) bekezdés f) pontjának.
                </p><br><br>
                <h3>2.2. Megrendeléselküldése, teljesítése</h3><br><br>
                <p><span>Kezelt adatok köre:</span><br><br>
                Vezetéknév<br>
                Keresztnév<br>
                Telefonszám<br>
                E-mail cím<br>
                Szállítási és Számlázási cím:<br>
                Ország, Irányítószám, Város, Utca, házszám
                <br><br><br>
                <span>Adatkezelés célja:</span><br><br>
                Szerződéskötés, megrendelés teljesítése, szükség esetén módosítás, kiegészítés, kapcsolattartás a rendelés teljesítése érdekében, termék házhozszállítása.
                <br><br>
                <span>Adatkezelés jogalapja:</span><br><br>
                A Rendelet 6. cikk (1) bekezdés b pontja értelmében szerződés teljesítése.<br><br>
                <span>Adatkezelés időtartama:</span><br><br>
                Szerződés teljesítését követő 5 évig.
                <br><br>
                <span>Adatok forrása:</span><br><br>
                Közvetlenül a Felhasználótól felvett.<br><br>
                <span>Adatkezelés elmaradásának következménye:</span><br><br>
                Felhasználó nem tudja a megrendelési folyamatot véghezvinni.</p><br><br>
            <h3>2.3 Kapcsolatfelvétel az Adatkezelővel emailben, telefonon, postai úton.</h3><br>
                <p><span>Kezelt adatok köre: </span><br>
                    Név, Email cím, illetve minden olyan adat, melyet a Felhasználó önkéntesen ad meg a kapcsolatfelvétel során.<br>
                <span>Adatkezelés célja: </span><br>
                Kapcsolatfelvétel, kapcsolattartás, panaszkezelés.<br>
                <span>Adatkezelés ideje:</span><br>
                Postai és Email-es megkeresés: A kapcsolatfelvétel során megadott személyes adatok kezelése az adatok önkétes megadásával kezdődik és annak kérelemre történő törléséig tart. Ha a Felhasználó nem kéri a kapcsolatfelvétel során megadott személyes adatainak törlését, úgy Adatkezelő – kivéve panasz levél esetén - a Honlap megszűnését követő legkésőbb 30 nap elteltével törli rendszeréből, kivéve a panaszleveleket, melynek megőrzési ideje 5 év.<br>
                A hívásokat Adatkezelő nem rögzíti, adatfelvételre csak abban az esetben kerül sor, ha a Felhasználó önkéntesen megadja adatait.<br>
                <span>Adatkezelés jogalapja:</span><br>
                Rendelet 6. cikk (1) bekezdés a pontja alapján a Felhasználó önkéntes hozzájárulása.
                </p><br><br>
            <h3>2.4. Panaszkezelés</h3><br><br>
                <p>
                    <span>Kezelt adatok köre:</span><br><br>
                Felhasználó neve, email címe, telefonszáma.<br><br><br>
                <span>Adatkezelés célja:</span><br><br>
                Ha a Felhasználónak a vásárolt termékkel kapcsolatosan panasza merül vagy egyéb jellegű panaszát kezeli Adatkezelő, úgy az ügyintézés során személyes adatok kezelését is megvalósítja. Az adatkezelés célja a jogszabályi előírásoknak megfelelő szavatossági igény és egyéb panaszügyintézés megvalósítása, továbbá az Adatkezelő és a Felhasználó közötti kapcsolattartás a felmerült kérdéssel összefüggésben.<br><br><br>
                <span>Adatkezelés ideje:</span><br><br>
                A fogyasztóvédelmi törvény alapján az adatokat, illetve a hozzá tartozó panaszleveleket a panaszügyintézést követő 3 évig köteles Adatkezelő megőrizni.<br><br><br>
                <span>Adatkezelés jogalapja:</span><br><br>
                Rendelet 6. cikk (1) bekezdés c pontja alapján a fogyasztóvédelmi törvényben és a Ptk.-ban előírt jogi kötelezettségek teljesítése.<br><br><br>
                </p><br><br><br>
            <h3>2.5. Számla kiállítása</h3><br><br>
            <p>A számla esetében a számla kiállítása és megőrzése jogi kötelezettség a számvitelről szóló törvény és az Áfa törvény alapján, így a számla esetében az adatkezelés jogalapja a rendelet 6. cikk (1) bekezdés c) pontja szerinti jogi kötelezettség teljesítése.<br><br>
            <span>Kezelt adatok köre: </span><br><br>
            Név, számlázási adatok, adószám<br><br><br>
            <span>Adatkezelés célja: </span><br><br>
            Adatkezelő köteles az általa értékesített termékekről vagyis a Felhasználó által kifizetett megrendelési összegről számlát kiállítani, melynek céljából a Felhasználó adatait kezelnie szükséges.<br><br><br>
            <span>Adatkezelés ideje:</span><br><br>
            Az Áfatv. értelmében Adatkezelő 8 évig köteles a számlát megőrizni.<br><br><br>
            <span>Adatkezelés jogalapja:</span><br><br>
            Rendelet 6. cikk (1) bekezdés c pontja szerinti jogi kötelezettség teljesítése.
            </p><br><br><br>
            <h3>2.6 Egyéb célú adatkezelés</h3><br>
            <h3>2.6.1 Hírlevél, DM tevékenység</h3><br>
            <span>Kezelt adatok köre:</span><br>
            <p>Név, E-mail cím, Érdeklődési kör<br>
            <span>Adatkezelés célja:</span><br>
            A feliratkozással a Felhasználó ahhoz járul hozzá, hogy Adatkezelő a közvetlen megkeresés módszerével direktmarketing tartalmú hírlevelet küldjön részére. Feliratkozás esetén a Adatkezelő – eltérő nyilatkozat, kifogás, tiltakozás hiányában – az igénylés során Felhasználó által megadott személyes adatait, email címét és nevét felhasználja annak céljából, hogy Adatkezelő a szolgáltatásairól tájékoztató anyagot, akciót, ajánlatot, tájékoztatást juttasson el.<br>
            <span>Adatkezelés ideje:</span><br>
            Mindaddig kezeli az Adatkezelő ezen adatokat, ameddig a Felhasználó le nem iratkozik a hírlevélről a hírlevélben található leiratkozás linkre kattintva vagy amíg nem kéri levételét emailben vagy postai úton. Leiratkozás esetén Adatkezelő további hírleveleivel, ajánlataival nem keresi meg a Felhasználót. A hírlevélről a Felhasználó bármikor, korlátozás és indokolás nélkül, térítésmentesen leiratkozhat.<br>
            <span>Adatkezelés jogalapja:</span><br>
            Felhasználó önkéntes hozzájárulása.
            </p><br>
            <h3>2.6.2 Honlap használatával összefüggésben gyűjtött adatok (egyéb célú adatkezelés)</h3><br>
            <h3>2.6.2.1 Technikai adatok, Honlap látogatás adatai</h3><br>
            <p>Adatkezelő a naplóállományok elemzése során felmerült adatokat más információval nem kapcsolja össze, Felhasználó személyének azonosítására nem törekszik.<br>
            Az IP cím olyan számsorozat, mellyel az internetre fellépő felhasználók számítógépei egyértelműen azonosíthatók. Az IP címek segítségével akár földrajzilag is lokalizálható az adott számítógépet használó látogató. A meglátogatott oldalak címe, valamint a dátum, időpont adatok önmagukban a Felhasználó azonosítására nem alkalmasak, azonban egyéb (pl. regisztráció során megadott) adatokkal összekapcsolva alkalmasak arra, hogy segítségükkel a Felhasználóra vonatkozó következtetéseket lehessen levonni.<br>
            <span>Kezelt adatok köre:</span> dátum, időpont, Felhasználó számítógépének IP címe és a meglátogatott oldal címe, a látogató nagykorúságára vonatkozó adat.<br>
            <span>Adatkezelés célja:</span> Adatkezelő rendszere automatikusan rögzíti Felhasználó számítógépének IP-címét, a látogatás kezdő időpontját, illetve egyes esetekben – a számítógép beállításától függően – a böngésző és az operációs rendszer típusát. Az így rögzített adatok egyéb személyes adatokkal nem kapcsolhatók össze. Az adatok kezelése kizárólag statisztikai célokat szolgál. Adatkezelés célja a szolgáltatás működésének ellenőrzése, a személyre szabott kiszolgálás és a visszaélések megakadályozása.<br>
            <span>Az adatkezelés időtartama:</span> <br>
            A Honlap megtekintésétől számított 30 nap.<br>
            <span>datkezelés jogalapja:</span><br>
            Felhasználó önkéntes hozzájárulása.
            </p><br><br>
            <h3>2.6.2.2 Cookie-k kezelése</h3><br>
            <p>Adatkezelő a testre szabott kiszolgálás érdekében a Felhasználó számítógépén kis adatcsomagot, ún. sütit (cookie) helyez el és a későbbi látogatás során olvas vissza. Ha a böngésző visszaküld egy korábban elmentett sütit, a sütit kezelő szolgáltatónak lehetősége van összekapcsolni a Felhasználó aktuális látogatását a korábbiakkal, de kizárólag a saját tartalma tekintetében. Webáruházakra jellemző cookie-k az úgynevezett „jelszóval védett munkamenethez használt cookie a biztonsági cookie-k.<br><br><br>
            <span>Átmeneti (session) cookie:</span> a session cookie-k a Felhasználó látogatása után automatikusan törlődnek. Ezek a cookie-k arra szolgálnak, hogy a Honlap hatékonyabban és biztonságosabban tudjon működni, tehát elengedhetetlenek ahhoz, hogy a Honlap egyes funkciói vagy egyes alkalmazások megfelelően tudjanak működni.<br>
            <span>Kezelt adatok köre:</span><br>
            Nem rögzít személyes adatot<br>
            <span>Adatkezelés célja:</span><br>
            Ezek a cookie-k arra szolgálnak, hogy a Honlap hatékonyabban és biztonságosabban tudjon működni, tehát elengedhetetlenek ahhoz, hogy a Honlap egyes funkciói vagy egyes alkalmazások megfelelően tudjanak működni.<br>
            <span>Tárolás ideje:</span><br>
            Honlapon történő látogatás időtartama alatt él, azt követően automatikusan törlődik.<br><br>
            <span>Állandó (persistent) cookie:</span><br>
            <span>Kezelt adatok köre:</span><br>
            Nem rögzít személyes adatot<br>
            <span>Adatkezelés célja:</span><br>
            állandó cookie-t is használ az Adatkezelő a jobb felhasználói élmény érdekében (pl. optimalizált navigáció nyújtása). Ezek a cookie-k hosszabb ideig kerülnek tárolásra a böngésző cookie file-jában. Ennek időtartama attól függ, hogy az Érintett az internetes böngészőjében milyen beállítást alkalmaz.<br>
            <span>Tárolás ideje:</span><br>
            Ezek a cookie-k hosszabb ideig kerülnek tárolásra a böngésző cookie file-jában. Ennek időtartama 1-5 nap.<br><br>
            <span>Bevásárlókosárhoz használt cookie</span><br>
            <span>Kezelt adatok köre:</span><br>
            Nem rögzít személyes adatot<br>
            <span>Tárolás ideje:</span><br>
            Nem jár le automatikusan<br>
            <span>Adatkezelés célja:</span><br>
            A felhasználók azonosítása, a "bevásárlókosár" nyilvántartása, a vásárlói kosár kezelése (virtuemart), megfelelő navigáció biztosítása.<br><br>
            Biztonsági cookiek<br>
            <span>Kezelt adatok köre:</span><br>
            Nem rögzít személyes adatot<br>
            <span>Adatkezelés célja:</span><br>
            Felhasználók aktuális munkamenetének azonosítása, illetéktelen belépés megakadályozása.<br>
            <span>Tárolás ideje:</span><br>
            Nem jár le automatikusan<br><br>
            Jelszóval védett munkamenethez szükséges cookiek.<br>
            <span>Kezelt adatok köre:</span><br>
            Nem rögzít személyes adatot<br>
            <span>Adatkezelés célja:</span><br>
            Ez a cookie a Felhasználó azonosítására szolgál az információs társadalommal összefüggő szolgáltatásba való belépés után; a felhasználó azonosítása ahhoz szükséges, hogy ne szakadjon meg a hírközlő hálózaton a szerverrel folytatott kommunikáció.
            <span>Tárolás ideje:</span><br>
            Nem jár le automatikusan<br><br>
            <span>Érintettek köre:</span><br>
            A Honlapot látogató valamennyi Felhasználó.<br><br>
            <span>Sütik törlése</span><br>
            A Felhasználónak joga van törölni a sütit saját számítógépéről, illetve letilthatja böngészőjében a sütik alkalmazását. A sütik kezelésére általában a böngészők Eszközök/Beállítások menüjében az Adatvédelem/Előzmények/Egyéni Beállítások menü alatt, cookie, süti vagy nyomonkövetés megnevezéssel van lehetőség.</p><br><br>
            <h3>2.6.2.3 Külső szolgáltatók adatkezelése</h3><br>
            <p>A portál html kódja Adatkezelőtől független, külső szerverről érkező és külső szerverre mutató hivatkozásokat tartalmaz. A külső szolgáltató szervere közvetlenül Felhasználó számítógépével áll kapcsolatban. Felhívjuk látogatóink figyelmét, hogy e hivatkozások szolgáltatói az ő szerverükről történő közvetlen kapcsolódás, Felhasználó böngészőjével való közvetlen kommunikáció miatt felhasználói adatokat képesek gyűjteni.<br><br>
            A Felhasználó számára esetlegesen személyre szabott tartalmakat a külső szolgáltató szervere szolgálja ki.<br><br>
            A Honlap tartalmazhat olyan információkat, különösen reklámokat, amelyek olyan harmadik személyektől, reklámszolgáltatóktól származnak, akik nem állnak kapcsolatban Adatkezelővel. Előfordulhat, hogy ezen harmadik személyek is elhelyeznek cookie-kat, web beacon-okat a Felhasználó számítógépén, vagy hasonló technológiákat alkalmazva gyűjtenek adatokat annak érdekében, hogy a Felhasználónak a saját szolgáltatásaikkal összefüggésben címzett reklámüzenetet küldjenek. Ilyen esetekben az adatkezelésre az ezen harmadik személyek által meghatározott adatvédelmi előírások az irányadóak, és az ilyen adatkezelés tekintetében az Adatkezelő semmilyen felelősséget nem vállal.<br><br>
            Az adatok külső szolgáltatók szervere általi kezeléséről az alább felsorolt adatkezelők tudnak részletes felvilágosítást nyújtani.<br><br>
            A külső szolgáltatók a testre szabott kiszolgálás érdekében Felhasználó számítógépén kis adatcsomagot, ún. sütit (cookie) helyeznek el és olvasnak vissza. Ha a böngésző visszaküld egy korábban elmentett sütit, az azt kezelő szolgáltatóknak lehetőségük van összekapcsolni Felhasználó aktuális látogatását a korábbiakkal, de kizárólag a saját tartalmuk tekintetében.<br><br>
            Adatkezelő hirdetéseit külső szolgáltatók (Google) internetes webhelyeken jeleníthetik meg. Ezek a külső szolgáltatók (Google) cookie-k segítségével tárolják, hogy a Felhasználó korábban már látogatást tett az Adatkezelő Honlapján, és ez alapján – személyre szabottan – jelenítik meg a hirdetéseket Felhasználó (azaz remarketing tevékenységet folytatnak).
            <br><br>
            <span>Google Analytics által elhelyezett cookie-k (sütik)</span><br>
            <span>Adatkezelés célja:</span><br>
            A Honlap látogatottsági és egyéb webanalitikai adatainak független mérését és auditálását külső szolgáltatóként a Google Analytics szervere segíti. A mérési adatok kezeléséről a Google a www.google-analytics.com címen tud részletes felvilágosítást nyújtani.<br>
            A Google Analytics a Google Inc. („Google”) elemző-szolgáltatása. A Google Analytics a Felhasználó számítógépén tárolt cookie-k (sütik) segítségével elemzi a Honlapon létrejött felhasználói interakciókat. Az analitikai célú cookie-k (sütik) anonimizált és aggregált adatok, amelyek alapján a Felhasználó beazonosítása nehézkes, azonban az nem zárható ki.<br>
            A Google Analytics cookie-k (sütik) által gyűjtött analitikai információk a Google szervereire kerülnek átvitelre és tárolásra. Ezeket az információkat a Google az Adatkezelő megbízásából dolgozza fel, hogy kiértékelje a Felhasználók holnaplátogatási szokásait, riportokat állítson össze a Honlapon használatának gyakoriságáról, és további, a használattal összefüggő szolgáltatásokat teljesítsen a Adatkezelő felé.<br>
            <span>Kezelt adatok köre:</span><br>
            IP cím, Az analitikai célú cookie-k (sütik) anonimizált és aggregált adatok, amelyek alapján a számítógép, illetve a Felhasználó személyének beazonosítása nem lehetséges.<br>
            <span>Adatkezelés időtartama:</span><br>
            Nem jár le automatikusan<br>
            <span>Adatkezelés jogalapja:</span><br>
            Felhasználó önkéntes hozzájárulása.<br><br>
            A Google által használt cookie-król (sütikről) további információ megtekinthető a következő linken:  <a href="http://www.google.com/policies/technologies/ads/">http://www.google.com/policies/technologies/ads/ </a><br><br>
            A Google adatvédelmi nyilatkozata megtekinthető az alábbi linken:  <a href="http://www.google.com/intl/hu/policies/privacy/">http://www.google.com/intl/hu/policies/privacy/</a>
            <br><br>
            <span>Google Ads</span><br>
            <span>Adatkezelés célja:</span><br>
            A Honlap a Google Ads remarketing követő kódjait használja. Ennek alapja, hogy az oldalra látogatókat később a Google Display hálózatába tartozó weboldalakon remarketing hirdetésekkel keresse fel Adatkezelő. A remarketing kód cookie-kat használ, a látogatók megcímkézéséhez. A Honlap felhasználói letilthatják ezeket a cookie-kat, amennyiben felkeresik a Google hirdetési beállítások kezelőjét és követik az ott található utasításokat. Ezt követően a számukra nem fognak megjelenni személyre szabott ajánlatok Adatkezelőtől.<br>
            <span>Kezelt adatok köre:</span><br>
            IP cím, remarketing célú cookie-k (sütik) és aggregált adatok, amelyek alapján a számítógép, illetve a Felhasználó személye beazonosítható.<br>
            <span>Adatkezelés időtartama:</span><br>
            Nem jár le automatikusan<br>
            <span>Adatkezelés jogalapja:</span><br>
            Felhasználó önkéntes hozzájárulása.<br><br>
            <span>Facebook retargeting (Facebook pixel)</span><br>
            <span>Adatkezelés célja:</span><br>
            Facebook retargeting kódok segítségével a Honlapot korábban már meglátogató Felhasználó számára különböző kampányokat, promóciókat jelenít meg Adatkezelő.<br>
            <span>Kezelt adatok köre:</span><br>
            IP cím, remarketing célú cookie-k (sütik) és aggregált adatok, amelyek alapján a számítógép, illetve a Felhasználó személye beazonosítható<br>
            <span>Adatkezelés időtartama:</span><br>
            Nem jár le automatikusan<br>
            <span>Adatkezelés jogalapja:</span><br>
            Felhasználó önkéntes hozzájárulása.<br><br><br>
            <span>Optimonk</span><br><br>
            <span>Adatkezelés célja:</span><br><br>
            Az Optimonk kódok segítségével popup üzenetek jeleníthetők meg a Felhasználó számára.Kezelt adatok köre:<br><br>
            IP cím, remarketing célú cookie-k (sütik) és aggregált adatok, amelyek alapján a számítógép, illetve a Felhasználó személye beazonosítható<br><br>
            <span>Adatkezelés időtartama:</span><br><br>
            Nem jár le automatikusan<br><br>
            <span>Adatkezelés jogalapja:</span><br><br>
            Felhasználó önkéntes hozzájárulása.<br><br>
            </p><br><br>
            <h2>3. ADATFELDOLGOZÁS</h2><br><br>
            <p>Adatkezelő az irányadó jogszabályoknak megfelelően jogosult arra, hogy egyes technikai műveletek vagy a szolgáltatás nyújtása céljára adatfeldolgozót vegyen igénybe. Az adatfeldolgozó csak Adatkezelő utasításának, döntéseinek végrehajtására jogosult.<br><br>
            <span>GLS General Logistics Systems Hungary Csomag-Logisztikai Kft.</span><br>
            Székhely: H-2351 Alsónémedi GLS Európa u. 2.<br>
            Telefon: +36 1 802 0265<br>
            Mobil: +36 20 890-0660<br>
            Web:  <a href=" https://gls-group.eu/HU">https://gls-group.eu/HU</a><br>
            E-mail: info@gls-hungary.com<br>
            Tevékenység: csomagok házhozszállítása, futárszolgálat<br><br>

            <span>Magyar Posta Zrt.</span><br>
            Székhely: H-1138 Budapest, Dunavirág utca 2-6<br>
            Telefon: +36-1-767-8282<br>
            Web:  <a href="https://posta.hu">https://posta.hu</a><br>
            E-mail: ugyfelszolgalat@posta.hu<br>
            Tevékenység: csomagok házhozszállítása, futárszolgálat<br>
            </p><br><br>
            <h2>4. ADATBIZTONSÁG</h2><br><br>
            <p>Adatkezelő minden tőle elvárható szükséges intézkedést megtesz az adatok biztonsága érdekében, gondoskodik azok megfelelő szintű védelméről különösen a jogosulatlan hozzáférés, megváltoztatás, továbbítás, nyilvánosságra hozatal, törlés vagy megsemmisítés, valamint a véletlen megsemmisülés és sérülés ellen. Adatkezelő az adatok biztonságáról megfelelő technikai és szervezési intézkedésekkel gondoskodik.
            </p><br><br>
            <h2>5. FELHASZNÁLÓT MEGILLETŐ JOGOK</h2><br><br>
            <h3>5.1 Tájékoztatás és a személyes adatokhoz való hozzáférés</h3><br>
            <p>A Felhasználónak joga van ahhoz, hogy az Adatkezelő által tárolt személyes adatait és a kezelésükkel kapcsolatos információkat megismerhesse; ellenőrizze, hogy Adatkezelő milyen adatot tart nyilván róla, továbbá jogosult arra, hogy a személyes adatokhoz hozzáférést kapjon. A Felhasználó az adatokhoz való hozzáférésre irányuló kérelmét írásban (emailben vagy postai úton) köteles eljuttatni Adatkezelő részére. Adatkezelő az információkat széles körben használt elektronikus formátumban adja meg Felhasználó részére, kivéve, ha a Felhasználó azt nem írásban, papíralapon kéri. Szóbeli tájékoztatást a hozzáférés gyakorlása esetén telefonon keresztül Adatkezelő nem ad.<br><br>
            Hozzáférési jog gyakorlása esetén a tájékoztatás az alábbiakra terjed ki:<br><br>
                        <li>kezelt adatok körének meghatározása, adatkezelés célja, ideje, jogalapja a kezelt adatok körének tekintetében
                        <li> adattovábbítás: kinek a részére kerültek továbbításra az adatok, vagy kerülnek továbbításra a későbbiekben</li> 
                        <li>adatforrás megjelölése.</li></p> <br><br>               
            <p>Adatkezelő a személyes adatok másolatát (személyesen az ügyfélszolgálaton) első alkalommal ingyenesen biztosítja Felhasználó részére. A Adatkezelő által kért további másolatokért Adatkezelő az adminisztratív költségeken alapuló, észszerű mértékű díjat számíthat fel. Ha a Adatkezelő elektronikus úton kéri a másolat kiadást úgy, az információkat emailben, széles körben használt elektronikus formátumban bocsátja Adatkezelő rendelkezésére.<br><br>
            Felhasználó a tájékoztatást követően, amennyiben az adatkezeléssel, a kezelt adatok helyességével nem ért egyet úgy a 6. pontban meghatározottak szerint kérelmezheti a rá vonatkozó személyes adatok helyesbítését, kiegészítését, törlését, kezelésének korlátozását, tiltakozhat az ilyen személyes adatok kezelése ellen, illetve a 7. pontban meghatározott eljárást kezdeményezhet.
            <br><br></p>
            <h3>5.2 Kezelt személyes adatok helyesbítéséhez, kiegészítéséhez való jog</h3><br>
            <p>Felhasználó írásbeli kérelmére Adatkezelő indokolatlan késedelem nélkül helyesbíti Felhasználó által, írásban vagy az Adatkezelő üzleteinek valamelyikében személyesen megjelölt pontatlan személyes adatokat, illetve a hiányos adatok kiegészítését elvégzi Felhasználó által megjelölt tartalommal. Adatkezelő minden olyan címzettet tájékoztat a helyesbítésről, kiegészítésről, akivel a személyes adatot közölte, kivéve, ha ez lehetetlennek bizonyul, vagy aránytalanul nagy erőfeszítést igényel. A Felhasználó e címzettek adatairól tájékoztatja, ha ezt írásban kérelmezi.
            </p><br><br>
            <h3>5.3 Adatkezelés korlátozáshoz való jog</h3><br>
            <p>Felhasználó írásbeli kérelem útján kérheti Adatkezelőtől adatai kezelésének korlátozását, ha a:<br>
                    <li>Felhasználó vitatja a személyes adatok pontosságát, ez esetben a korlátozás arra az időtartamra vonatkozik, amely lehetővé teszi, hogy Adatkezelő ellenőrizze a személyes adatok pontosságát,</li>
                    <li>Az adatkezelés jogellenes, és a Felhasználó ellenzi az adatok törlését, és ehelyett kéri azok felhasználásának korlátozását,</li>
                    <li>Adatkezelőnek már nincs szüksége a személyes adatokra adatkezelés céljából, de a Felhasználó igényli azokat jogi igények előterjesztéséhez, érvényesítéséhez vagy védelméhez,</li>
                    <li>Felhasználó tiltakozik az adatkezelés ellen: ez esetben a korlátozás arra az időtartamra vonatkozik, amíg megállapításra nem kerül, hogy Adatkezelő jogos indokai elsőbbséget élveznek-e a Felhasználó jogos indokaival szemben.</li>
                <br></p>
            <p>Korlátozással érintett személyes adatokat a tárolás kivételével csak Felhasználó hozzájárulásával, vagy jogi igények előterjesztéséhez, érvényesítéséhez vagy védelméhez, vagy más természetes vagy jogi személy jogainak védelme érdekében, vagy az Unió, illetve valamely tagállam fontos közérdekéből lehet ez idő alatt kezelni. Adatkezelő a Felhasználót, akinek kérelmére korlátozta az adatkezelést, az adatkezelés korlátozásának feloldásáról előzetesen tájékoztatja.
            </p><br><br>
            <h3>5.4 Törléshez (elfeledtetéshez) való jog</h3><br>
            <p>Felhasználó kérésére Adatkezelő indokolatlan késedelem nélkül törli az érintett Felhasználóra vonatkozó személyes adatokat, ha a meghatározott indokok valamelyike fennáll: i) a személyes adatokra már nincs szükség abból a célból, amelyből azokat Adatkezelő gyűjtötte vagy más módon kezelte; ii) Felhasználó visszavonja az adatkezelés alapját képező hozzájárulását, és az adatkezelésnek nincs más jogalapja; iii) Felhasználó saját helyzetével kapcsolatos okokból tiltakozik az adatkezelés ellen, és nincs jogszerű ok az adatkezelésre, iv) Felhasználó tiltakozik a rá vonatkozó személyes adatok közvetlen üzletszerzés célból történő adatainak kezelése ellen, ideértve a profilalkotást is, amennyiben az a közvetlen üzletszerzéshez kapcsolódik, v) a személyes adatokat Adatkezelő jogellenesen kezeli; vi) a személyes adatok gyűjtésére közvetlenül gyermekeknek kínált, információs társadalommal összefüggő szolgáltatások kínálásával kapcsolatosan került sor.
            <br><br>
            Felhasználó a törléshez, elfeledtetéshez való jogával nem élhet, ha az adatkezelés szükséges i) a véleménynyilvánítás szabadságához és a tájékozódáshoz való jog gyakorlása céljából; ii) népegészségügy területét érintő közérdek alapján; iii) a közérdekű archiválás céljából, tudományos és történelmi kutatási célból vagy statisztikai célból, amennyiben a törléshez való jog gyakorlása lehetetlenné tenné vagy komolyan veszélyeztetné ezt az adatkezelést; vagy iv) jogi igények előterjesztéséhez, érvényesítéséhez, illetve védelméhez.
            </p><br><br>
            <h3>5.5 Adathordozhatósághoz való jog</h3><br>
            <p>Az adathordozhatóság azt teszi lehetővé, hogy Felhasználó megszerezhesse és a továbbiakban felhasználhassa Adtakezelő rendszerében megtalálható Felhasználó által átadott „saját” adatait, saját céljaira és általa meghatározott különböző szolgáltatókon keresztül, feltéve hogy az adatkezelés szerződésen vagy a Felhasználó hozzájárulásán alapul. Minden esetben a Felhasználó által átadott adatokra korlátozódik a jogosultság, egyéb adatok hordozhatóságára lehetőség nincs. (pl. statisztika stb.)
            <br><br>
            Felhasználó a rá vonatkozó, Adtakezelő rendszerében megtalálható (pl. hírlevél feliratkozás során) személyes adatokat:<br><br>
                    <li> tagolt, széles körben használt, géppel olvasható formátumban megkapja,</li>
                    <li>jogosult más adatkezelőhöz továbbítani,</li>
                <br><br></p>
            <p>Adatkezelő az adathordozhatóságra vonatkozó kérelmet kizárólag emailben vagy postai úton írt kérelem alapján teljesíti. A kérelem teljesítéséhez szükséges, hogy Adatkezelő meggyőződjön arról, hogy valóban az arra jogosult Felhasználó kíván élni e jogával. Ehhez szükséges lehet például, hogy Felhasználó személyesen Adatkezelő székhelyén megjelenjen a jelzést követően, annak érdekében, hogy Adatkezelő betudja azonosítani az igénylő Felhasználót a rendszerében lévő adatok felhasználásával. Felhasználó e jog keretében azon adatok hordozhatóságát igényelheti, melyet saját maga adott meg a Adatkezelő részére. A jog gyakorlása nem jár automatikusan az adatnak Adtakezelő rendszereiből való törlésével, ezért Felhasználó e jogának gyakorlását követően is használhatja Adatkezelő szolgáltatását.
            </p><br><br>
            <h3>5.6 Tiltakozás személyes adatok kezelése ellen</h3><br>
            <p>Felhasználó a saját helyzetével kapcsolatos okokból bármikor tiltakozhat személyes adatainak kezelése ellen, ideértve a profilalkotást is illetve Felhasználó jogosult arra, hogy bármikor tiltakozzon a rá vonatkozó személyes adatok közvetlen üzletszerzés célból történő kezelése ellen, ideértve a profilalkotást is. Ha Felhasználó tiltakozik a személyes adatok kezelése ellen, akkor a személyes adatok a továbbiakban Adatkezelő törli a Felhasználót rendszeréből.
            <br><br>
            Felhasználó tiltakozni írásban (emailben vagy postai úton) illetve hírlevél esetén a hírlevélben található leiratkozás linkre kattintva is tud.
            <br><br>
            </p><br><br>
            <h3>5.7 Kérelem teljesítésének határideje</h3><br>
            <p>Adatkezelő indokolatlan késedelem nélkül, de mindenképpen a 6.1. - 6.6. pont szerinti bármely kérelem beérkezésétől számított egy hónapon belül tájékoztatja Felhasználót a hozott intézkedésekről. Szükség esetén, figyelembe véve a kérelem összetettségét és a kérelmek számát, ez a határidő további két hónappal meghosszabbítható, de ez esetben a késedelem okainak megjelölésével Adatkezelő a kérelem kézhezvételétől számított egy hónapon belül tájékoztatja Felhasználót. Ha Felhasználó elektronikus úton nyújtotta be a kérelmet, a tájékoztatást Adtakezelő elektronikus úton adja meg, kivéve, ha azt Felhasználó másként kéri.
            </p><br><br>
            <h2>6. JOGÉRVÉNYESÍTÉSI LEHETŐSÉGEK</h2><br>
            <p>Felhasználó jogait emailben vagy postai úton küldött írásbeli kérelemben gyakorolhatja.<br><br>
                Felhasználó jogait érvényesíteni nem tudja, ha Adatkezelő bizonyítja, hogy nincs abban a helyzetben, hogy azonosítsa Felhasználót. Ha Felhasználó kérelme egyértelműen megalapozatlan vagy túlzó (különösen az ismétlődő jellegre figyelemmel) Adatkezelő a kérelem teljesítéséért észszerű mértékű díjat számíthat fel vagy megtagadhatja az intézkedést. Ennek bizonyítása Adatkezelőt terheli. Ha Adatkezelő részéről kétség merül fel a kérelmet benyújtó természetes személy kilétével kapcsolatban, további, a kérelmező személyazonosságának megerősítéséhez szükséges információk nyújtását kérheti.<br><br>
                Felhasználó az Info.tv., a Rendelet, valamint a Polgári Törvénykönyv (2013. évi V. törvény) alapján<br><br>
                <li>Nemzeti Adatvédelmi és Információszabadság Hatósághoz (1055 Budapest, Falk Miksa utca  9-11..; www.naih.hu) fordulhat vagy</li>
                <li>Bíróság előtt érvényesítheti jogait.</li>
                <br><br></p>
            <h2>7. ADATVÉDELMI INCIDENSEK KEZELÉSE</h2><br>
            <p>Az adatvédelmi incidens a biztonság olyan sérülése, amely a továbbított, tárolt vagy más módon kezelt személyes adatok véletlen vagy jogellenes megsemmisítését, elvesztését, megváltoztatását, jogosulatlan közlését vagy az azokhoz való jogosulatlan hozzáférést eredményezi. Adatkezelő az adatvédelmi incidenssel kapcsolatos intézkedések ellenőrzése, a felügyeleti hatóság tájékoztatása, valamint Felhasználó tájékoztatása céljából nyilvántartást vezet, amely tartalmazza az incidenssel érintett személyes adatok körét, az érintettek körét és számát, az incidens időpontját, körülményeit, hatásait, az elhárítására megtett intézkedéseket. Adatkezelő incidens bekövetkezése esetén – kivéve, ha nem jár kockázattal a természetes személyek jogaira és szabadságaira nézve - indokolatlan késedelem nélkül, de legfeljebb 72 órán belül tájékoztatja Felhasználót és a felügyeleti hatóságot az adatvédelmi incidensről.
            </p><br><br>
            <h2>8. EGYÉB RENDELKEZÉSEK</h2><br>
            <p>Adtakezelő fenntartja a jogot, hogy jelen Adatkezelési Tájékoztatót, a honlapot használó Felhasználók -a honlaponján keresztül történő– előzetes értesítése mellett, egyoldalúan módosítsa. A módosítások az értesítésben megjelölt napon lépnek hatályba a Felhasználóval szemben, kivéve, ha a módosítások ellen a Felhasználó tiltakozik. Felhasználó a honlap használatával, ún. ráutaló magatartással, elfogadja az Adatkezelési Tájékoztatóban foglaltakat.
            <br><br>
            Amennyiben a Felhasználó szolgáltatás igénybevételéhez a hírlevélre történő feliratkozás során harmadik fél adatait adta meg, vagy a Honlap használata során bármilyen módon kárt okozott, a Adtakezelő jogosult a Felhasználóval szembeni kártérítés érvényesítésére.
            <br><br>
            Adtakezelő a neki megadott személyes adatokat nem ellenőrzi. A megadott adatok megfelelősségéért kizárólag az azt megadó személy felel. Bármely Felhasználó e-mail címének megadásakor egyben felelősséget vállal azért, hogy a megadott e-mail címről kizárólag ő vesz igénybe szolgáltatást.
            <br><br>
            Jelen Adatkezelési Szabályzat hatályba lépésének időpontja: 2021. 11. 10.</p><br><br>
    
    
            </article>
            </div>';

   
            }
    else

    $page = get_page();
      switch($page)
  {
      case 'termek': termek_page(); break;
      case 'alkategoria':alcategory_page(); break;
      case 'kategoria': category_page(); break;
     
  }}

 page_footer();?>

