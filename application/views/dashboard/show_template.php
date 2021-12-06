<?php

$data= $template->html_template;

echo htmlspecialchars_decode(stripslashes($data)); 
?>
