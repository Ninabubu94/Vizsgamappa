<?php

class view
{
    public static function Open_section($title, $text)
	{
		echo '<h1>'. $title .'</h1><p class="mb-4">'. $text .'</p>
				<section class="bg-white p-4 border shadow">';
	}
    
    public static function Close_section()
	{
		echo '</section>';
	}

    public static function Success_message($title, $text)
	{
		echo '<p class="alert alert-success alert-dismissible fade show">
				<button class="btn-close" data-bs-dismiss="alert"></button>
                <i class="fa-solid fa-circle-check"></i>
                <strong>'. $title .'</strong> '. $text .'</p>';
	}
	public static function Error_message($title, $text)
	{
		echo '<p class="alert alert-danger alert-dismissible fade show">
				<button class="btn-close" data-bs-dismiss="alert"></button>
                <i class="fa-solid fa-circle-check"></i>
                <strong>'. $title .'</strong> '. $text .'</p>';
	}
	public static function Action_link($title, $icon, $href, $new_page = false)
	{
		$html = '<a href="'. $href .'" title="'. $title .'"';
		if($new_page){ $html .= ' target="_blank"'; }
		$html .= '><i class="h4 fa-solid fa-'. $icon .'"></i></a>';
		
		return $html;
	}
	public static function Actions_link($title, $icon, $href, $new_page = false)
	{
		$html = '<a href="'. $href .'" title="'. $title .'"';
		if($new_page){ $html .= ' '; }
		$html .= '><i class="h4 fa-solid fa-'. $icon .'"></i></a>';
		
		return $html;
	}
	public static function Del_action_link($name, $id)
	{
		$html = '<a href="" title="Törlés" data-bs-toggle="modal" data-bs-target="#del_modal_'. $id .'"><i class="h4 link-danger fa-solid fa-trash"></i></a>';
		
		$html .= '<div class="modal fade" id="del_modal_'. $id .'">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-termek">Termék törlése</h4>
								<button class="btn-close" data-bs-dismiss="modal"></button>
							</div>
							<div class="modal-body">
								Biztosan törölni akarod a(z) "'. $name .'" nevű tételt?
							</div>
							<div class="modal-footer">
								<form method="post">
									<input type="hidden" name="del" value="'. $id .'">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>
									<button class="btn btn-danger">Igen, törlöm</button>
								</form>
							</div>
						</div>
					</div>
				</div>';
		
		return $html;
	} 

	public static function Uj_termek_button()
	{
		echo '<a href="?func=uj-termek" class="btn btn-primary mb-3">
				<i class="fa-solid fa-circle-plus"></i> 
				Új termék</a>';
	}
	public static function Termek_table($items)
	{
		$visibilities = ['Rejtett', 'Publikus'];
		foreach($items as &$item)
		{
			$item['státusz'] = $visibilities[ $item['státusz'] ];

			if(!empty($item['kép'])){ $item['kép'] = '<img src="..Picture/termek/thumb/)'. $item['kép'] .'" style="max-width:75px">'; }
			else{$item['kép'] = '-'; }

			
			
			$item['action-show'] = self::Action_link('Megtekintés', 'file-lines', '../?page=termek&id='. $item['id'], true);
			$item['action-edit'] = self::Action_link('Szerkesztés', 'square-pen', '?func=edit-termek&id='. $item['id']);
			$item['action-del'] = self::Del_action_link($item['név'], $item['id']);
		}
		
		$table = new Table(['Név', 'Alkategória', 'Kép','Láthatóság',' ', ' ', ' ' ]);
		$table->set_style_classes('table table-striped table-hover mb-4', 'table-secondary');
		$table->set_fields(['név', 'alkategóriák', 'kép', 'státusz', 'action-show', 'action-edit', 'action-del']);
		$table->set_rows($items);
		
		echo $table->generate_html();
	}
	public static function kategoria_table($items)
	{
		$statuses = ['Rejtett', 'Publikus'];
		foreach($items as &$item)
		{
			$item['status'] = $statuses[ $item['status'] ];
			
			
			
			$item['action-show'] = self::Action_link('Megtekintés', 'file-lines', '../?page=kategoria&id='. $item['id'], true);
			$item['action-edit'] = self::Action_link('Szerkesztés', 'square-pen', '?func=edit-category&id='. $item['id']);
			$item['action-del'] = self::Del_action_link($item['name'], $item['id']);
		}
		
		$table = new Table(['Megnevezés', 'Állapot', ' ', ' ', ' ']);
		$table->set_style_classes('table table-striped table-hover mb-4', 'table-secondary');
		$table->set_fields(['name','status', 'action-show', 'action-edit', 'action-del']);
		$table->set_rows($items);
		
		echo $table->generate_html();
	}

	public static function new_categoria_button()
	{
		echo '<a href="?func=uj-kategória" class="btn btn-primary mb-3">
				<i class="fa-solid fa-circle-plus"></i> 
				Új kategória</a>';
	}
	public static function alkategoria_table($items)
	{
		$statuses = ['Rejtett', 'Publikus'];
		foreach($items as &$item)
		{
			$item['statusz'] = $statuses[ $item['statusz'] ];

			if($item['cover']){ $item['cover'] = '<img src="../Picture/kicsi/'. $item['cover'] .'" style="max-width:75px">'; }
			else{ $item['cover'] = '-'; }

			if(mb_strlen($item['content'], 'utf-8') > 40)
			{
				$item['content'] = mb_substr($item['content'], 0, 40, 'utf-8') .'...';
			}
			
			
			$item['action-show'] = self::Action_link('Megtekintés', 'file-lines', '../?page=alkategoria&id='. $item['id'], true);
			$item['action-edit'] = self::Action_link('Szerkesztés', 'square-pen', '?func=edit-alcategory&id='. $item['id']);
			$item['action-del'] = self::Del_action_link($item['title'], $item['id']);
		}
		
		$table = new Table(['Megnevezés','Kategória','Leírás', 'Kép', 'Állapot', ' ', ' ', ' ']);
		$table->set_style_classes('table table-striped table-hover mb-4', 'table-secondary');
		$table->set_fields(['title','kategória','content','cover','statusz', 'action-show', 'action-edit', 'action-del']);
		$table->set_rows($items);
		
		echo $table->generate_html();
	}

	public static function new_alcategoria_button()
	{
		echo '<a href="?func=uj-alkategória" class="btn btn-primary mb-3">
				<i class="fa-solid fa-circle-plus"></i> 
				Új alkategória</a>';
	}
	public static function kerdes_table($items)
	{
		$statuses = ['Rejtett', 'Publikus'];
		foreach($items as &$item)
		{
			$item['status'] = $statuses[ $item['status'] ];
			
			if(empty($item['valasz'])){
			$item['valasz'] = '-';}
			
			$item['action-show'] = self::Action_link('Megtekintés', 'file-lines', '../GYIK.php', true);
			$item['action-valasz'] = self::Action_link('valasz', 'square-pen', '?func=valasz-kerdesek&id='. $item['id']);
			$item['action-del'] = self::Del_action_link($item['kerdes'], $item['id']);
		}
		
		$table = new Table(['Típus', 'Jellege', 'Kérdés' ,'Válasz','Beküldve','Állapot', ' ','' , ' ']);
		$table->set_style_classes('table table-striped table-hover mb-4', 'table-secondary');
		$table->set_fields(['típus','jellege','kerdes','valasz' ,'created', 'status', 'action-show', 'action-valasz', 'action-del']);
		$table->set_rows($items);
		
		echo $table->generate_html();
	}
	public static function new_kerdesek_button()
	{
		echo '<a href="?func=uj-kerdesek" class="btn btn-primary mb-3">
				<i class="fa-solid fa-circle-plus"></i> 
				Új válasz</a>';
	}
	public static function velemeny_table($items)
	{
		$statuses = ['Rejtett', 'Publikus'];
		foreach($items as &$item)
		{
			$item['status'] = $statuses[ $item['status'] ];

	
			$item['action-edit'] = self::Action_link('jóváhagy', 'square-pen', '?func=edit-velemeny&id='. $item['id']);
			$item['action-del'] = self::Del_action_link($item['velemeny'], $item['id']);
		}
		
		$table = new Table(['Vélemény', 'Beküldve','Állapot', ' ', ' ']);
		$table->set_style_classes('table table-striped table-hover mb-4', 'table-secondary');
		$table->set_fields(['velemeny','created','status',  'action-edit', 'action-del']);
		$table->set_rows($items);
		
		echo $table->generate_html();
	}

}