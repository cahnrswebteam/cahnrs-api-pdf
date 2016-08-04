<?php

require_once 'classes/admin.class.php';

class PDF_Converter extends Admin {
	
	public function __construct(){
		
		if ( $this->authenticate() ){
		
			$this->do_request();
		
		} // end if
		
		die();
		
	} // end __construct
	
	private function do_request(){
		
		if ( $type = $this->get_request_type() ){

			require_once 'classes/request.class.php';
			
			$request = false;
			
			switch( $type ){
				
				case 'dynamic':
					require_once 'classes/dynamic-request.class.php';
					$request = new Dynamic_Request();
					break;
				
			} // end switch
			
			if ( $request && method_exists( $request , 'the_request' )  ){
				
				$request->the_request();
				
			} // end if
			
		} // end if
		
	} // end do_request
	
	
	private function get_request_type(){
		
		return 'dynamic';
		
	} // end get_request_type
	
	
}

$pdf = new PDF_Converter();