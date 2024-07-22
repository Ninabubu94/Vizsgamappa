<?php

function get_page()
{
	if(isset($_GET['page']))
	{
		return $_GET['page'];
	}
	return 'alkategoria';
}
function get_id()
{
	if(isset($_GET['id']))
	{
		return $_GET['id'];
	}
}
function get_step()
{
	if(isset($_GET['step']))
	{
		return $_GET['step'];
	}
	return  1;
}

?>