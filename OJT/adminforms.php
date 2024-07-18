<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">

    <title>Admin Forms</title>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            width: 100%;
        }
    </style>

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
            <li class="active">
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
        
        <!-- NAVBAR -->

        <!-- MAIN -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Admin Forms</h1>
                    <ul class="breadcrumb">
                        <li><a href="adminindex.php">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="adminforms.php">Admin Forms</a></li>
                    </ul>
                </div>
            </div>

            <main>
        <section class="box">
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Register New User</h3>
                    </div>

                    <!-- Admin Registration Form -->
                    <form id="adminForm" method="POST" action="api/admin-process-form.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-div one">
                                    <div class="i"><i class="fas fa-user"></i></div>
                                    <div class="div">
                                        <h5>First Name</h5>
                                        <input type="text" class="input" id="FirstName" name="firstname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one">
                                    <div class="i"><i class="fas fa-user"></i></div>
                                    <div class="div">
                                        <h5>Last Name</h5>
                                        <input type="text" class="input" id="LastName" name="lastname" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one">
                                    <div class="i"><i class="fas fa-user"></i></div>
                                    <div class="div">
                                        <h5>Middle Initial</h5>
                                        <input type="text" class="input" id="MiddleInitial" name="middleinitial" maxlength="3" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one">
                                    <div class="i"><i class="fas fa-calendar"></i></div>
                                    <div class="div">
                                        <h5>Birthdate</h5>
                                        <input type="date" class="input" id="Birthdate" name="birthdate" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one">
                                    <div class="i"><i class="fas fa-phone"></i></div>
                                    <div class="div">
                                        <h5>Phone Number</h5>
                                        <input type="text" class="input" id="PhoneNumber" name="phonenumber" maxlength="15" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one select-div">
                                    <div class="i"><i class="fas fa-venus-mars"></i></div>
                                    <div class="div">
                                        <h5>Gender</h5>
                                        <select id="Gender" class="input form-select" name="gender_id" required>
                                            <option disabled selected></option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one select-div">
                                    <div class="i"><i class="fas fa-home"></i></div>
                                    <div class="div">
                                        <h5>Barangay</h5>
                                        <select id="Baranggay" class="input form-select" name="baranggay_id" required>
                                            <option disabled selected></option>
                                            <option value="1">Aplaya</option>
                                            <option value="2">Balibago</option>
                                            <option value="3">Caingin</option>
                                            <option value="4">Dila</option>
                                            <option value="5">Dita</option>
                                            <option value="6">Don Jose</option>
                                            <option value="7">Ibaba</option>
                                            <option value="8">Kanluran (Poblacion Uno)</option>
                                            <option value="9">Labas</option>
                                            <option value="10">Macabling</option>
                                            <option value="11">Malitlit</option>
                                            <option value="12">Malusak (Poblacion Dos)</option>
                                            <option value="13">Market Area (Poblacion Tres)</option>
                                            <option value="14">Pooc (Pook)</option>
                                            <option value="15">Pulong Santa Cruz</option>
                                            <option value="16">Santo Domingo</option>
                                            <option value="17">Sinalhan</option>
                                            <option value="18">Tagapo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one select-div">
                                    <div class="i"><i class="fas fa-syringe"></i></div>
                                    <div class="div">
                                        <h5>Type of Vaccine</h5>
                                        <select id="Vaccine_ID" class="input form-select" name="vaccine_id" required>
                                            <option disabled selected></option>
                                            <option value="1">HPV</option>
                                            <option value="2">Flu</option>
                                            <option value="3">Pneumonia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-div one select-div">
                                    <div class="i"><i class="fas fa-syringe"></i></div>
                                    <div class="div">
                                        <h5>Number of Doses Taken</h5>
                                        <select id="Dose_ID" class="input form-select" name="dose_id" required>
                                            <option disabled selected></option>
                                            <option value="1">1st Dose</option>
                                            <option value="2">2nd Dose</option>
                                            <option value="3">3rd Dose</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script type="text/javascript" src="js/loginv2.js"></script>
    <script>
      $(document).ready(function() {
        $("#adminForm").submit(function(event) {
          event.preventDefault(); // Prevent the form from submitting normally

          var firstname = $("#FirstName").val();
          var lastname = $("#LastName").val();
          var vaccine_id = $("#Vaccine_ID").val();
          var dose_id = $("#Dose_ID").val();

          // First AJAX call to check doses
          $.ajax({
            url: 'api/check-doses.php',
            type: 'POST',
            dataType: 'json',
            data: {
              firstname: firstname,
              lastname: lastname,
              vaccine_id: vaccine_id,
              dose_id: dose_id
            },
            success: function(response) {
              if (response.status === 'ok') {
                // Second AJAX call to submit the form
                $.ajax({
                  url: 'api/process-form.php',
                  type: 'POST',
                  dataType: 'json',
                  data: $("#adminForm").serialize(),
                  success: function(response) {
                    if (response.status === 'ok') {
                      alertify.success(response.message);
                      $("#adminForm")[0].reset(); // Reset the form fields
                    } else {
                      alertify.error(response.message);
                    }
                  },
                  error: function(xhr, status, error) {
                    alertify.error("Error occurred. Please try again later.");
                  }
                });
              } else {
                alertify.error(response.message);
              }
            },
            error: function(xhr, status, error) {
              alertify.error("Error occurred. Please try again later.");
            }
          });
        });
      });
    </script>
</body>
</html>
