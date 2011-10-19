<!DOCTYPE html>
<html>
  <head>
    <title><?php echo CHtml::encode(Helper::title($this->pageTitle)); ?></title>
    <?php require('_stylesheets.php'); ?>
  </head>
  <body>
    <div class="container">
      <?php require('_header.php'); ?>
      <section class="round">
        <?php echo $content; ?>
      </section>
    </div>
    <?php require('_footer.php'); ?>
  </body>
</html>
