<?php
/*
config.php
stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('DEBUG',true); #we want to see all errors

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
    case 'customers.php':
        $config->title = 'Customers';
        $config->pageID = 'Customers Information';
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

    
?>