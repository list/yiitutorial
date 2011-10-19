<header>
  <?php echo CHtml::link(Helper::logo(), array('pages/home')); ?>
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
