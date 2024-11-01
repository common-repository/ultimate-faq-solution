<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
* Default template by Aussie Team
* Template file name must be 'template.php' to get the template work.
* CSS file(if any) name must be 'style.css'
* Js file(if any) name must be 'script.js'
* The following classes are being used by faq directory's search script - ufaqsw_element_group_src, ufaqsw_element_src, ufaqsw_faq_question_src,
* ufaqsw_faq_answer_src. 
* So do not forgot to reuse that in next template.
*/
extract($designs);
?>
<div class="ufaqsw_container_default ufaqsw_container_default_<?php echo esc_attr(get_the_ID()); ?> ufaqsw_element_group_src"> 

	<?php
	//Main Title
	//Check if title is enabled

	if ( $hidetitle !== '1' && $title_hide !== 'yes' ): ?>
		<h2 class="ufaqsw_faq_title ufaqsw_faq_title_<?php echo esc_attr(get_the_ID()); ?>"><?php echo esc_attr(get_the_title()); ?></h2>
	<?php endif; ?>
	
	<?php 
		foreach($faqs as $faq): 
		/*
		* This is where the looping begans
		* Now it is for simplifing for data variables
		*/
		$faq = apply_filters( 'ufaqsw_simplify_variables', $faq );
		extract($faq);
		/*
		* All data variables are extracted. Available variables are
		* $question - Which contains the Question.
		* $answer - Which contains the Answer. 
		*/
		
	?>
	
		<div class="ufaqsw_toggle_default ufaqsw_toggle_default_<?php echo esc_attr(get_the_ID()); ?> ufaqsw_element_src">
			<div class="ufaqsw-toggle-title-area-default ufaqsw-toggle-title-area-default_<?php echo esc_attr(get_the_ID()); ?>">
				<h3 class="ufaqsw-title-name-default ufaqsw-title-name-default_<?php echo esc_attr(get_the_ID()); ?>">
					<span class="ufaqsw-default-icon">
						<i class="fa <?php echo esc_attr(isset($designs['normal_icon']) && $designs['normal_icon']!=''?$designs['normal_icon']:'fa fa-plus') ?>" aria-hidden="true"></i>
						<i class="fa <?php echo esc_attr(isset($designs['active_icon']) && $designs['active_icon']!=''?$designs['active_icon']:'fa fa-minus') ?>" id="ufaqsw_other_style" aria-hidden="true"></i>
					</span>				
					<span class="ufaqsw-default-title ufaqsw_faq_question_src"><?php echo wp_kses_post($question); ?></span>
				</h3>
			</div>
			<div class="ufaqsw-toggle-inner-default ufaqsw-toggle-inner-default_<?php echo esc_attr(get_the_ID()); ?> ufaqsw_faq_answer_src">
				<?php echo apply_filters('the_content', $answer); ?>
			</div>
		</div><!-- END OF TOGGLE -->
		
	<?php 
		endforeach;
		/*
		* This is the end of the loop.
		*/
	?>
	
</div>