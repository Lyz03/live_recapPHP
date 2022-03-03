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
        </tr>
    <?php
    }
    ?>

</table>