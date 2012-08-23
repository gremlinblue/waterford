<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('link_to'))
{
    function link_to($object, $text, $method="view")
    {
	  get_instance()->load->helper('inflector');
      #return anchor(plural(strtolower(get_class($object)))."/".$method."/".$object->id, $text);
	  return anchor(strtolower(get_class($object))."/".$method."/".$object->id, $text);
    }
}

?>