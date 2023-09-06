<?php
use App\Model\Entity\movies;
?>
<h1>Movies</h1>
<div>
    <?php
    foreach($params['movies'] as $movies) {
        /* @var movies $movies */
        if ($movies->getTitle() == $_POST['research']){
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
        }
    } ?>
</div>
