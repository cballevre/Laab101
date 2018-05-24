<article>
	<header>
		<ul class="timeline">
			<?php $i = 0; $nbr_timeline = count($timeline); ?>
			<?php foreach ($timeline as $timeline__item): ?>
			<?php $i++; ?>
			<li class="timeline__item <?php if($step['slug'] == $timeline__item['slug']){ echo " timeline__item--active "; } ?>">
				<a href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter'=>$timeline__item['slug'])); ?>">
							<span class="<?php echo $timeline__item['type']; ?>"></span>
						</a>
			</li>
			<!-- end timeline__item -->
			<?php if($i != $nbr_timeline): ?>
			<li class="timeline__item timeline__item__divider"></li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<!-- end timeline -->
	</header>
	<!-- end header -->

	<?php if($step['type'] == 'videos'): ?>

	<div class="jumbotron">

		<div id="player"></div>

		<script type="text/javascript">
			var videos = [{
				"videoId": "<?php echo $step['video'][0]['link']; ?>",
				"start": <?php echo $step['video'][0]['start']; ?>,
				"end": <?php echo $step['video'][0]['stop']; ?>
			}];
		</script>
	</div>
	
	<div class="finvideo">
		<section id="fini">
			<div>
				<p>Bien joué !</p>
				<p>Continue comme ça.</p>
				<div class="pourcent">
					<p><?php echo $step['position']; ?> / <?php echo count($timeline); ?></p>
				</div>
			</div>
			<div id="barreBas">
				<a href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter'=> $step['slug'])); ?>" class="button button-primary">Replay</a>
				<a href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter'=> $nextPosition)); ?>" class="button button-primary">Continuer</a>
			</div>
		</section>
	</div>
	<!-- end jumbotron -->
	<div class="description">
		<h3><?php echo $step['name']; ?></h3>
		<p>
			<?php echo $this->Time->convert($step['time']); ?>
		</p>
		<p>Avec <a>Grafikart</a></p>
		<p>
			<?php echo $step['description']; ?>
		</p>
	</div>
	<!-- end description -->

	<?php elseif($step['type'] == 'quizzes'): ?>

	<div>
		<div id="question"></div>
		<div id="emc-score"></div>
		<div id="emc-indication"></div>
		<div id="boutons" class="boutons">
			<div>
				<a class="button button-primary" id="emc-submit">Question Suivante</a>
				<a href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter'=>$nextPosition)); ?>" class="button button-primary" id="emc-submit">Quitter le Quizz</a>
			</div>
		</div>
		<div id="emc-btn-again"><a id="encore" class="button button-primary">Recommencer le quiz</a></div>
		<div id="emc-btn-continue"><a id="fin" class="button button-primary" href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter'=>$nextPosition)); ?>">Continuer</a></div>
	</div>
	<div class="quiz">
		<div>
		</div>
	</div>


	<script type="text/javascript">
		var questions = [

			<?php foreach($step['question'] as $question): ?>

			{
				"id": <?php echo ($question['id']); ?>,
				"intitule": "<?php echo $question['intitule']; ?>",
				"reponses": '<?php echo str_replace("'", "&apos;",$question['choix']); ?>',
				"bonneReponse": <?php echo $question['reponse']; ?>
			},

			<?php endforeach; ?>

		];
	</script>

	<?php endif ?>

	<script src="<?php echo $this->Html->js($step['type']); ?>"></script>

</article>
<!-- end article -->
