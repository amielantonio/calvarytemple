<?php
/**
 * Bootstrap file for the web application. Loads the
 * configuration file and settings file and then
 * start the controls of the web application.
 *
 */



/**
 * Load the web application configuration
 */

require APPPATH . '/config/config.php';


/**
 * Load the web application constants
 */

require APPPATH . '/config/constants.php';


/**
 * Load application helpers
 */

require APPPATH . '/helper/helper.php';

/**
 * Load Routes functions
 */

require COREPATH . '/Control.php';

/**
 * Load Application functions
 */

require COREPATH . '/Functions.php';