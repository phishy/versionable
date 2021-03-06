<?php

class FriendVersionFixture extends CakeTestFixture {
	var $name = 'FriendVersion';
	var $fields = array(
		'id' => array('type' => 'integer'),
		'name' => array('type' => 'string', 'null' => false),
		'person_id' => array('type' => 'integer'),
		'version_id' => array('type' => 'integer', 'key' => 'primary', 'extra' => 'auto_increment'),
		'vb_date_start' => array('type' => 'datetime'),
		'vb_date_end' => array('type' => 'datetime')
	);
}

?>