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
    
    $page = 'ÁLTALÁNOS SZERZŐDÉSI FELTÉTELEK';

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
if($page == 'ÁLTALÁNOS SZERZŐDÉSI FELTÉTELEK')
{
   echo'
<div class="ÁSZF">
    <article class="feltetel">
        <h1>ÁLTALÁNOS SZERZŐDÉSI FELTÉTELEK</h1><br> 

        <section class="kell">Jelen Általános Szerződési Feltételek (továbbiakban ÁSZF) dokumentum tartalmazza a <a href="index.php"> www.allatmania.hu</a> weboldalon (a továbbiakban: Honlap) elérhető online áruház igénybevételének, igénybevevő (továbbiakban: Vásárló) általi használatának feltételeit. Az ÁSZF tartalmazza továbbá a Honlapon elérhető online áruházon keresztül történő vásárlás és szerződéskötés feltételeit, valamint a szerződéskötés alapján létrejött jogviszonyra vonatkozó feltételeket.<br><br>
        A Honlap használatához szükséges azon technikai tájékoztatást, melyet jelen ÁSZF nem tartalmaz, a Honlapon elérhető egyéb tájékoztatások nyújtják. Jelen ÁSZF rendelkezéseit, illetve a Honlapon elérhető tájékoztatókat és egyéb információkat együttesen, egymásra tekintettel kell értelmezni.<br><br>
        Amennyiben a jelen ÁSZF és a Honlapon elérhető tájékoztatók és egyéb információk tartalma eltér, úgy a jelen ÁSZF rendelkezései az irányadóak.<br><br>
        A szerződés nyelve magyar. <br><br>
        A Honlapon leadott megrendelés nem írásban, hanem ráutaló magatartással tett jognyilatkozatnak minősül, így a Vásárló és az  Állatmánia közötti elektronikus úton kötött szerződés nem minősül írásbeli szerződésnek, azokat  Állatmánia nem iktatja, így az utólag nem hozzáférhető és nem megtekinthető.<br><br>
        Állatmánia semmilyen magatartási kódex rendelkezéseinek nem veti alá magát.<br><br>
        Vásárló a Honlap használatával tudomásul veszi és elfogadja az alábbiakat:<br><br>    
        <h2>1. A HONLAPON FOLYTATOTT TEVÉKENYSÉG</h2><br> 
        A kisállattartáshoz szükséges felszerelések, egyéb kiegészítő termékek és tápok kiskereskedelmi értékesítése.<br> <br> 
        <h2>2. A HONLAPON TÖRTÉNŐ VÁSÁRLÁS</h2><br> 
        <h3>2.1 Regisztráció</h3><br> 
        A Honlapon történő vásárlásnak feltétele az érvényes regisztráció.<br><br> 
        Regisztrálni a „Regisztráció” feliratra kattintva vagy pedig a megrendelés során a regisztrációs felület értelemszerű kitöltésével tud a Vásárló.  A regisztrációs felületen a következő adatokat szükséges megadni:<br><br> 
            <p>
                <li>Vezetéknév</li>
                <li>Keresztnév</li>
                <li>Mobiltelefonszám</li>
                <li>Email cím</li>
                <li>Szállítási cím: Ország, Irányítószám, Megye, Város, Utca, házszám</li>
                <li>Számlázási cím, ha nem egyezik a szállítási címmel.</li>
                <li>Jelszó
             </p>  
        A regisztráció elküldéséhez a Vásárlónak ezen a felületen található jelölőnégyzet kipipálásával el kell fogadnia jelen ÁSZF-et és az adatkezelési tájékoztatót.<br> <br> 
        A regisztrációt a „Regisztrációs adatlap elküldése” gombra kattintva véglegesítheti.<br> <br> 
        A regisztráció során a rendszer a Vásárlót automatikusan bejelentkezteti.<br> <br> 
        Vásárlónak ezen a felületen lehetősége van feliratkoznia az Állatmánia hírlevelére a jelölőnégyzet kipipálásával.<br> <br> 
        A regisztráció elküldése után az Állatmánia e-mailben egy aktiváló linket küld, mellyel a regisztrációt meg kell erősíteni. Az aktiváló link használata nélkül a Vásárló megrendelése inaktív és bejelentkezni sem tud.<br> <br> 
        A regisztráció aktiválását követően, Vásárló a Honlap tetején található „Bejelentkezés” menüpont alatt tud a belépési adatait megadva (e-mailcím, jelszó) belépni a Honlapra.<br> <br> 
        Vásárló jogosult a regisztrációjának törlését kérni info@mania.hu e-mail címre küldött üzenettel. Az üzenet megérkezését követően  Állatmánia haladéktalanul gondoskodik a regisztráció törléséről. Vásárló felhasználói adatai a törlést követően azonnal eltávolításra kerülnek a rendszerből; ez azonban nem érinti a már leadott rendelésekhez kapcsolódó adatok és dokumentumok megőrzését, nem eredményezi ezen adatok törlését. Az eltávolítás után az adatok visszaállítására többé nincs mód.<br> <br> 
        A felhasználói hozzáférési adatok (így különösen a jelszó) titokban tartásáért kizárólag a Vásárló a felelős. Amennyiben Vásárló tudomást szerez arról, hogy a regisztráció során megadott jelszavához jogosulatlan harmadik személy hozzájuthatott, köteles haladéktalanul megváltoztatni jelszavát, ha pedig feltételezhető, hogy a harmadik személy a jelszó használatával bármilyen módon visszaél, köteles egyidejűleg értesíteni az Állatmánia ügyfélszolgálatát.<br> <br> 
        Vásárló vállalja, hogy a regisztráció során megadott személyes adatokat szükség szerint frissíti annak érdekében, hogy azok időszerűek, teljesek és a valóságnak megfelelőek legyenek.<br> <br>      
       <h3>2.2 Megrendelés</h3><br> 
        A Honlapon a Vásárló megrendelést adhat le a Honlapon eladásra meghirdetett termékekre. <br><br>
        Vásárló a Honlapon megrendelhető, kategóriákba rendezett termékek között böngészhet.<br><br>
        Lehetősége van a Honlap tetején kereső mezőt kitöltve, az általa megvásárolni kívánt termékre név szerint is rákeresni. Ha a Honlapon eladásra meghirdetett valamely termék megfelel a Vásárló keresésének, akkor a rendszer azt megjeleníti.<br><br>
        A Termékek részletes jellemzőiről, áráról, illetve esetlegesen egyéb választható tulajdonságáról, a termék nevére vagy a terméket ábrázoló képre történő kattintást követően tájékozódhat.<br><br>
        A terméket a „Kosárba” vagy a “Megrendelem” gombra kattintva tudja virtuális kosarába helyezni, és kosárba helyezés előtt a termék mennyiségét, a mennyiség pontos beírásával meg tudja adni.<br><br>
        A kosár tartalmát (a kiválasztott termék darabszámát, és a megrendelés összegét) Vásárló a Honlap jobb oldalán, a kosár ikonra kattintva megtekintheti.<br><br>
        A kosár felületen a Vásárló részletesen megtekintheti és ellenőrizheti a kosárba helyezett termékek listáját, azok bruttó árát, a megrendelni kívánt darabszámot, valamint az összegző táblázat alján a megrendelése végösszegét.<br><br>
        Ezen a felületen a Vásárló még bármikor módosítani tud kosarának tartalmán, hiszen lehetősége van arra, hogy töröljön terméket kosarából a termék darabszámának nullára csökkentésével. Ezen a felületen a Vásárlónak ki kell választania a kívánt szállítási módot is, majd a „Tovább” gombra kattintani.<br><br>
        Ezt követően a rendszer a „Megrendelő adatai” felületre navigálja, ahol a Vásárló a regisztráció során megadott adatain (pl. szállítási vagy számlázási cím) még módosítani tud. Ha az adatok rendben vannak, akkor ismét a „Tovább” gombra kattintva a „Fizetés módja” felületre érkezik, ahol kiválaszthatja a fizetési módot a rendelkezésre álló lehetőségek közül. Ha Vásárló választott a rendelkezésre álló lehetőségek közül, akkor a jelen ÁSZF és az adatkezelési tájékoztató elfogadása szükséges, majd a „Tovább” gombra kattintva egy összegző felültre navigálja a rendszer, ahol megtekintheti a megrendelésének összes adatát. Az összegző felületen megjegyzést is fűzhet megrendeléséhez. Ha az összegző felületen lévő adatokkal kapcsolatban mindent rendben talált, akkor a „Megrendelem” gombra kattintva tudja elküldeni megrendelését az Állatmánia részére.<br><br>
        A rendelés feladása tehát a „Megrendelem” gombra kattintással történik, ami a Vásárló részére fizetési kötelezettséget keletkeztet.<br><br>
        A megrendelésének állapotát a regisztrált Vásárló a megrendelés teljesítéséig figyelemmel kísérheti felhasználói fiókjában a bejelentkezést követően.<br><br>
        Ha Vásárló hibát vesz észre a visszaigazoló e-mailben szereplő adatok tekintetében, azt haladéktalanul jelezze az  Állatmánia felé a nem kívánt rendelések teljesítésének elkerülése érdekében.<br><br>
        <h3>2.3 Termékek ára</h3><br> 
        A Honlapon megjelenített termékek vételára az általános forgalmi adót és egyéb közterheket is tartalmazó módon (bruttóban) van feltüntetve.<br><br>
        A termékek mellett feltüntetett vételár nem tartalmazza a kiszállítás költségét. Külön csomagolási költség azonban nem kerül felszámításra.<br><br>
        A termékek ára magyar forintban (Ft) kerül feltüntetésre.<br><br>
        A fizetendő végösszeg a megrendelés összesítője és visszaigazoló levél alapján minden költséget tartalmaz, beleértve a szállítás díját is, amennyiben a Vásárló olyan szállítási módot választott, amelyért az Állatmánia díjat számít fel.<br><br>
        Állatmánia nem vállal felelősséget a gondossága ellenére és/vagy a rendszer hibájából eredően, bárki számára felismerhető módon, hibásan feltüntetett árért, illetve a nyilvánvalóan téves, a termék közismert nagyságrendű árától jelentősen eltérő, irreális árra. Ilyen esetekben az  Állatmánia nem köteles a terméket a Honlapon hibásan feltüntetett áron szolgáltatni. Hibásan feltüntetett ár esetén, az Állatmánia, a rendelés visszaigazolásában vagy azt követően ajánlja fel, a termék valós áron történő megvásárlásának lehetőségét, mely információ birtokában a Vásárló eldöntheti, hogy megrendeli-e valós áron a terméket vagy sem.<br><br>
        <h3>2.4 Adatbeviteli hibák javítása</h3><br> 
        Vásárlónak a rendelés bármely szakaszában és a megrendelés  Állatmánia részére való elküldéséig a Honlapon bármikor lehetősége van az adatbeviteli hibák javítására, akár a saját fiókjában (felhasználói adatok módosítása), akár a megrendelési felületen (pl. termék törlése a kosárból a darabszám nullára csökkentésével). Adatbeviteli hibának minősül például egy rosszul megadott mennyiség, rossz termék elhelyezése a kosárban, majd a termék törlése a kosárból, rendelési adatok elírása stb. (pl. szállítási cím).<br><br>
        Az  Állatmánia nem vállal felelősséget az adatbeviteli hibákból eredő károkért, mivel az adatok megadásáért minden esetben a Vásárló a felelős.<br><br>
        <h3>2.5 Ajánlat, Ajánlati kötöttség, visszaigazolás</h3><br> 
        A Vásárló által elküldött ajánlat megérkezését az  Állatmánia késedelem nélkül, de legkésőbb 48 órán belül automatikus rendelési összesítő e-mail-t küld a Vásárló részére, mely rendelési összesítő e-mail tartalmazza a Vásárló által a vásárlás során megadott adatokat (számlázási és szállítási információk), a rendelés azonosítóját, a rendelés dátumát a megrendelt termékek felsorolását, mennyiségét, a termék árát, szállítási költséget és a fizetendő végösszeget.<br><br>
        Vásárló mentesül az ajánlati kötöttség alól, ha késedelem nélkül, de legkésőbb 48 órán belül nem kapja meg az Állatmániától az elküldött rendelésére vonatkozó rendelési összesítő e-mailt.<br><br>
        Ezen rendelési összesítő e-mail  Állatmánia részéről a Vásárló által tett ajánlat beérkezésének minősül.<br><br>
        Az  Állatmánia ezt követően megkezdi a megrendelés feldolgozását, majd a kiszállítást megelőző időpontban értesíti a Vásárlót egy megrendelés visszaigazoló e-mail-ben, mely visszaigazoló e-mail tartalmazza a Vásárló által a vásárlás során megadott adatokat (számlázási és szállítási információk), a rendelés azonosítóját, a rendelés dátumát a megrendelt termékek felsorolását, mennyiségét, a termék árát, szállítási költséget és a fizetendő végösszeget.<br><br>
        Ezen visszaigazoló e-mail  Állatmánia részéről a Vásárló által tett ajánlat elfogadásának minősül, mellyel érvényes szerződés jön létre az  Állatmánia és a Vásárló között.<br><br>
        A megrendelés elektronikus úton megkötött szerződésnek minősül, amelyre a polgári törvénykönyvről szóló 2013. évi V. törvény, az elektronikus kereskedelmi szolgáltatások, valamint az információs társadalommal összefüggő szolgáltatások egyes kérdéseiről szóló 2001. évi CVIII. törvényben foglaltak irányadóak. A szerződés a fogyasztó és a vállalkozás közötti szerződések részletes szabályairól szóló 45/2014 (II.26.) Korm. rendelet hatálya alá tartozik, és szem előtt tartja a fogyasztók jogairól szóló Európai Parlament és a Tanács 2011/83/EU irányelvének rendelkezéseit. <br><br>    
        <h3>2.6 Fizetés</h3><br> 
        <h3>2.6.1 Fizetés utánvétellel, utánvét összege</h3><br> 
        Készpénzben a személyes átvétel során az átvétel helyén: A Vásárlónak lehetősége van személyes átvétel alkalmával az Állatmánia által, a rendelést követően megadott címen készpénzben fizetni.<br><br>
        Kiszállítás esetén: A termék ellenértékének kiegyenlítése történhet utánvétellel készpénzben, vagy utánvétellel bankkártyával a futár részére.<br><br>
        Csomagpontra történő kiszállítás esetén: Az összes GLS CsomagPontban készpénzzel lehet a megrendelés összegét kiegyenlíteni, illetve egyes üzletekben bankkártyát is elfogadnak. Az összes MPL PostaPontban készpénzzel lehet a megrendelés összegét kiegyenlíteni, illetve egyes üzletekben bankkártyát is elfogadnak.<br><br>
        Amennyiben a Házhozszállítást vagy a Csomagpontra történő kiszállítást választotta, lehetősége van utólagos, készpénzes és bankkártyás fizetésre is a futárnál. Ebben az esetben a csomag átvételekor a futárnak kell kifizetni a rendelés ellenértékét(utánvét).<br>
        Utánvétes fizetési módnál Webáruházunk kezelési költséget számíthat fel, amelyről a megrendelés leadása során, a weboldalon tájékoztatjuk a vásárlót. Webáruházunk utánvét-kezelési költsége bruttó 290,-Ft, amelyről a rendelés feladása közben tájékoztatjuk.<br><br>
        A megrendelőnek joga van a megrendelésének értékétől eltérő összegű csomag átvételét megtagadni, ugyanakkor ha átvételkor megrendelésének értékénél kissebb összeget fizet meg  Állatmánia részére, vagy a fizetési kötelezettséggel járó csomagja után nem fizet, úgy az Állatmánia fenntartja magának azon jogát, hogy –a futárszolgálatok rendszerében adatbázishiba miatt vagy tévesen rögzített utánvétes összegek esetében, a különbözet megfizetését megrendelőtől bankszámlaszámára utalással bekérje. Az átvett, de felszólítás után ki nem egyenlített megrendelések jogi következményt vonnak maguk után.<br><br>
        <h3>2.6.2 Fizetés előre utalással</h3><br> 
        Előre utalás esetén a megjegyzés rovatban a megrendelés számot minden esetben feltüntetni szükséges. Ezen fizetési mód választása esetén a rendelés összesítő e-mail kiküldését követően a Vásárlónak kell elutalnia a megrendelésének értékét.  Az Állatmánia csak ezt követően kezdi meg a megrendelés teljesítését, ezt követően adja át a futárnak és értesíti a Vásárlót arról, hogy megrendelése mely napon kerül kiszállításra, illetve az mely napon vehető át személyesen.<br> <br> 
        <h3>2.6.3 Fizetés Bankkártyával</h3><br> 
        Az online bankkártyás fizetések a Barion rendszerén keresztül valósulnak meg. A bankkártya adatok a kereskedőhöz nem jutnak el, így azok biztonságáról a Barion rendszere gondoskodik. A szolgáltatást nyújtó Barion Payment Zrt. a Magyar Nemzeti Bank felügyelete alatt álló intézmény, engedélyének száma: H-EN-I-1064/2013.<br>
        Ha a vásárló bankkártyával kíván fizetni, akkor a fizetéskor a Barion rendszerén keresztül fizethet. A Bariont választva megjelenik a fizetési felület, ahol meg kell megadnia a kártya számát, a lejárat dátumát, CVC kódját, a nevét és az email címét. Ha a Vásárló ezen adatokat megadta, akkor ki tudja fizetni megrendelését azonnal.<br> <br> 
        <h3>2.7 Számlázás</h3><br> 
        Állatmánia a megrendelt termékek kiszállítását megelőzően, a csomag feladásának időpontjában elektronikus számlát állít ki a Vásárló részére a számlázz.hu rendszerén keresztül, így a termékkel együtt kinyomtatott számlát nem ad.<br> <br> 
        Amennyiben a Vásárló papír alapú számla kiállítását kéri, úgy azt az Állatmánia vevőszolgálata bruttó 300,-Ft térítés ellenében állítja ki.<br> <br> 
        Állatmánia a személyes átvétellel megrendelt termékek összekészítését követően, a csomag átvételi pontra értkezésének időpontjában elektronikus számlát állít ki a Vásárló részére a számlázz.hu rendszerén keresztül, így a termékkel együtt kinyomtatott számlát nem ad.<br> <br> 
        Az elektronikus számla minden esetben automatikusan a vásárló által megadott e-mail címre kerül kiküldésre a megrendelés feladásáról vagy átvehetőségéről kiküldött e-mail csatolmányaként.<br> <br> 
        <h3>2.8 Termékek kiszállítása</h3><br>
        <h3>2.8.1 Kiszállítás módja, költsége</h3>
        <p><li> GLS házhozszállítás</li><br>
            A futárszolgálat a csomag  Állatmániától való átvételét követően e-mail értesítést küldd a Vásárlónak, mely e-mailben található linkre kattintva a Vásárlónak lehetősége van a szállítási időpont módosítására, valamint a fuvarlevélszám alapján, a küldemény online történő követésére.<br><br>
            Ha a Vásárló a megjelölt időpontban nem tartózkodik a megadott szállítási címen és a csomag átvétele meghiúsul, a futár értesítést hagy a szállítási címen. Az értesítőn található szám segítségével a Vásárlónak lehetősége van a futárszolgálatnál új szállítási cím és időpont megadására, illetve egyeztetésére. A futárszolgálat további 1 alkalommal kísérli meg a megrendelt termékek kiszállítását.<br><br>
            A futárszolgálat tehát összesen kétszeri kézbesítést kísérel meg, azonban, ha a 2. kiszállítás is sikertelen – Vásárlónak felróható okból -, akkor a 3. kiszállítást a GLS csak akkor kísérli meg újból, ha a Vásárló a megrendelés ellenértékét átutalással  Állatmánia részére kifizette és a vételár az Állatmánia számláján jóváírásra került.<br><br>
            Amennyiben az átvételkor láthatóan sérült a csomagolás, és a sérülés az áru átvételét megelőzően keletkezett, a Vásárló a futár jelenlétében kibonthatja a csomagot és ellenőrizheti azt, majd eldöntheti, hogy átveszi-e a csomagot.  Amennyiben Vásárló nem veszi át a csomagot, küldje vissza azt. A csomag visszavételét és cseréjét az Állatmánia díjmentesen biztosítja.<br><br>     
            <li> GLS Csomagpont</li><br>
            Az áru feladását követő munkanapon a GLS e-mail értesítőt küld a Vásárló részére, hogy a megrendelése a választott GLS Csomagpontban átvehető.<br><br>
            Az értesítő tartalmazza a csomagszámot, amelyre hivatkoznia kell az átvételnél.<br><br>
            Az értesítést követő 5 munkanapon belül kell a csomagot átvenni a kiválasztott csomagponton, annak nyitva tartási idejében.<br><br>
            A kiszállítás költsége súlyhatártól, értéktől, illetve a kiszállítás módjától is függ. A kiszállítás költségéről, illetve a szállítás vagy a személyes átvétel egyéb feltételeiről a Vásárló a Honlapon a Kiszállítás és Termékek átvétele menüponton belül bővebben tájékozódhat.<br><br>
            <li> MPL házhozszállítás</li><br>
            A futárszolgálat a csomag  Állatmániától való átvételét követően e-mail értesítést küldd a Vásárlónak, mely e-mailben található linkre kattintva a Vásárlónak lehetősége van a küldemény online történő követésére.<br><br>
            Ha a Vásárló a megjelölt időpontban nem tartózkodik a megadott szállítási címen és a csomag átvétele meghiúsul, a futár értesítést hagy a szállítási címen. Az értesítőn található szám segítségével a Vásárlónak lehetősége van a futárszolgálatnál új szállítási cím és időpont megadására, illetve egyeztetésére. A futárszolgálat további 1 alkalommal kísérli meg a megrendelt termékek kiszállítását.<br><br>
            A futárszolgálat tehát összesen kétszeri kézbesítést kísérel meg, azonban, ha a 2. kiszállítás is sikertelen – Vásárlónak felróható okból -, akkor a csomagja a területileg illetékes postahivatalba kerül ahol a következő 2 munkanapon a csomagja átvehető.<br><br>
            Amennyiben az átvételkor láthatóan sérült a csomagolás, és a sérülés az áru átvételét megelőzően keletkezett, a Vásárló a futár jelenlétében kibonthatja a csomagot és ellenőrizheti azt, majd eldöntheti, hogy átveszi-e a csomagot.  Amennyiben Vásárló nem veszi át a csomagot, küldje vissza azt. A csomag visszavételét és cseréjét az  Állatmánia díjmentesen biztosítja.<br><br>
            <li> MPL PostaPont</li><br>
            Az áru feladását követő munkanapon az MLP e-mail értesítőt küld a Vásárló részére, hogy a megrendelése a választott MPL PostaPontban átvehető.<br><br>
            Az értesítő tartalmazza a csomagszámot, amelyre hivatkoznia kell az átvételnél.<br><br>
            Az értesítést követő 5 munkanapon belül kell a csomagot átvenni a kiválasztott PostaPonton, annak nyitva tartási idejében.<br><br>
            A kiszállítás költsége súlyhatártól, értéktől, illetve a kiszállítás módjától is függ. A kiszállítás költségéről, illetve a szállítás vagy a személyes átvétel egyéb feltételeiről a Vásárló a Honlapon a Kiszállítás és Termékek átvétele menüponton belül bővebben tájékozódhat.<br><br>
        </p>   
        <h3>2.8.2 Csomag tartalmának ellenőrzése</h3><br>
        A megrendelő köteles az átvételt követő 24 órán belül a kiszállított megrendelésének tartalmát a csomagban található árukísőrő szállítólevél alapján tételesen ellenőrizni. Amennyiben termékhiányt vagy más eltérést fedez fel (pl. téves teljesítés történt: azonos kiszerelésű kutyás termék helyett macskás termék került kiszállításra), akkor erről köteles  Állatmánia ügyfélszolgálatát –a hibás termékekről készült fotókat becsatolva–, írásban értesíteni.<br><br>
        Állatmánia a csomagolás folyamatát zárt láncú kamerarendszeren keresztül rögzíti, így a téves teljesítések könnyedén nyomonkövethetőek. Ennek megfelelően ha téves teljesítés történt –kevesebb/több, vagy más termék kerül a csomagba– az ellenőrzést követően  Állatmánia azonnal intézkedik saját költségén a csomagcseréről. Amennyiben a kamera felvételeken jól láthatóan a megrendelt termékek csomagolása/feladása megtörténik, úgy  Állatmánia megtagadhatja a termék ismételt kiküldését felhasználó részére.<br><br>
        Amennyiben a megrendelő a tévesen kiszállított, de átvett terméket felbontotta, csomagolását részben vagy egészében megsemmisítette, a terméket használta, majd ezt követően kíván csereterméket kérni vagy elállási jogával élni, úgy az Állatmánia jogosult a termék állapotától és újraértékesíthetőségének fokától függően a csereterméket vagy az elállási jog gyakorlását megtagadni. Kérjük emiatt a csomag tartalmának ellenőrzésekor figyelmesen járjon el. Lásd még: 3. ELÁLLÁSI JOG<br><br>
      
        <h3>2.8.3 Szállítási határidő</h3><br>
        A megrendelés kiszállításának határideje 2-4 munkanap. Rendelhető státuszú termékek esetében ennél hosszabb is lehet.<br><br>
        Állatmánia – a Felek eltérő megállapodásának hiányában - a szerződés megkötését követően késedelem nélkül, de legkésőbb harminc napon belül köteles a fogyasztó rendelkezésére bocsátani (kiszállítani) a terméket.<br><br>
        Az  Állatmánia késedelme esetén a fogyasztónak minősülő Vásárló jogosult póthatáridőt tűzni. Ha az Pe Állatmániatnet a póthatáridőn belül nem teljesít, a fogyasztó jogosult a szerződéstől elállni.<br><br>
        A fogyasztó póthatáridő tűzése nélkül akkor jogosult a szerződéstől elállni akkor, ha<br><br>
        az  Állatmánia a szerződés teljesítését megtagadta; vagy<br><br>
        a szerződést a felek megállapodása szerint vagy a szolgáltatás felismerhető rendeltetésénél fogva a meghatározott teljesítési időben - és nem máskor - kellett volna teljesíteni.<br><br>
       
       <h2> 3. ELÁLLÁSI JOG</h2><br>
        Az e pontban foglaltak kizárólag a szakmája, önálló foglalkozása vagy üzleti tevékenysége körén kívül eljáró természetes személyre vonatkoznak, aki árut vesz, rendel, kap, használ, igénybe vesz, valamint az áruval kapcsolatos kereskedelmi kommunikáció, ajánlat címzettje (a továbbiakban „Fogyasztó”).<br><br>
        Fogyasztó a szerződés a fogyasztó és a vállalkozás közötti szerződések részletes szabályairól szóló 45/2014 (II.26.) Korm. rendelet értelmében jogosult a termék adásvételére irányuló szerződés esetén<br><br>
        <p>
            <li>terméknek,</li>

            <li>több termék szolgáltatásakor az utoljára szolgáltatott terméknek,</li>

            <li>több tételből vagy darabból álló termék esetén az utoljára szolgáltatott tételnek vagy darabnak,</li>

            <li>ha a terméket meghatározott időszakon belül rendszeresen kell szolgáltatni, az első szolgáltatásnak, a Fogyasztó vagy az általa megjelölt, a fuvarozótól eltérő harmadik személy általi átvételének napjától számított tizennégy (14) napon belül a szerződéstől indokolás nélkül elállni.</li>
        </p>
        Fogyasztót megilleti az a jog, hogy a szerződés megkötésének a napja és a termék átvételének napja közötti időszakban is gyakorolja elállási jogát.<br><br>
        Ha a Fogyasztó elállási jogával élni kíván, elállási szándékát tartalmazó egyértelmű nyilatkozatát köteles eljuttatni (például postán vagy elektronikus úton küldött levél útján) az ügyfélszolgálat részére:<br><br>
        <span>Elállási Jog gyakorlása:</span><br><br>
        E-mail: info@mania.hu<br><br>
        Fogyasztó határidőben gyakorolja elállási jogát, ha a fent megjelölt határidő lejárta előtt (akár a 14. napon) elküldi elállási nyilatkozatát az  Állatmánia részére.<br><br>
        A Fogyasztót terheli annak bizonyítása, hogy elállási jogát a 3. pontban meghatározott rendelkezéseknek megfelelően gyakorolta.<br><br>
        Ezen esetben az  Állatmánia e-mailben 48 órán belül visszaigazolja a Fogyasztó elállási nyilatkozatának megérkezését.<br><br>
        Írásban történő elállás esetén azt határidőben érvényesítettnek kell tekinteni, ha Fogyasztó az erre irányuló nyilatkozatát 14 naptári napon belül (akár a 14. naptári napon) elküldi az  Állatmánia ügyfélszolgálatának címére.<br><br>
        Postai úton történő jelzés alkalmával a postára adás dátumát, e-mail keresztül történő értesítés esetén az e-mail küldésének idejét veszi figyelembe az Állatmánia a határidő számítás szempontjából. A Fogyasztó levelét ajánlott küldeményként kell postára adja, hogy hitelt érdemlően bizonyítható legyen a feladás dátuma.<br><br>
        Fogyasztó elállás esetén köteles a megrendelt terméket az  Állatmánia címére indokolatlan késedelem nélkül, de legkésőbb elállási nyilatkozatának közlésétől számított 14 napon belül visszaküldeni. A határidő betartottnak minősül, ha Fogyasztó a 14 napos határidő letelte előtt elküldi (postára adja vagy futárnak átadja) a terméket.<br><br>
        A termék  Állatmánia címére történő visszaküldésének költsége minden esetben Fogyasztót terheli. Tehát az  Állatmánia nem vállalja át a visszaszállítás lebonyolítását, illetve költségét a Fogyasztótól. Az  Állatmániának az utánvéttel visszaküldött csomagot nem áll módjában átvenni. A termék visszaküldésének költségén kívül az elállás kapcsán a Fogyasztót semmilyen más költség nem terheli.<br><br>
        Ha Fogyasztó eláll a szerződéstől,  Állatmánia haladéktalanul, de legkésőbb a Fogyasztó elállási nyilatkozatának kézhezvételétől számított 14 napon belül visszatéríti azon termék árát, melyen a fogyasztó gyakorolta elállási jogát, ugyanakkor az Állatmánia jogosult a visszatérítést mindaddig visszatartani, amíg vissza nem kapta a terméket, és meg nem győződött arról, hogy a termék sértetlen, újra értékesíthető állapotban érkezett meg a részére.
        Fogyasztó elállási szándékát tartalmazó egyértelmű nyilatkozatában meg kell adja bankszámlaszámát, melyre kéri a visszatérítését. A bankszámlaszám telefonon vagy más formában nem megadható, azt a Fogyasztó által megírt módon –postán vagy elektronikus úton küldött levél formájában írásban kell az  Állatmánia részére bocsátania.
        A visszatérítést az Állatmánia kizárólag a Fogyasztó bankszámlaszámára átutalással teljesíti, így e visszatérítési mód alkalmazásából kifolyólag a visszatérítés a későbbiekben is nyomonkövethető, ellenőrizhető.<br><br>
        Fogyasztó kizárólag akkor vonható felelősségre a termékben bekövetkezett értékcsökkenésért, ha az a termék csomagolásának, jellegének, tulajdonságainak és működésének megállapításához szükséges használatot meghaladó sérülés vagy használat miatt következett be. Az  Állatmánia tehát követelheti a termék jellegének, tulajdonságainak és működésének megállapításához szükséges használatot meghaladó használatból eredő értékcsökkenés, illetve ésszerű költségeinek – ha szolgáltatásnyújtásra irányuló szerződés teljesítését a Fogyasztó kifejezett kérésére a határidő lejárta előtt megkezdte és gyakorolja felmondási jogát – megtérítését.<br><br>
        Fogyasztót nem illeti meg az elállási jog olyan zárt vagy nyitott csomagolású termék tekintetében, amely egészségvédelmi vagy higiéniai okokból az átadást követő felbontása után nem küldhető vissza (pl. feldolgozott állateledel, úgymint: száraztápok, nedveseledelek, táplálékkiegészítők, vagy más egészségügyi termék, mint például tüzelőbugyi, macskaWC, kutyafogkefe, stb.)<br><br>      
        <h2>4. SZAVATOSSÁG ÉS JÓTÁLLÁS</h2><br>
        <h3> 4.1 Kellékszavatosság</h3><br>
        Vásárló az  Állatmánia hibás teljesítése esetén az Állatmániatel szemben kellékszavatossági igényt érvényesíthet. Fogyasztói szerződés keretében vásárolt új termék vásárlása esetén Vásárló az átvétel időpontjától számított 2 éves elévülési határidő alatt érvényesítheti szavatossági igényeit, azokért a termékhibákért, amelyek a termék átadása időpontjában már léteztek. Két éves elévülési határidőn túl kellékszavatossági jogait Vásárló érvényesíteni már nem tudja.<br><br>
        Nem fogyasztóval kötött szerződés esetén a jogosult az átvétel időpontjától számított 1 éves elévülési határidő alatt érvényesítheti szavatossági igényeit.<br><br>
        Vásárló – választása szerint – kérhet kijavítást vagy kicserélést, kivéve, ha az ezek közül a Vásárló által választott igény teljesítése lehetetlen vagy az Állatmánia számára más igénye teljesítéséhez képest aránytalan többletköltséggel járna. Ha a kijavítást vagy a kicserélést Vásárló nem kérte, illetve nem kérhette, úgy igényelheti az ellenszolgáltatás arányos árleszállítását vagy – végső esetben – a szerződéstől is elállhat. Jelentéktelen hiba miatt elállásnak nincs helye.<br><br>
        Vásárló a választott kellékszavatossági jogáról egy másikra is áttérhet, az áttérés költségét azonban köteles viselni, kivéve, ha az indokolt volt, vagy arra a  Állatmánia adott okot.<br><br>
        Vásárló köteles a hibát annak felfedezése után haladéktalanul, de nem később, mint a hiba felfedezésétől számított kettő hónapon belül közölni az Állatmániával.<br><br>
        Vásárló közvetlenül az  Állatmániával szemben érvényesítheti kellékszavatossági igényét.<br><br>
        A szerződés teljesítésétől számított hat hónapon belül a kellékszavatossági igénye érvényesítésének a hiba közlésén túl nincs egyéb feltétele, ha Vásárló igazolja, hogy a terméket az  Állatmániától vásárolta (számla vagy a számla másolatának bemutatásával). Ilyen esetben az  Állatmánia csak akkor mentesül a szavatosság alól, ha ezt a vélelmet megdönti, vagyis bizonyítja, hogy a termék hibája a Vásárló részére történő átadást követően keletkezett. Amennyiben az  Állatmánia bizonyítani tudja, hogy a hiba oka a Vásárlónak felróható okból keletkezett, nem köteles Vásárló által támasztott szavatossági igénynek helyt adni. A teljesítéstől számított hat hónap eltelte után azonban már Vásárló köteles bizonyítani, hogy a Vásárló által felismert hiba már a teljesítés időpontjában is megvolt.<br><br>
        Ha Vásárló a szavatossági igényét a terméktől - a megjelölt hiba szempontjából – elkülöníthető része tekintetében érvényesíti, a szavatossági igény a termék egyéb részeire nem minősül érvényesítettnek. <br><br>
        <h3>4.2. Termékszavatosság</h3><br>
        A termék (ingó dolog) hibája esetén a fogyasztónak minősülő vásárló – választása szerint – a 4.1. pontban meghatározott jogot vagy termékszavatossági igényt érvényesíthet.<br><br>
        Vásárlót azonban nem illeti meg az a jog, hogy ugyanazon hiba miatt kellékszavatossági és termékszavatossági igényt egyszerre, egymással párhuzamosan érvényesítsen. Termékszavatossági igény eredményes érvényesítése esetén azonban a kicserélt termékre, illetve kijavított részre vonatkozó kellékszavatossági igényét Vásárló a gyártóval szemben is érvényesítheti.<br><br>
        Termékszavatossági igényként Vásárló kizárólag a hibás termék kijavítását vagy kicserélését kérheti. A termék hibáját termékszavatossági igény érvényesítése esetén Vásárlónak kell bizonyítania.<br><br>
        Egy termék akkor minősül hibásnak, ha az nem felel meg a forgalomba hozatalakor hatályos minőségi követelményeknek vagy, ha nem rendelkezik a gyártó által adott leírásban szereplő tulajdonságokkal.<br><br>
        Termékszavatossági igényét Vásárló a termék gyártó általi forgalomba hozatalától számított két éven belül érvényesítheti. E határidő elteltével e jogosultságát elveszti. A Vásárló a hiba felfedezése után késedelem nélkül köteles a hibát a gyártóval közölni. A hiba felfedezésétől számított két hónapon belül közölt hibát késedelem nélkül közöltnek kell tekinteni. A közlés késedelméből eredő kárért a fogyasztó felelős.<br><br>
        Vásárló termékszavatossági igényét az ingó dolog gyártójával vagy forgalmazójával szemben gyakorolhatja.<br><br>
        A gyártó, forgalmazó kizárólag akkor mentesül termékszavatossági kötelezettsége alól, ha bizonyítani tudja, hogy:<br><br>
        a terméket nem üzleti tevékenysége körében gyártotta, illetve hozta forgalomba, vagy<br><br>
        a hiba a tudomány és a technika állása szerint a forgalomba hozatal időpontjában nem volt felismerhető vagy<br><br>
        a termék hibája jogszabály vagy kötelező hatósági előírás alkalmazásából ered.<br><br>
        A gyártónak, forgalmazónak a mentesüléshez elegendő egy okot bizonyítania.<br><br>
        <h3>4.3. Jótállás</h3><br>
        Az Állatmánia nem értékesít olyan terméket, amely az egyes tartós fogyasztási cikkekre vonatkozó kötelező jótállásról szóló 151/2003. (IX. 22.) Korm. rendelet hatálya alá tartozna.<br><br>
        Azonban vannak olyan termékek, amelyekre az  Állatmánia garanciát vállal és ezen termékekhez jótállási jegyet is mellékel.<br><br>
        Vásárlót a jótállásból fakadó jogok a 4.2. pontban meghatározott jogosultságoktól függetlenül megilletik.<br><br>
        A jótállás tehát nem érinti a Vásárló jogszabályból eredő – így különösen kellék- és termékszavatossági, illetve kártérítési – jogainak érvényesítését.<br><br>
        Ha a felek között jogvita alakul ki, melyet békés úton rendezni nem tudnak, a Vásárló békéltető testületi eljárást kezdeményezhet, a 6.2. pontban feltüntettettek alapján.<br><br>
        <h3>4.4. Szavatossági igények érvényesítése</h3><br>
        A szavatossági igényeit a Vásárló az Állatmánia Kapcsolat menüpontban feltüntetett elérhetőségeken érvényesítheti, terjesztheti elő.<br><br>
        <h2>5. A DIGITÁLIS ADATTARTALOM MŰKÖDÉSE, MŰSZAKI VÉDELMI INTÉZKEDÉSEK, HARDVERREL ÉS SZOFTVERREL VALÓ KOMPATIBILITÁS</h2><br>
        Állatmánia a Honlap 95%-os rendelkezésre állását garantálja, éves szinten. A rendelkezésre állás mérése szempontjából nem tekinthető kiesésnek a legfeljebb 1 munkanap időtartamú tervezett karbantartás, feltéve, hogy annak időpontjáról és várható időtartamáról  Állatmánia előre értesítette Vásárlót a Honlapon.<br><br>
        A Honlap mindenfajta böngésző szoftverrel és operációs rendszerrel együttműködik. A Honlap kommunikációja HTTP protokollon keresztül történik. A Honlapon keresztül történő kommunikáció nem titkosított, kivéve a személyes adatokat igénylő oldalakat, amely https protokollal van ellátva. A honlap rendelkezik SSL tanúsítvánnyal.<br><br>
        Az Állatmánia fenntartja a jogot, hogy indokolt esetben, bármely funkció elérhetőségét időlegesen valamennyi Vásárló vonatkozásában - ideértve különösen hálózati szegmens, becenév, e-mail cím, stb. - felfüggessze, vagy a funkció biztosítását véglegesen megszüntesse.<br><br>
        <h2>6. JOGÉRVÉNYESÍTÉSI LEHETŐSÉGEK</h2><br>
        <h3>6.1. Panaszügyintézés helye, ideje, módja</h3><br>
        A Vásárló a termékkel vagy az Állatmánia tevékenységével kapcsolatos fogyasztói kifogásait az 1. pontban feltüntetett elérhetőségeken terjesztheti elő.<br><br>
        Állatmánia –a telephelyén megtett– szóbeli panaszt, amennyiben arra lehetősége van, azonnal orvosolja. Ha a szóbeli panasz azonnali orvoslására nincs lehetőség, a panasz jellegéből adódóan, vagy ha a Vásárló a panasz kezelésével nem ért egyet, akkor az Állatmánia a panaszról jegyzőkönyvet – melyet öt évig, a panaszra tett érdemi válaszával együtt megőrzi - vesz fel.<br><br>
        Állatmánia a jegyzőkönyv egy példányát személyesen közölt szóbeli panasz esetén helyben a Vásárlónak átadja, vagy ha ez nem lehetséges, akkor az alább részletezett írásbeli panaszra vonatkozó szabályok szerint jár el.<br><br>
        Állatmánia az e-mailen közölt szóbeli panasz esetén a Vásárlónak legkésőbb az érdemi válasszal egyidejűleg megküldi a jegyzőkönyv másolati példányát.<br><br>
        Minden egyéb esetben az Állatmania az írásbeli panaszra vonatkozó szabályok szerint jár el.<br><br>
        Állatmania a hozzá írásban érkezett panaszt 30 napon belül érdemben megválaszolja. Az intézkedés jelen szerződés értelmében a válasz e-mail kiküldését jelenti.<br><br>
        A panasz elutasítása esetén Állatmánia az elutasítás indokáról tájékoztatja a Vásárlót.<br><br>
       <h3> 6.2. Egyéb jogérvényesítési lehetőségek</h3><br>
        Amennyiben  Állatmánia és Vásárló között esetlegesen fennálló fogyasztói jogvita az Állatmániával való tárgyalások során nem rendeződik, a fogyasztónak minősülő Vásárló, a lakóhelye vagy tartózkodási helye szerint illetékes békéltető testülethez fordulhat és kezdeményezheti a Testület eljárását, illetve fordulhat az Állatmánia székhelye szerint illetékes Békéltet Testülethez is, továbbá a következő jogérvényesítési lehetőségek állnak nyitva Vásárló számára:
        Panasztétel a fogyasztóvédelmi hatóságnál,<br><br>
        Amennyiben a Vásárló fogyasztói jogainak megsértését észleli, a fogyasztónak minősülő Vásárló 2017. január 1-től panaszával elsősorban a területileg illetékes járási hivatalokhoz fordulhat. A panasz elbírálását követően a hatóság dönt a fogyasztóvédelmi eljárás lefolytatásáról.<br><br>
        Az Állatmánia területileg illetékes fogyasztóvédelmi hatóság elérhetősége:<br><br>
        Érd Kormányhivatala<br>
        Műszaki, Engedélyezési és Fogyasztóvédelmi Főosztály, Fogyasztóvédelmi Osztály<br>
        Cím: 2030 Érd, Városház u. 7.<br>
        Postacím: 2030 Érd, Pf.: 144.<br>
        Telefonszám: +36-1 450-2598<br>
        E-mail: fogyved_kmf_erd@bfkh.gov.hu<br>
        Területi hatóságok listája: <a href="http://fogyasztovedelem.kormany.hu/teruleti">http://fogyasztovedelem.kormany.hu/teruleti</a><br><br>
        Vitarendezési eljárás az Európai Unió online vitarendezési platformján keresztül:<br><br>
        <a href="https://webgate.ec.europa.eu/odr/main/index.cfm?event=main.home.show&lng=HU">https://webgate.ec.europa.eu/odr/main/index.cfm?event=main.home.show&lng=HU</a><br>
        Online adásvételi szerződéssel összefüggő fogyasztói jogvita esetén lehetőség van arra, hogy a fogyasztók az online vásárláshoz kapcsolódó, határon átnyúló vagy határon át nem nyúló jogvitáikat elektronikusan rendezni tudják a fenti linken keresztül elérhető online platformon keresztül beadott elektronikus panasz útján.<br>
        Ehhez nem kell mást tenni, minthogy a fenti linken elérhető online platformon a fogyasztó beregisztrál, kitölt egy kérelmet hiánytalanul, majd elektronikusan beküldi a Békéltető Testület részére a platformon keresztül. Így a fogyasztók, a távolságok ellenére egyszerűen tudják érvényesíteni jogaikat.<br>
        Békéltető testület eljárásának kezdeményezése<br>
        <a href="http://www.bekeltetes.hu/index.php?id=testuletek">http://www.bekeltetes.hu/index.php?id=testuletek</a><br><br>
        Állatmánia székhelye szerint illetékes Testület az Budapest környéki Békéltető Testület<br>
        1016 Budapest, Krisztina krt. 99. III. em. 310.<br>
        Levelezési cím: 1253 Budapest, Pf.: 10.<br>
        E-mail cím: bekelteto.testulet@bkik.hu<br>
        Fax: 06 (1) 488 21 86<br>
        Telefon: 06 (1) 488 21 31<br>
        Az Állatmániát a békéltető testi eljárás során együttműködési kötelezettség terheli.<br>
        Békéltető Testületre vonatkozó szabályok alkalmazásában fogyasztónak minősül a külön törvény szerinti civil szervezet, egyház, társasház, lakásszövetkezet, mikro-, kis- és középvállalkozás is, aki árut vesz, rendel, kap, használ, igénybe vesz, vagy az áruval kapcsolatos kereskedelmi kommunikáció, ajánlat címzettje.<br><br>
        <h2>7. FELHASZNÁLÁS EGYÉB FELTÉTELEI</h2><br>
        <h3>7.1. Felelősség</h3><br>
        Vásárló a Honlapot kizárólag a saját kockázatára használhatja, és elfogadja, hogy  Állatmánia nem vállal felelősséget a használat során felmerülő vagyoni és nem vagyoni károkért a szándékosan okozott, továbbá az emberi életet, testi épséget vagy egészséget megkárosító szerződésszegésért való felelősségen túlmenően.<br><br>
        Állatmánia kizár minden felelősséget a Honlap használói által tanúsított magatartásért, valamint az általuk közzétett tartalmakért. Vásárló köteles gondoskodni arról, hogy a Honlap használata során harmadik személyek jogait vagy a jogszabályokat se közvetlenül, se közvetett módon ne sértse. Vásárló teljes mértékben és kizárólagosan felelős saját magatartásáért,  Állatmánia ilyen esetben teljes mértékben együttműködik az eljáró hatóságokkal a jogsértések felderítése végett.<br><br>
        A felhasználók által a Honlap használata során esetlegesen elérhetővé tett tartalmat az Állatmánia jogosult, de nem köteles ellenőrizni, és a közzétett tartalmak tekintetében az Állatmánia jogosult, de nem köteles jogellenes tevékenység folytatására utaló jeleket keresni.<br><br>
        A szolgáltatás oldalai olyan kapcsolódási pontokat (linkeket) tartalmazhatnak, amelyek más szolgáltatók oldalaira vezetnek. E szolgáltatók adatvédelmi gyakorlatáért és más tevékenységéért  Állatmánia nem vállal felelősséget.<br><br>
        Az Internet globális jellege miatt Vásárló elfogadja, hogy a Honlap használata során a vonatkozó nemzeti jogszabályok rendelkezéseit is figyelembe köteles eljárni. Amennyiben a Honlap használatával összefüggő bármely tevékenység a Vásárló államának joga szerint nem megengedett, a használatért kizárólag Vásárlót terheli a felelősség.<br><br>
        Amennyiben a Vásárló a Honlapon kifogásolható tartalmat észlel, köteles azt haladéktalanul jelezni az  Állatmánia felé. Ha az Állatmánia jóhiszemű eljárása során a jelzést megalapozottnak találja, jogosult az információ haladéktalan törlésére vagy annak módosítására.<br><br>
       <h3> 7.2. Engedményezés és jogátruházás</h3><br>
        Az  Állatmánia jogosult a jelen ÁSZF alapján létrejött szerződésből fakadó jogait, illetve követeléseit másra átruházni. A felhasználó a továbbiakban is hivatkozhat azokra a kifogások, illetve beszámíthatja azokat az ellenköveteléseket, amelyek az átruházásról szóló értesítéskor már fennállt jogalapon keletkeztek.<br><br>
        Az  Állatmánia írásbeli hozzájárulása nélkül a felhasználó nem jogosult a jelen ÁSZF alapján létrejött szerződésből fakadó jogainak, illetve követeléseinek átruházására.<br><br>
       <h3> 7.3. Szerzői jogok</h3><br>
        A Honlap egésze, annak grafikus elemei, szövege és technikai megoldásai és a Szolgáltatás elemei szerzői jogi védelem vagy más szellemi alkotáshoz fűződő jog (így különösen védjegyoltalom) alatt állnak.  Állatmánia a szerzői jogi jogosultja vagy a feljogosított felhasználója a Honlapon, valamint a Honlapon keresztül elérhető szolgáltatások nyújtása során megjelenített valamennyi tartalomnak: bármely szerzői műnek, illetve más szellemi alkotásnak (ideértve többek közt valamennyi grafikát és egyéb anyagokat, a Honlap felületének elrendezését, szerkesztését, a használt szoftveres és egyéb megoldásokat, ötletet, megvalósítást).<br><br>
        A Honlap tartalmának, valamint egyes részeinek fizikai vagy más adathordozóra mentése vagy kinyomtatása magáncélú felhasználás céljából vagy a  Állatmánia előzetes írásbeli hozzájárulása esetén engedélyezett. A magáncélú felhasználáson túli felhasználás – például adatbázisban történő tárolás, továbbadás, közzé- vagy letölthetővé tétel, kereskedelmi forgalomba hozatal – kizárólag az Állatmánia előzetes írásbeli engedélyével lehetséges.<br><br>
        A jelen ÁSZF-ben kifejezetten meghatározott jogokon túlmenően, a Honlap használata, illetve az ÁSZF egyetlen rendelkezése sem biztosít jogot Vásárlónak a Honlapon szereplő bármely kereskedelmi névnek vagy védjegynek bármely használatára, hasznosítására. A Honlap rendeltetésszerű használatával járó megjelenítésen, az ehhez szükséges ideiglenes többszörözésen és a magáncélú másolatkészítésen túl e szellemi alkotások az Állatmánia előzetes írásbeli engedélye nélkül semmilyen egyéb formában nem használhatók fel vagy hasznosíthatók.<br><br>
        Az  Állatmánia fenntartja minden jogát szolgáltatásának minden elemére, különös tekintettel a  HYPERLINK "http://www.allatmania.hu" www.allatmania.hu domainnevére, az ehhez tartozó aldomainekre, az Állatmánia által foglalt minden más domainnévre, annak aloldalaira, valamint az internetes reklámfelületeire. Tilos minden olyan tevékenység, amely az Állatmánia adatbázisának kilistázására, rendszerezésére, archiválására, feltörésére (hack), forráskódjainak visszafejtésére irányul, kivéve, ha erre az  Állatmánia külön engedélyt ad.<br><br>
        Külön megállapodás, vagy az erre a célra szolgáló szolgáltatás igénybevétele nélkül tilos az Állatmánia által rendelkezésre bocsátott felület, illetve keresőmotorok megkerülésével az  Állatmánia adatbázisát módosítani, lemásolni, abban új adatokat elhelyezni, vagy meglévő adatokat felülírni.<br><br>
        Amennyiben a jelen szerződés hatálya alatt engedélyezett felhasználási módok a szerződés hatálya alatt úgy változnak meg, hogy a szerződés megkötésekor ismert és a szerződésben engedélyezett felhasználási módok megvalósulását hatékonyabban, kedvezőbb feltételekkel vagy jobb minőségben teszik lehetővé, úgy a jelen szerződéssel megszerzett felhasználási jog e megváltozott, illetve kibővült felhasználási módokra is kiterjed.<br><br>
        <h2>8. AZ ÁLTALÁNOS SZERZŐDÉSI FELTÉTELEK EGYOLDALÚ MÓDOSÍTÁSA</h2><br>
        Állatmánia jogosult jelen Általános Szerződési Feltételeket a Vásárlók Honlap felületén történő előzetes tájékoztatása mellett, egyoldalúan is módosítani. A módosított rendelkezéseket a Vásárlónak el kell fogadnia. Ha a Vásárló nem fogadja el, nem ért vele egyet, akkor nem használhatja tovább a Honlapot.<br><br>
        <h2>9. AZ ÁLTALÁNOS SZERZŐDÉSI FELTÉTELEK EGYES RENDELKEZÉSEINEK ÉRVÉNYTELENSÉGE</h2><br>
        Amennyiben a jelen ÁSZF bármely rendelkezése érvénytelennek minősül, az nem eredményezi a jelen ÁSZF alapján létrejött szerződés érvényességét és a szerződés egyéb rendelkezései továbbra is hatályban maradnak. A szerződés hatályban maradó rendelkezéseit úgy kell értelmezni, hogy az az  Állatmánia és a Vásárló eredeti akaratát leginkább tükrözze.<br><br>
        Jelen ÁSZF alapján létrejött szerződéseknek nem képezi tartalmát, az  Állatmánia és a Vásárló között, a korábbi üzleti kapcsolatukban kialakul szokás és gyakorlat. Továbbá a jelen ÁSZF alapján létrejött szerződéseknek nem képezi tartalmát az adott üzletágban a hasonló jellegű szerződés alanyai által széles körben ismert és rendszeresen alkalmazott szokás. A jelen ÁSZF és a Honlapon elérhető tájékoztatók, valamint egyéb információk az  Állatmánia és Vásárló közötti szerződés teljes tartalmát magában foglalják.<br><br>
        Jelen Általános Szerződési Feltételek hatályba lépésének ideje: 2020. január 01.<br><br></section>
        
        </article>

</div>';}

else

  $page = get_page();
    switch($page)
{
    case 'termek': termek_page(); break;
    case 'alkategoria':alcategory_page();break; 
	case 'kategoria': category_page(); break;
    
}}

?>
<?php page_footer();?> 