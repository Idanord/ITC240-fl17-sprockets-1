<?php
/*
config.php
stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('DEBUG',true); #we want to see all errors

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'sprockets_fl17_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

include 'credentials.php';  //stores database info
include 'common.php';       //stores faorite functions
    
//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//create default page identifire
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

//START NEW THEME STUFF
$sub_folder = 'sprockets';//change to 'widgets' or 'sprockets' etc.

//add subfolder, in this case 'fidgets' if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
$config->virtual_path = 'http://' . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;
$config->theme = 'BusinessCasual';//sub folder to themes


define('ADMIN_PATH', $config->virtual_path . '/admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . '/includes/');

//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
//END NEW THEME STUFF

//set website defaults
$config->title = THIS_PAGE;
$config->banner = 'Sprockets';
$config->pageID = THIS_PAGE;

switch(THIS_PAGE){
    case 'contact.php':
        $config->title = 'Contact Page';
        $config->pageID = 'Contact Form';
    break;
    case 'appointment.php':
        $config->title = 'Appointments';
        $config->pageID = 'Appointments Form';
    break;
    case 'index.php':
        $config->title = 'Home';
        $config->pageID = 'Home';
    break;
    case 'comics.php':
        $config->title = 'Comics';
        $config->pageID = 'Comics Information';
    break;
    case 'daily.php':
        $config->title = 'Daily';
        $config->pageID = 'Daily';
    break;
        
}

//START NEW THEME STUFF
//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . '/themes/' . $config->theme . '/';
//END NEW THEME STUFF

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '


        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>


    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '

        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>

    ';

}

    
?>