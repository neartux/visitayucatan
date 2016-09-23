<?php
function conect()
{
	$host = "localhost";
	$user = "root";
	$password = "";
	$base = "visityuc_admin";
	$connection = mysql_connect($host, $user, $password);
	mysql_select_db($base, $connection);
    //mysql_query("SET NAMES 'iso-8859-1'");
	mysql_query("SET NAMES 'utf-8'");
	return $connection;
}

function consulta($query)  //Returns an array with the results of a query in the form
{
	$connection = conect();
	$result = mysql_query($query, $connection) or die(mysql_error());
	$number_cols = mysql_num_fields($result);
	
	for($i=0; $i < $number_cols; ++$i)
	{
		$cols[$i] = mysql_field_name($result, $i);
	}

	$c1 = 0;
	$c2 = 0;
	while($row=mysql_fetch_row($result))
	{
		foreach($row as $field)
		{
			$array[$cols[$c2]][$c1] = (is_null($field) ? '&nbsp;' : $field);
			$c2++;
		}
		$c2 = 0;
		$c1++;
	}
	return $array;
}

function ejecuta($query)  {
  $connection = conect();
  $result = mysql_query($query, $connection) or die(mysql_error());
}
?>