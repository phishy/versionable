<?php

class ComputerFixture extends CakeTestFixture {
	var $name = 'Computer';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'user' => array('type' => 'string', 'null' => false),
		'person_id' => array('type' => 'integer'),
		'password' => array('type' => 'string', 'null' => false),
		'created' => 'datetime',
		'updated' => 'datetime'
	);
}

?>