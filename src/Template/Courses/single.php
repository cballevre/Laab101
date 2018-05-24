<article class="course">
    <header class="course__header">
        <img src="<?php echo $this->Html->image('theme/icon_cours.png'); ?>"/>
        <p><?php echo $this->Time->convert($courses['time']); ?></p>
    </header>

    <div class="jumbotron blended">
        <div class="text-center">
            <h2><?php echo $courses['name']; ?></h2>
            <small class="course__begin"><?php echo $this->Time->convert($courses['time']); ?> de cours</small><br/>
            <?php if(isset($courses['progress'])): ?>
                <a href="<?php echo $this->Html->link(array('controller'=>'steps', 'action'=>'single', 'parameter' => $courses['progress']['slug'])); ?>" class="button button-primary">Continuer</a>
            <?php else: ?>
                <a href="<?php echo $this->Html->link(array('controller' => 'userscourses', 'action' => 'add', 'parameter' => $courses['id'])); ?>" class="button button-primary">Commencer</a>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="course__tags">
        <ul class="card__tags">
            <li>
                <a href="<?php echo $this->Html->link(array('controller'=>'topics', 'action'=>'single', 'parameter' => $courses['topic_id'])); ?>">
                    <span><?php echo $courses['topic']['name']; ?></span>
                </a>
            </li>
            <li><span><?php echo $courses['level']['name']; ?></span></li>
            <li class="card__tag__star <?php if($courses['bookmark']) echo 'card__tag__star--active'; ?>">
                <a class="" href="<?php if($courses['bookmark']){ echo $this->Html->link(array('controller' => 'bookmarks', 'action' => 'remove', 'parameter' => $courses['id'])); }else{ echo $this->Html->link(array('controller' => 'bookmarks', 'action' => 'add', 'parameter' =>$courses['id'])); } ?>">
                    <span></span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="course__box row text-justify">
        
        <section class="seven columns">
            <div class="course__about">
                <h4>A propos de ce cours</h4>
                <p><?php echo $courses['description']; ?></p>
            </div>
            <div class="course__steps">
                <h4>Plan du cours</h4>
                <ul class="step">
                    <?php  foreach($steps as $step): ?>
                        <li>
                            <span class="<?php echo $step['type'] ?>" ></span>
                            <a href="<?php echo $this->Html->link(array('controller' => 'steps', 'action' => 'single', 'parameter' => $step['slug'])); ?>"><?php echo $step['name']; ?></a>
                            <small><?php if($step['type'] == 'quizzes'){
                                echo $step['nbr_quizz'].' questions';
                            }elseif($step['type'] == 'videos'){
                                echo $this->Time->convert($step['time']);
                            } ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>    
            </div>
        </section>
        <!--
        <aside class="five columns">
            <h4>Professeur</h4>
            <ul>
                <li>
                    <h6>Celestin Ballevre</h6>
                    <p>Dieu parmis les dieux, Celestin est le PDG de google et va bientot diriger le monde depuis la petite mairie de Laval. Il n'a jamais besoin de sommeil et ne jure que par la qualité de son travail.</p>
                </li>
            </ul>
        </aside>-->
    </div>
</article>