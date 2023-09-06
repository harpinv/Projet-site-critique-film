<div class="new">
    <p>Confirmer votre inscription</p>
    <form method="post" action="/validateUser">
        <div class="criterion">
            <input type="text" name="email" class="number" value="<?php $_POST['email'] ?>">
            <input type="submit" name="submit" class="confirmer" value="validate">
        </div>
    </form>
</div>
