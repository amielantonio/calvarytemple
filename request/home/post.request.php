<?php

/**
 * @return mixed
 * @throws exception
 */
function index(){

    $posts = allWithoutTrash( 'posts' );

    return view( 'frontend/post/post', compact( 'posts' ) );
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