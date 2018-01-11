<?php

/**
 * Instantiate all application constants
 *
 * This will make the accessing of application configuration much easier.
 */


/**
 * Define config path
 *
 * The config directory contains the web applications configurations
 */
defined( 'CONFIGPATH' ) OR define( 'CONFIGPATH', APPPATH . '/config' );


/**
 * Define core path
 *
 * The core directory contains all core files that is responsible with
 * the website's routing and and controls.
 *
 */

defined( 'COREPATH' ) OR define( 'COREPATH', APPPATH . '/core');

/**
 * Define database path
 *
 * The database directory contains all database queries and
 * database server credentials.
 */

defined( 'DBPATH') OR define( 'DBPATH', APPPATH . '/database');

/**
 * Define Helper path
 *
 * The helper directory contains all simple functions that will be use through out
 * the application this includes functions for parsing, formatting, of data.
 */

defined( 'HELPERPATH') OR define( 'HELPERPATH', APPPATH . '/helper');


/**
 * Define resources path
 *
 * the resources directory contains all stylesheet and scripts that
 * the application will be using, this includes CSS, JS, and the PLUGIN
 */

defined( 'RESOURCEPATH' ) OR define( 'RESOURCEPATH', BASEPATH . '/resources');

defined( 'resources_dir' ) OR define( 'resources_dir', '/'.$config['APP_BASE_URL'] . '/resources');


/**
 * Define public path
 *
 * The public directory contains the frontend of the website.
 */

defined( 'PUBLICPATH') OR define( 'PUBLICPATH', BASEPATH . '/public');


/**
 * Define admin path
 *
 * The Admin directory contains all the backend of the website.
 */

defined('ADMINPATH' ) OR define( 'ADMINPATH', BASEPATH . '/admin');


/**
 * Define request path or class path
 *
 * The request directory contains all functions that will process the data
 * for a specific view.
 */

defined( 'REQUESTPATH' ) OR define( 'REQUESTPATH', BASEPATH . '/request');

/**
 * Define web path
 *
 * The web directory contains the routes for the web application
 */

defined( 'ROUTESPATH') OR define( 'ROUTESPATH', BASEPATH . '/web');

