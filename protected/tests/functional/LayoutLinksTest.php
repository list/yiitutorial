<?php

Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

class LayoutLinksTest extends PHPUnit_Framework_TestCase {

  /** @test */
  public function shouldHaveHomePage() {
    $client = new EHttpClient(TEST_BASE_URL.'/');
    $this->assertTag(array('tag' => 'title', 'content' => 'Home'), $client->request()->getBody());
  }

  public function shouldHaveContactPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/contact');
    $this->assertTag(array('tag' => 'title', 'content' => 'Contact'), $client->request()->getBody());
  }

  public function shouldHaveAboutPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/about');
    $this->assertTag(array('tag' => 'title', 'content' => 'About'), $client->request()->getBody());
  }

  public function shouldHaveHelpPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/help');
    $this->assertTag(array('tag' => 'title', 'content' => 'Help'), $client->request()->getBody());
  }

}
