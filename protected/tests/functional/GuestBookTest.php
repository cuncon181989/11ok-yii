<?php

class GuestBookTest extends WebTestCase
{
	public $fixtures=array(
		'guestBooks'=>'GuestBook',
	);

	public function testShow()
	{
		$this->open('?r=guestBook/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=guestBook/create');
	}

	public function testUpdate()
	{
		$this->open('?r=guestBook/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=guestBook/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=guestBook/list');
	}

	public function testAdmin()
	{
		$this->open('?r=guestBook/admin');
	}
}
