<?php

// Include Hippy
include_once dirname(__FILE__).'/../Hippy.php';


class ValidConfigTest extends PHPUnit_Framework_TestCase
{
	public function testValidConfig()
	{
		$hippy = Hippy::clean();
		$this->assertTrue($hippy->validSettings());
	}
	
	public function testInvalidConfig()
	{
		$hippy = Hippy::clean(array(
			'auth_token' => ''
		));
		
		try
		{
			$hippy->validSettings();
			$this->assertFalse(true);
		}
		catch(HippyException $ex)
		{
			$str = 'Hippy error: code=400, info=Hippy error: info=Settings incorrect, setting=auth_token';
			$this->assertEquals($str, $ex->getMessage());
		}
		
		
		$hippy = Hippy::clean(array(
			'room_id' => ''
		));
		
		try
		{
			$hippy->validSettings();
			$this->assertFalse(true);
		}
		catch(HippyException $ex)
		{
			$str = 'Hippy error: code=400, info=Hippy error: info=Settings incorrect, setting=room_id';
			$this->assertEquals($str, $ex->getMessage());
		}
		
		
		$hippy = Hippy::clean(array(
			'from' => ''
		));
		
		try
		{
			$hippy->validSettings();
			$this->assertFalse(true);
		}
		catch(HippyException $ex)
		{
			$str = 'Hippy error: code=400, info=Hippy error: info=Settings incorrect, setting=from';
			$this->assertEquals($str, $ex->getMessage());
		}
		
		
		$hippy = Hippy::clean(array(
			'api_endpoint' => ''
		));
		
		try
		{
			$hippy->validSettings();
			$this->assertFalse(true);
		}
		catch(HippyException $ex)
		{
			$str = 'Hippy error: code=400, info=Hippy error: info=Settings incorrect, setting=api_endpoint';
			$this->assertEquals($str, $ex->getMessage());
		}
	}
}