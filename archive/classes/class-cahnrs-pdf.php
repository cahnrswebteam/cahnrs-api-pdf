<?php
class CAHNRS_Pdf {
	
	private $api_key = '78a4s395oaZwd5hC41SOG3p3at6E4ZGn'; // For Testing
	
	/**
	 * Check if supplied api key matches
	 * @return bool True if yes, othewise false
	 */
	public function check_api_key(){
		
		if ( ! empty( $_POST['key'] ) && $_POST['key'] === '78a4s395oaZwd5hC41SOG3p3at6E4ZGn' ){
			
			return true;
			
		} else {
			
			return false;
			
		} // end fi
		
	} // end check_api_key
	
	/**
	 * Builds Pdf
	 * @param array $settings PDF settings
	 * @param array $content PDF content fields
	 */
	public function do_pdf(){
		
		// Check the key
		if ( ! $this->check_api_key() ) return 'key fail'; 
		
		$options = $this->get_options();
		
		$template = $this->get_template( $options );
		
		$html = $template->do_template( $options );
		
		$this->render_pdf( $options , $html );
		
	} // end get_pdf
	
	protected function get_options(){
		
		$template = ( ! empty( $_POST['template'] ) )? $_POST['template'] : 'basic';
		
		switch( $template ){
			
			default:
				require_once 'class-cahnrs-pdf-options.php';
				$options = new CAHNRS_PDF_Options();
				break; 
			
		} // end switch
		
		return $options;
		
	} // end get_options
	
	
	
	
	
	protected function get_template( $options ){
		
		require_once 'class-cahnrs-pdf-template.php';
		
		switch( $options->get_template() ){
			
			case 'animal-ag':
				require_once dirname( dirname(__FILE__ ) ) . '/templates/animal-ag/class-cahnrs-pdf-animal-ag-template.php';
				$template = new CAHNRS_PDF_Animal_Ag_Template();
				break;
				
			default:
				$template = new CAHNRS_PDF_Template();
				break;
			
		} // end switch
		
		return $template;
		
	}
	
	protected function get_html( $options ){
		
		switch( $options->get_template() ){
			
			default:
				$html = $options->get_html();
				break;
			
		} // end switch
		
		return $html;
		
	} // end get_html
	
	protected function render_pdf( $options , $html ){
		
		require_once dirname( dirname(__FILE__ ) ) . '/dompdf/dompdf_config.inc.php';
		
		$dompdf = new DOMPDF();
	
		//$dompdf->load_html( htmlspecialchars( $html ) );
		
		$dompdf->load_html( $html );
		
		set_time_limit( 300 );
		
		$dompdf->render();
		
		$dompdf->stream("pdf.pdf", array("Attachment" => 0));
		
		set_time_limit( 30 );
		
	} // end render_pdf
	
} // end CAHNRS_Pdf