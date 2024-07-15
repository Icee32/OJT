<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Samplehaha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/saform.css" />
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <script defer src="/hehe.js"></script>
</head>

<body>
    <header>
        <img src="images/loglog.png" alt="User Image" width="20%" height="20%" style=>
        <div class="container mt-3">
        <a href="home.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </header>
    <div class="text-center">
        <img src="images/SANTAROSA.png" class="img-circle" alt="User Image" width="15%" height="15%" style="margin-top: 40px;">
        <h4 class="login-box-msg w3-wide text-red"><i>Get Scheduled Right Now!</i></h4><br>
        <h1 class="login-box-msg w3-wide text-red"><b>Vaccination Schedule Register</b></h1>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="container" style="margin-top: 100px">
                <form id="form" class="row g-3" action="process-form.php" method="post">
                    <h2>Basic Info</h2>
                    <div class="input-control col-md-4">
                        <i class='bx bxs-user'></i>
                        <label for="inputFirstName4" class="form-label">Full Name</label>
                        <input type="name" class="form-control" id="FirstName" required placeholder="First Name" name="firstname">
                        <span id="firstname-error" class="error">FirstName is needed</span>
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-4" style="margin-top: 25px;">
                        <label for="inputLastName4" class="form-label"></label>
                        <input type="LastName" class="form-control" id="LastName" required placeholder="Last Name" name="lastname">
                         <span id="lastname-error" class="error">LastName is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-4">
                        <i class='bx bxs-user'></i>
                        <label for="inputMiddleInitial4" class="form-label">Middle Initial</label>
                        <input type="MiddleInitial" class="form-control" id="MiddleInitial" required placeholder="N/A if None" name="middleinitial">
                         <span id="MI-error" class="error">MiddleInitial is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-6">
                        <i class='bx bxs-user'></i>
                        <label for="inputAge4" class="form-label">Age</label>
                        <input type="Age" class="form-control" id="Age" required placeholder="Age" name="age">
                         <span id="age-error" class="error">Age is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-6">
                        <i class='bx bxs-user'></i>
                        <label for="inputGender4" class="form-label">Gender</label>
                        <input type="Gender" class="form-control" id="Gender" required placeholder="Male/Female" name="gender">
                        <span id="gender-error" class="error">Gender is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-12">
                        <i class='bx bxs-edit-location'></i>
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" required placeholder="1234 Main St" name="address1">
                         <span id="address-error" class="error">Address is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-12">
                        <i class='bx bxs-edit-location'></i>
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="Address2" required placeholder="Apartment, studio, or floor" name="address2">
                          <span id="address2-error" class="error">Address2 is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-8">
                        <i class='bx bxs-buildings'></i>
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="Email" required name="email">
                         <span id="email-error" class="error">Email is needed</span>"
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-4">
                        <i class='bx bxs-buildings'></i>
                        <label for="inputBaranggay" class="form-label">Baranggay</label>
                        <select id="Baranggay" class="form-select" name="baranggay" required>
                <option selected>Choose</option>
                <option value="Aplaya">Aplaya</option>
                <option value="Balibago">Balibago</option>
                <option value="Caingin">Caingin</option>
                <option value="Dila">Dila</option>
                <option value="Dita">Dita</option>
                <option value="Don Jose">Don Jose</option>
                <option value="Ibaba">Ibaba</option>
                <option value="Kanluran (Poblacion Uno)">Kanluran (Poblacion Uno)</option>
                <option value="Labas">Labas</option>
                <option value="Macabling">Macabling</option>
                <option value="Malitlit">Malitlit</option>
                <option value="Malusak (Poblacion Dos)">Malusak (Poblacion Dos)</option>
                <option value="Market Area(Poblacion Tres)">Market Area(Poblacion Tres)</option>
                <option value="Pooc (Pook)">Pooc (Pook)</option>
                <option value="Pulong Santa Cruz">Pulong Santa Cruz</option>
                <option value="Santo Domingo">Santo Domingo</option>
                <option value="Sinalhan">Sinalhan</option>
                <option value="Tagapo">Tagapo</option>
              </select>
                    </div>
                    <div class="input-control col-md-8">
                        <i class='bx bxl-jquery'></i>
                        <label for="inputContact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="Contact" required name="contact_number">
                        <span id="contact-error" class="error">Contact is needed</span>"
                        <div class="error"></div>
                        <br><br>
                    </div>

                    <div class="divider"></div>
<div class="row">
  <label for="inputVaccineid" class="form-label">Pick a Vaccine you want to get vaccinated with</label>
  <div class="col-sm-12">
    <div class="form-row d-flex">
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="1" id="vaccine_Covid" required>
        <label class="form-check-label" for="vaccine_Covid">Covid</label>
      </div>
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="2" id="vaccine_Pertussis" required>
        <label class="form-check-label" for="vaccine_Pertussis">Pertussis</label>
      </div>
      <div class="form-check col-md-4 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="3" id="vaccine_Something" required>
        <label class="form-check-label" for="vaccine_Something">Something</label>
      </div>
    </div>
  </div>
</div>
<div class="divider"></div>
<div class="row">
  <label for="inputDoseid" class="form-label">What Dose have you taken before?</label>
  <div class="col-sm-12">
    <div class="form-row d-flex">
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="dose_id" value="1" id="dose_Sample1" required>
        <label class="form-check-label" for="dose_Sample1">Sample1</label>
      </div>
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="dose_id" value="2" id="dose_Sample2" required>
        <label class="form-check-label" for="dose_Sample2">Sample2</label>
      </div>
      <div class="form-check col-md-4 required">
        <input class="form-check-input" type="radio" name="dose_id" value="3" id="dose_Sample3" required>
        <label class="form-check-label" for="dose_Sample3">Sample3</label>
      </div>
    </div>
  </div>
</div>
<div class="divider"></div>

</div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <span id="submit-error" class="error">please fix error</span>
            </div>
            </form>
        </div>
    </div>
     <script src="script32.js"></script>
</body>


</html>