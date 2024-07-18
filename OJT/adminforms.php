<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="Sign.ico" type="image/gif" sizes="16x16" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Samplehaha</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="css/loginv2.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
  <img class="wave" src="images/red.jpg" />

  <div class="container">
    <div class="img">
      <img src="images/PFPV2.PNG" />
    </div>

    <div class="login-content">
      <form id="vaccinationForm" action="api/process-form.php" method="post">
        <img src="images/SANTAROSA.png" />
        <h2 class="title"></h2>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <h3>VACCINATION FORM</h3>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>First Name</h5>
            <input type="text" class="input" id="FirstName" name="firstname" required/>
          </div>
        </div>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Last Name</h5>
            <input type="text" class="input" id="LastName" name="lastname" required/>
          </div>
        </div>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Middle Initial</h5>
            <input type="text" class="input" id="MiddleInitial" name="middleinitial" maxlength="3" required/>
          </div>
        </div>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-calendar"></i>
          </div>
          <div class="div">
            <h5>Birthdate</h5>
            <input type="date" class="input" id="Birthdate" name="birthdate" required/>
          </div>
        </div>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-phone"></i>
          </div>
          <div class="div">
            <h5>Phone Number</h5>
            <input type="text" class="input" id="PhoneNumber" name="phonenumber" maxlength="15" required/>
          </div>
        </div>
        <div class="input-div one select-div">
          <div class="i">
            <i class="fas fa-venus-mars"></i>
          </div>
          <div class="div">
            <h5>Gender</h5>
            <select id="Gender" class="input form-select" name="gender_id" required>
              <option disabled selected></option>
              <option value="1">Male</option>
              <option value="2">Female</option>
            </select>
          </div>
        </div>
        <div class="input-div one select-div">
          <div class="i">
            <i class="fas fa-home"></i>
          </div>
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
              <option value="13">Market Area(Poblacion Tres)</option>
              <option value="14">Pooc (Pook)</option>
              <option value="15">Pulong Santa Cruz</option>
              <option value="16">Santo Domingo</option>
              <option value="17">Sinalhan</option>
              <option value="18">Tagapo</option>
            </select>
          </div>
        </div>
        <div class="input-div one select-div">
          <div class="i">
            <i class="fas fa-syringe"></i>
          </div>
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
        <div class="input-div one select-div">
          <div class="i">
            <i class="fas fa-syringe"></i>
          </div>
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
        <input type="submit" class="btn" value="Submit">
      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/loginv2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#vaccinationForm").submit(function(event) {
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
                data: $("#vaccinationForm").serialize(),
                success: function(response) {
                  if (response.status === 'ok') {
                    alertify.success(response.message);
                    $("#vaccinationForm")[0].reset(); // Reset the form fields
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
