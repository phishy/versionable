<?php

class RoomFixture extends CakeTestFixture {
	var $name = 'Room';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'building_id' => array('type' => 'integer'),
		'number' => array('type' => 'string', 'null' => false),
	);
}

?>