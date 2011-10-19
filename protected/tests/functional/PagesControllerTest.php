<?php

Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

class PagesControllerTest extends PHPUnit_Framework_TestCase {

  /** @test */
  public function getHomeShouldBeSuccesfull() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/home');
    $this->assertTrue($client->request()->isSuccessful());
  }

  /** @test */
  public function getHomeShouldHaveRightTitle() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/home');
    $this->assertTag(array('tag' => 'title', 'content' => Yii::app()->name.' | Home'),
      $client->request()->getBody());
  }

  /** @test */
  public function getContactShouldBeSuccesfull() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/contact');
    $this->assertTrue($client->request()->isSuccessful());
  }

  /** @test */
  public function getContactShouldHaveRightTitle() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/contact');
    $this->assertTag(array('tag' => 'title', 'content' => Yii::app()->name.' | Contact'),
      $client->request()->getBody());
  }

  /** @test */
  public function getAboutShouldBeSuccesfull() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/about');
    $this->assertTrue($client->request()->isSuccessful());
  }

  /** @test */
  public function getAboutShouldHaveRightTitle() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/about');
        $this->assertTag(array('tag' => 'title', 'content' => Yii::app()->name.' | About'),
      $client->request()->getBody());

  }

  /** @test */
  public function getHelpShouldBeSuccesfull() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/help');
    $this->assertTrue($client->request()->isSuccessful());
  }

  /** @test */
  public function getHelpShouldHaveRightTitle() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/help');
        $this->assertTag(array('tag' => 'title', 'content' => Yii::app()->name.' | Help'),
      $client->request()->getBody());

  }

  /** @test */
  public function testLoginLogout() {
    $client = new EHttpClient(TEST_BASE_URL.'/site/login');
    $client->setCookieJar();
    $this->assertTrue($client->request()->isSuccessful());
    $this->assertRegExp('/Login/', $client->request('POST')->getBody());

    $client->resetParameters();
    $client->setParameterPost(array(
      'LoginForm[username]' => '',
      'LoginForm[password]' => ''
    ));
    $client->request('POST');
    $this->assertRegExp('/Username cannot be blank./', $client->getLastResponse()->getBody());
    $this->assertRegExp('/Password cannot be blank./', $client->getLastResponse()->getBody());

    $client->resetParameters();
    $client->setParameterPost(array(
      'LoginForm[username]' => 'wronguser',
      'LoginForm[password]' => 'wrongpass'
    ));
    $this->assertRegExp('/Incorrect username or password./', $client->request('POST')->getBody());

    $client->resetParameters();
    $client->setParameterPost(array(
      'LoginForm[username]' => 'demo',
      'LoginForm[password]' => 'demo'
    ));
    $client->request('POST');
    $this->assertNotRegExp('/Username cannot be blank./', $client->getLastResponse()->getBody());
    $this->assertNotRegExp('/Password cannot be blank./', $client->getLastResponse()->getBody());

    $client->setUri(TEST_BASE_URL);
    $this->assertTrue($client->request()->isSuccessful());
    $this->assertRegExp('/Logout \(demo\)/', $client->request('POST')->getBody());

    $client->setUri(TEST_BASE_URL.'/site/logout');
    $this->assertTrue($client->request()->isSuccessful());

    $client->setUri(TEST_BASE_URL);
    $this->assertNotRegExp('/Logout \(demo\)/', $client->request('POST')->getBody());
  }

}
