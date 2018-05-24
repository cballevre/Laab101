<?php
    $discussions = $this->var['discussion'][0];
    $answers = $this->var['answer'];
   
?>


<section class="communauty">
    
     <div class="search bar">
        <a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Forum</a>
        <a href="<?php echo $this->Html->link(array('controller' => 'leaderboards', 'action' => 'index', 'parameter' => '')); ?>">Leaderboard</a>
    </div>
    
    <div class="discussion__post">
        <a class="discussion__post__img" href="#">
            <img src="http://s.cdpn.io/42746/shay.jpg" alt="">
        </a>
        <small>Posté le <?php echo $discussion[0]['created']; ?> par <a><?php echo $discussion[0]['user'][0]['username']; ?></a></small>
        <h2 class='intitule'><?php echo $discussion[0]['name']; ?></h2>
        <p class="text-justify"><?php echo $discussion[0]['content']; ?></p>
    </div>
    
        <h5 class="souligne">
            <?php echo $discussion[0]['nb_answers']; 
                if ($discussion[0]['nb_answers']>1){
            ?> 
        réponses </h5>
            <?php }else{ ?>
        réponse </h5>
            <?php } ?>

    <?php foreach($answers as $answer): ?>
    <div class="discussion__post">
        <a class="discussion__resp__img" href="#">
            <img src="http://s.cdpn.io/42746/shay.jpg" alt="">
        </a>
        <small>Posté le <?php echo $answer['created']; ?> par <a><?php echo $answer['helper'][0]['username']; ?></a></small>
        <p class="text-justify"><?php echo $answer['content']; ?></p>
    </div>
    <?php endforeach; ?>
    
        <h5 class="souligne">Répondre</h5>
    <div class="rep">
        <a class="discussion__resp__img" href="#">
            <img src="http://s.cdpn.io/42746/shay.jpg" alt="">
        </a>
        <fieldset class="discussion__form">
				<?php 
				
					echo $this->Form->create('answers', array('controller' => 'answers', 'action' => 'add'));
					echo $this->Form->input('id', array('value' => $discussions['id'], 'label' => ''));
					echo $this->Form->textarea('resp', array('placeholder' => 'Votre réponse', 'label' => ''));
					echo $this->Form->end('Poster');
				?> 
				<p>Le forum est un lieu d’expression ouvert à tous et à toutes. Vous êtes invités à vous y exprimer librement dans le respect des opinions et des droits de chacun.</p>
		</fieldset>
		
    </div>
     
</section>