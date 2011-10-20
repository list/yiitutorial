<?php

/**
 * Change the following URL based on your server configuration
 * Make sure the URL ends with a slash so that we can use relative URLs in test cases
 */
define('TEST_BASE_URL', 'http://localhost/yiitutorial/index-test.php/');

// change the following paths if necessary
$yiit = dirname(__FILE__).'/../../framework/yiit.php';
$config = dirname(__FILE__).'/../config/test.php';

require_once($yiit);
//require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
