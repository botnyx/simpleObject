# simpleObject

SimpleObject allows you to create simple objects with minimal (yet sufficient) variable checking.

A simpleObject can be created by passing an array, object or json to the constructor.


Handy for creating custom data objects which require specific values - or have default values.


the following types are available to validate the input of the property.
		
    string
    int
    bool
    float
    array
    object
    
    url
    domain
    tld
    email
    countrycode
    languagecode
    date
    lowercase
    uppercase
    phone
    alpha
    nowhitespace
    ip


Usage:

Create your own custom object.

<pre>

class myObject extends Botnyx\SimpleObject {
	function objectProperties(){
		return array(
			"someVar1"=>	array( "type"=>"string", "required"=>true, "defval"=>"defaultVal"  ),
			"someVar2"=>	array( "type"=>"string", "required"=>false, "defval"=>""  )
		);
	}
	
	
}
</pre>


Fill the custom object
<pre>
$MyObject = new myObject( [array/object/json]);
</pre>

Output/access the object
<pre>
print_r($MyObject);
</pre>

Output as Array
<pre>
print_r($MyObject->asArray());
</pre>

Output as Json
<pre>
print_r($MyObject->asJson());
</pre>


Once a property is set, it cannot be altered.
