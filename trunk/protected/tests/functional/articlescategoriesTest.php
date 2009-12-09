<?php

class ArticlesCategoriesTest extends WebTestCase
{
	public $fixtures=array(
		'articlesCategories'=>'ArticlesCategories',
	);

	public function testShow()
	{
		$this->open('?r=articlesCategories/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=articlesCategories/create');
	}

	public function testUpdate()
	{
		$this->open('?r=articlesCategories/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=articlesCategories/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=articlesCategories/list');
	}

	public function testAdmin()
	{
		$this->open('?r=articlesCategories/admin');
	}
}
