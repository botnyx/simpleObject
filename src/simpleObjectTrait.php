<?php

namespace Botnyx/simpleObject;

use Respect\Validation\Validator as v;

trait simpleObjectTrait  {
	
	function _isProperty($property){
		if( !array_key_exists($property,$this->objectProperties()) ){ 
			throw new \Exception("No such property `".$property."`");	
		}
	}
	
	function __construct($array){
		
		if( is_object($array) ){
			$array = (string)$array;
		}elseif(is_array($array) ){ 
			
		}elseif(is_string($array)){
			if ( v::json()->validate($array)){
				$array = json_decode($array,true);
			} else{
				throw new \Exception("Wrong format");
			}
		}else{
			throw new \Exception("Wrong format");
		}
		
		foreach($array as $k=>$v){ $this->$k=$v; }
		
		foreach($this->objectProperties() as $k=>$v){
			if( !isset($this->$k)  && $v['required']==true ){ 
				throw new \Exception("Missing required property `".$k."` for Object."); 
			}elseif( !isset($this->$k) ){
				$this->$k = $v['defval'];
			}
		}		
	}
	
	function __get($property){
		$this->_isProperty($property);
		if(!isset($this->$property)){ throw new \Exception("Invalid property for Object (`".$p."`)"); }
		return $this->$property;
	}
		
	function __set($property, $value){
		//echo "Set property :".$property." to ".$value."<br>";
		//print_r($value);
		
		$this->_isProperty($property);
		if(isset($this->$property)){ 
			throw new \Exception("Property `".$property."` already set.");
		}
		//$value['required'];
		//$value['value'];
		//$value['type'];
		$validationType = $this->objectProperties()[$property]['type'];
		
		$this->_variableValidation($validationType,$value);
		
		$this->$property = $value;
	}
	
	function _variableValidation($type,$value){
		
		switch ($type) {
			case "string":
				$result = v::stringType()->validate($value);
				break;
			case "int":
				$result = v::intType()->validate($value);
				break;
			case "bool":
				$result = v::boolType()->validate($value);
				break;
			case "float":
				$result = v::floatType()->validate($value);
				break;
			case "array":
				$result = v::arrayType()->validate($value);
				break;
			case "object":
				$result = v::objectType()->validate($value);
				break;
				
			case "url":
				$result =  v::url()->validate($value);
				break;
			case "domain":
				$result = v::domain()->validate($value);
				break;
			case "tld":
				$result = v::tld()->validate($value);
				break;
				
			case "email":
				$result = v::email()->validate($value);
				break;
			case "countrycode":
				$result = v::countryCode()->validate($value);
				break;
			case "languagecode":
				$result = v::languageCode()->validate($value); 
				break;
			
			case "date":
				$result = v::date()->validate($value); // true
				break;
			case "lowercase":
				$result = v::stringType()->lowercase()->validate($value);
				break;
			case "uppercase":
				$result = v::stringType()->uppercase()->validate($value); 
				break;
			case "phone":
				$result = v::phone($value); 
				break;
			case "alpha":
				$result = v::alpha($value); 
				break;
			case "nowhitespace":
				$result = v::noWhitespace()->validate($value); 
				break;
			case "ip":
				$result = v::ip()->validate($value); 
				break;
			default:
				throw new \Exception("No such validator `".$type."`");
				//echo "Your favorite color is neither red, blue, nor green!";
		}
		if($result==false){
			throw new \Exception("Validation error: '".$type."'");
		}
	}
	
	
	public function asArray() : array {
        return get_object_vars($this);
    }
    public function asJson() : string {
        return json_encode($this->asArray());
    }
	
}
