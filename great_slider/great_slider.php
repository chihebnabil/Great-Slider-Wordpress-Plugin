<?php 

/**
 * Plugin Name: Great Slider
 * Description: Nice JQuery Slider
 * Version: 1.0
 * Author: Chiheb Nabil
 * Author URI: www.cnweb.dz
 */


add_action( 'init', 'great_slide_slides' );
add_action( 'init', 'great_partners_slides' );

function great_slide_slides() {
  register_post_type( 'slides',
    array(
      'labels' => array(
        'name' => __( 'Slides' ),
        'singular_name' => __( 'Slide' )
      ),
      'supports'     => array( 'title', 'editor', 'thumbnail','custom-fields' ),
      'public' => true,
      'has_archive' => false,
      'capability_type'=> 'post',
      'publicly_queryable' => false
    
  ));
  
 //add_image_size( 'slider-thumb', 400, 300, true );
 
}

function great_partners_slides() {
  register_post_type( 'partners',
    array(
      'labels' => array(
        'name' => __( 'Partenaires' ),
        'singular_name' => __( 'Partenaire' )
      ),
      'supports'     => array( 'title', 'thumbnail' ),
      'public' => true,
      'has_archive' => false,
      'capability_type'=> 'post',
      'publicly_queryable' => false
    
  ));
  
 //add_image_size( 'slider-thumb', 400, 300, true );
 
}

 function great_slide_show()
 {
 	# code...
 	
 	$slides = new  WP_Query("post_type=slides&posts_per_page=3");
 	    
 	
 	  wp_enqueue_script( 'carouFredSel', plugins_url( $path, $plugin ).'/great_slider/js/jquery.carouFredSel.js',null, false);
 	  wp_enqueue_style( 'app.css',  plugins_url( $path, $plugin ).'/great_slider/css/app.css');
    wp_enqueue_script( 'app', plugins_url( $path, $plugin ).'/great_slider/js/app.js',10);
 	
 		
 	?>
 	  <div class="row">
     <div id="GreatSlider" >
    
 	<?php
 	while ($slides->have_posts()) {
 		# code...
 		?>
 		
         
 		<?php
 		$slides->the_post();
 		global $post;
    
 		the_post_thumbnail('full');
    
    ?>
        

  
     <?php  	} ?>
     </div></div> 




<?php

 }

 function great_partners_slide_show()
 {
  # code...
  
  $slides = new  WP_Query("post_type=partners&posts_per_page=6");
  
    
  ?>
    <div class="row">
          <div class="row">
    
    <h1 class="title-head">Partenaires</h1>
  </div>
    
       <div id="caroussel-partners" >
 
  <?php
  while ($slides->have_posts()) {
    # code...
    ?>
    
         
    <?php
    $slides->the_post();
    global $post;
    
    the_post_thumbnail('full', array("class" => 'large-4 columns'));
    
    ?>
 

  
     <?php    } ?>
      </div> 
  </div> 




<?php  } ?>