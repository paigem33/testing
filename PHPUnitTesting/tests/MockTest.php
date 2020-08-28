<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
	public function testMock()
	{
		$mock = $this->createMock(Mailer::class);

		$mock->method('sendMessages')->willReturn(true);

		$result = $mock->sendMessages('test@email.com', 'Hello');
		
		$this->assertTrue($result);
	}
}