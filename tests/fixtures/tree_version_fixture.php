<?php

class TreeVersionFixture extends CakeTestFixture {
	var $name = 'TreeVersion';
	var $fields = array(
		'id' => array('type' => 'integer'),
		'name' => array('type' => 'string', 'null' => false),
		'lft' => array('type' => 'integer'),
		'rght' => array('type' => 'integer'),
		'parent_id' => array('type' => 'integer'),
		'version_id' => array('type' => 'integer', 'key' => 'primary', 'extra'=> 'auto_increment'),
		'vb_date_start' => array('type' => 'datetime'),
		'vb_date_end' => array('type' => 'datetime')
	);
}

?>