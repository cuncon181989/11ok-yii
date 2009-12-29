<?php

class GlobalArticlesCategoriesTest extends WebTestCase
{
	public $fixtures=array(
		'globalArticlesCategories'=>'GlobalArticlesCategories',
	);

	public function testShow()
	{
		$this->open('?r=globalArticlesCategories/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=globalArticlesCategories/create');
	}

	public function testUpdate()
	{
		$this->open('?r=globalArticlesCategories/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=globalArticlesCategories/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=globalArticlesCategories/list');
	}

	public function testAdmin()
	{
		$this->open('?r=globalArticlesCategories/admin');
	}
}
