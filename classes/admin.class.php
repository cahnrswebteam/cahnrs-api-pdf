<?php

class Admin {
	
	private $key = 'wT7oB64w0w0Tn12UyVOEB6XF7sMU48KN';
	
	
	protected function authenticate(){
		
		if ( $key = $this->get_key() ){
			
			return true;
			
		} // end if
		
		return false;
		
	} // end authenticate
	
	
	private function get_key(){
		
		if ( ! empty( $_GET['access-key'] ) ){
			
			$key = $_GET['access-key'];
			
			if ( $key == $this->key ){
				
				return true;
				
			} else {
				
				return false;
				
			} // end if
			
		} // end if
		
		return false;
		
	} // end get_key
	
	
}