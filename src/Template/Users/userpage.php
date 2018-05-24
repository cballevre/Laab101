<section class="userpage">
    <div>
        <h1>Votre compte</h1>
        <p>Vous pouvez modifier vos informations:</p>
    </div>
    <div>

        <form method="POST" action="" enctype="multipart/form-data">

            <label for="username">Nom d'utilisateur : <?php echo $_SESSION['auth']['username']; ?></label>
            <input type="text" name="username" id="username" placeholder="Nouveau pseudo"/>

            <label for="email">Adresse E-mail : <?php echo $_SESSION['auth']['email']; ?></label>
            <input type="text" name="email" id="email" placeholder="Nouvelle E-mail"/>

            <label for="password">Changer votre mot de passe : </label>
            <input type="password" name="password" id="password"/>

            <input class="" type="submit" id="validation" />
        </form>
    </div>
</section>