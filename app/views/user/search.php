<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/5/15
 * Time: 1:15 AM
 * @var array $users
 */?>

<table class="table table-bordered table-hovered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Login</th>
            <th>E-mail</th>
            <th>Name</th>
            <th>City</th>
            <th>About</th>
            <th>Interests Count</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(isset($users) and is_array($users))
        foreach($users as $user):?>
            <tr>
                <td><?php echo $user['id']?></td>
                <td><?php echo $user['login']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['city']?></td>
                <td><?php echo $user['about']?></td>
                <td><?php echo $user['interest_count']?></td>
            </tr>
    <?php endforeach;
    else echo "No users found";
    ?>
    </tbody>
</table>
<?php
if(isset($pagination))
    echo $pagination;