<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/formstyle.css">
</head>
<body>
		<!--<div style="max-width: 300px;">
   			 <img src="images/loglog.png" style="max-width: 100%; height: auto;" alt="Logo">
		</div>-->
        <nav>            
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></a></li>
                <li><a href="starosahome.php">Home</a></li>
                <li><a href="starosaforms.php">Register</a></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">FAQS</a></li>
            </ul>    
            <ul>
            <div class="yunglogo" style="max-width: 300px;">
   			 <img src="images/loglog.png" style="max-width: 100%; height: auto;" alt="Logo">
		    </div>
                <li class="hideOnMobile"><a href="starosahome.php">Home</a></li>
                <li class="hideOnMobile"><a href="starosaforms.php">Register</a></li>
                <li class="hideOnMobile"><a href="#">Contacts</a></li>
                <li class="hideOnMobile"><a href="#">FAQS</a></li>
                <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></a></li>
            </ul>    
                <!-- <nav class="menu">
                <a href="#" class="menu-item is-active">Home</a>
                <a href="#" class="menu-item">Forms</a>
                <a href="#" class="menu-item">Users</a>
                <a href="#" class="menu-item">Vaccine</a>-->
            </nav>
        </div>
    </div>

    <!--content here -->
    <div class="box">
        <div class="box-body">
            <div class="container" style="margin-top: 100px">
                <form id="form" class="row g-3" action="api/process-form.php" method="post">
                    <h2>Basic Info</h2>
                    <div class="input-control col-md-6">
                        <i class='bx bxs-user'></i>
                        <label for="inputFirstName4" class="form-label">Full Name</label>
                        <input type="name" class="form-control" id="FirstName" required placeholder="First Name" name="firstname">
                        <span id="-error" class="error">FirstName is needed</span>
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-6" style="margin-top: 25px;">
                        <label for="inputLastName4" class="form-label"></label>
                        <input type="LastName" class="form-control" id="LastName" required placeholder="Last Name" name="lastname">
                         <span id="-error" class="error">LastName is needed</span>
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-4">
                        <i class='bx bxs-user'></i>
                        <label for="inputAge4" class="form-label">Age</label>
                        <input type="Age" class="form-control" id="Age" required placeholder="Age" name="age">
                         <span id="-error" class="error">Age is needed</span>
                        <div class="error"></div>
                    </div>
                    <div class="input-control col-md-4" onsubmit="return validateForm()">
                        <i class='bx bxs-user'></i>
                        <label for="inputGender" class="form-label">Gender</label>
                        <select id="Gender" class="form-select" name="gender" required>
                            <option disabled selected>Choose</option>
                            <option value="Male" required>Male</option>
                            <option value="Female" required>Female</option>
                        </select>
                        <span id="-error" class="error">Gender is needed</span>
                        </div>
                    <div class="input-control col-md-4">
                        <i class='bx bxs-buildings'></i>
                        <label for="inputBaranggay" class="form-label">Baranggay</label>
                        <select id="Baranggay" class="form-select" name="baranggay" required>
                <option disabled selected>Choose</option>
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
              <span id="-error" class="error">Baranggay is needed</span>
                    </div>

                    <div class="divider"></div>
<div class="row">
  <label for="inputVaccineid" class="form-label">Pick a Vaccine you want to get vaccinated with</label>
  <div class="col-sm-12">
    <div class="form-row d-flex">
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="1" id="vaccine_HPV" required>
        <label class="form-check-label" for="vaccine_HPV">HPV</label>
      </div>
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="2" id="vaccine_Flu" required>
        <label class="form-check-label" for="vaccine_Flu">Flu</label>
      </div>
      <div class="form-check col-md-4 required">
        <input class="form-check-input" type="radio" name="vaccine_id" value="3" id="vaccine_Pneumonia" required>
        <label class="form-check-label" for="vaccine_Pneumonia">Pneumonia</label>
      </div>
    </div>
  </div>
</div>
<div class="divider"></div>
<div class="row">
  <label for="inputDoseid" class="form-label">Is this your 1st dose, 2nd dose, or 3rd dose?</label>
  <div class="col-sm-12">
    <div class="form-row d-flex">
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="dose_id" value="1" id="dose_Sample1" required>
        <label class="form-check-label" for="dose_Sample1">1st Dose</label>
      </div>    
      <div class="form-check col-md-4 mr-3 required">
        <input class="form-check-input" type="radio" name="dose_id" value="2" id="dose_Sample2" required>
        <label class="form-check-label" for="dose_Sample2">2nd Dose</label>
      </div>
      <div class="form-check col-md-4 required">
        <input class="form-check-input" type="radio" name="dose_id" value="3" id="dose_Sample3" required>
        <label class="form-check-label" for="dose_Sample3">3rd Dose</label>
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
     <script src="js/scriptforms.js"></script>

    <!--javascript-->
    <script>
        function showSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }
        function hideSidebar(){
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>

    <!-- validation -->
    <script>
    function validateForm() {
        var firstNameInput = document.getElementById("FirstName");
        var lastNameInput = document.getElementById("LastName");
        var ageInput = document.getElementById("Age");
        var genderInput = document.getElementById("Gender");
        var baranggayInput = document.getElementById("Baranggay");
        
        if (firstNameInput.value === "" || lastNameInput.value === "" || ageInput.value === "" || genderInput.value === "" || baranggayInput.value === "" || contactInput.value === "") {
            // Display an error message
            document.getElementById("-error").style.display = "block";
            return false; // Prevent form submission
        } else {
            // Hide the error message if all fields are filled
            document.getElementById("-error").style.display = "none";
            return true; // Allow form submission
        }
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
