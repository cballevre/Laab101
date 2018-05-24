<section class="search">
    <form action="\courses\" class="search__form" method="post">
        <label for="search__form">
                <img class="search__loupe" src="<?php echo $this->Html->image('theme/icon_search.png'); ?>"></img>
            </label>
        <input type="text" name="motcle" class="search__bar" placeholder="Rechercher des cours et des sujets" />
        <select name="orderby">
                <option value="newer">Plus récent</option>
                <option value="older">Plus ancien</option>
                <option value="alphabetic">Par odre alphabetique</option>
                <option value="difficulty">Difficulté</option>
            </select>
        <select name="category">
                <option value="0">Toutes les catégories</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        <input class="button button-primary" type="submit" value="Rechercher" />
    </form>
</section>

<section class="library">
    <?php foreach($courses as $course): ?>
    <article class="card">
        <header class="card__header">
            <img src="<?php echo $this->Html->image('theme/icon_cours.png'); ?>" />
            <p>
                <?php echo $this->Time->convert($course['time']); ?>
            </p>
        </header>
        <div class="card__box">
            <a href="<?php echo $this->Html->link(array('controller' => 'courses', 'action' => 'single', 'parameter' => $course['slug'])); ?>">
                <h3><?php echo $course['name']; ?></h3>
                <p>
                    <?php echo $this->Html->truncate($course['description'], 20); ?>
                </p>
            </a>
            <ul class="card__tags">
                <?php 
                if(isset($course['progress'])): ?>
                <a href="<?php echo $this->Html->link(array('controller'=>'steps', 'action'=>'single', 'parameter' => $course['progress']['slug'])); ?>" class="button button-primary">
                                Continuer
                            </a>
                <?php else: ?>
                <li>
                    <a href="<?php echo $this->Html->link(array('controller'=>'topics', 'action'=>'single', 'parameter' => $course['topic_id'])); ?>">
                        <span><?php echo $course['topic'][0]['name']; ?></span>
                    </a>
                </li>
                <li><span><?php echo $course['level'][0]['name']; ?></span></li>
                <?php endif; ?>
                <li class="card__tag__star <?php if($course['bookmark']) echo 'card__tag__star--active'; ?>">
                    <a class="" href="<?php if($course['bookmark']){ echo $this->Html->link(array('controller' => 'bookmarks', 'action' => 'remove', 'parameter' => $course['id'])); }else{ echo $this->Html->link(array('controller' => 'bookmarks', 'action' => 'add', 'parameter' =>$course['id'])); } ?>">
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </article>
    <?php endforeach; ?>
</section>
