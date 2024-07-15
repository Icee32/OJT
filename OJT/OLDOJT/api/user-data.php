<!-- [Users_manage page] refresh the table real-time
and also the code for the search bar -->

<?php include('../api/db_conn.php'); ?>
<thead>
    <tr>
    <th>Username</th>
    <th>Role</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Area</th>
    <th>Password</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    if(isset($_GET['search'])) {
        $filterval = $_GET['search'];
        $query = "SELECT * FROM user WHERE CONCAT(userid,role,firstname,lastname,area,status) LIKE '%$filterval%'";
        $result = $mysqli -> query($query);
    } else {
        $query = "SELECT * FROM user";
        $result = $mysqli -> query($query);
    }
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $val) { ?>
        <tr id="<?= $val['UserID']; ?>">
            <td data-target="Username"><?= $val['Username'];?></td>
            <td data-target="Role"><?= $val['Role'];?></td>
            <td data-target="FirstName"><?= $val['FirstName'];?> </td>
            <td data-target="LastName"><?= $val['LastName'];?></td>
            <td data-target="Area"><?= $val['Area'];?></td>
            <td data-target="Password"><?= $val['Password'];?></td>
            <td>
                <a href="#" data-role="update" data-id="<?= $val['UserID']; ?>" class="btn btn-success">Edit</a>
                <button type="button" value="<?= $val['UserID']; ?>" class="deleteUserBtn btn btn-danger">Delete</button>
            </td>
        </tr>
    <?php }
} else {
    ?>
    <td colspan="4">No record found.</td>
    <?php
} ?>
</tbody>