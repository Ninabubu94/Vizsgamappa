<?php

class Termek_Module
{
	public static function New()
	{
		View::Open_section('Létrehozás', 'Új termék hozzáadása');
		
		$form = self::Get_form('Létrehozás');
		
		$form->on_submit(function($data) use ($form)
		{
			if(!$data['nev'])
			{
				$form->set_values($data);
				View::Error_message('Hibásan kitöltve!', 'Termék megnevezése kötelező');
			}
			else
			{
				Data_manager::Insert_termekek($data);
				View::Success_message('Termék elmentve!', 'Az adatok rögzítése sikeresen megtörtént');
			}
		});
		
		echo $form->get_html();
		
		self::Rich_text_editor();
		View::Close_section();
	}
	public static function List() 
	{
		View::Open_section('Termékek', 'Tárolt termékek kezelése');
		View::Uj_termek_button();
		
		self::Handle_del_request();
		
		$product = Data_manager::Get_termekek();
		View::Termek_table($product);
		
		View::Close_section();
	}
	public static function Edit($termek_id)
	{
		View::Open_section('Szerkesztés', 'Termék adatainak módosítása');
		
		$form = self::Get_form('Változások mentése');
		$form->on_submit(function($data) use ($termek_id)
		{
			if(!$data['nev'])
			{
				View::Error_message('Hibásan kitöltve!', 'Termék megnevezése kötelező');
			}
			else
			{
				Data_manager::Update_termek($termek_id, $data);
				View::Success_message('Változások elmentve!', 'Az adatok módosítása sikeresen megtörtént');
			}
		});
		
		$termek = Data_manager::Get_termek($termek_id);
		$form->set_values($termek);
		echo $form->get_html();
		
		
		View::Close_section();
	}
	
	private static function Get_form($button_text)
	{
		$alcategories = Data_manager::Get_alcategories_for_select();
		
		$form = new InputForm('post');
		$form->add( new InputField('Termék megnevezés', 'nev','text') );
		$form->add( new SelectField('Alkategória','alkategoriak', $alcategories) );
		$form->add( new InputField('Gyártó', 'gyarto','text') );
		$form->add( new InputField('Cikkszám', 'cikkszam','text') );
		$form->add( new InputField('Egységár', 'egysegar','text') );
		$form->add( new InputField('Kiszerelés', 'kiszereles','text') );
		$form->add( new InputField('Kedvezmény', 'kedvezmeny','text') );
		$form->add( new InputField('Kép', 'kep', 'file') );
		$form->add( new TextField('Leírás', 'leiras') );
		$form->add( new SelectField('Láthatóság', 'statusz', ['Rejtett', 'Publikus']) );
		$form->add( new InputField('Kulcsszó', 'kulcsszo','text') );
		$form->set_button($button_text);
		
		return $form;
	}
	private static function Rich_text_editor()
	{
		echo "<script>
				ClassicEditor.create( document.querySelector( '#leiras' ) );
			</script>";
	}
	private static function Handle_del_request()
	{
		$del = Params::Get_del_request();
		
		if($del)
		{
			Data_manager::Delete_termek($del);
		}
	}}
	?>