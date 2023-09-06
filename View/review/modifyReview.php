<?php
use App\Model\Entity\review;

//We check that the session variables exist.
if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] == 'Administrator') {
        ?>
        <div class="new">
            <?php
            foreach ($params['modify'] as $review) {
                /* @var review $review */
                if ($review->getId() == $_POST['id']) {
                    //Message information is displayed in paragraphs.
                    ?>
                    <h1>modify review</h1>
                    <form method="post" action="/recordReview">
                        <div class="criterion">
                            <input type="text" name="title" class="info" placeholder="Title" value="<?= $review->getTitle() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="text" class="info" placeholder="Text" value="<?= $review->getText() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="author" class="info" placeholder="Author" value="<?= $review->getAuthor() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="date" name="date" class="info" placeholder="Date" value="<?= $review->getReviewDate() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="fk_movies" class="number" value="<?= $review->getFkMovies() ?>">
                            <input type="text" name="id" class="number" value="<?= $review->getId() ?>">
                            <input type="submit" name="submit" class="validate" value="Record">
                        </div>
                    </form>
                    <?php
                }
            } ?>
        </div>
        <?php
    }
} else {
    echo "Error 404";
}
