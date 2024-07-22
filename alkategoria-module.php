<?php


class Alkategoria_Module
{
    public static function New()
	{
		View::Open_section('Létrehozás', 'Új alkategória hozzáadása');
		
		$form = self::Get_form('Létrehozás');
		
		$form->on_submit(function($data) use ($form)
		{
			if(!$data['title'])
			{
				$form->set_values($data);
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Insert_alcategory($data);
				View::Success_message('Alkategória elmentve!', 'Az adatok rögzítése sikeresen megtörtént');
			}
		});
		
		echo $form->get_html();
		self::Rich_text_editor();
		View::Close_section();
	}
	public static function List()
	{
		View::Open_section('Alkategóriák', 'Alkategóriák kezelése');
		View::new_alcategoria_button();
		
		self::Handle_del_request();
		
		$alcategori = Data_manager::Get_alcategories();
		View::alkategoria_table($alcategori);
		
		View::Close_section();
	}
	public static function Edit($alcategory_id)
	{
		View::Open_section('Szerkesztés', 'Alkategória adatainak módosítása');
		
		$form = self::Get_form('Változások mentése');
		$form->on_submit(function($data) use ($alcategory_id)
		{
			if(!$data['title'])
			{
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Update_alcategory($alcategory_id, $data);
				View::Success_message('Változások elmentve!', 'Az adatok módosítása sikeresen megtörtént');
			}
		});
		
		$alcategory = Data_manager::Get_alcategory($alcategory_id);
		$form->set_values($alcategory);
		echo $form->get_html();
		
		View::Close_section();
	}
	
	private static function Get_form($button_text)
	{
        $categories = Data_manager::Get_categories_for_select();
		$form = new InputForm('post');
		$form->add( new InputField('Megnevezés', 'title', 'text') );
        $form->add( new SelectField('Kategória','kategoria', $categories));
        $form->add( new TextField('Leírás', 'content'));
		$form->add( new InputField('Kép', 'cover', 'file') );
		$form->add( new SelectField('Láthatóság', 'statusz', ['Rejtett', 'Publikus']) );
		$form->set_button($button_text);
		
		return $form;
	}
	private static function Handle_del_request()
	{
		$del = Params::Get_del_request();
		
		if($del)
		{
			Data_manager::Delete_alcategory($del);
		}
	}
	private static function Rich_text_editor()
	{
		echo "<script>
				ClassicEditor.create( document.querySelector( '#content' ) );
			</script>";
	}
}





?>