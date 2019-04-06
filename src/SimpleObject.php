<?php
namespace Botnyx\SimpleObject;

class SimpleObject implements SimpleObjectInterface {
	
	use SimpleObjectTrait;
	
  /*	
    available Validators: 
		
    string,int,bool,float,array,object,
		url,domain,tld,email,countrycode,languagecode,date,
		lowercase,uppercase,phone,alpha,nowhitespace,ip
	*/
  
	function objectProperties(){
		throw new \Exception("Missing function 'objectProperties'");
	}
}

