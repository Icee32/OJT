<?php 
include 'api/user-get.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

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
            <li>
                <a href="adminvacregistrants.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Vaccine Registrants</span>
                </a>
            </li>
            <li class="active">
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
            <form action="" method="GET">
                <div class="form-input">
                    <input type="search" placeholder="Search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                    <button type="submit" class="search-btn" value="Search">
                        <i class='bx bx-search'></i>
                    </button>
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
                    <h1>Logs</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="adminindex.php">Logs</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="adminlogs.php">Logs</a>
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
                        <h3>Recent Logs</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                 </form>
                 <table class="table table-responsive" id="userstbl">
  <thead>
    <tr>
      <th>LogID</th>
      <th>UserID</th>
      <th>Name</th>
      <th>Log Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // Connect to the iceuser database (replace with your connection details)
      $conn = mysqli_connect("localhost", "root", "", "adminlogin");

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Define search functionality (if applicable)
      if (isset($_GET['search'])) {
          $filterval = $_GET['search'];
          $sql = "SELECT * FROM login_logs WHERE name LIKE '%$filterval%'"; // Adjust search condition as needed
      } else {
          $sql = "SELECT * FROM login_logs";
      }

      $result = mysqli_query($conn, $sql);

      // Check query results
      if ($result !== false) {
          while ($row = mysqli_fetch_assoc($result)) {
              // Display data from login_logs table
              echo "<tr>";
              echo "<td>" . $row['LogID'] . "</td>";
              echo "<td>" . $row['UserID'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['log_date'] . "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No records found.</td></tr>";
      }

      mysqli_close($conn);
    ?>
  </tbody>
</table>

                </table>
            </div>
        </div>
    </section>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- javascript -->
    <script src="js/script.js"></script>
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

