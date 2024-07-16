<?php 
include 'api/user-get.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname1 = "starosaschoolforms";
    $dbname2 = "starosaforms";
    
    // Create connections
    $conn1 = new mysqli($servername, $username, $password, $dbname1);
    $conn2 = new mysqli($servername, $username, $password, $dbname2);
    
    // Check connections
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
    }
    
    // Queries to get the data
    $sqlTotalSchoolForms = "SELECT COUNT(*) as totalSchoolForms FROM starosaschoolforms.users";
    $sqlTotalWalkInForms = "SELECT COUNT(*) as totalWalkInForms FROM starosaforms.users";
    $sqlTotalFormsSubmitted = "SELECT 
        (SELECT COUNT(*) FROM starosaschoolforms.users) + 
        (SELECT COUNT(*) FROM starosaforms.users) as totalFormsSubmitted";
    $sqlTotal9to15 = "SELECT 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE age BETWEEN 9 AND 15) + 
        (SELECT COUNT(*) FROM starosaforms.users WHERE age BETWEEN 9 AND 15) as total9to15";
    $sqlTotal16to20 = "SELECT 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE age BETWEEN 16 AND 20) + 
        (SELECT COUNT(*) FROM starosaforms.users WHERE age BETWEEN 16 AND 20) as total16to20";
    $sqlTotal21to59 = "SELECT 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE age BETWEEN 21 AND 59) + 
        (SELECT COUNT(*) FROM starosaforms.users WHERE age BETWEEN 21 AND 59) as total21to59";
    $sqlTotal60plus = "SELECT
        (SELECT COUNT(*) FROM starosaschoolforms.users Where Age >= 60) +
        (SELECT COUNT(*) FROM starosaforms.users Where Age >= 60) as total60plus";
    $sqlTotalMales = "SELECT 
        (SELECT COUNT(*) FROM starosaforms.users WHERE gender = 'male') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE gender = 'male') as totalMales";
    $sqlTotalFemales = "SELECT 
        (SELECT COUNT(*) FROM starosaforms.users WHERE gender = 'female') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE gender = 'female') as totalFemales";
    $sqlTotalHPVRegistrants = "SELECT
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '1') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE vaccine_id = '1') as totalHPVRegistrants";
    $sqlTotalFluRegistrants = "SELECT
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '2') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE vaccine_id = '2') as totalFluRegistrants";
    $sqlTotalInfluenzaCount = "SELECT
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '3') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE vaccine_id = '3') as totalInfluenzaCount";
    $sqlTotalVaccines = "SELECT 
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '1') + 
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '2') + 
        (SELECT COUNT(*) FROM starosaforms.users WHERE vaccine_id = '3') +
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE vaccine_id = '1') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users WHERE vaccine_id = '2') + 
        (SELECT COUNT(*) FROM starosaschoolforms.users   WHERE vaccine_id = '3') as totalVaccines";

    
    // Execute queries
    $resultTotalSchoolForms = $conn1->query($sqlTotalSchoolForms);
    $resultTotalWalkInForms = $conn2->query($sqlTotalWalkInForms);
    $resultTotalFormsSubmitted = $conn1->query($sqlTotalFormsSubmitted);
    $resultTotal9to15 = $conn1->query($sqlTotal9to15);
    $resultTotal16to20 = $conn1->query($sqlTotal16to20);
    $resultTotal21to59 = $conn1->query($sqlTotal21to59);
    $resultTotal60plus = $conn1->query($sqlTotal60plus);
    $resultTotalMales = $conn1->query($sqlTotalMales);
    $resultTotalFemales = $conn1->query($sqlTotalFemales);
    $resultTotalHPVRegistrants = $conn1->query($sqlTotalHPVRegistrants);
    $resultTotalFluRegistrants = $conn1->query($sqlTotalFluRegistrants);
    $resultTotalInfluenzaCount = $conn1->query($sqlTotalInfluenzaCount);
    $resultTotalVaccines = $conn1->query($sqlTotalVaccines);
    
    // Check if the queries executed successfully and fetch the results
    if ($resultTotalSchoolForms && $resultTotalWalkInForms && $resultTotalFormsSubmitted && 
        $resultTotal9to15 && $resultTotal16to20 && $resultTotal21to59 && $resultTotal60plus &&
        $resultTotalMales && $resultTotalFemales && $resultTotalHPVRegistrants && 
        $resultTotalFluRegistrants && $resultTotalInfluenzaCount && $resultTotalVaccines) {
    
        $totalSchoolForms = $resultTotalSchoolForms->fetch_assoc()['totalSchoolForms'];
        $totalWalkInForms = $resultTotalWalkInForms->fetch_assoc()['totalWalkInForms'];
        $totalFormsSubmitted = $resultTotalFormsSubmitted->fetch_assoc()['totalFormsSubmitted'];
        $total9to15 = $resultTotal9to15->fetch_assoc()['total9to15'];
        $total16to20 = $resultTotal16to20->fetch_assoc()['total16to20'];
        $total21to59 = $resultTotal21to59->fetch_assoc()['total21to59'];
        $total60plus = $resultTotal60plus->fetch_assoc()['total60plus'];
        $totalMales = $resultTotalMales->fetch_assoc()['totalMales'];
        $totalFemales = $resultTotalFemales->fetch_assoc()['totalFemales'];        
        $totalHPVRegistrants = $resultTotalHPVRegistrants->fetch_assoc()['totalHPVRegistrants'];
        $totalFluRegistrants = $resultTotalFluRegistrants->fetch_assoc()['totalFluRegistrants'];
        $totalInfluenzaCount = $resultTotalInfluenzaCount->fetch_assoc()['totalInfluenzaCount'];
        $totalVaccines = $resultTotalVaccines->fetch_assoc()['totalVaccines'];
    } else {
        // Handle query failure
        die("Error fetching data: " . $conn1->error . " or " . $conn2->error);
    }
    
    // Closing the connections
    $conn1->close();
    $conn2->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">

    <title>AdminHub</title>
</head>
<body class="light-mode">

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="col" src="images/SANTAROSA.png" width="50" height="50">
            <span class="text" style="margin-left: 20px;">&nbsp; Sta.Rosa Vaccination</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="adminindex.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="adminwalkin.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Walk-In Forms</span>
                </a>
            </li>
            <li>
                <a href="adminschoolbase.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">School-Base Forms</span>
                </a>
            </li>
            <li>
                <a href="adminlogs.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Logs</span>
                </a>
            </li>
            <li>
                <a href="adminteam.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="adminsettings.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

        <ul class="box-info gender">
            <li class="highlighted-males">
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $totalMales; ?></h3>
                    <p>Total Males</p>
                </span>
            </li>
            <li class="highlighted-females">
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $totalFemales; ?></h3>
                    <p>Total Females</p>
                </span>
            </li>
        </ul>    
            <ul class="box-info walk-in">
            <li class = "Total-Forms">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3><?php echo $totalFormsSubmitted; ?></h3>
                    <p>Total Forms</p>
                </span>
            </li>
            <li class = "Total-Forms">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3><?php echo $totalWalkInForms; ?></h3>
                    <p>Total Walk-in Forms</p>
                </span>
            </li>
            <li class = "Total-Forms">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3><?php echo $totalSchoolForms; ?></h3>
                    <p>Total School Base Forms</p>
                </span>
            </li>
        </ul>

        <ul class="box-info ages">
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $total9to15; ?></h3>
                    <p>Total 9-15 Year Olds</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $total16to20; ?></h3>
                    <p>Total 16-20 Year Olds</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $total21to59; ?></h3>
                    <p>Total 21-59 Year Olds</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3><?php echo $total60plus; ?></h3>
                    <p>Total 60+ Year Olds</p>
                </span>
            </li>
        </ul>

        <ul class="box-info totals">
            <li>
                <i class='bx bxs-virus'></i>
                <span class="text">
                    <h3><?php echo $totalVaccines; ?></h3>
                    <p>Total Vaccines (HPV, FLU, INFLUENZA)</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-virus'></i>
                <span class="text">
                    <h3><?php echo $totalHPVRegistrants; ?></h3>
                    <p>Total HPV Registrants</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-virus'></i>
                <span class="text">
                    <h3><?php echo $totalFluRegistrants; ?></h3>
                    <p>Total Flu Registrants</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-virus'></i>
                <span class="text">
                    <h3><?php echo $totalInfluenzaCount; ?></h3>
                    <p>Total Pneuomonia Count</p>
                </span>
            </li>
        </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Applicants</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table class="table table-responsive" id="userstbl">
                    <thead>
                        <tr>
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
                                        <td><?= htmlspecialchars($user['firstname']); ?></td>
                                        <td><?= htmlspecialchars($user['lastname']); ?></td>
                                        <td><?= htmlspecialchars($user['vaccinetype']); ?></td> <!-- Display vaccine type -->
                                        <td><?= htmlspecialchars($user['submitted_at']); ?></td> <!-- Assuming submitted_at is already formatted -->
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
                <div class="todo">
                    <div class="head">
                        <h3>Recent Forms Submissions</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>View</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>View</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>View</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>View</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>View</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- javascript -->
    <script src="js/script.js"></script>Z
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
