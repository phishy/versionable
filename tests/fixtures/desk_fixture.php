<?php

class DeskFixture extends CakeTestFixture {
	var $name = 'Desk';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'number' => array('type' => 'string', 'null' => false),
	);
}

?>