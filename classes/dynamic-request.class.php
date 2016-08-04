<?php

class Dynamic_Request extends Request {
	
	public function request(){
		
		$this->create_pdf();
		
		$this->stream_pdf();
		
		$this->delete_pdf();	
		
	} // end if
	
}