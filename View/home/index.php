<?php

use App\Model\Entity\movies;

?>
<div>
    <img id="logo" src="/assets/image/logo.png" alt="logo">
</div>
<div>
    <h2>Presentation</h2>
    <p class="presentation">Life is weird, I keep on writing over and over again about all the movies I watch, following
        an arbitrary yet personal rule "I review whatever I rate and I only rate what I watch" a rule that prevailed
        ever since 2010... still, my intent is not to pedantly show off some items of cinematic knowledge (no more or no
        less impressive than any average movie lover), but simply sharing thoughts with people sharing the same
        passion.</p>
    <p class="presentation">Isn't that -by the way -the true measure of a passion?</p>
    <p class="presentation">Now, why writing movie reviews? I'm not paid for it, it's not even my central activity so
        why wasting energy for lengthy texts that a few dozens of readers in the best case would read? Well, because I
        don't believe it's a waste of energy at all and there are some elements of intellectual exhilaration and
        emotional catharsis or you know what? let’s just call it “fun”.</p>
    <p class="presentation">But I have selfish reasons, I also write about movies because I wish I could work in the
        movie business, in a way or another. As Lennon said “You may say I’m a dreamer, but I’m not the only one…”
        Having graduated in screenwriting and directing (well, online courses but better than nothing), I hope some day
        my time will come. If not, this is the closest I can get to my dreams.</p>
    <p class="presentation">Now, why “Life Great Watcher”? Don’t get it wrong, the only piece of greatness I can credit
        myself with applies to my passion for movies. But according to Woody Allen's ex-girlfriend in the so-underrated
        “Play it Again, Sam” (1972), his character loves films because he's "one of life's great watchers". To which he
        retorts: "I'm a doer, I want to participate". Well, as much as I want to participate, to do something, I like to
        be one of life's great watchers and share some views about life through the experience of movies and about
        movies through the experience of life.</p>
    <p class="presentation">I hope some reviews will be insightful to you, convincing enough to discover a film or maybe
        change your perspective, make for a good read or simply get you the opportunity to compare your tastes, your
        appreciations and your dislikes with a fellow movie lover.</p>
    <p class="presentation">Please, forgive some possible language mistakes and annoying verbal tics (“I guess”, “let me
        say”, “one of the most” etc…) and take into consideration I'm not from an English speaking country, I do my best
        to use the most proper language... but in the end, we're only humans.</p>
    <p class="presentation">Have a good read!</p>
    <p class="presentation">Dino</p>
</div>
<div>
    <h2>Recent Reviews</h2>
    <div>
        <?php
        foreach ($params['title'] as $title) {
            /* @var movies $title */
            ?>
            <div>
                <form method='post' action='/characteristic'>
                    <input type='text' name='id' class="number" value='<?= $title->getId() ?>'>
                    <input type='submit' name='submit' class='design' value='<?= $title->getTitle() ?>'>
                </form>
                <div class="check">
                    <?php
                    //We store the delete button and the modify button in a variable.
                    $element = " 
                        <form method='post' action='modifyMovies'>
                            <input type='text' name='id' class='number' value='" . $title->getId() . "'>
                            <input type='submit' name='submit' class='validate' value='Modify'>
                        </form>
                        <form method='post' action='deleteMovies'>
                            <input type='text' name='id' class='number' value='" . $title->getId() . "'>
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
</div>