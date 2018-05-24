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
  <link rel="stylesheet" href="<?php echo $this->Html->css('style'); ?>">

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
        <a href="/">
          <img src="<?php echo $this->Html->image('theme/logo-header.png'); ?>" alt="Logo de LAAB"></img>
        </a>
      </div>
      <nav>
        <ul>
          <li class="navbar__link"><a href="<?php echo $this->Html->link(array('controller' => 'courses', 'action' => 'index', 'parameter' => '')); ?>">Bibliothèque</a></li>
          <li class="navbar__link"><a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Communauté</a></li>
        </ul>
      </nav>
      <div class="session">
        <div class="navbar__user__container">
          <a class="user__left" href="<?php echo $this->Html->link(array('controller' => 'users', 'action' => 'profile', 'parameter' => '')); ?>">
            <img class="user__left__image" src="<?php if($this->Auth->user('avatar') == 1){ echo $this->Html->image('users/'. $this->Auth->user('id') .'.png'); }else{ echo $this->Html->image('users/avatar.png');} ?>"/>
            <div class="user__right">
              <a href="<?php echo $this->Html->link(array('controller' => 'users', 'action' => 'profile', 'parameter' => '')); ?>"class="user__right__name"><?php echo $this->Auth->user('username'); ?></a>
            </div>
          </a>
        </div>
        <a class="button" href="<?php echo $this->Html->link(array('controller'=>'users', 'action'=>'logout', 'parameter' =>'')); ?>">Deconnexion</a>
      </div>
  </header>
  <?php $this->Flash->render(); ?>
  <?php if(isset($subheader)): ?>
    <section class="subheader">
      <div class="container">
        <h2><?php echo $subheader; ?></h2>
      </div>
    </section><!-- end subheader -->
  <?php endif; ?>
  <main>
    <div id="container" class="container">
      <?php echo $getContent; ?>
    </div>
  </main>
  <footer class="footer">
    <div class="container">
      <p class="footer__bordertop"> </p>
      <a href="#">
            <img class="footer__icon" src="<?php echo $this->Html->image('theme/logo--transp.png'); ?>"></img>
          </a>
      <p class="footer__name">© 2016 Le Laab, Inc. </p>
      <p class="footer__links">
        <a>A propos</a> •
        <a href="<?php echo $this->Html->link(array('controller' => 'courses', 'action' => 'index', 'parameter' => '')); ?>">Bibliothèque</a> •
        <a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Communauté</a> •
        <a>Contact</a>
      </p>
      <ul class="footer__social">
        <li class="footer__social__facebook">
          <a href="https://www.facebook.com/Laab101/" target="_blank"><img src="<?php echo $this->Html->image('theme/social-fb--transp.png'); ?>"/></a>
        </li>
        <li class="footer__social__twitter">
          <a href="https://twitter.com/Laab_101" target="_blank"><img src="<?php echo $this->Html->image('theme/social-twitter--transp.png'); ?>"/></a>
        </li>
        <li class="footer__social__youtube">
          <a href="https://www.youtube.com/channel/UCn-bXYTLylrCLNKMqAmEfzg" target="_blank"><img src="<?php echo $this->Html->image('theme/social-youtube--transp.png'); ?>"/></a>
        </li>
        <li class="footer__social__googleplus">
          <a href="https://plus.google.com/u/3/113412881305146603573/posts?hl=fr" target="_blank"><img src="<?php echo $this->Html->image('theme/social-googleplus--transp.png'); ?>"/></a>
        </li>
      </ul>
    </div>
  </footer>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <!-- Hotjar Tracking Code for https://laab-akuapush.c9users.io/ -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:235947,hjsv:5};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
  </script>
  
  
  
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

