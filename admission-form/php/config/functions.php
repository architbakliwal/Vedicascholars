<?php

    function timeout(){
    	$timeout_response = array();
    	$timeout_response['status'] = 'timeout';
		echo json_encode($timeout_response);
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

    function trim_awesome($text) {
        return trim($text);
        // return $text;
        // $ret = trim($text);
        // $ret = preg_replace("/^[ \s]+|[ \s]+$/", "", $text);
        // var_dump($ret);
        // return ($ret === "" || $ret === NULL) ? NULL : $ret;
    }

    function mysql_real_escape_string_awesome($text) {
        // return "2015-09-09";
        // var_dump($text);
        // var_dump(empty($text));
        $text_null = 'NULL';
        // var_dump(!empty($text) ? mysql_real_escape_string($text) : $text_null);
        
        // return $text;
        // return ($text === "" || $text === NULL) ? "NULL" : mysql_real_escape_string($text);
        return !empty($text) ? "'".mysql_real_escape_string($text)."'" : $text_null; 
    }
	
?>