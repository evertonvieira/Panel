<?php
App::uses('MetaTag', 'Seo.Model');

/**
 * MetaTag Test Case
 *
 */
class MetaTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.seo.meta_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MetaTag = ClassRegistry::init('Seo.MetaTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MetaTag);

		parent::tearDown();
	}

}
