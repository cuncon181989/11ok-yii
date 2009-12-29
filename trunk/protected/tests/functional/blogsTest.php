<?php

class BlogsTest extends WebTestCase
{
	public $fixtures=array(
		'blogs'=>'Blogs',
	);

	public function testShow()
	{
		$this->open('?r=blogs/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=blogs/create');
	}

	public function testUpdate()
	{
		$this->open('?r=blogs/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=blogs/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=blogs/list');
	}

	public function testAdmin()
	{
		$this->open('?r=blogs/admin');
	}
}
