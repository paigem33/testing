<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase 
{
	protected static $queue;

	// runs before each test
	protected function setUp(): void 
	{
		static::$queue->emptyQueue();
	}

	// runs before the first test of the class
	public static function setUpBeforeClass(): void 
	{
		static::$queue = new Queue;
	}

	// runs at the end of the class
	public static function tearDownAfterClass(): void 
	{
		static::$queue = null;
	}

	protected function tearDown(): void 
	{
		// if you needed something to run after each test, normally you won't
		// unset($this->queue);
	}

	public function testNewQueueIsEmpty()
	{
		$this->assertEquals(0, static::$queue->getCount());
	}

	public function testItemIsAddedToTheQueue()
	{
		static::$queue->push('green');

		$this->assertEquals(1, static::$queue->getCount());
	}

	public function testAnItemIsRemovedFromTheQueue()
	{

		static::$queue->push('green');
		$item = static::$queue->pop();

		$this->assertEquals(0, static::$queue->getCount());
	}

	public function testAnItemIsRemovedFromTheFrontOfTheQueue()
	{
		static::$queue->push('first');
		static::$queue->push('second');

		$this->assertEquals('first', static::$queue->pop());
	}

	public function testMaxNumberOfItemsCanBeAdded()
	{
		for($i = 0; $i < Queue::MAX_ITEMS; $i++){
			static::$queue->push($i);
		}

		$this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
	}

	public function testExceptionThrownWhenAddingAnItemWhenFull()
	{
		for($i = 0; $i < Queue::MAX_ITEMS; $i++){
			static::$queue->push($i);
		}

		$this->expectException(QueueException::class);
		$this->expectExceptionMessage('Queue is full');

		static::$queue->push('test');

	}

}