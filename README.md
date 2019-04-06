# simpleObject

SimpleObject allows you to create simple objects with minimal (yet sufficient) variable checking.

Handy for creating 'configuration objects' which require specific values - or have default values.


Usage:

<code>
class myObject extends simpleObject {
	function objectProperties(){
		return array(
			"someVar1"=>	array( "type"=>"string", "required"=>true, "defval"=>"defaultVal"  ),
			"someVar2"=>	array( "type"=>"string", "required"=>false, "defval"=>""  )
		);
	}
	
	
}
</code>
