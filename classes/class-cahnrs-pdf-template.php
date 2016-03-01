<?php 
/**
 * Base template class
 * @author Danial Bleile
 * @version 0.0.1
 */
class CAHNRS_PDF_Template {
	
	//@var string $base_url Base URL for plugin
	protected $base_url = 'http://cahnrs-api-pdf.wpdev.cahnrs.wsu.edu/';
	
	// @var array $css CSS to use in the template
	protected $css = array( 
		array( 'path' => 'templates/core/style.css' , 'is_local' => true ),
	);
	
	/**
	 * Get CSS Property
	 * @return array CSS for the template
	 */
	public function get_css(){ return $this->css; }
	
	/**
	 * Get Base URL Property
	 * @return string base url to use for css
	 */
	public function get_base_url(){ return $this->base_url; }
	
	/**
	 * Get resources and assemble the template
	 * @param object $options Options object
	 * @return string HTML for the template
	 */
	public function do_template( $options ){
		
		$html = $this->get_template_head( $options );
		
		$html .= $this->get_template_body( $options );
		
		$html .= $this->get_template_footer( $options );
		
		return $html;
		
	} // end do_template
	
	/**
	 * Builds PDF Head
	 * @param object $options Options object
	 * @return string HTML for the template head
	 */ 
	public function get_template_head(){
		
		$html = '<html><head>';
		
		foreach ( $this->get_css() as $css ){
			
			if ( $css['is_local'] ) $css['path'] = $this->get_base_url() . $css['path'];
			
			$html .= '<link rel="stylesheet" type="text/css" href="' . $css['path'] . '">';
			
		} // end foreach
	
		$html .= '</head>';
		
		return $html;
		
	} // end get_template_head 
	
	/**
	 * Builds PDF Body
	 * @param object $options Options object
	 * @return string HTML for the template body
	 */ 
	public function get_template_body( $options ){
		
		$html = '<body>This is a test';
		
		$html .= $options->get_html();
		
		return $html;
		
	} // end get_template_body
	
	/**
	 * Builds PDF Footer
	 * @param object $options Options object
	 * @return string HTML for the template footer
	 */ 
	public function get_template_footer(){
		
		$html = '</body></html>';
		
		return $html;
		
	} // end get_template_footer
	
	
} // end CAHNRS_PDF_Template