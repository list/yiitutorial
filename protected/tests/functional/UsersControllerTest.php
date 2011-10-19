<?php

Yii::import('ext.httpclient.*');
Yii::import('ext.httpclient.adapter.*');

class UsersControllerTest extends IntegrationTestCase {

  /** @test */
  public function getSignupShouldBeSuccesfull() {
    $client = new EHttpClient(TEST_BASE_URL.'/signup');
    $this->assertTrue($client->request()->isSuccessful());
  }

  /** @test */
  public function getSignupShouldHaveRightTitle() {
    $client = new EHttpClient(TEST_BASE_URL.'/signup');
    $this->assertTag(array('tag' => 'title', 'content' => Yii::app()->name.' | Sign up'),
      $client->request()->getBody());
  }
}
