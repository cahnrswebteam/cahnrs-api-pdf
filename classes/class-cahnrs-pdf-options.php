<?php
class CAHNRS_PDF_Options {
	
	protected $template;
	
	protected $html;
	
	protected $title;
	
	public function get_template() { return $this->template; }
	
	public function get_html() { return $this->html; }
	
	public function get_title() { return $this->title; }
	
	public function __construct(){
		
		$this->template = ( ! empty( $_POST['template'] ) )? $_POST['template'] : 'basic';
		
		$this->html = ( ! empty( $_POST['html'] ) )? str_replace( '\\"' ,'"', $_POST['html'] ) : '';
		
		//$this->html = htmlspecialchars ( $this->html );
		
		$this->title = ( ! empty( $_POST['title'] ) )? $_POST['title'] : '';
		
	} // end __construct
	
} // end CAHNRS_PDF_Options