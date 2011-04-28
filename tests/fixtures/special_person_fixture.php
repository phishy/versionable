<?php

class SpecialPersonFixture extends CakeTestFixture {
	var $name = 'SpecialPerson';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra' => 'auto_increment'),
		'name' => array('type' => 'string', 'null' => false),
		'quote' => array('type' => 'string', 'null' => false),
		'my_parent_id' => array('type' => 'integer')
	);
}

?>