<?php

class InputField
{
	private $text;
	private $name;
	private $type;
	protected $value;
	
	public function __construct($text, $name, $type) 
	{
		$this->text = $text;
		$this->name = $name;
		$this->type = $type;
	}
	
	public function get_name() 
	{
		return $this->name;
	}
	public function get_type() 
	{
		return $this->type;
	}
		
	public function set_value($value) 
	{
		$this->value = $value;
	}

	public function get_html()
	{
		$html = '<div class="mb-3">'. $this->create_label() . $this->create_field() .'</div>';
		return $html;
	}
	
	private function create_label()
	{
		return '<label for="'. $this->name .'" class="form-label">'. $this->text .'</label>';
	}
	protected function create_field()
	{
		$html = '<input type="'. $this->type .'" name="'. $this->name .'" id="'. $this->name .'"';
		if($this->value !== null){ $html .= ' value="'. $this->value .'"'; }
		$html .= ' class="form-control">';
		return $html;
	}
}