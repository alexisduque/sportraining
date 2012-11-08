<?php

require_once "lib/routing.php";

$route = route_for_request_path($_SERVER['REQUEST_URI']);
//~ echo("   test2    ");
//~ print_r($route);
route_to($route);

?>
