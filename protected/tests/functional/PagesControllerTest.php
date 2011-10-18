<?php

Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

class PagesControllerTest extends PHPUnit_Framework_TestCase {

  public function testHome() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/home');
    $this->assertTrue($client->request()->isSuccessful());
  }

  public function testContact() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/contact');
    $this->assertTrue($client->request()->isSuccessful());
  }

  public function testError() {
    $client = new EHttpClient(TEST_BASE_URL.'/pages/error-not-found');
    $this->assertTrue($client->request()->isError());
  }

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
