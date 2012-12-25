<?php
    require_once "lib/routing.php";
    $route = route_for_request_path($_SERVER['REQUEST_URI']);
    route_to($route);
?>
