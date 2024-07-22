<?php


$db_user = 'root';
$db_pass = 'mysql';
$db_name = 'állatmánia';

$dsn = 'mysql:host=localhost;dbname='. $db_name .';charset=utf8mb4';
$db = new PDO($dsn, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
error_reporting(E_ALL);



 function get_categories()
 {
	global $db;
	 
	 $sql = "SELECT id,name FROM kategoria WHERE status != 0";
	 $query = $db->query($sql);
	 $rows = $query->fetchAll(PDO::FETCH_ASSOC);
	 
	 return $rows;
 }
 function get_termekek()
 {
	global $db;
	 
	 $sql = "SELECT id,név FROM termékek WHERE státusz != 0";
	 $query = $db->query($sql);
	 $rows = $query->fetchAll(PDO::FETCH_ASSOC);
	 
	 return $rows;
 }
 function get_alcategories()
 {
	global $db;
	 
	 $sql = "SELECT id,title FROM alkategoriak WHERE  statusz != 0 ";
	 $query = $db->query($sql);
	 $row = $query->fetchAll(PDO::FETCH_ASSOC);
	 
	 return $row;
 }
 function get_alcategoris($alcategory)
 {
	global $db;

	$sql="SELECT alkategoriak.id,alkategoriak.name,kategoria AS kategoria FROM alkategoriak INNER JOIN kategoria ON kategoria.id = alkategoriak.kategoria";
	$query = $db->prepare($sql);
	 $query->execute(['alkategoriak.name' => $alcategory]);
	 $row = $query->fetch(PDO::FETCH_ASSOC);
	 
	 return $row;

}
 function get_category_by_id($category_id)
 {
	 global $db; 
	 
	 $sql = "SELECT * FROM kategoria WHERE id = :id AND status != 0";
	 $query = $db->prepare($sql);
	 $query->execute(['id' => $category_id]);
	 $row = $query->fetch(PDO::FETCH_ASSOC);
	 
	 return $row;
 }
 function get_alcategory_by_id($alcategory_id)
 {
	 global $db; 
	 
	 $sql = "SELECT * FROM alkategoriak WHERE id = :id AND statusz != 0";
	 $query = $db->prepare($sql);
	 $query->execute(['id' => $alcategory_id]);
	 $row = $query->fetch(PDO::FETCH_ASSOC);
	 
	 return $row;
 }
 function get_termekek_by_alcategory($alcategory_id, $site_count, $step)
 {
	global $db;
	$offset = ($step - 1) * $site_count;

	$sql = "SELECT id,név,gyártó,cikkszám,egységár,kiszerelés,kedvezmény,kép,leírás,kulcsszo FROM termékek WHERE alkategóriák= :alkategoriak AND státusz != 0 ORDER BY dátum DESC LIMIT ". $offset .",". ($site_count + 1);
	$query = $db->prepare($sql);
	$query->execute(['alkategoriak' => $alcategory_id]);
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $rows;
 }
 function get_alcategory_by_category($category_id)
 {
	 global $db;
	 
	 $sql = "SELECT id,title,content, cover FROM alkategoriak WHERE kategória= :kategoria AND statusz != 0 ";
	 $query = $db->prepare($sql);
	$query->execute(['kategoria' => $category_id]);
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $rows;
 }
 function get_latest_termekek()
 {
	 global $db;
	 
	 $sql = "SELECT id,név,leírás,kép
			 FROM termékek WHERE státusz != 0 
			 ORDER BY dátum DESC
			 LIMIT 5";
	 $query = $db->query($sql);
	 $rows = $query->fetchAll(PDO::FETCH_ASSOC);
	 
	 return $rows;
 }
 function get_termek_by_id($termek_id)
 {
	 global $db;
	 
	 
	 $sql = "SELECT termékek.id, név, gyártó, cikkszám, egységár, kiszerelés, alkategóriák AS alkategóriák
			 FROM termékek
			 INNER JOIN alkategoriak ON alkategoriak.id = termékek.alkategóriák
			 WHERE termékek.id = :id AND státusz != 0";
	 $query = $db->prepare($sql);
	 $query->execute(['id' => $termek_id]);
	 $row = $query->fetch(PDO::FETCH_ASSOC);
 } 
 function feliratkozas()
{
   global $db;
  
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
    }}
}

 function get_kerdesek()
 {
	global $db;
	 
	 $sql = "SELECT id,típus,kerdes FROM kerdesek WHERE status != 0";
	 $query = $db->query($sql);
	 $rows = $query->fetchAll(PDO::FETCH_ASSOC);
	 
	 return $rows;
 }
 function get_users()
	{global $db;
	 
	$sql = "SELECT  id FROM users ";
	$query = $db->query($sql);
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	
	return $rows;
 }


?>