<?php

class Views
{

public static function Open_section($title,$text)
{
	echo '<h1>'. $title .'</h1><p class="titles">'. $text .'</p>
			<section class="bg-white b-2 p-4 border shadow">';
}

public static function Close_section()
{
	echo '</section>';
}
public static function Error_message($title, $text)
	{
		echo '<p class="alert alert-danger alert-dismissible fade show">
				<button class="btn-close" data-bs-dismiss="alert"></button>
                <i class="fa-solid fa-circle-check"></i>
                <strong>'. $title .'</strong> '. $text .'</p>';
	}



}
?>