<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Codeigniter</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="<?php echo site_url("home/index"); ?>">Главная</a>
        <a class="nav-link" href="<?php echo site_url("home/getusers"); ?>">Список пользователей</a>
        <a class="nav-link" href="<?php echo site_url("home/showUserForm"); ?>">Выбор пользователя</a>
        <a class="nav-link" href="<?php echo site_url("home/showUserForm2"); ?>">Выбор пользователя2</a>
        <a class="nav-link" href="<?php echo site_url("home/selectImage"); ?>">Загрузка изображений</a>
        <a class="nav-link" href="<?php echo site_url("home/about"); ?>">О проекте</a>
      </div>
    </div>
  </nav>
  <?php
  $this->load->view($viewName, $viewData);
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
</body>
</html>