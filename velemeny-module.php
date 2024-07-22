<?php


class Velemeny_Module
{
    public static function List()
	{
		View::Open_section('Vélemények', 'Vélemények kezelése');
		
		
		self::Handle_del_request();
		
		$velemeny = Data_manager::Get_velemenyek();
		View::velemeny_table($velemeny);
		
		View::Close_section();
	}
	public static function Edit($velemeny_id)
	{
		View::Open_section('Szerkesztés', 'Velemenyek adatainak módosítása');
		
		$form = self::Get_form('Változások mentése');
		$form->on_submit(function($data) use ($velemeny_id)
		{
			if(!$data['status'])
			{
				View::Error_message('Hibásan kitöltve!', 'Megnevezés megadása kötelező');
			}
			else
			{
				Data_manager::Update_velemeny($velemeny_id, $data);
				View::Success_message('Változások elmentve!', 'Az adatok módosítása sikeresen megtörtént');
			}
		});
		
		$velemeny = Data_manager::Get_velemeny($velemeny_id);
		$form->set_values($velemeny);
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
        
		$form = new InputForm('post');
		$form->add( new SelectField('Láthatóság', 'status', ['Rejtett', 'Publikus']) );
		$form->set_button($button_text);
		
		return $form;
	}
   
}