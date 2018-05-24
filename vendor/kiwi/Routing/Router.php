<?php

namespace Kiwi\Routing;


class Router{

    /**
     * 
     */
    static function parse($url, $request){
    	
        $url = trim($url,'/'); 
        
        if(empty($url)){
        	if(!empty($_SESSION['user'])){
        		$url = 'pages/home';
        	}else{
        		$url = 'pages/landing';
        	}
		}
        
		$params = explode('/', $url);
		
		$request->controller = $params[0];
		$request->action = isset($params[1]) ? $params[1] : 'index';
		$request->params = array_slice($params,2);
		
    }
 
}