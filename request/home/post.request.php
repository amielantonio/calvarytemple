<?php

/**
 * @return mixed
 * @throws exception
 */
function index(){

    //get all posts
    $posts = where( 'posts', 'post_status = "Published AND is_delete = 0"' );


    return view( 'frontend/post/post', compact( 'posts', 'cats' ) );
}

/**
 * Show a single Post resource
 *
 * @param $resource
 * @return mixed
 * @throws exception
 */
function show( $resource ){

    $post = where( 'posts', "post_url='{$resource}'" );

    return view( 'frontend/post/single', compact( 'post' ) );

}