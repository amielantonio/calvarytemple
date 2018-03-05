<?php

/**
 * Return the view for main post
 *
 * @return mixed
 * @throws exception
 */
function index(){


    $posts = allWithoutTrash( 'posts');


    return view( 'admin/post/post', compact( 'posts' ));
}

/**
 * Show specific post
 *
 * @param $resource
 * @return mixed
 * @throws exception
 */
function show( $resource ){

    $post = get( 'posts', $resource);


    return view( 'admin/post/post', compact( 'post' ));

}

/**
 * Preview the post
 *
 * @param $post
 * @return mixed
 * @throws exception
 */
function preview( $post ){

    return view( 'frontend/blog/preview', compact( $post ));

}

/**
 * Show the form for creating a Post
 *
 * @return mixed
 * @throws exception
 */
function create(){


    $cat_list = all( 'posts_categories');

    return view( 'admin/post/add_post', compact('cat_list' ));

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
        'post_url'          => slugify( $_POST['post_title']),
        'post_excerpt'      => $_POST['post_excerpt'],
        'category'          => $_POST['category'],
        'tags'              => $_POST['tags'],
        'featured_image'    => asset( "/uploads/{$year}/{$month}/" . $_FILES['featured_image']['name'] ),
        'published_date'    => date('Y-m-d H:i:s'),
        'author'            => auth_user()['firstname']." ".auth_user()['lastname'],
        'post_status'       => $post_status,
        'post_likes'        => 0,
        'created_at'        => date('Y-m-d H:i:s'),
        'updated_at'        => date('Y-m-d H:i:s'),

    ];

    if(!upload_post_image( $_FILES['featured_image'], $upload_dir )){
        return false;
    }

    insert( 'posts', $post_value );

    redirect( route( 'dashboard/post' ) );

}

function trash( $resource ){

    softDelete( 'posts', $resource );


    redirect( route( 'dashboard/post' ) );
}

/**
 * Get all trashed posts
 *
 * @return mixed
 * @throws exception
 */
function all_trash(){

    $posts = trashed( 'posts');

    return view( 'admin/post/trash_post', compact( 'posts' ));

}

/**
 * Show for editing a specific post
 *
 * @param $resource
 * @return mixed
 * @throws exception
 */
function edit( $resource ){

    $id = $resource;

    $post = get('posts', $id );

    $cat_list = all( 'posts_categories');

    return view( 'admin/post/add_post', compact( 'post', 'cat_list' ));
}

function destroy( $resource ){

    delete( 'posts', $resource );

    redirect( route( 'dashboard/post/trash' ) );

}

/**
 * @return mixed
 * @throws exception
 */
function update( $resource ){

    $id = $resource;
    //Create Destination path
    $month = date('m');
    $year = date( 'Y' );
    $upload_dir = upload_img_posts().'\\'.$year.'\\'.$month.'\\';

    $post_status = isset($_POST['btn-publish']) ? $post_status = 'published' : $post_status = 'draft';

    $data = [
        'post_title'        => $_POST['post_title'],
        'post_body'         => $_POST['post_body'],
        'post_url'          => slugify( $_POST['post_title']),
        'post_excerpt'      => $_POST['post_excerpt'],
        'category'          => $_POST['category'],
        'tags'              => $_POST['tags'],
        'published_date'    => date('Y-m-d H:i:s'),
        'post_status'       => $post_status,
        'updated_at'        => date('Y-m-d H:i:s'),
    ];

    if( $_FILES['featured_image']['error'] <> 4 && $_FILES['featured_image']['error'] > 0) {

//        Throw error if there is an error in the image uploaded
        if ($_FILES['featured_image']['error'] > 0) {
            throw new exception('Image upload error');
        }



    }elseif( $_FILES['featured_image']['error'] == 4  ){

    }else{
        if (!upload_post_image($_FILES['featured_image'], $upload_dir)) {
            return false;
        }
        $data['featured_image'] = asset( "/uploads/{$year}/{$month}/" . $_FILES['featured_image']['name'] );
    }



    //Check if the request is successful
    if( patch('posts', $id, $data ) ){
        $alert = [
            'alertable'=> 'success',
            'message' => 'The Post updated.'
        ];
    }

    $post = get('posts', $id );

    return view( 'admin/post/add_post', compact( 'post', 'alert' ));
}



/**
 * Save Categoriees to Reservation category database
 */
function savecat(){

    $data =[

        'posts_category' => $_POST['posts_category'],
        'category_description' => $_POST['category_description']

    ];

    insert( 'posts_categories', $data );

    header('Location: post/categories');
}


function restore( $resource ){

    softRestore( 'posts', $resource );

    redirect( route( 'dashboard/post' ) );

}