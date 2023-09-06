<?php
use App\Model\Entity\user;
?>
<h1>User</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>FirstName</th>
            <th>Email</th>
            <th>Identify</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($params['users'] as $users) {
        /* @var user $users */
        ?>
        <tr>
            <td><?= $users->getName() ?></td>
            <td><?= $users->getFirstName() ?></td>
            <td><?= $users->getEmail() ?></td>
            <td><?= $users->getIdentify() ?></td>
            <td><?= $users->getRole() ?></td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>
