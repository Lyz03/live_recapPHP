<h1>liste user</h1>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>email</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>password</th>
            <th>age</th>
            <th>éditer</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <?php
    foreach ($users as $value) {
        ?>
        <tr>
            <td><?= $value->getId() ?></td>
            <td><?= $value->getEmail() ?></td>
            <td><?= $value->getFirstname() ?></td>
            <td><?= $value->getLastname() ?></td>
            <td><?= $value->getPassword() ?></td>
            <td><?= $value->getAge() ?></td>
            <td><a href="/index.php?c=user&a=edit-user">éditer</a></td>
            <td><a href="/index.php?c=user&a=delete-user">supprimer</a></td>
        </tr>
    <?php
    }
    ?>

</table>