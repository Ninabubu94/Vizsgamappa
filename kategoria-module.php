<?php


class Kategoria_Module
{
    public static function New()
	{
		View::Open_section('Létrehozás', 'Új kategória hozzáadása');
		
		$form = self::Get_form('Létrehozás');
		
		$form->on_submit(function($data) use ($form)
		{
			if(!$data['name'])
			{
				$form->set_values($data);
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Insert_category($data);
				View::Success_message('Kategória elmentve!', 'Az adatok rögzítése sikeresen megtörtént');
			}
		});
		
		echo $form->get_html();
		
		View::Close_section();
	}
	public static function List()
	{
		View::Open_section('Kategóriák', 'Kategóriák kezelése');
		View::new_categoria_button();
		
		self::Handle_del_request();
		
		$categories = Data_manager::Get_categories();
		View::kategoria_table($categories);
		
		View::Close_section();
	}
	public static function Edit($category_id)
	{
		View::Open_section('Szerkesztés', 'Kategória adatainak módosítása');
		
		$form = self::Get_form('Változások mentése');
		$form->on_submit(function($data) use ($category_id)
		{
			if(!$data['name'])
			{
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Update_category($category_id, $data);
				View::Success_message('Változások elmentve!', 'Az adatok módosítása sikeresen megtörtént');
			}
		});
		
		$category = Data_manager::Get_category($category_id);
		$form->set_values($category);
		echo $form->get_html();
		
		View::Close_section();
	}
	
	private static function Get_form($button_text)
	{
		$form = new InputForm('post');
		$form->add( new InputField('Megnevezés', 'name', 'text') );
		$form->add( new SelectField('Láthatóság', 'status', ['Rejtett', 'Publikus']) );
		$form->set_button($button_text);
		
		return $form;
	}
	private static function Handle_del_request()
	{
		$del = Params::Get_del_request();
		
		if($del)
		{
			Data_manager::Delete_category($del);
		}
	}
}





?>