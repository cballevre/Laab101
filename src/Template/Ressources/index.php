

<section class="ressources">
    
    <?php foreach($this->var as $ressource): ?>
        
        <article class="ressourcesCards">
            <header class="ressourcesCards__header">
                <a href="<?php echo $ressource['link']; ?>">
                    <img src='<?php echo $this->Html->image('ressources/'.$ressource['id'].'.png'); ?>'/>
                </a>
            </header>
            <div class="ressourcesCards__box">
                <h5><?php echo $ressource['name']; ?></h5>
                <p><?php echo $ressource['link']; ?></p>
                <p><?php echo $ressource['user']['name']; ?></p>
        
            </div>
        </article>
        
    <?php endforeach; ?>
        
</section>
