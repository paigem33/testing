<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase 
{
	public function testAddReturnsCorrectSum()
	{
		require 'functions.php';
		$this->assertEquals(4, add(2, 2));
		$this->assertEquals(10, add(8, 2));
	}	

	public function testAddDoesNotReturnIncorrectSum()
	{
		$this->assertNotEquals(5, add(2, 2));
	}
}