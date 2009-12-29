<?php

class ArticlesTest extends WebTestCase
{
	public $fixtures=array(
		'articles'=>'Articles',
	);

	public function testShow()
	{
		$this->open('?r=articles/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=articles/create');
	}

	public function testUpdate()
	{
		$this->open('?r=articles/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=articles/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=articles/list');
	}

	public function testAdmin()
	{
		$this->open('?r=articles/admin');
	}
}
