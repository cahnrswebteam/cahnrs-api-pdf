<?php 
/**
 * Animal Ag template class
 * @author Danial Bleile
 * @version 0.0.1
 */
class CAHNRS_PDF_Animal_Ag_Template extends CAHNRS_PDF_Template {
	
	// @var array $css CSS to use in the template
	protected $css = array( 
		array( 'path' => 'templates/core/style.css' , 'is_local' => true ),
		array( 'path' => 'templates/animal-ag/style.css' , 'is_local' => true ),
	);
	
	/**
	 * Builds PDF Body
	 * @param object $options Options object
	 * @return string HTML for the template body
	 */ 
	public function get_template_body( $options ){
		
		$html = '<body>';
		
		$html .= $this->get_banner( $options );
		
		$html .= $this->get_title( $options );
		
		$html .= $options->get_html();
		
		return $html;
		
	} // end get_template_body
	
	/**
	 * Get coverpage banner
	 * @param object $options Options object
	 * @return string HTML
	 */
	public function get_banner( $options ){
		
		$html = '<table class="logo-banner content-width-wide">';
		
			$html .= '<tr>';
			
				$html .= '<td class="ext-logo" width="200">';
				
					$html .= '<img src="' . $this->get_base_url . 'images/wsu-extension-logo.jpg" />';
				
				$html .= '</td>';
				
				$html .= '<td class="title-text">';
				
					$html .= '<h2>WSU Animal Agriculture Team</h2>';
					
					$html .= '<div class="pub-number">Fact Sheet #1009-2003</div>';
					$html .= '<a href="extension.wsu.edu/animalag" class="link">extension.wsu.edu/animalag</a>'; 
				
				$html .= '</td>';
			
			$html .= '</tr>';
		
		$html .= '</table>';
		
		return $html;
		
	} // end get_banner
	
	/**
	 * Get coverpage title
	 * @param object $options Options object
	 * @return string HTML
	 */
	public function get_title( $options ) {
		
		$html = '<div class="pub-title content-width">';
		
			$html .= '<h1>' . $options->get_title() . '</h1>';
			$html .= '<div class="author">By: Sarah M. Smith</div>';
		
		$html .= '</div>';
		
		return $html;
		
	}// end get_banner
	
	
	
} // end CAHNRS_PDF_Template