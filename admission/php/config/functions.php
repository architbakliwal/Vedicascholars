<?php

    function timeout(){
	    echo "timeout";
	    die();
    }

    function redirect($url){
	    echo '<script type="text/javascript">window.location.href = "'.$url.'";</script>';
    }

    /*function redirect($url){
	    header('Location: ' . $url);
	    die();
    }*/

	function redirect_time($url){
	    echo '<script type="text/javascript">window.setTimeout(function(){window.location.href = "'.$url.'";}, 1000)</script>';
    } 
	
?>