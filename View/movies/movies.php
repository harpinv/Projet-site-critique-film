<?php
use App\Model\Entity\movies;
?>
<h1>Movies</h1>
<div class="save">
    <?php
    //We store the delete button and the modify button in a variable.
    $element = " 
              <button class='validate'><a class='link' href='/recordMovies'>Enter a movies</a></button>
            ";

    //We invoke the logout() function to make the delete button and the edit button appear only to the administrator.
    $admin = new \App\Controller\LoginController();
    $admin->logout($element);
    ?>
</div>
<div class="new">
    <form method="post" action="/research">
        <input type="text" name="research" class="info" placeholder="Title of the film">
        <input type="submit" name="submit" class="validate" value="research">
    </form>
</div>
<div>
    <?php
    foreach($params['movies'] as $movies) {
        /* @var movies $movies */
        ?>
        <div>
            <form method='post' action='/characteristic'>
                <input type='text' name='id' class="number" value='<?= $movies->getId() ?>'>
                <input type='submit' name='submit' class='design' value='<?= $movies->getTitle() ?>'>
            </form>
            <div class="check">
                <?php
                //We store the delete button and the modify button in a variable.
                $element = " 
                    <form method='post' action='/modifyMovies'>
                        <input type='text' name='id' class='number' value='" .  $movies->getId() . "'>
                        <input type='submit' name='submit' class='validate' value='Modify'>
                    </form>
                    <form method='post' action='/deleteMovies'>
                        <input type='text' name='id' class='number' value='" . $movies->getId() . "'>
                        <input type='submit' name='submit' class='validate' value='Delete'>
                    </form>
                ";

                //We invoke the logout() function to make the delete button and the edit button appear only to the administrator.
                $admin = new \App\Controller\LoginController();
                $admin->logout($element);
                ?>
            </div>
        </div>
        <?php
    } ?>
</div>
