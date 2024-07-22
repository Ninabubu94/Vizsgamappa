<?php

class Table
{
	private $headers;
	private $rows;
	private $fields;
	private $table_style_class;
	private $thead_style_class;
	
	public function __construct($headers) 
	{
		$this->headers = $headers;
	}
	
	public function set_fields($fields) 
	{
		$this->fields = $fields;
	}
	public function set_rows($rows)
	{
		$this->rows = $rows;
	}
	public function generate_html()
	{
		$html = '<table';
		if($this->table_style_class){ $html .= ' class="'. $this->table_style_class .'"'; }
		$html .= '><thead';
		if($this->thead_style_class){ $html .= ' class="'. $this->thead_style_class .'"'; }
		$html .= '><tr>';
		
		foreach($this->headers as $header)
		{
			$html .= '<th>'. $header .'</th>';
		}
		$html .= '</tr></thead><tbody>';
		
		foreach($this->rows as $row)
		{
			$html .= '<tr>';
			
			if($this->fields)
			{
				foreach($this->fields as $field)
				{
					$html .= '<td>'. $row[$field] .'</td>';
					
				}
			}
			else
			{
				foreach($row as $cell)
				{
					$html .= '<td>'. $cell .'</td>';
				}
			}
			$html .= '</tr>';
		}
		$html .= '</tbody></table>';
		
		return $html;
	}
	
	public function set_style_classes($for_table, $for_thead = null) 
	{
		$this->table_style_class = $for_table;
		$this->thead_style_class = $for_thead;
	}
}