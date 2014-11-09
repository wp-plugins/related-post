<?php

if ( ! defined('ABSPATH')) exit; // if direct access 

function related_post_theme_flat()
	{
		$post_id = get_the_ID();
	

			
		$html = '';
		$html .= '<div  class="related-post flat" >';	
		$html .= '<div  class="related-post-title" >Related Post</div>';	
		$html .= '<ul class="post-list">';
		if (has_tag()) {
			

			$tags = wp_get_post_tags($post_id);
			$tagIDs = array();
			if ($tags) {
				$tagcount = count($tags);
				for ($i = 0; $i < $tagcount; $i++) {
					
					$tagIDs[$i] = $tags[$i]->term_id;
					}
					
					$args = array('tag__in' => $tagIDs, 'post__not_in' => array($post_id), 'showposts' => 5, 'ignore_sticky_posts' => 1);
					$my_query = new WP_Query($args);
					
					if ($my_query->have_posts())
						{
							
							while ($my_query->have_posts()) : $my_query->the_post();
							
								$thumb_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
								
								$html .= '<li class="related-post-single">';
								$html .= '<div class="related-post-thumb"><img src="'.$thumb_url.'" /></div>';
								
								$html.= '<a href="'.get_the_permalink().'" >';
								$html .= get_the_title('', '', true, '40');
								$html .= '</a>';
								$html .= '</li>';
							
							endwhile; 
							wp_reset_postdata(); 
						}
						
					}
					

					
					
					}
				else
					{
						$cat = get_the_category();
						$category = $cat[0]->cat_ID;
						global $wp_query, $paged, $post;
						$nextargs = array('cat' => $category, 'posts_per_page' => 5, 'post__not_in' => array($post_id),);
						$nextloop = new WP_Query($nextargs);
						
						
					if ($nextloop->have_posts())
						{
							while ($nextloop->have_posts()) : $nextloop->the_post();
								{
									
									$thumb_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
									
									$html .= '<li class="related-post-single">';
									$html .= '<div class="related-post-thumb"><img src="'.$thumb_url.'" /></div>';
									$html .= '<a href="'.get_the_permalink() .'" >';
									$html .= get_the_title('', '', true, '40');
									$html .= '</a>';
									$html .= '</li>';
									
									}
							endwhile; 
							wp_reset_query(); 
						}
					else
						{
							$html .= '<p>No Related Post</p>';
						}

   						
						
					}
						
		$html .= '</ul  >';
		$html .= '</div>'; // end 
		

		return $html;

		
		
	}