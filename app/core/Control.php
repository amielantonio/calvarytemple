<?php
/**
 * This will be responsible for domain events and routing of the website application
 */


function control_get($uri, $endpoint, $dir, $requestClass = '')
{
    /**
     * Check request method
     */
    if( $_SERVER['REQUEST_METHOD'] <> "GET"){
        exit;
    }
    /**
     * Get config base url
     */

    $config = require CONFIGPATH . '/config.php';
    $base_url = $config['APP_BASE_URL'];

    /**
     * Instantiate variables
     */
    $thisEndpoint = endpoint_check($endpoint);
    $thisURI = $base_url.'/' . trim($uri, '/');
    $thisCurrentURI = current_uri();

    /**
     * parse base uri
     */
    if( $base_url == $thisCurrentURI){
        $thisCurrentURI = $thisCurrentURI.'/';
    }

    /**
     * Compare URI
     */
    if($thisURI == $thisCurrentURI){
        /**
         * Check if the view has functionalities included
         */
        if( $requestClass <> ''){
            require REQUESTPATH . '/' . $requestClass . '.php';
        }

        /**
         * show view
         */
        return require $thisEndpoint . $dir . '.php';

    }
    return '';

}

function control_post($uri, $endpoint, $dir)
{


    
    
}



function control_patch($uri, $dir)
{

    return "";
}

function control_put($uri, $dir)
{

    return "";
}

function control_delete($uri, $dir)
{

    return "";
}

/**
 * Check endpoint if the view is in the public directory
 * or if it's in the admin directory
 *
 * @param $endpoint
 * @return string
 */
function endpoint_check($endpoint)
{
    if($endpoint == 'public'){
        return PUBLICPATH . '/views/';
    }
    if($endpoint == 'admin'){
        return ADMINPATH . '/views/';
    }
}

/**
 * Check current URI
 *
 * @return string
 */
function current_uri(){

    $current_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

    return $current_uri;

}