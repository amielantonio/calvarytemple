<?php


function index(){


    $blog = where( 'post', 'post_status = published' );

    return view( 'frontend/blog/blog', compact( 'blog' ) );
}