<?php

class BlogCategoriesTest extends WebTestCase
{
	public $fixtures=array(
		'blogCategories'=>'BlogCategories',
	);

	public function testShow()
	{
		$this->open('?r=blogCategories/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=blogCategories/create');
	}

	public function testUpdate()
	{
		$this->open('?r=blogCategories/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=blogCategories/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=blogCategories/list');
	}

	public function testAdmin()
	{
		$this->open('?r=blogCategories/admin');
	}
}
