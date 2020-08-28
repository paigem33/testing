<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
	public function testReturnsFullName()
	{
		$user = new User;
		$user->first_name = 'Bob';
		$user->last_name = 'McTest';

		$this->assertEquals('Bob McTest', $user->getFullName());
	}

	public function testFullNameIsEmptyByDefault()
	{
		$user = new User;

		$this->assertEquals('', $user->getFullName());
	}

	// if you do not want to use camel casing and start your function name with test, add the following doc block
	/**
	 *  @test
	 */
	public function user_has_first_name()
	{
		$user = new User;
		$user->first_name = 'Winston';

		$this->assertEquals('Winston', $user->first_name);
	}
}