<?php

class FriendsSpecialPersonFixture extends CakeTestFixture {
	var $name = 'FriendsSpecialPerson';
	var $fields = array(
		'person_id' => array('type' => 'integer', 'null' => false),
		'friend_id' => array('type' => 'integer', 'null' => false)
	);
}

?>