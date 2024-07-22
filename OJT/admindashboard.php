<?php 
include 'api/user-get.php';
include 'api/db_connection.php'; // Include the database connection
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // Filters
    $year = isset($_GET['year']) ? $_GET['year'] : 'ALL';
    $vaccineType = isset($_GET['vaccineType']) ? $_GET['vaccineType'] : 'ALL';
    $baranggay = isset($_GET['baranggay']) ? $_GET['baranggay'] : 'ALL';

    $yearFilter = $year !== 'ALL' ? "YEAR(registration_date) = '$year'" : "1=1";
    $vaccineFilter = $vaccineType !== 'ALL' ? "vaccine_id = '$vaccineType'" : "1=1";
    $baranggayFilter = $baranggay !== 'ALL' ? "baranggay_id = '$baranggay'" : "1=1";

    // Queries to get the data
    $sqlTotalFormsSubmitted = "SELECT COUNT(*) as totalFormsSubmitted FROM users WHERE $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotal9to15 = "SELECT COUNT(*) as total9to15 FROM users WHERE age BETWEEN 9 AND 15 AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotal16to20 = "SELECT COUNT(*) as total16to20 FROM users WHERE age BETWEEN 16 AND 20 AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotal21to59 = "SELECT COUNT(*) as total21to59 FROM users WHERE age BETWEEN 21 AND 59 AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotal60plus = "SELECT COUNT(*) as total60plus FROM users WHERE age >= 60 AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotalMales = "SELECT COUNT(*) as totalMales FROM users WHERE gender_id = '1' AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotalFemales = "SELECT COUNT(*) as totalFemales FROM users WHERE gender_id = '2' AND $yearFilter AND $vaccineFilter AND $baranggayFilter";
    $sqlTotalHPVRegistrants = "SELECT COUNT(*) as totalHPVRegistrants FROM users WHERE vaccine_id = '1' AND $yearFilter AND $baranggayFilter";
    $sqlTotalFluRegistrants = "SELECT COUNT(*) as totalFluRegistrants FROM users WHERE vaccine_id = '2' AND $yearFilter AND $baranggayFilter";
    $sqlTotalInfluenzaCount = "SELECT COUNT(*) as totalInfluenzaCount FROM users WHERE vaccine_id = '3' AND $yearFilter AND $baranggayFilter";
    $sqlTotalVaccines = "SELECT 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '1' AND $yearFilter AND $baranggayFilter) + 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '2' AND $yearFilter AND $baranggayFilter) + 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '3' AND $yearFilter AND $baranggayFilter) as totalVaccines";

    // Execute queries
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

    // Fetch results
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

    // Queries to get the count of users for each baranggay
    $baranggayTables = [
        'Aplaya' => 'bg_aplaya',
        'Balibago' => 'bg_balibago',
        'Caingin' => 'bg_caingin',
        'Dila' => 'bg_dila',
        'Dita' => 'bg_dita',
        'Don Jose' => 'bg_donjose',
        'Ibaba' => 'bg_ibaba',
        'Kanluran' => 'bg_kanluran',
        'Labas' => 'bg_labas',
        'Macabling' => 'bg_macabling',
        'Malitlit' => 'bg_malitlit',
        'Malusak' => 'bg_malusak',
        'Market Area' => 'bg_marketarea',
        'Pooc' => 'bg_pooc',
        'Pulong Santa Cruz' => 'bg_pulongsantacruz',
        'Santo Domingo' => 'bg_santodomingo',
        'Sinalhan' => 'bg_sinalhan',
        'Tagapo' => 'bg_tagapo'
    ];

    $baranggaySQL = "";
    if ($baranggay !== 'ALL') {
        $baranggaySQL = "SELECT COUNT(*) as total, '$baranggay' as baranggay FROM " . $baranggayTables[$baranggay] . " WHERE $yearFilter AND $vaccineFilter";
    } else {
        foreach ($baranggayTables as $baranggayName => $table) {
            $baranggaySQL .= "SELECT COUNT(*) as total, '$baranggayName' as baranggay FROM $table WHERE $yearFilter AND $vaccineFilter UNION ALL ";
        }
        $baranggaySQL = rtrim($baranggaySQL, " UNION ALL ");
    }

    $resultbaranggays = $conn1->query($baranggaySQL);
    $baranggayData = [];
    while ($row = $resultbaranggays->fetch_assoc()) {
        $baranggayData[$row['baranggay']] = $row['total'];
    }
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
                <a href="adminforms.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Admin Form</span>
                </a>
            </li>
            <li>
                <a href="adminvacregistrants.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Vaccine Registrants</span>
                </a>
            </li>
            <li>
                <a href="adminlogs.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Logs</span>
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
            <a href="#" id="notification" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num" id="badge">8</span>
    </a>

    <!-- Notification Content -->
    <div id="notification-content" class="notification-content">
        <ul id="notification-list">
            <!-- Notifications will be dynamically inserted here -->
        </ul>
    </div>

    <!-- Profile -->
    <a href="#" class="profile">
        <img src="img/people.png" alt="Profile Image">
    </a>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch and display the number of new registrants
            fetch('api/fetch_count.php')
                .then(response => response.text())
                .then(count => {
                    const badge = document.getElementById('badge');
                    badge.textContent = count;
                    if (parseInt(count) === 0) {
                        badge.style.display = 'none';
                    } else {
                        badge.style.display = 'block';
                    }
                });

            // Fetch and display the latest registrants' details
            fetch('api/user-get.php')
                .then(response => response.json())
                .then(data => {
                    const list = document.getElementById('notification-list');
                    list.innerHTML = ''; // Clear previous notifications

                    if (data.length === 0) {
                        list.innerHTML = '<li>No new notifications</li>';
                    } else {
                        data.forEach(registrant => {
                            const li = document.createElement('li');
                            li.textContent = `${registrant.firstname} ${registrant.lastname} has registered for ${registrant.vaccinetype} ${registrant.dose_id} dose`;
                            list.appendChild(li);
                        });
                    }
                });

            // Toggle notification content visibility
            document.getElementById('notification').addEventListener('click', function(event) {
                event.preventDefault();
                const content = document.getElementById('notification-content');
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
        </nav>
        <!-- NAVBAR -->

         <!-- MAIN -->
         <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="adminindex.php">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="adminwalkin.php">Walk-In Forms</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

            <div class="filters">
                <form method="GET" action="">
                    <select name="year">
                        <option value="ALL" <?php echo isset($_GET['year']) && $_GET['year'] == 'ALL' ? 'selected' : ''; ?>>All Years</option>
                        <option value="2024" <?php echo isset($_GET['year']) && $_GET['year'] == '2024' ? 'selected' : ''; ?>>2024</option>
                        <option value="2025" <?php echo isset($_GET['year']) && $_GET['year'] == '2025' ? 'selected' : ''; ?>>2025</option>
                        <option value="2026" <?php echo isset($_GET['year']) && $_GET['year'] == '20026' ? 'selected' : ''; ?>>2026</option>
                        <option value="2027" <?php echo isset($_GET['year']) && $_GET['year'] == '20027' ? 'selected' : ''; ?>>2027</option>
                        <option value="2028" <?php echo isset($_GET['year']) && $_GET['year'] == '20028' ? 'selected' : ''; ?>>2028</option>
                        <!-- Add more years as needed -->
                    </select>
                    <select name="vaccineType">
                        <option value="ALL" <?php echo isset($_GET['vaccineType']) && $_GET['vaccineType'] == 'ALL' ? 'selected' : ''; ?>>All Vaccine Types</option>
                        <option value="1" <?php echo isset($_GET['vaccineType']) && $_GET['vaccineType'] == '1' ? 'selected' : ''; ?>>HPV</option>
                        <option value="2" <?php echo isset($_GET['vaccineType']) && $_GET['vaccineType'] == '2' ? 'selected' : ''; ?>>Flu</option>
                        <option value="3" <?php echo isset($_GET['vaccineType']) && $_GET['vaccineType'] == '3' ? 'selected' : ''; ?>>Influenza</option>
                        <!-- Add more vaccine types as needed -->
                    </select>
                    <select name="baranggay">
                        <option value="ALL" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'ALL' ? 'selected' : ''; ?>>All baranggays</option>
                        <option value="Aplaya" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Aplaya' ? 'selected' : ''; ?>>Aplaya</option>
                        <option value="Balibago" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Balibago' ? 'selected' : ''; ?>>Balibago</option>
                        <option value="Caingin" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Caingin' ? 'selected' : ''; ?>>Caingin</option>
                        <option value="Dila" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Dila' ? 'selected' : ''; ?>>Dila</option>
                        <option value="Dita" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Dita' ? 'selected' : ''; ?>>Dita</option>
                        <option value="Don Jose" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Don Jose' ? 'selected' : ''; ?>>Don Jose</option>
                        <option value="Ibaba" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Ibaba' ? 'selected' : ''; ?>>Ibaba</option>
                        <option value="Kanluran" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Kanluran' ? 'selected' : ''; ?>>Kanluran</option>
                        <option value="Labas" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Labas' ? 'selected' : ''; ?>>Labas</option>
                        <option value="Macabling" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Macabling' ? 'selected' : ''; ?>>Macabling</option>
                        <option value="Malitlit" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Malitlit' ? 'selected' : ''; ?>>Malitlit</option>
                        <option value="Malusak" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Malusak' ? 'selected' : ''; ?>>Malusak</option>
                        <option value="Market Area" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Market Area' ? 'selected' : ''; ?>>Market Area</option>
                        <option value="Pooc" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Pooc' ? 'selected' : ''; ?>>Pooc</option>
                        <option value="Pulong Santa Cruz" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Pulong Santa Cruz' ? 'selected' : ''; ?>>Pulong Santa Cruz</option>
                        <option value="Santo Domingo" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Santo Domingo' ? 'selected' : ''; ?>>Santo Domingo</option>
                        <option value="Sinalhan" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Sinalhan' ? 'selected' : ''; ?>>Sinalhan</option>
                        <option value="Tagapo" <?php echo isset($_GET['baranggay']) && $_GET['baranggay'] == 'Tagapo' ? 'selected' : ''; ?>>Tagapo</option>
                    </select>
                    <button type="submit">Filter</button>
                </form>
            </div>

            <ul class="box-info gender">
    <li class="Total-Forms">
        <i class='bx bxs-calendar-check'></i>
        <span class="text">
            <h3><?php echo $totalFormsSubmitted; ?></h3>
            <p>Total Forms</p>
        </span>
    </li>
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
            <p>Total Influenza Count</p>
        </span>
    </li>
</ul>

<ul class="box-info baranggays">
    <?php foreach ($baranggayData as $baranggayName => $total): ?>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $total; ?></h3>
            <p><?php echo $baranggayName; ?> Registrants</p>
        </span>
    </li>
    <?php endforeach; ?>
</ul>
                -->
            <!--FOOTER-->
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
