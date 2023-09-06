<?php
use App\Model\Entity\Contact;

//We check that the session variables exist.
if (isset($_SESSION['name']) && isset($_SESSION['firstName']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Administrator') {
        ?>
        <h1>Contact received</h1>
        <div>
            <?php
            foreach($params['contacts'] as $contact) {
                /* @var contact $contact */
                ?>
                <div class="read">
                    <div class="received text">
                        <p><?= $contact->getName() . $contact->getFirstName() ?></p>
                        <p><?= $contact->getContactDate() ?></p>
                    </div>
                    <div class="mail text">
                        <p><?= $contact->getEmail() ?></p>
                        <p><?= $contact->getObject() ?></p>
                    </div>
                    <div class="text">
                        <p><?= $contact->getText() ?></p>
                    </div>
                    <div>
                        <form method='post' action='/deleteContact'>
                            <input type='text' name='id' class='number' value='" . $contact->getId() . "'>
                            <input type='submit' name='submit' class='validate' value='delete'>
                        </form>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <?php
    }
} else {
    echo "Error 404";
}
?>