# simpleObject

SimpleObject allows you to create simple objects with minimal (yet sufficient) variable checking.

A simpleObject can be created by passing an array, object or json to the constructor.

Or - a empty object can be created, and the properties can be set manually. 

A property can only be set once.


Handy for creating 'configuration objects' which require specific values - or have default values.


Usage:

<pre>
class myObject extends simpleObject {
	function objectProperties(){
		return array(
			"someVar1"=>	array( "type"=>"string", "required"=>true, "defval"=>"defaultVal"  ),
			"someVar2"=>	array( "type"=>"string", "required"=>false, "defval"=>""  )
		);
	}
	
	
}


$MyObject = new myObject( [array/object/json]);



</pre>
