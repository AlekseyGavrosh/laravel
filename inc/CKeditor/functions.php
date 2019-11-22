<?php

require_once 'config.php';

function selectTxt(){
	$txt = array();
	$query = "SELECT id, text FROM editor";
	$res = mysql_query($query);
	while($row = mysql_fetch_assoc($res)){
		$txt[] = $row;
	}
	
	return $txt;
}

function update($txt, $id){
	$id = (int)$id;
	$txt = mysql_real_escape_string($txt);
	$query = "UPDATE editor SET text='$txt' WHERE id=$id";
	mysql_query($query);
}

?>