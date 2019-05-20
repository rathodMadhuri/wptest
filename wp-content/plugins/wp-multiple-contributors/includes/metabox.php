<?php 
/**
 * Add contributors meta box
 *
 * @param  $post The post object
 * 
 */
function post_add_meta_boxes( $post ){
    add_meta_box( 'post_meta_box', __( 'Contributors', 'wp_mulitple_contributor' ), 'post_build_meta_box', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes_post', 'post_add_meta_boxes' );

/**
 * Build custom field contributors meta box
 *
 * @param  $post The post object
 */
function post_build_meta_box( $post ){
    // form request comes from WordPress
    wp_nonce_field( basename( __FILE__ ), 'post_meta_box_nonce' );
    // stores users array to save as contributor
    $usersArr = get_users( array( 'fields' => array( 'display_name','ID' ) ) );
    //if values are stored in database
    $current_users = ( get_post_meta( $post->ID, '_contributors', true ) ) ? get_post_meta( $post->ID, '_contributors', true ) : array();
    ?>
    <div class='inside'>
        <h3><?php _e( 'Contributors', 'wp_mulitple_contributor' ); ?></h3>
        <p>
            <?php
            foreach ( $usersArr as $user ) {
                ?>
                <input type="checkbox" name="contributors[]" value="<?php echo $user->ID; ?>" <?php checked( ( in_array( $user->ID, $current_users ) ) ? $user->ID : '', $user->ID ); ?> /><?php echo $user->display_name; ?> <br />
                <?php
            }
            ?>
        </p>
    </div>
    <?php
}

/**
 * Store custom field Contributors meta box data
 *
 * @param $post_id The post ID.
 */
function post_save_meta_box_data( $post_id ){
    // verify  meta box nonce
    if ( !isset( $_POST['post_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['post_meta_box_nonce'], basename( __FILE__ ) ) ){
        return;
    }
    // return if autosave enabled
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
        return;
    }
    // Check the user's permissions if users have edit permission.
    if ( ! current_user_can( 'edit_post', $post_id ) ){
        return;
    }
    
    // store Contributors meta box values
    if( isset( $_POST['contributors'] ) ){
        $contributors = (array) $_POST['contributors'];
        // sinitize Contributors array
        $contributors = array_map( 'sanitize_text_field', $contributors );
        // save data of Contributors metabox 
        update_post_meta( $post_id, '_contributors', $contributors );
    }else{
        // delete contributors data
        delete_post_meta( $post_id, '_contributors' );
    }
}
add_action( 'save_post_post', 'post_save_meta_box_data' );


/**
 * frontend post filter
 *
 * @param int $content The post content.
 */

function wpmc_content_filter($content) {
    GLOBAL $post;
    //get contributors list assigned to post
    $contributors = ( get_post_meta( $post->ID, '_contributors', true ) ) ? get_post_meta( $post->ID, '_contributors', true ) : array();
    if (!empty($contributors)) {
        $contriData = '<h5 class="clrBth" >Contributors List: </h5>';
        foreach ($contributors as $key => $contributor) {
            //Get user information
            $user_info = get_userdata($contributor);
            //display contributors attach to post in frontend
            $contriData .='<div class="contriData" >'.get_avatar($contributor,32).' <br><a href="'.get_site_url().'/author/'.$user_info->user_login.'" title="'.$user_info->display_name.'">'.$user_info->display_name.'</a></div>';
        }
        $content = $content.$contriData;
    }
    return $content;
}

add_filter( 'the_content', 'wpmc_content_filter' );

