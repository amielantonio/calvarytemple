<?php

/**
 * Return the view for main post
 *
 * @return mixed
 * @throws exception
 */
function index(){


    $posts = allWithoutTrash( 'posts');


    return view( 'admin', 'post/post', compact( 'posts' ));
}

/**
 * Show the form for creating a Post
 *
 * @return mixed
 * @throws exception
 */
function create(){

    return view( 'admin', 'post/add_post');

}

/**
 * Save the Resources
 *
 * @return bool
 * @throws exception
 */
function store(){
    //Create Destination path
    $month = date('m');
    $year = date( 'Y' );
    $upload_dir = upload_img_posts().'\\'.$year.'\\'.$month.'\\';

    //Throw error if there is an error in the image uploaded
    if( $_FILES['featured_image']['error'] > 0){
        throw new exception('Image upload error');
    }

    $post_status = isset($_POST['btn-publish']) ? $post_status = 'published' : $post_status = 'draft';

    $post_value = [

        'post_title'        => $_POST['post_title'],
        'post_body'         => $_POST['post_body'],
        'post_excerpt'      => $_POST['post_excerpt'],
        'category'          => $_POST['category'],
        'tags'              => $_POST['tags'],
        'featured_image'    => resource_dir()."/uploads/{$year}/{$month}/" . $_FILES['featured_image']['name'],
        'published_date'    => date('Y-m-d h:i:s'),
        'author'            => "Rommer Tiangco",
        'post_status'       => $post_status,
        'post_likes'        => 0,
        'created_at'        => date('Y-m-d h:i:s'),
        'updated_at'        => date('Y-m-d h:i:s'),

    ];

    if(!upload_post_image( $_FILES['featured_image'], $upload_dir )){
        return false;
    }

    insert( 'posts', $post_value );

    redirect( 'post');

}

function trash(){

}

/**
 * Show for editing a specific post
 *
 * @return mixed
 * @throws exception
 */
function edit(){
    if( !isset($_GET['id'])){
        redirect( 'posts' );
    }

    $id = $_GET['id'];


    $post = get('posts', $id );

    return view( 'admin', 'post/add_post', compact( 'post' ));
}

function destroy(){

}

/**
 * @return mixed
 * @throws exception
 */
function update(){
    if( !isset($_GET['id'])){
        redirect( 'posts' );
    }

    $id = $_GET['id'];
    //Create Destination path
    $month = date('m');
    $year = date( 'Y' );
    $upload_dir = upload_img_posts().'\\'.$year.'\\'.$month.'\\';

    $post_status = isset($_POST['btn-publish']) ? $post_status = 'published' : $post_status = 'draft';

    $data = [
        'post_title'        => $_POST['post_title'],
        'post_body'         => $_POST['post_body'],
        'post_excerpt'      => $_POST['post_excerpt'],
        'category'          => $_POST['category'],
        'tags'              => $_POST['tags'],
        'post_status'       => $post_status,
        'updated_at'        => date('Y-m-d h:i:s'),
    ];

    if( $_FILES['featured_image']['error'] <> 4 && $_FILES['featured_image']['error'] > 0){

//        Throw error if there is an error in the image uploaded
        if( $_FILES['featured_image']['error'] > 0){
            throw new exception('Image upload error');
        }

        if(!upload_post_image( $_FILES['featured_image'], $upload_dir )){
            return false;
        }

        $data['featured_image'] = resource_dir()."/uploads/{$year}/{$month}/" . $_FILES['featured_image']['name'];

    }


    //Check if the request is successful
    if( patch('reservations', $id, $data ) ){
        $alert = [
            'alertable'=> 'success',
            'message' => 'The Post updated.'
        ];
    }

    $post = get('posts', $id );

    return view( 'admin', 'post/add_post', compact( 'post', 'alert' ));
}