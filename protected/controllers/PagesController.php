<?php

class PagesController extends Controller {

  public function actionContact() {
    $this->render('contact');
  }

  public function actionHome() {
    $this->render('home');
  }

  public function actionAbout() {
    $this->render('about');
  }

}
