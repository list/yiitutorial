<footer>
  <nav class="round">
    <?php
    $this->widget('zii.widgets.CMenu', array(
      'items' => array(
        array('label' => 'About', 'url' => array('/about')),
        array('label' => 'Contact', 'url' => array('/contact')),
        array('label' => 'News', 'url' => 'http://putera.comule.com/yiitutorial/'),
        array('label' => 'Yii Tutorial', 'url' => 'http://putera.comule.com/yiitutorial/'),
      ),
    ));
    ?>
  </nav>
</footer>
