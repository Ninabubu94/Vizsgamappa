<?php

class Kerdes_Module
{
    public static function List() 
	{
		View::Open_section('Kérdések', 'Tárolt kérdések kezelése');
				
		self::Handle_del_request();
		
		$kerdesek = Data_manager:: Get_kerdesek();
		View::kerdes_table($kerdesek);
		
		View::Close_section();
	}
	public static function Valasz($valasz_id)
	{
		View::Open_section('Szerkesztés', 'Kategória adatainak módosítása');
		
		$form = self::Get_form('Változások mentése');
		$form->on_submit(function($data) use ($valasz_id)
		{
			if(!$data['valasz'])
			{
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Update_valasz($valasz_id, $data);
				View::Success_message('Változások elmentve!', 'Az adatok módosítása sikeresen megtörtént');
			}
		});
		
		$valasz = Data_manager::Get_kerdes($valasz_id);
		$form->set_values($valasz);
		echo $form->get_html();
		
		View::Close_section();
	}
	
	
    private static function Handle_del_request()
	{
		$del = Params::Get_del_request();
		
		if($del)
		{
			Data_manager::Delete_kerdes($del);
		}
	}
    private static function Get_form($button_text)
	{
        $kerdesek= Data_manager::Get_kerdes_for_select();
		$form = new InputForm('post');

        $form->add( new TextField('Válasz', 'valasz'));
		$form->add( new SelectField('Láthatóság', 'status', ['Rejtett', 'Publikus']) );
		$form->set_button($button_text);
		
		return $form;
	}



}
?>