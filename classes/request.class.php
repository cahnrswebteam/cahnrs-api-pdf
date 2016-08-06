<?php 

class Request {
	
	protected $url = false;
	
	protected $filename = 'pdf.pdf';
	
	protected $folder = 'pdfs';
	
	protected $folder_dir = '';
	
	protected $file_path = '';
	
	protected $file_url = 'http://134.121.225.236/api/pdf/cahnrs-api-pdf/';
	
	
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
			
			$this->filename = $_GET['filename'] . '.pdf';
			
		} else {
			
			$this->filename = uniqid('pdf-') . '.pdf';
			
		}// end if
		
		$this->folder_dir =  dirname( dirname( __FILE__ ) ) . '/' . $this->folder;
		
		if ( ! empty( $_GET['folder'] ) ){
			
			$this->folder .=  '/' . $_GET['folder'];
			
			$this->folder_dir .=  '/' . $_GET['folder'];
			
		} // end if 
		
		$this->file_path = $this->folder_dir . '/' . $this->filename;
		
	} // end set_request
	
	
	protected function create_pdf(){
		
		$ex = $this->create_pdf_exec();
		
		return exec( $ex );
		
	} // end create pdf
	
	protected function create_pdf_exec(){
		
		$ex = array( 
			'c:/wkhtmltopdf/bin/wkhtmltopdf.exe',
			'-L 0mm',
			'-R 0mm',
			'-T 0mm',
			'-B 0mm',
			'--page-size letter',
			urldecode( $this->url ),
			$this->file_path, 
		);
		
		return implode( ' ' , $ex );
		
	}
	
	
	protected function create_directory(){
		
		if( ! file_exists( $this->folder_dir  ) ) { 
				
			mkdir( $this->folder_dir ); 
		
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
	
	
	protected function do_response(){
		
		$json = array(
			'file' => $this->file_url . $this->folder . '/' . $this->filename,
			'file_size' => filesize( $this->file_path ),
		);
		
		echo json_encode( $json );
		
	}
	
} 