<?php
function termek_page()
{
	$id = get_id();
	$termek = get_termek_by_id($id);
	
	if($termek)
	{ 
		termek_view($termek);
	}
	else
	{
		notfound_page();
	}
}
function category_page()
{
	$id = get_id();
	$category = get_category_by_id($id);
	
	if($category)
	{
		echo'<h1 class="oldal">'.$category['name'].'</h1>';
		
		
		$alcategory = get_alcategory_by_category($id);
		alkategoria_list($alcategory);
	
	}
	else
	{
		notfound_page();
	}
}

function alcategory_page()
{
	$id = get_id();
	$alcategory = get_alcategory_by_id($id);
	
	if($alcategory)
	{
		echo'<section class="aloldal"><h1>'.$alcategory['title'].'</h1>
		<p> '.$alcategory['content'].'</p></section>';
		
		$site_count =8 ;
		$step = get_step();
		$termekek = get_termekek_by_alcategory($id, $site_count, $step);
		termek_list($termekek, $site_count);
		pagination($termekek, $site_count);
	}
	else
	{
		notfound_page();
	}

}


function notfound_page()
{
	content_title('Nem létezik', 'A keresett lap nem található');
}
function főoldal()
{
	echo '<a href="index.php">Főoldal</a> ';

}
?>