<?php




if ( ! defined('ABSPATH')) exit; // if direct access 










function related_post_display($atts) {
	
		$atts = shortcode_atts(
			array(
				'id' => "", //author id
				'themes' => "text", //author id				

				), $atts);


			$post_id = $atts['id'];
			$themes = $atts['themes'];

			$html = '';

			if($themes== "text")
				{
					$html.= related_post_theme_text();
				}
			else if($themes== "flat")
				{
					$html.= related_post_theme_flat();
				}			

			return $html;



		}

add_shortcode('related_post', 'related_post_display');
















