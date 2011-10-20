<?php

Yii::import('ext.libwebtestcase.LibWebTestCase');
Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

use Goutte\Client;

class LayoutLinksTest extends LibWebTestCase {

  /** @test */
  public function shouldCreateCorrectRoutes() {
    $this->assertEquals('/', $this->createUrl('pages/home'));
    $this->assertEquals('/about', $this->createUrl('pages/about'));
    $this->assertEquals('/contact', $this->createUrl('pages/contact'));
    $this->assertEquals('/help', $this->createUrl('pages/help'));
    $this->assertEquals('/signup', $this->createUrl('users/new'));
    $this->assertEquals('/signin', $this->createUrl('users/login'));
  }

  /** @test */
  public function shouldHaveHomePage() {
    $client = new EHttpClient(TEST_BASE_URL.'/');
    $this->assertTag(array('tag' => 'title', 'content' => 'Home'), $client->request()->getBody());
  }

  /** @test */
  public function shouldHaveContactPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/contact');
    $this->assertTag(array('tag' => 'title', 'content' => 'Contact'), $client->request()->getBody());
  }

  /** @test */
  public function shouldHaveAboutPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/about');
    $this->assertTag(array('tag' => 'title', 'content' => 'About'), $client->request()->getBody());
  }

  /** @test */
  public function shouldHaveHelpPage() {
    $client = new EHttpClient(TEST_BASE_URL.'/help');
    $this->assertTag(array('tag' => 'title', 'content' => 'Help'), $client->request()->getBody());
  }

  /** @test */
  public function shouldHaveTheRightLinksOnTheLayout() {
    $client = new Client();
    $crawler = $client->request('GET', TEST_BASE_URL);
    $this->assertStringEndsWith('Home', $crawler->filter('title')->text());

    $crawler = $client->click($crawler->selectLink('About')->link());
    $this->assertStringEndsWith('About', $crawler->filter('title')->text());

    $crawler = $client->click($crawler->selectLink('Contact')->link());
    $this->assertStringEndsWith('Contact', $crawler->filter('title')->text());

    $crawler = $client->click($crawler->selectLink('Home')->link());
    $this->assertStringEndsWith('Home', $crawler->filter('title')->text());

    $crawler = $client->click($crawler->selectLink('Sign up now!')->link());
    $this->assertStringEndsWith('Sign up', $crawler->filter('title')->text());
  }

}
