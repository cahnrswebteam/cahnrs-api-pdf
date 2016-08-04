<?php 

class Request {
	
	protected $url = false;
	
	protected $filename = 'pdf.pdf';
	
	protected $folder = 'pdfs';
	
	protected $file_path = '';
	
	
	public function the_request(){
		
		$this->set_request();
		
		$this->create_directory();
		
		if ( method_exists( $this , 'request' ) ){
			
			$this->request();
			
		} // end if
		
	} // end the_request
	
	
	public function set_request(){
		
		if ( ! empty( $_GET['src'] ) ){
			
			$this->url = $_GET['src'];
			
		} // end if
		
		if ( ! empty( $_GET['filename'] ) ){
			
			$this->filename = $_GET['filename'];
			
		} else {
			
			$this->filename = uniqid('pdf-') . '.pdf';
			
		}// end if
		
		$this->folder =  dirname( dirname( __FILE__ ) ). '/' . $this->folder;
		
		if ( ! empty( $_GET['folder'] ) ){
			
			$this->folder .=  '/' . $_GET['folder'];
			
		} // end if 
		
		$this->file_path = $this->folder . '/' . $this->filename;
		
	} // end set_request
	
	
	protected function create_pdf(){
		
		$ex = array( 
			'c:/wkhtmltopdf/bin/wkhtmltopdf.exe',
			'-L 0mm',
			'-R 0mm',
			'-T 0mm',
			'-B 0mm',
			'--page-size letter',
			$this->url,
			$this->file_path, 
		);
		
		return exec( implode( ' ' , $ex ) );
		
	} // end create pdf
	
	
	protected function create_directory(){
		
		if( ! file_exists( $this->folder  ) ) { 
				
			mkdir( $this->folder ); 
		
		} // end if
		
	} // end create_directory
	
	
	protected function stream_pdf(){
		
		$data = file_get_contents( $this->file_path );
				
		header("Content-type: application/pdf");
		header('Content-disposition: inline;filename=' . $this->filename );

		echo $data;
		
	} // end stream_pdf
	
	
	protected function delete_pdf(){
		
		if ( file_exists( $this->file_path ) ){
		
			unlink ( $this->file_path );
			
		} // end if
		
	} // end delete pdf
	
} 