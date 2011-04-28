<?php

class FriendFixture extends CakeTestFixture {
	var $name = 'Friend';
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'name' => array('type' => 'string', 'null' => false),
		'person_id' => array('type' => 'integer')
	);
}

?>