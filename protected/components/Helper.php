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

}
