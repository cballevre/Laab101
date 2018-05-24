
<script>
window.addEventListener("load", initialiser);

function initialiser(evt) 
{
  
  var btnOpen=document.getElementById('opener');
  var container=document.querySelector('main');
  var div=document.getElementById('overlayer');
  
  container.appendChild(div);
 
  var btnform = document.querySelector('input');
  
  btnOpen.addEventListener("click", open);
  div.addEventListener("click", close);
  btnform.addEventListener("click", close);
  
  function open(evt){
    div.style.display = "flex";
    div.style.zIndex ="100";
    container.style.overflow="hidden";
  }
  
  function close(evt){
    if(evt.target==div){
      div.style.display = "none";
    }
  }
 
}

$('container')
</script>

<div id="overlayer">
  <div id="popup" class="popup">
    <fieldset class="discussion__form">
      <?php 
      echo $this->Form->create('discussions', array('controller' => 'discussions', 'action' => 'add'));
      echo $this->Form->input('titre', array('placeholder' => 'Titre', 'label' => ''));
      echo $this->Form->textarea('resp', array('placeholder' => 'Votre question/remarque à la communauté', 'label' => ''));
      echo $this->Form->end('Poster');
      ?>
    </fieldset>
    <p class="text-justify">Le forum est un lieu d’expression ouvert à tous et à toutes. Vous êtes invités à vous y exprimer librement dans le respect des opinions et des droits de chacun. </p>
  </div>
</div>

<section class="communauty">

      <div class="search bar">
        <a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Forum</a>
        <a href="<?php echo $this->Html->link(array('controller' => 'leaderboards', 'action' => 'index', 'parameter' => '')); ?>">Leaderboard</a>
    </div>
    <div class="submenu">
      
      <section class="search">
        <button class="button" id="opener" href="#">Exprime toi</button>
        <form class="search__form" method="post">
            <label for="search__form">
                <img class="search__loupe" src="<?php echo $this->Html->image('theme/icon_search.png'); ?>"></img>
            </label>
            <input type="text" name="motcle" class="search__bar" placeholder="Rechercher des discussions"/>
            <select name="triParDate">
                <option value="recent">Plus récent</option>
                <option value="vieux">Plus ancien</option>
                <option value="unanswered">Encore sans réponses</option>
            </select> 
            <select name="categorie">
                <option value ="Tout voir">Tout voir</option>
              <?php  foreach($discussions as $discussion):  ?>
              
                <option value="<?php echo $discussion['topic'][0]['name']; ?>"><?php echo $discussion['topic'][0]['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <input type="submit" value="Rechercher" class="button button-primary"/>
            
        </form>
        
      </section>
    </div>
 
    <ul class="discussion">
      <?php foreach($discussions as $discussion): ?>
      <li class="discussion__post">
        <a class="discussion__post__img" href="#">
          <img src="http://s.cdpn.io/42746/shay.jpg" alt="">
        </a>
        <div class="">
          <h5><a href="<?php echo $this->Html->link(array('controller'=>'discussions','action'=>'single','parameter'=>$discussion['slug'])); ?>"><?php echo $discussion['name']; ?></a></h5>
          <small class="discussion__post__time">
            <?php echo $discussion['nb_answers']; 
            if ($discussion['nb_answers']>1){
            ?> réponses
          </small><br/>
            <?php }else{ ?> réponse
          </small><br/>
            <?php } ?>
          <small>Posté le <?php echo $discussion['created']; ?> par <a><?php echo $discussion['user'][0]['username']; ?></a></small>
          <a class="button" href="<?php echo $this->Html->link(array('controller'=>'topics', 'action'=>'single', 'parameter' => $course['topic_id'])); ?>"><?php echo $discussion['topic'][0]['name']; ?></a>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
</section>
</div>