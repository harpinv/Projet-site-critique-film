<?php
use App\Model\Entity\movies;

//We check that the session variables exist.
if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Administrator') {
        ?>
        <div class="new">
            <?php
            foreach ($params['modify'] as $movies) {
                /* @var movies $movies */
                if ($movies->getId() == $_POST['id']) {
                    //We retrieve a row from the table and display the information in the form.
                    ?>
                    <h1>Modify movies</h1>
                    <form method="post" action="/enterMovies">
                        <input type="text" name="id" class="number" value="<?= $movies->getId() ?>">
                        <div class="criterion">
                            <input type="text" name="title" class="info" placeholder="Title" value="<?= $movies->getTitle() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="releaseYear" class="info" placeholder="Release Year" value="<?= $movies->getReleaseYear() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="country" class="info" placeholder="Country" value="<?= $movies->getCountry() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="director" class="info" placeholder="Director" value="<?= $movies->getDirector() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="writer" class="info" placeholder="Writer" value="<?= $movies->getWriter() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" name="actors" class="info" placeholder="Actors" value="<?= $movies->getActor() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" class="info" name="poster" placeholder="Lien poster" value="<?= $movies->getPoster() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" class="info" name="genre" placeholder="Genre" value="<?= $movies->getGenre() ?>" required>
                        </div>
                        <div class="criterion">
                            <input type="text" class="info" name="oscar" placeholder="Oscar Winners" value="<?= $movies->getOscarWinners() ?>" required>
                        </div>
                        <div class="criterion">
                            <label for="golden" class="entitle">Golden Palm Winners: </label>
                            <select id="golden" class="info" name="golden" required>
                                <option><?= $movies->getGoldenPalmWinners() ?></option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="criterion">
                            <label for="Greatest" class="entitle">Greatest Movies: </label>
                            <select id="Greatest" class="info" name="greatest" required>
                                <option><?= $movies->getGreatestMovies() ?></option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="criterion">
                            <input type="text" class="info" name="afiLists" placeholder="AFI-Lists" value="<?= $movies->getAfiLists() ?>" required>
                        </div>
                        <div class="criterion">
                            <label for="rating" class="entitle">Rating: </label>
                            <select id="rating" class="info" name="rating" required>
                                <option><?= $movies->getRating() ?></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </div>
                        <div class="criterion">
                            <input type="submit" class="validate" name="submit" value="Record">
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
