<?php

class LibWebTestCase extends CTestCase {

  public function createUrl($route, $params=array()) {
    $url = explode('phpunit', Yii::app()->createUrl($route, $params));
    return $url[1];
  }

}
