<?php
//We check that the session variables exist.
if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION["role"])) {
    if ($_SESSION['role'] == 'Administrator') {
        ?>
        <div class="new">
            <h1>New movies</h1>
            <form method="post" action="/enterMovies">
                <div class="criterion">
                    <input type="text" name="title" class="info" placeholder="Title" required>
                </div>
                <div class="criterion">
                    <input type="text" name="releaseYear" class="info" placeholder="Release Year" required>
                </div>
                <div class="criterion">
                    <input type="text" name="country" class="info" placeholder="Country" required>
                </div>
                <div class="criterion">
                    <input type="text" name="director" class="info" placeholder="Director" required>
                </div>
                <div class="criterion">
                    <input type="text" name="writer" class="info" placeholder="Writer" required>
                </div>
                <div class="criterion">
                    <input type="text" name="actor" class="info" placeholder="Actor" required>
                </div>
                <div class="criterion">
                    <input type="text" class="info" name="poster" placeholder="Lien poster" required>
                </div>
                <div class="criterion">
                    <input type="text" class="info" name="genre" placeholder="Genre" required>
                </div>
                <div class="criterion">
                    <input type="text" class="info" name="oscar" placeholder="Oscar Winners" required>
                </div>
                <div class="criterion">
                    <label for="golden" class="entitle">Golden Palm Winners: </label>
                    <select id="golden" class="info" name="golden" required>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="criterion">
                    <label for="Greatest" class="entitle">Greatest Movies: </label>
                    <select id="Greatest" class="info" name="greatest" required>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="criterion">
                    <input type="text" class="info" name="afiLists" placeholder="AFI-Lists" required>
                </div>
                <div class="criterion">
                    <label for="rating" class="entitle">Rating: </label>
                    <select id="rating" class="info" name="rating" required>
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
        </div>
        <?php
    }
} else {
    echo "Error 404";
}
