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
                <li class="hideOnMobile"><a href="starosaschoolforms.php">Register</a></li>
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
                <form id="form" class="row g-3" action="api/process-formschool.php" method="post">
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
                        <label for="inputSchool" class="form-label">School</label>
                        <select id="School" class="form-select" name="school" required>
                        <option disabled selected>Choose</option>
                        <option value="Acacia Foundation School">Acacia Foundation School</option>
                        <option value="Academia De Maria Elena Inc">Academia De Maria Elena Inc</option>
                        <option value="Achievers Heart of Knowledge Montessori Inc">Achievers Heart of Knowledge Montessori Inc</option>
                        <option value="Aplaya Elementary School">Aplaya Elementary School</option>
                        <option value="Aplaya National High School">Aplaya National High School</option>
                        <option value="Aplaya NHS Annex 1 (APEX)">Aplaya NHS Annex 1 (APEX)</option>
                        <option value="Asia Technological School of Science and Arts">Asia Technological School of Science and Arts</option>
                        <option value="Balibago Elementary School">Balibago Elementary School</option>
                        <option value="Balibago Integrated High School">Balibago Integrated High School</option>
                        <option value="Blessed Christian School de Sta. Rosa Inc.">Blessed Christian School de Sta. Rosa Inc.</option>
                        <option value="Brighton Dome Academic Center Inc.">Brighton Dome Academic Center Inc.</option>
                        <option value="BUILD UP Christian School Inc.">BUILD UP Christian School Inc.</option>
                        <option value="Caingin Elementary School">Caingin Elementary School</option>
                        <option value="The Canossa School Inc.">The Canossa School Inc.</option>
                        <option value="Casa Del Niño Montessori School San Lorenzo Inc">Casa Del Niño Montessori School San Lorenzo Inc</option>
                        <option value="COLC Learning Academy Inc.">COLC Learning Academy Inc.</option>
                        <option value="Chair of St. Peter School">Chair of St. Peter School</option>
                        <option value="Child Formation Center of Sta. Rosa Inc.">Child Formation Center of Sta. Rosa Inc.</option>
                        <option value="CITI Global College Inc.">CITI Global College Inc.</option>
                        <option value="Colegio de Sta. Rosa de Lima Inc">Colegio de Sta. Rosa de Lima Inc</option>
                        <option value="Contezza Learning Center Inc.">Contezza Learning Center Inc.</option>
                        <option value="Detorres Christian School Inc.">Detorres Christian School Inc.</option>
                        <option value="Dila Elementary School">Dila Elementary School</option>
                        <option value="Dita Elementary School">Dita Elementary School</option>
                        <option value="Dominican College of Sta. Rosa Laguna Inc.">Dominican College of Sta. Rosa Laguna Inc.</option>
                        <option value="Don Jose Elementary School">Don Jose Elementary School</option>
                        <option value="Don Jose Integrated High School">Don Jose Integrated High School</option>
                        <option value="Dolce Malluch Academe">Dolce Malluch Academe</option>
                        <option value="Elohim Christian School">Elohim Christian School</option>
                        <option value="Emmanuels Christian School of Santa Rosa Laguna Inc. (Annex)">Emmanuels Christian School of Santa Rosa Laguna Inc. (Annex)</option>
                        <option value="Emmanuels Christian School of Santa Rosa Laguna Inc. (Main)">Emmanuels Christian School of Santa Rosa Laguna Inc. (Main)</option>
                        <option value="Faithful Grace Christian School of Sta. Rosa Inc.">Faithful Grace Christian School of Sta. Rosa Inc.</option>
                        <option value="Faithlife Academy Inc. (Annex)">Faithlife Academy Inc. (Annex)</option>
                        <option value="Faithlife Academy Inc. (Tagapo)">Faithlife Academy Inc. (Tagapo)</option>
                        <option value="Full Life School for the Deaf Inc.">Full Life School for the Deaf Inc.</option>
                        <option value="GRACE Inc.">GRACE Inc.</option>
                        <option value="Green Fields Integrated School of Laguna Inc.">Green Fields Integrated School of Laguna Inc.</option>
                        <option value="Harvesters Baptist Academy of Sta. Rosa City Inc.">Harvesters Baptist Academy of Sta. Rosa City Inc.</option>
                        <option value="Hawks Prairie School of Sta. Rosa Laguna Inc.">Hawks Prairie School of Sta. Rosa Laguna Inc.</option>
                        <option value="Holy Rosary College of Sta. Rosa Laguna Inc.">Holy Rosary College of Sta. Rosa Laguna Inc.</option>
                        <option value="HSOL School of Laguna">HSOL School of Laguna</option>
                        <option value="Ignite Learning Center of Sta. Rosa Inc.">Ignite Learning Center of Sta. Rosa Inc.</option>
                        <option value="International Montessori School IMS Sta. Rosa Laguna">International Montessori School IMS Sta. Rosa Laguna</option>
                        <option value="Jesus the Exalted Name Full Gospel Ministries Inc. (School)">Jesus the Exalted Name Full Gospel Ministries Inc. (School)</option>
                        <option value="Jose Zavalla MES">Jose Zavalla MES</option>
                        <option value="Kainos Learning Institute Inc.">Kainos Learning Institute Inc.</option>
                        <option value="Kindertech of Uno Cevita Inc.">Kindertech of Uno Cevita Inc.</option>
                        <option value="La Primera Eskwela Child Development Center">La Primera Eskwela Child Development Center</option>
                        <option value="Laguna Eastern Academy of Santa Rosa Inc.">Laguna Eastern Academy of Santa Rosa Inc.</option>
                        <option value="Laguna Northwestern College-Corinthian Center">Laguna Northwestern College-Corinthian Center</option>
                        <option value="Labas Elementary School">Labas Elementary School</option>
                        <option value="Labas Senior High School">Labas Senior High School</option>
                        <option value="Lakeside Early Academic Development (LEAD) Christian School">Lakeside Early Academic Development (LEAD) Christian School</option>
                        <option value="Learning Ladder Child Development Center">Learning Ladder Child Development Center</option>
                        <option value="Macabling Elementary School">Macabling Elementary School</option>
                        <option value="Malitlit Elementary School">Malitlit Elementary School</option>
                        <option value="Maranatha Christian Academy of Sta. Rosa Inc.">Maranatha Christian Academy of Sta. Rosa Inc.</option>
                        <option value="Maranatha Living Hope Academy Inc.">Maranatha Living Hope Academy Inc.</option>
                        <option value="Marie Margarette School Inc.">Marie Margarette School Inc.</option>
                        <option value="Mary Immaculate Academy of Sta. Rosa Inc.">Mary Immaculate Academy of Sta. Rosa Inc.</option>
                        <option value="Meridian Educational Institution Inc.">Meridian Educational Institution Inc.</option>
                        <option value="Mt. Rushmore Academy of Laguna Inc.">Mt. Rushmore Academy of Laguna Inc.</option>
                        <option value="New Sinai School & Colleges of Sta. Rosa">New Sinai School & Colleges of Sta. Rosa</option>
                        <option value="Our Lady in Pink and Blue School Inc.">Our Lady in Pink and Blue School Inc.</option>
                        <option value="Our Lady of Assumption College of Laguna Inc.">Our Lady of Assumption College of Laguna Inc.</option>
                        <option value="Our Lady of Fatima University-Laguna">Our Lady of Fatima University-Laguna</option>
                        <option value="Our Lady of Pilar Academy of Sta. Rosa Laguna Inc.">Our Lady of Pilar Academy of Sta. Rosa Laguna Inc.</option>
                        <option value="Panorama Montessori School Inc.">Panorama Montessori School Inc.</option>
                        <option value="Philippine Technological Institute of Science Arts and Trade-Central Inc.">Philippine Technological Institute of Science Arts and Trade-Central Inc.</option>
                        <option value="Plica Learning Center Inc.">Plica Learning Center Inc.</option>
                        <option value="Pulong Sta. Cruz Elementary School">Pulong Sta. Cruz Elementary School</option>
                        <option value="Pulong Sta. Cruz National High School">Pulong Sta. Cruz National High School</option>
                        <option value="Precious Treasures Christian School of Cabuyao Inc">Precious Treasures Christian School of Cabuyao Inc</option>
                        <option value="Princeton Academy Inc. (GardenVillas)">Princeton Academy Inc. (GardenVillas)</option>
                        <option value="Princeton Academy Inc. (Paseo)">Princeton Academy Inc. (Paseo)</option>
                        <option value="Queen Anne School of Sta. Rosa Inc">Queen Anne School of Sta. Rosa Inc</option>
                        <option value="Saint Francis of Assisi College">Saint Francis of Assisi College</option>
                        <option value="Saint Ruiz Montessori School">Saint Ruiz Montessori School</option>
                        <option value="Saint Theodore Holy Family School OPC">Saint Theodore Holy Family School OPC</option>
                        <option value="Saints Peter & Paul Early Childhood Center">Saints Peter & Paul Early Childhood Center</option>
                        <option value="San Geronimo Emiliani School of Sta Rosa">San Geronimo Emiliani School of Sta Rosa</option>
                        <option value="San Lorenzo Christian School">San Lorenzo Christian School</option>
                        <option value="San Lorenzo Rhythm Academy of Learning Inc.">San Lorenzo Rhythm Academy of Learning Inc.</option>
                        <option value="Santa Rosa Educational Institution Inc.">Santa Rosa Educational Institution Inc.</option>
                        <option value="Santa Rosa Laguna Christian School (SANROLACS)">Santa Rosa Laguna Christian School (SANROLACS)</option>
                        <option value="Santa Rosa Science & Technology High School">Santa Rosa Science & Technology High School</option>
                        <option value="Seven Pillars Catholic School">Seven Pillars Catholic School</option>
                        <option value="Shepherd of Faith SPED Center Inc.">Shepherd of Faith SPED Center Inc.</option>
                        <option value="Sinalhan Elementary School">Sinalhan Elementary School</option>
                        <option value="Sinalhan Integrated High School">Sinalhan Integrated High School</option>

              </select>
              <span id="-error" class="error">School is needed</span>
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
  <label for="inputDoseid" class="form-label">Is this your 1st dose, 2nd dose or 3rd dose?</label>
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
        var SchoolInput = document.getElementById("School");
        
        if (firstNameInput.value === "" || lastNameInput.value === "" || ageInput.value === "" || genderInput.value === "" || SchoolInput.value === "" || contactInput.value === "") {
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
