<!DOCTYPE html>
<html lang="fr">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Le Laab, apprendre au dela de vos souhaits</title>
  <meta name="description" content="Le LAAB est un projet étudiant de première année de DUT Metiers du Multimedia et de l'Internet">
  <meta name="author" content="Groupe Projet 01 - MMI-1A 2016">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:600,400' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?php echo $this->Html->css('normalize'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('skeleton'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('skeleton_custom'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('style'); ?>">
  <link rel="stylesheet" href="<?php echo $this->Html->css('landing'); ?>">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php echo $this->Html->image('landing/logo-landing.png'); ?>">
  
  <!-- Javascripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
    window.addEventListener("load", initialiser);

    function initialiser(evt) 
    {
  
        var btnOpen=document.getElementById('opener');
        var container=document.getElementById('container');
        var div=document.getElementById('overlayer');
        
        var btnform = document.querySelector('input');
      
        btnOpen.addEventListener("click", open);
        div.addEventListener("click", close);
        btnform.addEventListener("click", close);
      
        function open(evt){
            div.style.display = "flex";
            div.style.zIndex ="100";
            container.style.overflow = "hidden";
        }
      
        function close(evt){
            if(evt.target==div){
                div.style.display = "none";
            }
        }
    }
</script>

</head>
<body id="container" class="landing">
    
    <div id="overlayer">
        <div id="popup" class="popup">
            <fieldset id="formulaire" class="connexion">
                <h5 class="text-center">Connectez vous</h5>
                    <?php 
                    echo $this->Form->create('users', array('controller' => 'users', 'action' => 'login'));
                    echo $this->Form->input('username', array('placeholder'=>'Nom d\'utilisateur', 'legend' => 'Nom d\'utilisateur')); 
                    echo $this->Form->input('password', array('type'=>'password','placeholder'=>'Mot de passe', 'legend' => 'Mot de passe'));
                    echo $this->Form->end();
                    ?>
            </fieldset>
        </div>
    </div>
    
    <header class="landing__section landing__section__header ">
        <div class="logo">
            <a>
                <img src="<?php echo $this->Html->image('landing/logo-landing.png'); ?>" alt="Logo du Laab"></img>
            </a>
        </div>
        <div class="landing__section__header__links">
            <a class="landing__header__links__item">A propos</a>
            <a id="opener" class="landing__header__links__item">Connexion</a>
        </div>
    </header>
    <main class="landing__main">
      <?php echo $getContent; ?>
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
                 <a href="https://www.facebook.com/Laab101/" target="_blank">
                   <img src="<?php echo $this->Html->image('theme/social-fb--transp.png'); ?>"/>
                 </a>
               </li>
               <li class="footer__social__twitter">
                  <a href="https://twitter.com/Laab_101" target="_blank">
                    <img src="<?php echo $this->Html->image('theme/social-twitter--transp.png'); ?>"/>
                  </a>
               </li>
               <li class="footer__social__youtube">
                  <a href ="https://www.youtube.com/channel/UCn-bXYTLylrCLNKMqAmEfzg" target="_blank">
                    <img src="<?php echo $this->Html->image('theme/social-youtube--transp.png'); ?>"/>
                  </a>
               </li>
               <li class="footer__social__googleplus">
                  <a href="https://plus.google.com/u/3/113412881305146603573/posts?hl=fr" target="_blank">
                    <img src="<?php echo $this->Html->image('theme/social-googleplus--transp.png'); ?>"/>
                  </a>
               </li>
           </ul>
      </footer>
      
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
  
</body>
</html>
