<section class="landing__section landing__section__first">
	<div class="container">
		<div class="landing__section__first__container twelve columns">
			<div class="six columns landing__section__first__container__titles">
				<h2>Apprenez ce que vous souhaitez.<br />Et bien au dela.</h2>
				<h6>LAAB: Learn About Anything and Beyond</h6>
			</div>
			<fieldset class="six columns landing__section__first__container__form">
				<h5>Commencez Aujourd'hui</h5>
				<?php 
					echo $this->Form->create('users', array('controller' => 'users', 'action' => 'signin'));
					echo $this->Form->input('username', array('type' => 'text', 'placeholder' => 'Nom d\'utilisateur', 'label' => ''));
					echo $this->Form->input('email', array('type' => 'email', 'placeholder' => 'Adresse email', 'label' => ''));
					echo $this->Form->input('password', array('type' => 'password', 'placeholder' => 'Mot de passe', 'label' => ''));
					echo $this->Form->end('S\'inscrire');
				?> 
			</fieldset>
		</div>
	</div>
</section>
<section class="landing__section landing__section__second">
	<div class="container">
		<h3 class="landing__section__second__item">Des cours sur le Web de demain</h3>
		<h4 class="landing__section__second__item">LAAB : Learn About Anything and Beyond</h4>
		<p class="landing__section__second__item"></p>
		<img class="six columns landing__section__second__item" src="<?php echo $this->Html->image('landing/frenchtoast.jpg'); ?>"></img>
	</div>
</section>
<section class="landing__section landing__section__third">
	<div class="container">
		<h3>Quelques uns des incroyables savoirs à acquérir</h3>
		<h4>Le plus rapide, facile, et efficace d'aller au dela de vos compétences</h4>
		<div class="landing__section__third__container__item">
			<div cass="row">
				<div class="three columns">
					<div class="landing__section__third__item">	
						<img src="<?php echo $this->Html->image('landing/landing-bulle.png'); ?>"/>
						<h5>Apprenez le Web-marketing</h5>
						<p>Vous voulez devenir un pro du référencement ? Alors apprenez les meilleures techniques depuis chez vous.</p>	
					</div>
				</div>
				<div class="three columns">
					<div class="landing__section__third__item">
						<img src="<?php echo $this->Html->image('landing/landing-rouage.png'); ?>"/>
						<h5>Contruisez un site-web</h5>
						<p>Envie d'être visible sur le web ? Grace à nos cours vous aurez les clés en main pour batir votre portfolio.</p>
					</div>
				</div>
				<div class="three columns">
					<div class="landing__section__third__item">
						<img src="<?php echo $this->Html->image('landing/landing-phone.png'); ?>"/>
						<h5>Créez une application</h5>
						<p>Vous pensez à ceux qui bougent beaucoup ? Développez leur une application aussi mobile qu'eux. </p>
					</div>
				</div>
				<div class="three columns">
					<div class="landing__section__third__item">
					<img src="<?php echo $this->Html->image('landing/landing-ampoule.png'); ?>"/>
					<h5>Batissez vos idées</h5>
					<p>Avec les cours proposés par le LAAB, vous pourrez concrétiser tous vos projets liés au web.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="landing__section landing__section__fourth">
	<img  class="landing__section__fourth__image" src="<?php echo $this->Html->image('landing/desktop1.png'); ?>"/>
</section>
