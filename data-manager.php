<?php

class Data_manager
{
	public static function Get_categories() 
	{
		global $db;
		
		$sql = "SELECT * FROM kategoria ORDER BY name";
		$query = $db->query($sql);
		$items = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $items;
	}
	public static function Insert_category($input) 
	{
		global $db;
		
		$sql = "INSERT INTO kategoria VALUES (NULL, :name, :status)";
		$query = $db->prepare($sql);
		$query->execute($input);
	}
	public static function Get_category($id)
	{
		global $db;
		
		$sql = "SELECT * FROM kategoria WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
		
		$item = $query->fetch(PDO::FETCH_ASSOC);
		return $item;
	}
	public static function Update_category($id, $input)
	{
		global $db;
		
		$input['id'] = $id;
		$sql = "UPDATE kategoria SET name = :name, status = :status WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute($input);
	}
	public static function Delete_category($id)
	{
		global $db;
		
		$sql = "DELETE FROM kategoria WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
	}
	public static function Get_categories_for_select()
	{
		$list = [];
		$items = self::Get_categories();
		
		foreach($items as $item)
		{
			$x = $item['id'];
			$list[$x] = $item['name'];
		}
		return $list;
	}
	public static function Get_alcategories() 
	{
		global $db;
		
		$sql = "SELECT * FROM alkategoriak ORDER BY title";
		$query = $db->query($sql);
		$items = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $items;
	}
	public static function Insert_alcategory($input) 
	{
		global $db;
		
		if(isset($_FILES['cover']) && $_FILES['cover']['name'])
		{
			$name = $_FILES['cover']['name'];
			$temp = $_FILES['cover']['tmp_name'];
			
			move_uploaded_file($temp, '../Picture/'. $name);
			Data_manager::Copy_image_as_thumbnail('../Picture/'. $name, '../Picture/kicsi/'. $name);
			
			$input['cover'] = $name;
		}
		else
		{ 
			$input['cover'] = ''; 
		}
		$sql = "INSERT INTO alkategoriak VALUES (NULL,:title,:kategoria, :content, :cover, :statusz)";
		$query = $db->prepare($sql);
		$query->execute($input);
	
	}
		

	public static function Get_alcategory($id)
	{
		global $db;
		
		$sql = "SELECT * FROM alkategoriak WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
		
		$item = $query->fetch(PDO::FETCH_ASSOC);
		return $item;
	}
	public static function Update_alcategory($id, $input )
	{
		global $db;
		$input['id'] = $id;
		$sql = "UPDATE alkategoriak SET kategória = :kategoria, title = :title, content= :content,";	

		if(isset($_FILES['cover']) && $_FILES['cover']['name'])
		{
			$tmp = $_FILES['cover']['tmp_name'];
			$name = $_FILES['cover']['name'];
					
			move_uploaded_file($tmp, '../Picture/'. $name);
			Data_manager::Copy_image_as_thumbnail('../Picture/'. $name, '../Picture/kicsi/'. $name);
			
			$sql .= "cover = :cover, ";
			$input['cover'] = $name;
		}

		$sql .= " statusz = :statusz WHERE id= :id";
		$query = $db->prepare($sql);
		$query->execute($input);
		
	
	}
	public static function Delete_alcategory($id)
	{
		global $db;

		$sql = "DELETE FROM alkategoriak WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
	}
	public static function Get_alcategories_for_select()
	{
		$list = [];
		$items = self::Get_alcategories();
		
		foreach($items as $item)
		{
			$x = $item['id'];
			$list[$x] = $item['title'];
		}
		return $list;
	}
	
	public static function Get_termekek()
	{
		global $db;
		
		$sql = "SELECT termékek.id, név, gyártó, cikkszám, dátum,státusz,kulcsszo, alkategóriák AS alkategóriák 
				FROM termékek INNER JOIN alkategoriak ON alkategoriak.id = termékek.alkategóriák ORDER BY dátum DESC";
		$query = $db->query($sql);
		$items = $query->fetchAll(PDO::FETCH_ASSOC);
		return $items;
	}
	public static function Insert_termekek($input)
	{
		global $db;

		if(isset($_FILES['kép']) && $_FILES['kép']['name'])
		{
			$name = $_FILES['kép']['name'];
			$temp = $_FILES['kép']['tmp_name'];
			
			move_uploaded_file($temp, '../Picture/termek/'. $name);
			Data_manager::Copy_image_as_thumbnail('../Picture/termek/'. $name, '../Picture/termek/thumb/'. $name);
			
			$input['kep'] = $name;
		}
		else
		{ 
			$input['kep'] = ''; 
		}
		
		$sql = "INSERT INTO termékek VALUES (NULL, :nev, :alkategoriak, :gyarto, :cikkszam, :egysegar, :kiszereles, :kedvezmeny, :kep, :leiras, NOW() ,:statusz, :kulcsszo)";
		$query =$db->prepare($sql);
		$query->execute($input);
		
	}
	public static function Get_termek($id)
	{
		global $db;
		
		$sql = "SELECT * FROM termékek WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
		
		$item = $query->fetch(PDO::FETCH_ASSOC);
		return $item;
	}
	public static function Update_termek($id, $input)
	{
		global $db;
		
		$input['id'] = $id;
		$sql = "UPDATE termékek SET név = :nev, alkategóriák = :alkategoriak, gyártó = :gyarto, cikkszám = :cikkszam,  egységár= :egysegar, kiszerelés = :kiszereles, kedvezmény = :kedvezmeny, ";
		
		if(isset($_FILES['kep']) && $_FILES['kep']['name'])
		{
			$tmp = $_FILES['kep']['tmp_name'];
			$name = $_FILES['kep']['name'];
					
			move_uploaded_file($tmp, '../Picture/termek/'. $name);
			Data_manager::Copy_image_as_thumbnail('../Picture/termek/'. $name, '../Picture/termek/thumb/'. $name);
			
			$sql .= "kép = :kep, ";
			$input['kep'] = $name;
		}
		
		$sql .= " leírás = :leiras, státusz = :statusz, kulcsszo= :kulcsszo WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute($input);
		
		}
	public static function Delete_termek($id)
	{
		global $db;
		
		$sql = "DELETE FROM termékek WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
	}
	public static function Get_kerdesek() 
	{
		global $db;
		
		$sql = "SELECT * FROM kerdesek ORDER BY created DESC";
		$query = $db->query($sql);
		$items = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $items;
	}
	
	public static function Delete_kerdes($id)
	{
		global $db;
		
		$sql = "DELETE FROM kerdesek WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
	}
	public static function Get_kerdes($id)
	{
		global $db;
		
		$sql = "SELECT * FROM kerdesek WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
		
		$item = $query->fetch(PDO::FETCH_ASSOC);
		return $item;
	}
	public static function Insert_valasz($input) 
	{
		global $db;
		
		$sql = "INSERT INTO kerdesek VALUES (NULL, :valasz, NOW(),:status) ";
		$query = $db->prepare($sql);
		$query->execute($input);
		$item = $query->fetchAll(PDO::FETCH_ASSOC);
		return $item;

	}
	
	public static function Get_kerdes_for_select()
	{
		$list = [];
		$items = self::Get_kerdesek();
		
		foreach($items as $item)
		{
			$x = $item['id'];
			$list[$x] = $item['kerdes'];
		}
		return $list;
	}
	public static function Update_valasz($id, $input)
	{
		global $db;
		
		$input['id'] = $id;
		$sql = "UPDATE kerdesek SET  valasz = :valasz, status = :status WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute($input);
	}
	public static function Copy_image_as_thumbnail($src, $dst)
	{
		$size = getimagesize($src);
		$width = $size[0];
		$height = $size[1];
		$new_width = 300;
		$new_height = $new_width * ($height / $width);
		
		$original = imagecreatefromjpeg($src);
		$img = imagecreatetruecolor($new_width, $new_height);
		
		imagecopyresampled($img, $original, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		imagejpeg($img, $dst, 75);
	}
	public static function Get_velemenyek() 
	{
		global $db;
		
		$sql = "SELECT * FROM vélemények ORDER BY created";
		$query = $db->query($sql);
		$items = $query->fetchAll(PDO::FETCH_ASSOC);
		
		return $items;
	}
	public static function Delete_velemeny($id)
	{
		global $db;
		
		$sql = "DELETE FROM vélemények WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
	}
	public static function Get_velemeny($id)
	{
		global $db;
		
		$sql = "SELECT * FROM vélemények WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute(['id' => $id]);
		
		$item = $query->fetch(PDO::FETCH_ASSOC);
		return $item;
	}
	public static function Update_velemeny($id, $input)
	{
		global $db;
		
		$input['id'] = $id;
		$sql = "UPDATE vélemények SET  status = :status WHERE id = :id";
		$query = $db->prepare($sql);
		$query->execute($input);
	}

}



