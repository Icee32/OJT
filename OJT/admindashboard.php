<?php 
include 'api/user-get.php';
include 'api/db_connection.php'; // Include the database connection
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // Filters
    $year = isset($_GET['year']) ? $_GET['year'] : 'ALL';
    $vaccineType = isset($_GET['vaccineType']) ? $_GET['vaccineType'] : 'ALL';

    $yearFilter = $year !== 'ALL' ? "WHERE YEAR(registration_date) = '$year'" : "";
    $vaccineFilter = $vaccineType !== 'ALL' ? "AND vaccine_id = '$vaccineType'" : "";

    // Queries to get the data
    $sqlTotalFormsSubmitted = "SELECT COUNT(*) as totalFormsSubmitted FROM users ";
    $sqlTotal9to15 = "SELECT COUNT(*) as total9to15 FROM users WHERE age BETWEEN 9 AND 15";
    $sqlTotal16to20 = "SELECT COUNT(*) as total16to20 FROM users WHERE age BETWEEN 16 AND 20";
    $sqlTotal21to59 = "SELECT COUNT(*) as total21to59 FROM users WHERE age BETWEEN 21 AND 59";
    $sqlTotal60plus = "SELECT COUNT(*) as total60plus FROM users Where age >= 60";
    $sqlTotalMales = "SELECT COUNT(*)  as totalMales FROM users WHERE gender_id = '1'";
    $sqlTotalFemales = "SELECT COUNT(*) as totalFemales FROM users WHERE gender_id = '2'";
    $sqlTotalHPVRegistrants = "SELECT COUNT(*) as totalHPVRegistrants FROM users WHERE vaccine_id = '1'";
    $sqlTotalFluRegistrants = "SELECT COUNT(*) as totalFluRegistrants FROM users WHERE vaccine_id = '2'";
    $sqlTotalInfluenzaCount = "SELECT COUNT(*) as totalInfluenzaCount FROM users WHERE vaccine_id = '3'";
    $sqlTotalVaccines = "SELECT 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '1') + 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '2') + 
        (SELECT COUNT(*) FROM users WHERE vaccine_id = '3') as totalVaccines";

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

    // Queries to get the count of users for each Baranggay
    $sqlAplaya = "SELECT COUNT(*) as totalAplaya FROM bg_aplaya";
    $sqlBalibago = "SELECT COUNT(*) as totalBalibago FROM bg_balibago";
    $sqlCaingin = "SELECT COUNT(*) as totalCaingin FROM bg_caingin";
    $sqlDila = "SELECT COUNT(*) as totalDila FROM bg_dila";
    $sqlDita = "SELECT COUNT(*) as totalDita FROM bg_dita";
    $sqlDonJose = "SELECT COUNT(*) as totalDonJose FROM bg_donjose";
    $sqlIbaba = "SELECT COUNT(*) as totalIbaba FROM bg_ibaba";
    $sqlKanluran = "SELECT COUNT(*) as totalKanluran FROM bg_kanluran";
    $sqlLabas = "SELECT COUNT(*) as totalLabas FROM bg_labas";
    $sqlMacabling = "SELECT COUNT(*) as totalMacabling FROM bg_macabling";
    $sqlMalitlit = "SELECT COUNT(*) as totalMalitlit FROM bg_malitlit";
    $sqlMalusak = "SELECT COUNT(*) as totalMalusak FROM bg_malusak";
    $sqlMarketArea = "SELECT COUNT(*) as totalMarketArea FROM bg_marketarea";
    $sqlPooc = "SELECT COUNT(*) as totalPooc FROM bg_pooc";
    $sqlPulongSantaCruz = "SELECT COUNT(*) as totalPulongSantaCruz FROM bg_pulongsantacruz";
    $sqlSantoDomingo = "SELECT COUNT(*) as totalSantoDomingo FROM bg_santodomingo";
    $sqlSinalhan = "SELECT COUNT(*) as totalSinalhan FROM bg_sinalhan";
    $sqlTagapo = "SELECT COUNT(*) as totalTagapo FROM bg_tagapo";

    // Execute queries
    $resultAplaya = $conn1->query($sqlAplaya);
    $resultBalibago = $conn1->query($sqlBalibago);
    $resultCaingin = $conn1->query($sqlCaingin);
    $resultDila = $conn1->query($sqlDila);
    $resultDita = $conn1->query($sqlDita);
    $resultDonJose = $conn1->query($sqlDonJose);
    $resultIbaba = $conn1->query($sqlIbaba);
    $resultKanluran = $conn1->query($sqlKanluran);
    $resultLabas = $conn1->query($sqlLabas);
    $resultMacabling = $conn1->query($sqlMacabling);
    $resultMalitlit = $conn1->query($sqlMalitlit);
    $resultMalusak = $conn1->query($sqlMalusak);
    $resultMarketArea = $conn1->query($sqlMarketArea);
    $resultPooc = $conn1->query($sqlPooc);
    $resultPulongSantaCruz = $conn1->query($sqlPulongSantaCruz);
    $resultSantoDomingo = $conn1->query($sqlSantoDomingo);
    $resultSinalhan = $conn1->query($sqlSinalhan);
    $resultTagapo = $conn1->query($sqlTagapo);

    // Fetch results
    $totalAplaya = $resultAplaya->fetch_assoc()['totalAplaya'];
    $totalBalibago = $resultBalibago->fetch_assoc()['totalBalibago'];
    $totalCaingin = $resultCaingin->fetch_assoc()['totalCaingin'];
    $totalDila = $resultDila->fetch_assoc()['totalDila'];
    $totalDita = $resultDita->fetch_assoc()['totalDita'];
    $totalDonJose = $resultDonJose->fetch_assoc()['totalDonJose'];
    $totalIbaba = $resultIbaba->fetch_assoc()['totalIbaba'];
    $totalKanluran = $resultKanluran->fetch_assoc()['totalKanluran'];
    $totalLabas = $resultLabas->fetch_assoc()['totalLabas'];
    $totalMacabling = $resultMacabling->fetch_assoc()['totalMacabling'];
    $totalMalitlit = $resultMalitlit->fetch_assoc()['totalMalitlit'];
    $totalMalusak = $resultMalusak->fetch_assoc()['totalMalusak'];
    $totalMarketArea = $resultMarketArea->fetch_assoc()['totalMarketArea'];
    $totalPooc = $resultPooc->fetch_assoc()['totalPooc'];
    $totalPulongSantaCruz = $resultPulongSantaCruz->fetch_assoc()['totalPulongSantaCruz'];
    $totalSantoDomingo = $resultSantoDomingo->fetch_assoc()['totalSantoDomingo'];
    $totalSinalhan = $resultSinalhan->fetch_assoc()['totalSinalhan'];
    $totalTagapo = $resultTagapo->fetch_assoc()['totalTagapo'];
    
    // Check if the queries executed successfully and fetch the results
    if ($resultTotalFormsSubmitted && $resultTotal9to15 && $resultTotal16to20 && 
        $resultTotal21to59 && $resultTotal60plus && $resultTotalMales && $resultTotalFemales && 
        $resultTotalHPVRegistrants && $resultTotalFluRegistrants && $resultTotalInfluenzaCount && $resultTotalVaccines &&
        $resultAplaya && $resultBalibago && $resultCaingin && $resultDila && $resultDita &&
        $resultDonJose && $resultIbaba && $resultKanluran && $resultLabas && $resultMacabling &&
        $resultMalitlit && $resultMalusak && $resultMarketArea && $resultPooc &&
        $resultPulongSantaCruz && $resultSantoDomingo && $resultSinalhan && $resultTagapo) {
            
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
        echo "Error executing one or more queries.";
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
                    <option value="ALL">All Years</option>
                    <option value="2023">2023</option>
                    <option value="2008">2008</option>
                    <!-- Add more years as needed -->
                </select>
                <select name="vaccineType">
                    <option value="ALL">All Vaccine Types</option>
                    <option value="1">HPV</option>
                    <option value="2">Flu</option>
                    <option value="3">Influenza</option>
                    <!-- Add more vaccine types as needed -->
                </select>
                <button type="submit">Filter</button>
            </form>
        </div>

        <ul class="box-info gender">
            <li class = "Total-Forms">
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
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalAplaya; ?></h3>
                <p>Aplaya Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalBalibago; ?></h3>
                <p>Balibago Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalCaingin; ?></h3>
                <p>Caingin Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalDila; ?></h3>
                <p>Dila Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalDita; ?></h3>
                <p>Dita Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalDonJose; ?></h3>
                <p>Don Jose Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalIbaba; ?></h3>
                <p>Ibaba Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalKanluran; ?></h3>
                <p>Kanluran Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalLabas; ?></h3>
                <p>Labas Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalMacabling; ?></h3>
                <p>Macabling Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalMalitlit; ?></h3>
                <p>Malitlit Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalMalusak; ?></h3>
                <p>Malusak Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalMarketArea; ?></h3>
                <p>Market Area Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalPooc; ?></h3>
                <p>Pooc Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalPulongSantaCruz; ?></h3>
                <p>Pulong Santa Cruz Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalSantoDomingo; ?></h3>
                <p>Santo Domingo Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalSinalhan; ?></h3>
                <p>Sinalhan Registrants Registrants</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-map'></i>
            <span class="text">
                <h3><?php echo $totalTagapo; ?></h3>
                <p>Tagapo Registrants</p>
            </span>
        </li>
    </ul>
    </ul>
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
