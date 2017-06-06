<?php

/** Check if environment is development and display errors **/
/*
function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}
*/
/** Check for Magic Quotes and remove them **/
/*
function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}
*/
/** Check register globals and remove them **/
/*
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}
*/
/** Main Call Function **/

function callHook() {
	global $url;

	$urlArray = array();
	$urlArray = explode("/",$url);
	$controller = $urlArray[0];
	array_shift($urlArray);

	$action = $urlArray[0];
	
	array_shift($urlArray);
	$queryString = $urlArray;
	//$controllerName = $controller;
	$controller = ucwords($controller);
	//$model = rtrim($controller, 's');
	//print_r($controller);
	$dispatch = new $controller();
	
	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($dispatch,$action),$queryString);
	} else {
		echo 'no information';
	}
}

/** Autoload any classes that are required **/

// function __autoload($className) {
// 	$name = strtolower($className);
// 	echo $name;
// 	if (file_exists( "$name.class.php" ) ) {
// 		require_once( "$name.class.php" );
// 	} else if (file_exists("./application/controllers/$name.php")) {
// 		require_once("./application/controllers/$name.php");
// 	} else if (file_exists("./application/models/$name.php")) {
// 		require_once("./application/models/$name.php");
// 	} else {
// 		echo 'Not found any file'; 
// 	}
// }

function __autoload($className) {
    if (file_exists(ROOT .'/library/'. strtolower($className) . '.class.php')) {
        require_once(ROOT .'/library/'. strtolower($className) . '.class.php');
    } else if (file_exists(ROOT .'/application/'. 'controllers/'. strtolower($className) . '.php')) {
        require_once(ROOT . '/application/'. 'controllers/'. strtolower($className) . '.php');
    } else if (file_exists(ROOT .'/application/'. 'models/'. strtolower($className) . '.php')) {
        require_once(ROOT .'/application/'. 'models/'. strtolower($className) . '.php');
    } else {
        /* Error Generation Code Here */
    }
}


// setReporting();
// removeMagicQuotes();
// unregisterGlobals();
callHook();
