<?php

// examples / notes

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase 
{

	// runs before each test
	protected function setUp(): void 
	{
		$this->queue = new Queue;
	}

	// runs before the first test of the class
	public static function setUpBeforeClass(): void 
	{

	}

	// runs at the end of the class
	public static function tearDownAfterClass(): void 
	{

	}

	protected function tearDown(): void 
	{
		// if you needed something to run after each test, normally you won't
		// unset($this->queue);
	}

	public function testAddingTwoPlusTwoResultsInFour()
	{
		$this->assertEquals(4, 2 + 2);
	}	

	// you can make your functions dependant like this, however it is good practice to have each test be independant
	/**
	 * @depends testNewQueueIsEmpty
	 */
	// public function testItemIsAddedToTheQueue(Queue $queue)
	// {
	// 	$queue->push('green');

	// 	$this->assertEquals(1, $queue->getCount());

	// 	return $queue;
	// }
}