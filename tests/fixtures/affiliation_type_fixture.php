<?php

class AffiliationTypeFixture extends CakeTestFixture {
	var $name = 'AffiliationType';
	var $fields = array(
			'org_unit_type_id' => array('type'=>'integer', 'length' => '22'),
			'name' => array('type'=>'string', 'length' => '200'),
			'rght' => array('type'=>'integer', 'length' => '22'),
			'lft' => array('type'=>'integer', 'length' => '22'),
			'id' => array('type'=>'integer', 'length' => '22', 'key' => 'primary'),
			'modified_by' => array('type'=>'string', 'length' => '100'),
			'parent_id' => array('type'=>'integer', 'length' => '22'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
		);
}

?>