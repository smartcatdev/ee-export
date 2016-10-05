<?php 

include( dirname( __FILE__ ) . '/categories.php' );
include( dirname( __FILE__ ) . '/data.php' );

$categories = json_decode( file_get_contents( dirname( __FILE__ ) . '/categories.json' ) );
$data = json_decode( file_get_contents( dirname( __FILE__ ) . '/data.json' ) );



foreach( $categories as $category ) :
    $cat_id = wp_create_category( $category->cat_name );
endforeach;


foreach( $data as $post ) :
    
    $cat_id = get_cat_ID( $post->cat_name );
    
    $post_id = wp_insert_post(array(
        'post_date' => date('Y-m-d', $post->entry_date ),
        'post_title' => $post->title,
        'post_excerpt' => ee_replace_string('/wp-content/uploads/', $post->exerpt ),
        'post_content' => ee_replace_string('/wp-content/uploads/', $post->content ),
        'post_category' => array( $cat_id ),
        'post_name' => $post->url_title,
        'post_status' => 'publish',
    ));
    

endforeach;

function ee_replace_string( $replace, $subject ) {
    
    $subject = str_replace( '{filedir_3}', $replace, $subject );
    $subject = str_replace( '{filedir_2}', $replace, $subject );
    $subject = str_replace( '{filedir_1}', $replace, $subject );
    
    
    return $subject;
    
}
