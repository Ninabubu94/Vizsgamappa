<?php

class TextField extends InputField
{
	public function __construct($text, $name) 
	{
		parent::__construct($text, $name, null);
	}
	
	protected function create_field(): string 
	{
		$html = '<textarea name="'. $this->get_name() .'" id="'. $this->get_name() .'" class="form-control">';
		if($this->value !== null){ $html .= $this->value; }
		$html .= '</textarea>';
		
		return $html;
	}
}