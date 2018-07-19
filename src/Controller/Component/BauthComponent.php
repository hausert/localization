<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\ServerRequest;
use Cake\Core\Configure;
use Cake\Http\Exception\MethodNotAllowedException;

class BauthComponent extends Component
{
    
 	private function getAcltree(){
 		return Configure::read("Acl");
 	}

    public function checkAccess(ServerRequest $request)
    {
    	$controllers=Configure::read("Acl.{$request->controller}Controller");
		$header=$request->getHeaders();
    	if($controllers && ( isset( $header["Token"] ) ) ){

    		$token= current($header["Token"]);
    		if(isset($controllers[$request->getMethod()]) && in_array($token, $controllers[$request->getMethod()]) ){
    			return true;
    		}
    	}
    	throw new MethodNotAllowedException();
    }
}