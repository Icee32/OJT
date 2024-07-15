<?php 
include 'api/user-get.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="app">
        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <aside class="sidebar">
            <div class="row sidebar-header">
                <a class="col" href="home-user.php">
                    <img class="col" src="images/SANTAROSA.png" width="50" height="50">
                    Admin</a>
                <hr/>
            </div>
             
            <nav class="menu">
                <a href="home.php" class="menu-item"><i class="fas fa-chart-line"></i>Dashboard</a>
                <a href="forms.php" class="menu-item"><i class="fas fa-file-alt"></i>Forms</a>
                <a href="home-user.php" class="menu-item is-active"><i class="fas fa-user"></i>Users</a>
                <a href="vaccines.php" class="menu-item"><i class="fas fa-map-pin"></i>Vaccines</a>
                <a href="logout.php" class="menu-item"><i class="fas fa-arrow-left"></i>Logout</a>
            </nav>

        </aside>


        <main class="content">

        <div class="row">
                <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>

                </div>
    <a href="users.php" style="text-decoration: none"><h1>Patrol Management</h1></a>
    <hr>
    
    <div class="align-right">
        <form action="" method="GET">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                <button type="submit" class="searchButton" value="Search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>

        <section class="box">
        <div class="container mt-3">
            <div class="custom-scrollbar">
                <table class="table table-responsive" id="userstbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>VaccineId</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch user data
                        if(isset($_GET['search'])) {
                            $filterval = $_GET['search'];
                            $users = getUserData($filterval);
                        } else {
                            $users = getUserData();
                        }
                        if($users !== false) {
                            foreach($users as $user) {
                                ?>
                                <tr>
                                    <td><?= $user['id']; ?></td>
                                    <td><?= $user['firstname']; ?></td>
                                    <td><?= $user['lastname']; ?></td>
                                    <td><?= $user['vaccine_id']; ?></td>
                                    <?php
                                        $formatted_date = date("Y-m-d H:i:s", strtotime($user['submitted_at']));
                                        echo "<td>" . $formatted_date . "</td>";
                                    ?>
                                </tr>
                                
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No record found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>


    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/togglemenu.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
