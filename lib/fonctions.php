<?php


function sql($request)
{

if(strrchr($request, 'SELECT'))
{
$req = mysql_query($request);
}
else
{
	
mysql_query($request);

}

if(!empty($req))

{
	
while ($data = mysql_fetch_array($req))

{
	
$res[] = $data;

}
return $res;
}
else
{
return false;
}
}




function num($request) {
	
$req = mysql_query($request);

if(!empty($req))
return mysql_num_rows($req);
else
{
return 0;
}

}

?>
