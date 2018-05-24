<?php
    $classements = $this->var['leaderboards'];
    
    $topics = $this->var['topics'];
    $scorePerso = $this->var['scorePerso'][0];
?>
<div class="secondary-heading leaderboards__tittle">
    <h2>Leaderboard</h2>
</div>
  <div class="search bar">
        <a href="<?php echo $this->Html->link(array('controller' => 'discussions', 'action' => 'index', 'parameter' => '')); ?>">Forum</a>
        <a href="<?php echo $this->Html->link(array('controller' => 'leaderboards', 'action' => 'index', 'parameter' => '')); ?>">Leaderboard</a>
  </div>
<div class="box leaderboards__container">
  <div class="sorting-container leaderboard-points"
       data-featurette="leaderboards-navigation"
       data-type="points">
    <div class="leaderboard-filter filter-by-topic">
      <select name="topic_id" id="topic_id">
        <option value="tout">Tous les topics</option>
        <?php foreach($topics as $topic): ?>
        <option value="<?php echo $topic['name']; ?>"><?php echo $topic['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="leaderboards__list perso">
    <h5>Classement personnel</h5>
    <ol>
        
      <li class="leaderboards__list__item">
        <p>
        <?php 
          $i=0;
          foreach($classements as $classement): 
            $i++;
            if($classement['username'] == $scorePerso['username']){
              echo $i;
            }
          endforeach; 
        ?>
        </p>
        <a><?php echo $scorePerso['username']; ?></a>
        <p><?php echo $scorePerso['points']; ?></p>
      </li>
     
    </ol>
  </div>
  
  <div class="leaderboards__list general">
    <h5>Classement général</h5>
    <ol>
      <?php $i=0; foreach($classements as $classement): 
        $i=$i+1;
      ?>
      <li class="leaderboards__list__item">
        <p><?php echo $i ?></p>
        <a><?php echo $classement['username']; ?></a>
        <p><?php echo $classement['points']; ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</div>