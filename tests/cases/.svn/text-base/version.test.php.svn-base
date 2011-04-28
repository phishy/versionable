<?php

uses('view'.DS.'helpers'.DS.'app_helper', 'controller'.DS.'controller', 'model'.DS.'model', 'view'.DS.'helper', 'view'.DS.'helpers'.DS.'text');

class MyAppModel extends CakeTestModel {
	var $actsAs = array('Version.Version' => array('showErrors' => false));
}

/**
 * Using each kind of association
 *
 */
class Person extends MyAppModel {
	var $hasMany = array('Computer', 'Address');
	var $hasAndBelongsToMany = array('Computer', 'Friend');#, 'Desk');
	var $belongsTo = array('Computer', 'MyParent');
	var $hasOne = array('Computer', 'Life');
	
	function aliases($data = null) {
	 	return array(
	 		'Person' => array(
	 			'name' => '',
	 			'fields' => array(
	 				'will_have_mit_id' => "will synchronize with MIT = '{Person.will_have_mit_id}'" 
	 			)
	 		)
	 	);
	 }
	
}

/**
 * Using association overrides here
 *
 */
class SpecialPerson extends MyAppModel {
	var $hasMany = array('Computer' => array('foreignKey' => 'person_id'), 'Address' => array('foreignKey' => 'person_id'));
	var $hasAndBelongsToMany = array('Friend' => array('joinTable' => 'friends_people', 'foreignKey' => 'person_id', 'associationForeignKey' => 'friend_id'));
	var $belongsTo = array('Computer', 'MyParent' => array('foreignKey' => 'person_id'));
	var $hasOne = array('Computer', 'Life' => array('foreignKey' => 'person_id'));
	
	var $actsAs = array(
		'Version.Version' => array('foreignKey' => 'cool')
	);
}

class Tree extends MyAppModel {
	var $actsAs = array('Tree', 'Version.Version');
}

/* used by behavior */
class Computer extends MyAppModel {}
class Address extends MyAppModel {}
class Friend extends MyAppModel {}
class MyParent extends MyAppModel {}
class Malformed extends MyAppModel {}
class Life extends MyAppModel {}

/**
 * Testing nested associations
 *
 */
class Desk extends MyAppModel {
	var $belongsTo = array('Room');
}
class Room extends MyAppModel {
	var $belongsTo = array('Building');
}
class Building extends MyAppModel {}


/* used by helper */
class Relationship extends MyAppModel {
	 function aliases($data = null) {
	 	return array(
	 		'Relationship' => array(
	 			'name' => '{Relationship.[n].RelationshipType.name}',
	 			'fields' => array(
	 				'relationship_type_id' => '',
	 				'person_id_fk' => "name = '{Relationship.[n].Person.first_name} {Relationship.[n].Person.last_name}'"
	 			)
	 		)
	 	);
	 }
}
class RelationshipType extends MyAppModel {}

class OrgUnit extends MyAppModel {}

class AffiliationType extends MyAppModel {}

class Affiliation extends MyAppModel {
	var $useTable = 'org_units';
	function aliases($data = null) {
	 	return array(
	 		'Affiliation' => array(
	 			'name' => '{Affiliation.AffiliationType.name} Affiliation',
	 			'fields' => array(
	 				'rank' => '',
	 				'org_unit_id' => "name = '{Affiliation.OrgUnit.name}'"
	 			)
	 		)
	 	);
	 }
}

class LogHelperTestCase extends CakeTestCase {
	
	var $fixtures = array(
			'plugin.version.special_person',
			'plugin.version.friends_special_person',
			'plugin.version.person',
			'plugin.version.person_version',
			'plugin.version.computer',
			'plugin.version.computers_people',
			'plugin.version.address',
			'plugin.version.address_version',
			'plugin.version.friend',
			'plugin.version.friend_version',
			'plugin.version.friends_person',
			'plugin.version.friends_person_version',
			'plugin.version.my_parent',
			'plugin.version.my_parent_version',
			'plugin.version.malformed',
			'plugin.version.malformed_version',
			'plugin.version.life',
			'plugin.version.life_version',
			'plugin.version.desk',
			'plugin.version.room',
			'plugin.version.building',
			'plugin.version.tree',
			'plugin.version.tree_version',
			#,
		'plugin.version.relationship',
		'plugin.version.relationship_type',
		'plugin.version.org_unit',
		'plugin.version.affiliation_type'
	);
	
	function testAliasesModel() {
		
	}
	
	function testHelperAlias() {
		
		App::import('Helper', 'Version.Log');
		
		$person = new Person;
		$log = new LogHelper;
		
		$old = array(
			'Person' => array(
				'id' => 123461212,
				'name' => 'Jeff'
			)
		);
		
		$new = array(
			'Person' => array(
				'id' => 123461212,
				'name' => 'Jeff',
				'will_have_mit_id' => 1
			),
			'Affiliation' => array(
				'rank' => 0,
				'org_unit_id' => 1,
				'OrgUnit' => array('name' => 'IT Systems'),
				'AffiliationType' => array('name' => 'Broad')
			),
			'Relationship' => array(
				0 => array(
				'relationship_type_id' => 1,
				'person_id_fk' => 1,
				'RelationshipType' => array('name' => 'Sponsor'),
				'Person' => array('first_name' => 'Lukas', 'last_name' => 'Karlsson')
				),
				1 => array(
					'relationship_type_id' => 1,
					'person_id_fk' => 2,
					'RelationshipType' => array('name' => 'Supervisor'),
					'Person' => array('first_name' => 'Some', 'last_name' => 'Guy')
					)
			)
		);
						
		$r = $person->diff($new, $old);
		debug($new);
		debug($r);
		
		$str = $log->toText($new, $old, $r);
		debug($str);
		
		#debug($new);
		#debug($old);
		#debug($r);
		#debug($str);
		
		#$r = $log->toText($diff);
		#debug($r);
		
	}
	
}

class VersionTestCase extends CakeTestCase {
	
	var $fixtures = array(
		'plugin.version.special_person',
		'plugin.version.friends_special_person',
		'plugin.version.person',
		'plugin.version.person_version',
		'plugin.version.computer',
		'plugin.version.computers_people',
		'plugin.version.address',
		'plugin.version.address_version',
		'plugin.version.friend',
		'plugin.version.friend_version',
		'plugin.version.friends_person',
		'plugin.version.friends_person_version',
		'plugin.version.my_parent',
		'plugin.version.my_parent_version',
		'plugin.version.malformed',
		'plugin.version.malformed_version',
		'plugin.version.life',
		'plugin.version.life_version',
		'plugin.version.desk',
		'plugin.version.room',
		'plugin.version.building',
		'plugin.version.tree',
		'plugin.version.tree_version',
		#,
	);
	
	function setup() {
		$this->db = ConnectionManager::getDataSource('test');
		
		// drop tables ahead of time
		#foreach ($this->fixtures as $f) {
	#		$this->db->execute("DROP TABLE IF EXISTS test_".$f);
		#}
	}
			
	/*
	NOT SURE WHY THIS TEST DOESNT WORK
	function testMalformedShadowTable() {
		$malformed = ClassRegistry::init('Malformed');
		$data = array('user' => 'jeff');
		$this->expectError();
		$malformed->save($data);
	}
	*/

	/*
	function testOverrides() {
		$person = ClassRegistry::init('SpecialPerson');
		debug($person);
	}
	*/
	
	function testModelWithUseTableOverride() {
		
	}
	
	function testSilentErrorSaving() {
		
	}
	
	function testAssociatedModelWithoutBehavior() {
	}
	
	
	
	function testAddKey() {
		
		$person = new Person;
		
		$new = array(
			'Person' => array(
				'first_name' => 'Jeff',
				'last_name' => 'Loiselle',
				'fav_artist' => 'Ryan Adams',
				'username' => 'jeff'
			)
		);
		$old = array(
			'Person' => array(
				'first_name' => 'Jeff',
				'username' => 'jeff'
			)
		);
		
		$r = $person->diff($new, $old);
		
		$expected =array (
		  'added' => 
		  array (
		    'Person' => 
		    array (
		      'last_name' => 'Loiselle',
		      'fav_artist' => 'Ryan Adams',
		    ),
		  ),
		  'modified' => 
		  array (
		  ),
		  'deleted' => 
		  array (
		  ),
		);
		$this->assertEqual($r, $expected);
	}
	

	function testDeleteKey() {
		$person = new Person;
		
		$new = array(
			'Person' => array(
				'first_name' => 'Jeff',
				'username' => 'jeff'
			)
		);
		$old = array(
			'Person' => array(
				'first_name' => 'Jeff',
				'last_name' => 'Loiselle',
				'username' => 'jeff'
			)
		);
		
		$r = $person->diff($new, $old);

		$expected = array (
		  'added' => 
		  array (
		  ),
		  'modified' => 
		  array (
		  ),
		  'deleted' => 
		  array (
		    'Person' => 
		    array (
		      'last_name' => 'Loiselle',
		    ),
		  ),
		);
		$this->assertEqual($r, $expected);
	}
	

	function testModify() {
		$person = new Person;
		
		$new = array(
			'Person' => array(
				'first_name' => 'Dan'
			)
		);
		$old = array(
			'Person' => array(
				'first_name' => 'Jeff'
			)
		);
		
		$r = $person->diff($new, $old);
		$expected = array (
		  'added' => 
		  array (
		  ),
		  'modified' => 
		  array (
		    'Person' => 
		    array (
		      'first_name' => 'Dan',
		    ),
		  ),
		  'deleted' => 
		  array (
		  ),
		);
		$this->assertEqual($r, $expected);
	}
	
	
	function testBig() {
		$person = new Person;
		$data = array (
		  0 => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => '2008-02-18 16:40:34',
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Mom',
		      'version_id' => '2',
		      'vb_date_start' => '2008-02-18 16:40:35',
		      'vb_date_end' => NULL,
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => '2008-02-18 16:40:34',
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => '2008-02-18 16:40:34',
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => '2008-02-18 16:40:34',
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		  1 => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => '2008-02-18 16:40:34',
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Dad',
		      'version_id' => '1',
		      'vb_date_start' => '2008-02-18 16:40:34',
		      'vb_date_end' => '2008-02-18 16:40:34',
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => '2008-02-18 16:40:34',
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => '2008-02-18 16:40:34',
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => '2008-02-18 16:40:34',
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		);
		$r = $person->diff($data[0], $data[1]);
		
		$expected = array (
		  'added' => 
		  array (
		  ),
		  'modified' => 
		  array (
		    'MyParent' => 
		    array (
		      'name' => 'Mom',
		      'version_id' => '2',
		      'vb_date_start' => '2008-02-18 16:40:35',
		      'vb_date_end' => NULL,
		    ),
		  ),
		  'deleted' => 
		  array (
		  ),
		);
		
		$this->assertEqual($r, $expected);
		
	}
	
		
	/*
	function testTreeSaveStates() {
		$this->Tree = ClassRegistry::init('Tree');

		$data = array(
			'name' => 'OrgUnit'
		);
		$this->Tree->save($data);
		$date[1] = $this->Tree->vb_date_start;
					
		$data = array(
			'name' => 'HR',
			'parent_id' => $this->Tree->id
		);
		$this->Tree->create($data);
		$this->Tree->save();
		exit;
		
		$date[2] = $this->Tree->vb_date_start;
		
		$r = $this->Tree->revision($date[1])->findAll();
		debug($r);
		exit;
	}
	*/
		
	/**
	 * Saves some data, then checks the shadow tables for expected output 
	 *
	 */
	function testRevisionFindAll() {
		
		$parent = ClassRegistry::init('MyParent');
		$data = array(
			'name' => 'Dad'
		);
		$parent->save($data);

		$friend = ClassRegistry::init('Friend');	
		$data = array(
			'name' => 'Nate Abele'
		);
		$friend->save($data);
		
		$person = ClassRegistry::init('Person');
		$data = array(
			'Person' => array(
				'name' => 'Jeff Loiselle',
				'quote' => 'Dude',
				'my_parent_id' => $parent->id
			),
			'Friend' => array('Friend' => array($friend->id))
		);
		$person->save($data);
		
		$address = ClassRegistry::init('Address');
		$data = array(
			'person_id' => $person->id,
			'street' => '500 Madison Avenue'
		);
		$address->save($data);	
			
		$life = ClassRegistry::init('Life');
		$data = array(
			'duration' => '53',
			'person_id' => $person->id
		);
		$life->save($data);
		
		$version = $person->getVersionModel();
		$r = $version->findAll();
			
		$expected = array (
		  0 => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Dad',
		      'version_id' => '1',
		      'vb_date_start' => $parent->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => $life->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => $address->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => $friend->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		);
		
		// test condition key
		/*
		$r = $person->findAll(array('date' => 'tomorrow'));
		debug($r);debug($expected);exit;
		$this->assertIdentical($r, $expected);
		*/
		
		// test explicit call
		$version = $person->revision('tomorrow');
		$r = $version->findAll();
		$this->assertIdentical($r, $expected);
		
		// test object chaining
		$r = $person->revision('tomorrow')->findAll();
		$this->assertIdentical($r, $expected);
		
		// test findAll passthru conditions
		
		$r = $person->history($person->id);
	
		$expected = array (
		  $person->vb_date_start => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Dad',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => $person->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => $person->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		);
		
		$this->assertEqual($r, $expected);
		
		$nparent = clone $parent;
		$nparent->read(null, $parent->id);
		$nparent->data['MyParent']['name'] = 'Mom';
		$nparent->save();
				
		$expected = array (
		  $person->vb_date_start => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Dad',
		      'version_id' => '1',
		      'vb_date_start' => $parent->vb_date_start,
		      'vb_date_end' => $nparent->vb_date_end,
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => $life->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => $address->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => $friend->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		  $nparent->vb_date_start => 
		  array (
		    'Person' => 
		    array (
		      'id' => '1',
		      'name' => 'Jeff Loiselle',
		      'quote' => 'Dude',
		      'my_parent_id' => '1',
		      'version_id' => '1',
		      'vb_date_start' => $person->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'MyParent' => 
		    array (
		      'id' => '1',
		      'name' => 'Mom',
		      'version_id' => '2',
		      'vb_date_start' => $nparent->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Life' => 
		    array (
		      'id' => '1',
		      'person_id' => '1',
		      'duration' => '53',
		      'version_id' => '1',
		      'vb_date_start' => $life->vb_date_start,
		      'vb_date_end' => NULL,
		    ),
		    'Address' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'street' => '500 Madison Avenue',
		        'person_id' => '1',
		        'version_id' => '1',
		        'vb_date_start' => $address->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		    'Friend' => 
		    array (
		      0 => 
		      array (
		        'id' => '1',
		        'name' => 'Nate Abele',
		        'person_id' => NULL,
		        'version_id' => '1',
		        'vb_date_start' => $friend->vb_date_start,
		        'vb_date_end' => NULL,
		      ),
		    ),
		  ),
		);
		
		$r = $person->history($person->id);
		
		$this->assertEqual($r, $expected);
		
		// test history using vb date conditions
		$r = $person->history($person->id, array('Person.vb_date_start' => '> 2008-01-01'));
		$this->assertEqual($r, $expected);
		
		$friend->read(null, $friend->id);
		$friend->delete();
		
		$version = $friend->getVersionModel();
		$r = $version->findAll();
	
		$expected = array (
		  0 => 
		  array (
		    'Friend' => 
		    array (
		      'id' => '1',
		      'name' => 'Nate Abele',
		      'person_id' => NULL,
		      'version_id' => '1',
		      'vb_date_start' => $friend->vb_date_start,
		      'vb_date_end' => $friend->vb_date_end,
		    ),
		  ),
		);
		
		$this->assertEqual($r, $expected);
				
		$r = $person->history($person->id);
		debug($r);
		
	}
		
	function testGetVersionModel() {
		$person = ClassRegistry::init('Person');
		$version = $person->getVersionModel();
		$this->assertEqual($version->useTable, 'person_versions');
		$this->assertEqual($version->table, 'person_versions');
	}
		
	function testRevisionDate() {
		
		$person = ClassRegistry::init('Person');
		
		// test db formatted string date
		$date = date($this->db->columns['datetime']['format'], strtotime('2008-02-01 15:00:40'));
		$version = $person->revision($date);
		$this->assertEqual($version->date, $date);
		
		// strtotime values
		$expected = date($this->db->columns['datetime']['format'], strtotime('1 january 2008'));
		$version = $person->revision('1 january 2008');
		$this->assertEqual($expected, $version->date);
		
		// unix timestamps
		$expected = date($this->db->columns['datetime']['format'], strtotime('2008-01-01 00:00:00'));
		$version = $person->revision(1199160000);
		$this->assertEqual($expected, $version->date);
	}
	
	
	function testRewrittenMainModel() {
		$person = ClassRegistry::init('Person');
		$version = $person->revision();
		$this->assertEqual($version->useTable, 'person_versions');
		$this->assertEqual($version->table, 'person_versions');
		$this->assertEqual($version->name, 'Person');
		$this->assertEqual($version->alias, 'Person');
		$this->assertEqual(get_class($version), 'Person');
	}
	
	
	function testIgnoreIfNoVersionTable() {
		$person = ClassRegistry::init('Person');
		$version = $person->revision();
		$this->assertEqual(!isset($version->hasMany['Computer']), true);
		$this->assertEqual(!isset($version->hasAndBelongsToMany['Computer']), true);
		$this->assertEqual(!isset($version->hasOne['Computer']), true);
		$this->assertEqual(!isset($version->belongsTo['Computer']), true);
	}
	
}

?>