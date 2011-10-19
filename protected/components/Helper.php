<?php

class Helper {

  public static function title($title) {
    $baseTitle = Yii::app()->name;
    if ($title == NULL) {
      return $baseTitle;
    }
    else {
      return $baseTitle.' | '.$title;
    }
  }

  public static function logo() {
    return CHtml::image(Yii::app()->request->baseUrl.'/images/logo.png', "Sample app", array('class' => "round"));
  }
}
