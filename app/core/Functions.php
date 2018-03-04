<?php

/**
 * ------------------------------------------------------------
 * Application Functions
 * ------------------------------------------------------------
 *
 * This file contains application functions that will be using
 * through out the database
 */

/**
 * Get Public header
 */
function get_header(){
   return include VIEWPATH. '/frontend/includes/header.php';
}

/**
 * Get Public footer
 */
function get_footer(){
    return include VIEWPATH. '/frontend/includes/footer.php';
}

/**
 * Get Public Sidebar
 */
function get_sidebar(){
    return include VIEWPATH. '/frontend/includes/sidebar.php';
}

/**
 * Get Public Navigation
 *
 * @return mixed
 */
function get_nav(){
    return include VIEWPATH. '/frontend/includes/nav.php';
}


/**
 * Return base url
 *
 * @return string
 */
function base_url(){

    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    $route = $base_url.'/';


    return $route;
}

/**
 * Return URI string for accessing pages
 *
 * @param string $uri
 * @return string
 */
function route( $uri = '' ){

    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_HOST'] . $base_url['APP_BASE_URL'];

    $route = $base_url.'/' . $uri;

    return $route;

}

/**
 * Return base url of resources folder
 *
 * @param $uri string
 * @return string
 */
function asset( $uri = "" ){
    // Get config file
    $base_url = require CONFIGPATH . '/config.php';

    $base_url = $base_url['APP_BASE_URL'];

    $route = "/{$base_url}/resources/{$uri}";

    //Return route
    return $route;
}

/**
 * Return Upload folder
 *
 * @return string
 */
function upload_img_posts(){

    return RESOURCEPATH.'/uploads';
}


function upload_post_image( $image, $destination ){


    if (!file_exists($destination) && !is_dir($destination)) {

        chmod($destination, 0755);
        mkdir($destination, 0755, true);

    }

    /*
     * move image to uploads directory
     */

    $file_name = $image['name'];

    if( move_uploaded_file($image['tmp_name'], $destination . $file_name) ){
        return true;
    }

    return false;

}


/**
 * Get admin header
 *
 * @return mixed
 */
function admin_get_header(){
    return include VIEWPATH . '/admin/includes/header.php';
}

/**
 *  Get admin navigation
 *
 * @return mixed
 */
function admin_get_nav(){
    return include VIEWPATH . '/admin/includes/nav.php';
}

/**
 * Get Admin Footer
 *
 * @return mixed
 */
function admin_get_footer(){
    return include VIEWPATH . '/admin/includes/footer.php';
}


/**
 * Get admin Sidebar
 *
 * @return mixed
 */
function admin_get_sidebar(){
    return include VIEWPATH . '/admin/includes/sidebar.php';
}


/**
 * Check if current URI is home page
 *
 * @return bool
 */
function is_home(){

    $url = require CONFIGPATH . '/config.php';

    $url = $url['APP_BASE_URL'];

    $request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    if( $url == $request){
        return true;
    }

    return false;
}

function is_page( $page ){



}

/**
 * Returns the view
 *
 * @param $view
 * @param $data array
 * @return mixed
 * @throws exception
 */

function view( $view, $data = []){

    if(!file_exists( BASEPATH."/public/views/{$view}.view.php" )){
        throw new exception('No View');
    }

    extract( $data );

    return require VIEWPATH."/{$view}.view.php";
}

/**
 * Return a View
 *
 * @param $error
 * @return mixed
 */
function view_error( $error ){

    return require BASEPATH."/public/error/{$error}.view.php";
}

/**
 * Return a template within the current layout
 *
 * @param $partialView
 * @return mixed
 * @throws exception
 */
function view_partial( $partialView ){

    return require VIEWPATH."/{$partialView}.view.php";

}

/**
 * Redirect User to the specified route
 *
 * @param $location
 * @param int $response
 */

function redirect( $location, $response = 302 ){

    header("Location: {$location}", true, $response);
}

/**
 * The Texting game is real!
 *
 * @param $number
 * @param $message
 * @param $apicode
 * @return bool|string
 */
function itexmo($number,$message,$apicode){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}


/**
 * Slugify
 *
 * @param $string
 * @return mixed|null|string|string[]
 */
function slugify ($string) {
    $string = utf8_encode($string);
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
    $string = str_replace(' ', '-', $string);
    $string = trim($string, '-');
    $string = strtolower($string);

    if (empty($string)) {
        return 'n-a';
    }

    return $string;
}