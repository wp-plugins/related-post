<?php	


if ( ! defined('ABSPATH')) exit; // if direct access 



	if(empty($_POST['related_post_hidden']))
		{
	
		$related_post_max_number = get_option( 'related_post_max_number' );	
		$related_post_headline = get_option( 'related_post_headline' );
		$related_post_title_font_size = get_option( 'related_post_title_font_size' );
		$related_post_title_font_color = get_option( 'related_post_title_font_color' );		
		
			
		}
	else
		{	
			if($_POST['related_post_hidden'] == 'Y') {
				//Form data sent
	
				$related_post_max_number = sanitize_text_field($_POST['related_post_max_number']);
				update_option('related_post_max_number', $related_post_max_number);	
	
				$related_post_headline = sanitize_text_field($_POST['related_post_headline']);
				update_option('related_post_headline', $related_post_headline);
				
				$related_post_title_font_size = sanitize_text_field($_POST['related_post_title_font_size']);
				update_option('related_post_title_font_size', $related_post_title_font_size);
				
				$related_post_title_font_color = sanitize_text_field($_POST['related_post_title_font_color']);
				update_option('related_post_title_font_color', $related_post_title_font_color);							
				
		
		
				?>
				<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>
		
				<?php
				} 
		}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(related_post_plugin_name.' Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="related_post_hidden" value="Y">
        <?php settings_fields( 'related_post_plugin_options' );
				do_settings_sections( 'related_post_plugin_options' );
			
		?>

    <div class="para-settings up-paratheme-settings">
    
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Options</li>
            <li nav="2" class="nav2">Short-Codes</li>
            <li nav="3" class="nav3">Help & Upgrade</li>
        </ul> <!-- tab-nav end -->   
    
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
            
				<div class="option-box">
                    <p class="option-title">Maximum number of post to display</p>
                    <p class="option-info"></p>
                    <input placeholder="4" type="text" name="related_post_max_number" value="<?php if(!empty($related_post_max_number)) echo $related_post_max_number; else '4'; ?>" />

                </div>            
            
				<div class="option-box">
                    <p class="option-title">Head line text</p>
                    <p class="option-info"></p>
                    <input placeholder="Related Posts..." type="text" name="related_post_headline" value="<?php if(!empty($related_post_headline)) echo $related_post_headline; else ''; ?>" />

                </div>
				<div class="option-box">
                    <p class="option-title">Post title font size</p>
                    <p class="option-info"></p>
                    <input placeholder="13px" type="text" name="related_post_title_font_size" value="<?php if(!empty($related_post_title_font_size)) echo $related_post_title_font_size; else ''; ?>" />

                </div>      
				<div class="option-box">
                    <p class="option-title">Post title font color</p>
                    <p class="option-info"></p>
                    <input class="related_post_title_font_color" placeholder="#ffffff" type="text" name="related_post_title_font_color" value="<?php if(!empty($related_post_title_font_color)) echo $related_post_title_font_color; else ''; ?>" />

                </div>     
            
            </li>
        
            <li style="display: none;" class="box2 tab-box">
				
				<div class="option-box">
                    <p class="option-title">Short-code for php file</p>
                    <p class="option-info">Short-code inside loop by dynamic post id you can use anywhere inside loop on .php files.</p>
                    
                    <pre>&#60;?php<br />echo do_shortcode( '&#91;related_post themes="flat" id="'.get_the_ID().'"&#93;' ); <br />?&#62;</pre>
                    <pre>Themes: text, flat </pre>

                </div>
				
				<div class="option-box">
                    <p class="option-title">Short-code for content</p>
                    <p class="option-info">Short-code inside content for fixed post id you can use anywhere inside content.</p>		
                    <pre>[related_post themes="flat"]</pre>
                    <pre>Themes: text, flat </pre>

                </div>
                
            </li>
            
            
			<li style="display: none;" class="box3 tab-box">
				
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to Contact with any issue for this plugin, Ask any question via forum <a href="<?php echo related_post_qa_url; ?>"><?php echo related_post_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />
                    
                    

	<?php
    
    $related_post_customer_type = get_option('related_post_customer_type');
    $related_post_version = get_option('related_post_version');
    

    if($related_post_customer_type=="free")
        {
    
            echo 'You are using <strong> '.$related_post_customer_type.' version  '.$related_post_version.'</strong> of <strong>'.related_post_plugin_name.'</strong>, To get more feature you could try our premium version. ';
            
            echo '<a href="'.related_post_pro_url.'">'.related_post_pro_url.'</a>';
            
        }
    elseif($related_post_customer_type=="pro")
        {
    
            echo 'Thanks for using <strong> premium version  '.$related_post_version.'</strong> of <strong>'.related_post_plugin_name.'</strong> ';	
            
            
        }
    
     ?>       

                    
                    </p>
                    

                </div>

           
           	</li>
            
			

            
            
        </ul>
    
    
		
    </div>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div> <!-- end wrap -->
