<?php

class GalleryAlbumsTest extends WebTestCase
{
	public $fixtures=array(
		'galleryAlbums'=>'GalleryAlbums',
	);

	public function testShow()
	{
		$this->open('?r=galleryAlbums/show&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=galleryAlbums/create');
	}

	public function testUpdate()
	{
		$this->open('?r=galleryAlbums/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=galleryAlbums/show&id=1');
	}

	public function testList()
	{
		$this->open('?r=galleryAlbums/list');
	}

	public function testAdmin()
	{
		$this->open('?r=galleryAlbums/admin');
	}
}
