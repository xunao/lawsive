<?php
include '../frame.php';
class testFrame extends PHPUnit_Framework_TestCase{
	public function testVersion(){
		$this->assertEquals(true,defined('FRAME_VERSION'));
		echo "frame version is ", FRAME_VERSION , "\n";
	}
	
	public function testGetdb(){
		echo "env_dev=" .getenv('env_dev') ."\n";
		$db = get_db();
		$this->assertEquals(true,is_object($db));
	}
	/*
	 * @depends testGetdb
	 */
	public function testDbconnected(){
		$db = get_db();
		$this->assertEquals(true,$db->connected);
	}
	
}