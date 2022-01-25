<?php

function xss($item){
	return htmlspecialchars(trim($item));
}
?>
