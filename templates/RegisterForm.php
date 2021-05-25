{% include '/header.php' %}
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <form class="form-signin" method="POST" action="/register">
            <h2 class="form-signin-heading" style="color:black">Bienvenue sur Cookmaster</h2>
            <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
            }
            ?>
            <input type="text" class="form-control" name="username" placeholder="Nickname" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            <input type="password" class="form-control" name="passwordRetype" placeholder="Retype your Password" required="" />
            
            <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
        </form>
    </div>
</div>
{% include '/footer.php' %}