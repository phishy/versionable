<?php

class MyParentFixture extends CakeTestFixture {
	var $name = 'MyParent';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'name' => array('type' => 'string', 'null' => false),
	);
}

?>