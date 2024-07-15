    <?php
    // Database connection (replace with your credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "starosaforms";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user data
    function getUserData($search = null) {
        global $conn;
        $query = "SELECT id, firstname, lastname, age, gender, baranggay, vaccine_id FROM users";

        if ($search) {
            $query .= " WHERE CONCAT(FirstName, LastName, Age, Gender, Baranggay, vaccine_id) LIKE '%$search%'";
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return false;
        }
    }

    if(isset($_SESSION['username'])){
    ?>

    <main class="content">
        <a href="home-forms.php" style="text-decoration: none"><h1>Reports</h1></a>
        <hr>

        <form action="" method="GET">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                <button type="submit" class="searchButton" value="Search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
        <div class="container mt-3">
            <div class="custom-scrollbar">
                <table class="table table-responsive" id="reporttbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Baranggay</th>
                            <th>VaccineID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET['search'])) {
                                $filterval = $_GET['search'];
                                $query = "SELECT * FROM users 
                                        WHERE CONCAT(FirstName, LastName, Age, Gender, Baranggay, vaccine_id) 
                                        LIKE '%$filterval%' 
                                        ORDER BY id DESC";
                            }
                            else {
                                $query = "SELECT * FROM users ORDER BY id DESC";
                            }

                            $result = $conn->query($query); 
                            if($result && $result->num_rows > 0) {
                                while($val = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $val['id'];?></td>
                                        <td><?php echo $val['FirstName'];?></td>
                                        <td><?php echo $val['LastName'];?></td>
                                        <td><?php echo $val['Age'];?></td>
                                        <td><?php echo $val['Gender'];?></td>
                                        <td><?php echo $val['Baranggay'];?></td>
                                        <td><?php echo $val['vaccine_id'];?></td>
                                        <td><?php echo '<a href="forms-view.php?id='.$val['id'].'" class="button-3">View Form</a>';?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">No records found.</td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php 
    } else {
        header("Location: index.php");
        exit();
    }
    ?>

