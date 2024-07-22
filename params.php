<?php

class Params
{
	public static function Get_func()
	{
		if(isset($_GET['func']))
		{
			return $_GET['func'];
		}
		return '';
	}
	public static function Get_id()
	{
		if(isset($_GET['id']))
		{
			return $_GET['id'];
		}
	}
	public static function Get_del_request()
	{
		if(isset($_POST['del']))
		{
			return $_POST['del'];
		}
	}
}