<?php
use App\Model\Entity\Movies;
use App\Model\Entity\Review;
use App\Model\Entity\Comment;
?>
<div>
    <?php
    foreach ($params['characteristic'] as $characteristic) {
        /* @var movies $characteristic */
        if ($characteristic->getId() == $_POST['id']) {
            //Message information is displayed in paragraphs.
            ?>
            <h1><?= $characteristic->getTitle() ?></h1>
            <div id="login">
                <div>
                    <img class="poster" src="<?= $characteristic->getPoster() ?>" alt="movies poster">
                </div>
                <div class="release">
                    <p><span class="character">Release Year: </span><?= $characteristic->getReleaseYear() ?></p>
                    <p><span class="character">Country: </span><?= $characteristic->getCountry() ?></p>
                    <p><span class="character">Genre: </span><?= $characteristic->getGenre() ?></p>
                    <p><span class="character">Director: </span><?= $characteristic->getDirector() ?></p>
                    <p><span class="character">Writer: </span><?= $characteristic->getWriter() ?></p>
                    <p><span class="character">Actors: </span><?= $characteristic->getActor() ?></p>

                    <?php
                    if ($characteristic->getOscarWinners() != 'No') {
                        ?>
                        <p><span class="character">Oscar winners: </span><?= $characteristic->getOscarWinners() ?></p>
                        <?php
                    }

                    if ($characteristic->getGoldenPalmWinners() == 'Yes') {
                        ?>
                        <p><span class="character">Golden palm winners</p>
                        <?php
                    }

                    if ($characteristic->getGreatestMovies() == 'Yes') {
                        ?>
                        <p><span class="character">Greatest movies</p>
                        <?php
                    }

                    if ($characteristic->getAfiLists() != 'No') {
                        ?>
                        <p><span class="character">Afi lists: </span><?= $characteristic->getAfiLists() ?></p>
                        <?php
                    }
                    ?>

                    <p><span class="character">Rating: </span><?= $characteristic->getRating() ?></p>
                </div>
            </div>
            <div class="style1">
                <?php
                //We store the delete button and the modify button in a variable.
                $element = " 
                <div>
                    <form class='save' method='post' action='/enterReview'>
                        <input type='text' name='id' class='number' value='" . $_POST['id'] . "'>
                        <input type='submit' name='submit' class='validate' value='Add a review'>
                    </form>
                </div>
                ";

                //We invoke the logout() function to make the delete button and the edit button appear only to the administrator.
                $admin = new \App\Controller\LoginController();
                $admin->logout($element);

                foreach ($params['review'] as $review) {
                    /* @var review $review */
                    if ($review->getFkMovies() == $characteristic->getId()) {
                        //Message information is displayed in paragraphs.
                        ?>
                        <h1><?= $review->getTitle() ?></h1>
                        <?php
                        $letters = explode("/", $review->getText());

                        foreach($letters as $letter) {
                            ?>
                            <p class="review"><?= $letter ?></p>
                            <?php
                        }
                        ?>

                        <p class="author">Written by the <?= $review->getReviewDate() ?></p>

                        <div class="check">
                            <?php

                            //We store the delete button and the modify button in a variable.
                            $element = " 
                                <form class='save' method='post' action='/modifyReview'>
                                    <input type='text' name='id' class='number' value='" .  $review->getId() . "'>
                                    <input type='submit' name='submit' class='validate' value='Modify'>
                                </form>
                                <form class='save' method='post' action='/deleteReview'>
                                    <input type='text' name='id' class='number' value='" . $review->getId() . "'>
                                    <input type='submit' name='submit' class='validate' value='Delete'>
                                </form>
                            ";

                            //We invoke the logout() function to make the delete button and the edit button appear only to the user.
                            $admin = new \App\Controller\LoginController();
                            $admin->logout($element);
                            ?>
                        </div>
                        <?php
                    }
                } ?>
            </div>
            <?php
            //We check that the session variables exist.
            if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION["role"])) {
                ?>
                <h1>Comment</h1>
                <div class="new">
                    <h2>Write a comment</h2>
                    <form method="post" action="/recordComment">
                        <div class="criterion">
                            <input type="text" name="first_name" class="info" placeholder="First-name">
                        </div>
                        <div class="criterion">
                            <input type="text" name="name" class="info" placeholder="Name">
                        </div>
                        <div class="criterion">
                            <input type="text" name="text" class="info" placeholder="Text">
                        </div>
                        <div class="criterion">
                            <input type="text" name="fk_movies" class="number" value="<?= $characteristic->getId() ?>">
                            <input type="submit" name="submit" class="validate" value="Record">
                        </div>
                    </form>
                </div>
                <div>
                    <?php
                    foreach ($params['comment'] as $comment) {
                        /* @var Comment $comment */
                        if ($comment->getFkMovies() == $characteristic->getId()) {
                            //Message information is displayed in paragraphs.
                            ?>
                            <div class="comment">
                                <div class="check">
                                    <p><?= $comment->getFirstName() ?> <?= $comment->getName() ?></p>
                                    <p><?= $comment->getCommentDate() ?></p>
                                </div>
                                <div class="message">
                                    <p><?= $comment->getText() ?></p>
                                </div>
                                <?php
                                //We store the delete button and the modify button in a variable.
                                $element = " 
                                    <form class='save' method='post' action='/deleteComment'>
                                        <input type='text' name='id' class='number' value='" . $comment->getId() . "'>
                                        <input type='submit' name='submit' class='validate' value='Delete'>
                                    </form>
                                ";

                                //We invoke the logout() function to make the delete button and the edit button appear only to the administrator.
                                $admin = new \App\Controller\LoginController();
                                $admin->logout($element); ?>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
                <?php
            }
        }
    } ?>
</div>



