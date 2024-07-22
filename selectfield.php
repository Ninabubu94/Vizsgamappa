<?php

class SelectField extends InputField
{
	private $options;
	
	public function __construct($text, $name, $options) 
	{
		parent::__construct($text, $name, null);
		$this->options = $options;
	}
	
	protected function create_field() 
	{
		$html = '<select name="'. $this->get_name() .'" id="'. $this->get_name() .'" class="form-control">';
		
		foreach($this->options as $i => $item)
		{
			$html .= '<option value="'. $i .'"';
			if($this->value == $i){ $html .= ' selected'; }
			$html .= '>'. $item .'</option>';
		}
		$html .= '</select>';
		
		return $html;
	}
}
