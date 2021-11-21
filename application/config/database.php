<?php  if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}


/*
 *
 * Edit this file and upate with your own MySQL database details.
*/


// $db['default']['hostname'] = 'localhost';
// $db['default']['username'] = 'hostinghills';
// $db['default']['password'] = '9Y3OarGFlkkyWB7O';
// $db['default']['database'] = 'hostinghills';

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = '';
$db['default']['database'] = 'hostinghills';



/** Do not change the below values. Change only if you know what you are doing */
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = 'hd_';
$db['default']['pconnect'] = false;
$db['default']['db_debug'] = true;
$db['default']['cache_on'] = false;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_unicode_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = true;
$db['default']['stricton'] = false;
$active_group              = 'default';
$query_builder             = true;
/* End of file database.php */
/* Location: ./application/config/database.php */
