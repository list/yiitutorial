<header>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/logo.png', "Sample app", array('class' => "round")), array('pages/home')); ?>
  <nav class="round">
    <?php
    $this->widget('zii.widgets.CMenu', array(
      'items' => array(
        array('label' => 'Home', 'url' => array('pages/home')),
        array('label' => 'Help', 'url' => array('pages/help')),
        array('label' => 'Sign in', 'url' => array('site/login')),
      ),
    ));
    ?>
  </nav>
</header>
