<?php

class FriendsPersonFixture extends CakeTestFixture {
	var $name = 'FriendsPerson';
	var $fields = array(
		'person_id' => array('type' => 'integer'),
		'friend_id' => array('type' => 'integer')
	);
}

?>