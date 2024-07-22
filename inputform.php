<?php
require_once 'inputfield.php';
require_once 'selectfield.php';
require_once 'textfield.php';

class InputForm
{
	private $method;
	private $action;
	private $fields;
	private $button;
	
	public function __construct($method = 'get', $action = '') 
	{
		$this->method = $method;
		$this->action = $action;
		
		$this->fields = [];
	}
	
	public function add($inputfield)
	{
		$this->fields[] = $inputfield;
	}
	public function set_values($values)
	{
		foreach($this->fields as $field)
		{
			$name = $field->get_name();
			
			if(isset($values[$name]))
			{
				$value = $values[$name];
				$field->set_value($value);
			}
		}
	}
	public function set_button($text)
	{
		$this->button = $text;
	}
	public function on_submit($method)
	{
		$source = $_POST;
		if($this->method == 'get')
		{
			$source = $_GET;
		}
		if(isset($source['sent']))
		{
			unset($source['sent']);
			$method($source);
		}
	}

	public function get_html()
	{
		$html = '<form method="'. $this->method .'" action="'. $this->action .'" enctype="multipart/form-data">';
		
		foreach($this->fields as $field)
		{
			$html .= $field->get_html();
		}
		
		if($this->button)
		{ 
			$html .= '<button class="btn btn-primary" name="sent" value="1">
						<i class="fa-solid fa-check"></i> '. $this->button .'</button>'; 
		}
		$html .= '</form>';
		
		return $html;
	}
}