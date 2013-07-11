<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pageEncoding extends CI_Hooks {

 function headerWindows1251($params) {
 $CFG =& load_class('Config', 'core');
 header('Content-type: text/html; charset=' . $CFG->item('charset'));
 }

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
