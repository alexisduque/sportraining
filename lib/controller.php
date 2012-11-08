<?php

function render_partial($name, $params)
{
    require_once("app/views/partials/$name.php");
}

function link_to_css($name)
{
   require_once("static/css/$name.css");
}

function link_to_js($name)
{
	echo '<script type="text/javascript">';
    include("static/javascript/$name.js");
   	echo '</script>';
}

class BaseController
{
    function __construct()
    {
        session_start();
    }
    
    function clear_session()
    {
        $_SESSION = array();
        session_destroy();
    }
    
    function session_set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    function session_get($key, $default)
    {
        if (isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            return $default;
        }
    }
    
    function render_view($view_name, $params)
    {
		$adresse = "app/views/".$this->session_get("controller", "sample")."/".$view_name.".php";
		include ("static/structure.php");
        
    }
    
    function render_error($http_status, $message, $context_map)
    {
        require_once ("static/html/error.php");
    }
    
    function redirect_to($url)
    {
        header("Location: $url");
        exit;
    }
}

?>
