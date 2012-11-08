<?php

require_once "conf/routes.php";

function route_for_request_path($path)
{
	$delim = "#[/?&]#";
	$values = preg_split($delim, $path);
	for($i = 0; $i <= count($values); $i++) {
		if(is_null($values[$i]) || $values[$i] == "") {
			unset($values[$i]);
		}
	}
	
	$values = array_values($values);
	$classe = $values[0];
	$methode = $values[1];
	$param = NULL;
	
	for ($i =2; $i < count($values); $i++)
	{
		$param[$i-2] = $values[$i];
		if (is_null($param[$i-2]) || $param[$i-2] == "") 
		{
			unset($param[$i-2]);
		}
	}
	
	$result[0] = $classe;
	$result[1] = $methode;
	
	if ($param[0] != NULL)
	{
		$result[2]=$param;
	}
	else $result[2] = 0;
	
	return $result;
	
}

function route_to($route)
{
	//$save=$route[1];
	//$route[1]=$route[0];
	//$route[2]=$save;
	//$route[0]="sportraining";
	if ($route[0] <> "sportraining") header('Location: sportraining/index'); 
	require_once ("app/controllers/$route[0]/$route[0].php");

	$class_name = ucwords($route[0]."Controller"); //ucword = premiere lettre de tous les mots en majuscule
	//print($class_name);

	// Creation de l'objet controlleur
	$obj = new $class_name();
	
	//on appel la fonction voulue avec le bon nmpbre de paramètres
	if(count($route[1]) == 0) header('Location: index'); 
	if (method_exists($obj, $route[1]) {
	if(count($route[2]) == 2)
		$obj->$route[1]($route[2][0], $route[2][1]);
	else if(count($route[2]) == 1)
		$obj->$route[1]($route[2][0]);
	else if (count($route[2])==3)
		$obj->$route[1]($route[2][0], $route[2][1], $route[2][2]);
	else if (count($route[2])>3)
		$obj->$route[1]($route[2][0], $route[2][1], $route[2][2]);
	} else header('Location: index'); 
	
}

?>
