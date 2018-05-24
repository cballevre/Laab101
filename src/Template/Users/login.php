
<fieldset class="connexion">
<h5 class="text-center">Connectez vous</h5>

<?php 
    echo $this->Form->create('users', array('controller' => 'users', 'action' => 'login'));
    echo $this->Form->input('username', array('placeholder'=>'Nom d\'utilisateur', 'legend' => 'Nom d\'utilisateur')); 
    echo $this->Form->input('password', array('type'=>'password','placeholder'=>'Mot de passe', 'legend' => 'Mot de passe'));
    echo $this->Form->end();
?>
</fieldset>