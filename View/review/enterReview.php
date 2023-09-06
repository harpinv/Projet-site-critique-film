<?php
//We check that the session variables exist.
if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] == 'Administrator') {
        ?>
        <div class="new">
            <h1>new review</h1>
            <form method="post" action="/recordReview">
                <div class="criterion">
                    <input type="text" name="title" class="info" placeholder="Title" required>
                </div>
                <div class="criterion">
                    <textarea name="text" class="info" placeholder="Text" required></textarea>
                </div>
                <div class="criterion">
                    <input type="text" name="author" class="info" placeholder="Author" required>
                </div>
                <div class="criterion">
                    <input type="date" name="date" class="info" placeholder="Date" required>
                </div>
                <div class="criterion">
                    <input type="text" name="fk_movies" class="number" value="<?= $_POST['id'] ?>">
                    <input type="submit" name="submit" class="validate" value="Record">
                </div>
            </form>
        </div>
        <?php
    }
} else {
    echo "Error 404";
}
