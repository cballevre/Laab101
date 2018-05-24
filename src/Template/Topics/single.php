
 <?php var_dump($this->var) ?>
<h2>Bibliothèque</h2>

<section class="library">
    
    <?php foreach($this->var as $course): ?>
        
       

        <article class="card">
            <header>
                <img src="<?php echo $this->Html->image('theme/icon_cours.png'); ?>"/>
                <p><?php echo $course['time']; ?></p>
            </header>
            <div class="card__box">
                <a href="<?php echo $this->Html->link(array('controller' => 'courses', 'action' => 'single', 'parameter' => $course['id'])); ?>" >
                    <h3><?php echo $course['title']; ?></h3>
                    <p><?php echo $this->Html->truncate($course['description'], 20); ?></p>
                </a>
                <ul class="card__tags">
                    <li>
                        <span>
                            <a href="<?php echo $this->Html->link(array('controller'=>'topics', 'action'=>'single', 'parameter' => $course['topic_id'])); ?>">
                                <?php echo $course['topic'][0]['name']; ?>
                            </a>
                        </span>
                    </li>
                    <li><span><?php echo $course['level'][0]['name']; ?></span></li>
                    <li>
                        <span>
                            <a><img src="<?php echo $this->Html->image('theme/icon_fav.png'); ?>" /></a>
                        </span>
                    </li>
                </ul>
            </div>
        </article>

    <?php endforeach; ?>

</section>