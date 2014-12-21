<?php

if ( ! defined('ABSPATH')) exit; // if direct access 

function related_post_theme_text()
	{
		
		$related_post_max_number = get_option( 'related_post_max_number' );	
		$related_post_headline = get_option( 'related_post_headline' );
		$related_post_title_font_size = get_option( 'related_post_title_font_size' );
		$related_post_title_font_color = get_option( 'related_post_title_font_color' );
		
		
		$post_id = get_the_ID();
	

			
		$html = '';
		$html .= '<div  class="related-post text" >';
		if(!empty($related_post_headline))
			{
			$html .= '<div  class="related-post-headline" >'.$related_post_headline.'</div>';
			}
		else
			{
			$html .= '<div  class="related-post-headline" >Related Post</div>';
			}	
		$html .= '<ul class="post-list">';
		if (has_tag()) {
			

			$tags = wp_get_post_tags($post_id);
			$tagIDs = array();
			if ($tags) {
				$tagcount = count($tags);
				for ($i = 0; $i < $tagcount; $i++) {
					
					$tagIDs[$i] = $tags[$i]->term_id;
					}
					
					$args = array('tag__in' => $tagIDs, 'post__not_in' => array($post_id), 'showposts' => $related_post_max_number, 'ignore_sticky_posts' => 1);
					$my_query = new WP_Query($args);
					
					if ($my_query->have_posts())
						{
						
							while ($my_query->have_posts()) : $my_query->the_post();
							
								$html .= '<li class="related-post-single">';
								$html.= '<a style="font-size:'.$related_post_title_font_size.';color:'.$related_post_title_font_color.';" href="'.get_the_permalink().'" >';
								$html .= get_the_title('', '', true, '40');
								$html .= '</a>';
								$html .= '</li>';
							
							endwhile; 
							wp_reset_postdata(); 
						}
					else
						{ 
							$html = '<p>No Related Post</p>';
						}
						
					}
					

					
					
					}
				else
					{
						$cat = get_the_category();
						$category = $cat[0]->cat_ID;
						global $wp_query, $paged, $post;
						$nextargs = array('cat' => $category, 'posts_per_page' => $related_post_max_number, 'post__not_in' => array($post_id),);
						$nextloop = new WP_Query($nextargs);
						while ($nextloop->have_posts()) : $nextloop->the_post();
							
							$html .= '<li class="related-post-single">';
							$html .= '<a style="font-size:'.$related_post_title_font_size.';color:'.$related_post_title_font_color.';" href="'.get_the_permalink() .'" >';
							$html .= get_the_title('', '', true, '40');
							$html .= '</a>';
							$html .= '</li>';
						
						endwhile;
   						//rewind_posts();
   						wp_reset_query(); 
						
						}
						
		$html .= '</ul  >';
		$html .= '</div>'; // end 
		

		return $html;

		
		
	}