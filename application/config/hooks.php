<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | Hooks
  | -------------------------------------------------------------------------
  | This file lets you define "hooks" to extend CI without hacking the core
  | files.  Please see the user guide for info:
  |
  |	http://codeigniter.com/user_guide/general/hooks.html
  |
 */
//////
$hook['post_controller_constructor'][] = array(
    'class' => 'Load_function',
    'function' => 'checkholiday',
    'filename' => 'load_function.php',
    'filepath' => 'hooks',
    'params' => array()
);
$hook['post_controller_constructor'][] = array(
    'class' => 'Load_function',
    'function' => 'msgcustom',
    'filename' => 'load_function.php',
    'filepath' => 'hooks',
    'params' => array()
);
$hook['post_controller_constructor'][] = array(
    'class' => 'Load_function',
    'function' => 'worknotify',
    'filename' => 'load_function.php',
    'filepath' => 'hooks',
    'params' => array()
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */