<?php
class CAHNRS_PDF_Request {
	
	/**
	 * Gets post html based on src and id
	 * @param array $settings PDF settings
	 * @return string HTML of the pdf
	 */
	public function get_content( $settings ){
		
		$pdf = array();
		
		$response = @file_get_contents( $settings['src'] . 'wp-json/posts/' . $settings['id'] . '?type=pdf' );
		
		if ( $response ){
			
			$post = json_decode( $response , true );
			
			$pdf['title'] = $post['title'];
			
			$pdf['content'] = $post['content'];
			
			$pdf['link'] = $post['link'];
			
		} // end if
		
		return $pdf;
		
	} // end get_pdf

	
} // end CAHNRS_PDF_Request