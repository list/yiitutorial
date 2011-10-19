<?php

return CMap::mergeArray(
  require(dirname(__FILE__).'/main.php'), array(
    'components' => array(
      'request' => array(
        'enableCsrfValidation' => true,
      ),
      'db' => array(
        'connectionString' => 'mysql:host=localhost;dbname=yiitutorial_prod',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix' => 'tbl_',
      ),
    ),
  )
);
