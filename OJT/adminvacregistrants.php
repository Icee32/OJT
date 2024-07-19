<?php 
include 'api/user-get.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname1 = "adminstarosaform";
    
    // Create connections
    $conn1 = new mysqli($servername, $username, $password, $dbname1);
    
    // Check connections
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }

      // Filters
      $year = isset($_GET['year']) ? $_GET['year'] : 'ALL';
      $vaccineType = isset($_GET['vaccineType']) ? $_GET['vaccineType'] : 'ALL';
  
      $yearFilter = $year !== 'ALL' ? "WHERE YEAR(registration_date) = '$year'" : "";
      $vaccineFilter = $vaccineType !== 'ALL' ? "AND vaccine_id = '$vaccineType'" : "";

    
    // Closing the connections
    $conn1->close();
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>

    <!-- My CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">

    <title>AdminHub</title>

    <script>
$(document).ready(function() {
    var baseurl = "api/get_users.php"; // Update this URL to match your API endpoint
    $.ajax({
        url: baseurl + "/all",
        method: 'GET',
        dataType: 'json',
        success: function(users) {
            // Apply the mappings
            users.forEach(user => {
                user.gender = getGender(user.gender_id);
                user.baranggay = getBaranggay(user.baranggay_id);
                user.vaccineType = getVaccineType(user.vaccine_id);
                user.doseID = getDoseID(user.vaccine_id, user.dose_id);
            });

            // Initialize DataTable with the ID of your table
            $("#example").DataTable({
                data: users,
                columns: [
                    { "data": "id", "title": "ID" },
                    { "data": "firstname", "title": "First Name" },
                    { "data": "lastname", "title": "Last Name" },
                    { "data": "middleinitial", "title": "Middle Initial" },
                    { "data": "birthdate", "title": "Birthdate" },
                    { "data": "age", "title": "Age" },
                    { "data": "gender", "title": "Gender" },
                    { "data": "baranggay", "title": "Baranggay" },
                    { "data": "vaccineType", "title": "Vaccine Type" },
                    { "data": "doseID", "title": "Dose ID" },
                    { "data": "phonenumber", "title": "Phone Number" },
                    { "data": "status", "title": "Status" },
                    { "data": "submitted_at", "title": "Submitted At" },
                    { 
                    "data": null,
                    "title": "Actions",
                    "render": function (data, type, row) {
                        return '<a href="view-registrant.php?id=' + row.id + '" class="btn btn-primary">View</a>';
                    }
                }
                ]
            });
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch data:", status, error);
        }
    });
});

// Mapping functions
function getGender(gender_id) {
    var gender_mappings = {
        1: 'Male',
        2: 'Female'
    };
    return gender_mappings[gender_id] || 'Unknown';
}

function getBaranggay(baranggay_id) {
    var baranggay_table_mappings = {
        1: 'bg_aplaya',
        2: 'bg_balibago',
        3: 'bg_caingin',
        4: 'bg_dila',
        5: 'bg_dita',
        6: 'bg_donjose',
        7: 'bg_ibaba',
        8: 'bg_kanluran',
        9: 'bg_labas',
        10: 'bg_macabling',
        11: 'bg_malitlit',
        12: 'bg_malusak',
        13: 'bg_marketarea',
        14: 'bg_pooc',
        15: 'bg_pulongsantacruz',
        16: 'bg_santodomingo',
        17: 'bg_sinalhan',
        18: 'bg_tagapo'
    };
    return baranggay_table_mappings[baranggay_id] || 'Unknown';
}

function getVaccineType(vaccine_id) {
    var vaccine_types = {
        1: 'HPV',
        2: 'Flu',
        3: 'Pneumonia'
    };
    return vaccine_types[vaccine_id] || 'Unknown';
}

function getDoseID(vaccine_id, dose_id) {
    var vaccine_dose_table_mappings = {
        1: { // HPV
            1: 'hpv_dose1',
            2: 'hpv_dose2',
            3: 'hpv_dose3'
        },
        2: { // Flu
            1: 'flu_dose1',
            2: 'flu_dose2',
            3: 'flu_dose3'
        },
        3: { // Pneumonia
            1: 'pneumonia_dose1',
            2: 'pneumonia_dose2',
            3: 'pneumonia_dose3'
        }
    };
    return vaccine_dose_table_mappings[vaccine_id][dose_id] || 'Unknown';
}
</script>

</head>
<body class="light-mode">

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img class="col" src="images/SANTAROSA.png" width="50" height="50">
            <span class="text" style="margin-left: 20px;">&nbsp; Sta.Rosa Vaccination</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="admindashboard.php">
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
            <li class="active">
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
                        <a href="admindashboard.php">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="adminvacregistrants.php">Vaccine Registrants</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

<section class="box">
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Registrants</h3>
            </div>

            <i class='bx bx-search'></i>
            <div class="container">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Initial</th>
                        <th>Birthdate</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Baranggay</th>
                        <th>Vaccine Type</th>
                        <th>Dose ID</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</section>




        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="js/script.js"></script>
    <script>
  const table = document.querySelector('.table');
  const viewDetailsBtns = document.querySelectorAll('.view-details-btn');

  viewDetailsBtns.forEach(btn => {
    btn.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default form submission behavior

      const userID = this.dataset.userId; // Get user ID from data attribute
      console.log('View user details:', userID); // Replace with logic to open modal or redirect

      // Open modal or redirect to view_form.php with userID parameter
    });
  });
</script>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>