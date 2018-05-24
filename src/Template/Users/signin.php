<?php
/**
 * Created by PhpStorm.
 * User: Célestin
 * Date: 06/06/2016
 * Time: 22:51
 */

<div class="login-wrapper">

	<div class="login-left">

		<div class="login-form">

			<a href ="./"><img class="logo" src="<?php echo HtmlHelper::getImage("theme/logoReverse.png"); ?>" alt="imgLogo" /></a>

			<h3 class="logo-texte">Flux-Center</h3>

			<form method="POST" action="">

				<div class="input">

					<input name="username"  type="text" placeholder="Nom d'utilisateur" required>
					<?php $errors->getErrors('username'); ?>

</div>

<div class="input">

    <input name="email" type="text" placeholder="Email" required>
    <?php $errors->getErrors('email'); ?>

</div>

<div class="input">

    <input name="password" type="password" placeholder="Mot de Passe" required>
    <?php $errors->getErrors('password'); ?>

</div>

<div class="input">

    <input name="password2" type="password" placeholder="Confirmer le Mot de Passe" required>
    <?php $errors->getErrors('password2'); ?>

</div>

<input type="submit" value="Suivant">

</form>

</div>

</div>

<div class="login-right">

    <a href="./signin">Connexion</a>

    <div>

        <h1 class="sign">Flux Center</h1>

        <p>Changez votre vision de la veille</p>

    </div>

</div>

</div>
