<!DOCTYPE html>
<html lang="fr">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Bibliotheque</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php echo $this->Html->css('normalize'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('skeleton'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('skeleton_custom'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('admin'); ?>">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  
  <!-- Javascripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
</head>
<body>
  <header class="navbar">
      <div class="logo">
        <a>
          <img src="<?php echo $this->Html->image('theme/logo.png'); ?>" alt="Logo de LAAB"></img>
        </a>
      </div>
      <nav>
        <ul>
          <li class="navbar__link"><a href="<?php echo $this->Html->link(array('controller' => 'courses', 'action' => 'index', 'parameter' => '')); ?>">Bibliothèque</a></li>
          <li class="navbar__link"><a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Forum</a></li>
          <li class="navbar__link"><a href="<?php echo $this->Html->link(array('controller' => 'ressources', 'action' => 'index', 'parameter' => '')); ?>">Ressources</a></li>
        </ul>
      </nav>
      <div class="session">
        <a class="button button-primary button__profil ">Celest1BG</a>
        <a class="button">Log out</a>
      </div>
  </header>
  <main>
    <div class="container">
      <?php echo $getContent; ?>
    </div>
  </main>
  <footer class="footer">
    <p class="footer__bordertop">  </p>
    <a>
      <img class="footer__icon" src="<?php echo $this->Html->image('theme/logo--transp.png'); ?>"></img>
    </a>
       <p class="footer__name">© 2016 Le Laab, Inc. </p>
       <p class="footer__links">
         <a>A propos</a>
         •
         <a>Bibliothèque</a>
         •
         <a>Forum</a>
         •
         <a>Contact</a>
       </p>
       <ul class="footer__social">
           <li class="footer__social__facebook">
             <a>
               <img src="<?php echo $this->Html->image('theme/social-fb--transp.png'); ?>"/>
             </a>
           </li>
           <li class="footer__social__twitter">
              <a>
                <img src="<?php echo $this->Html->image('theme/social-twitter--transp.png'); ?>"/>
              </a>
           </li>
           <li class="footer__social__youtube">
              <a>
                <img src="<?php echo $this->Html->image('theme/social-youtube--transp.png'); ?>"/>
              </a>
           </li>
           <li class="footer__social__googleplus">
              <a>
                <img src="<?php echo $this->Html->image('theme/social-googleplus--transp.png'); ?>"/>
              </a>
           </li>
       </ul>
  </footer>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

