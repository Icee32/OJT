<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starosaschoolforms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$school = isset($_POST['school']) ? $_POST['school'] : "";
$vaccine_id = isset($_POST['vaccine_id']) ? (int)$_POST['vaccine_id'] : 0;
$dose_id = isset($_POST['dose_id']) ? (int)$_POST['dose_id'] : 0;

// Sanitize data before inserting (replace with proper sanitization)
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$age = mysqli_real_escape_string($conn, $age);
$gender = mysqli_real_escape_string($conn, $gender);
$school = mysqli_real_escape_string($conn, $school);
$vaccine_id = mysqli_real_escape_string($conn, $vaccine_id);
$dose_id = mysqli_real_escape_string($conn, $dose_id);

// Check if the vaccine_id exists in tblvaccine
$vaccine_check_sql = "SELECT * FROM tblvaccine WHERE vaccineid = '$vaccine_id'";
$vaccine_check_result = $conn->query($vaccine_check_sql);

if ($vaccine_check_result->num_rows > 0) {
    // Insert data into users table
    $sql = "INSERT INTO users (FirstName, LastName, Age, Gender, School, vaccine_id, dose_id, submitted_at, status)
            VALUES ('$firstname', '$lastname', '$age', '$gender', '$school', '$vaccine_id', '$dose_id', NOW(), 'Pending')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id; // Get the ID of the inserted user record

        // Define mappings for dose tables
        $dose_table_mappings = [
            1 => 'dose1',
            2 => 'dose2',
            3 => 'dose3',
        ];
        
        // Define mappings for school tables
        $school_table_mappings = [
            'Acacia Foundation School' => 'bs_acacia_foundation_school',
            'Academia De Maria Elena Inc' => 'bs_academia_de_maria_elena_inc',
            'Achievers Heart of Knowledge Montessori Inc' => 'bs_achievers_heart_of_knowledge_montessori_inc',
            'Aplaya Elementary School' => 'bs_aplaya_es',
            'Aplaya National High School' => 'bs_aplaya_nhs',
            'Aplaya NHS Annex 1 (APEX)' => 'bs_aplaya_nhs_annex_1_apex',
            'Asia Technological School of Science and Arts' => 'bs_asia_technological_school_of_science_and_arts',
            'Balibago Elementary School' => 'bs_balibago_es',
            'Balibago Integrated High School' => 'bs_balibago_integrated_hs',
            'Blessed Christian School de Sta. Rosa Inc.' => 'bs_blessed_christian_school_de_sta_rosa_inc',
            'Brighton Dome Academic Center Inc.' => 'bs_brighton_dome_academic_center_inc',
            'BUILD UP Christian School Inc.' => 'bs_build_up_christian_school_inc',
            'Caingin Elementary School' => 'bs_caingin_es',
            'The Canossa School Inc.' => 'bs_canossa_school_inc',
            'Casa Del Niño Montessori School San Lorenzo Inc' => 'bs_casa_del_nino_montessori_school_san_lorenzo_inc',
            'COLC Learning Academy Inc.' => 'bs_colc_learning_academy_inc',
            'Chair of St. Peter School' => 'bs_chair_of_st_peter_school',
            'Child Formation Center of Sta. Rosa Inc.' => 'bs_child_formation_center_of_sta_rosa_inc',
            'CITI Global College Inc.' => 'bs_citi_global_college_inc',
            'Colegio de Sta. Rosa de Lima Inc' => 'bs_colegio_de_sta_rosa_de_lima_inc',
            'Contezza Learning Center Inc.' => 'bs_contezza_learning_center_inc',
            'Detorres Christian School Inc.' => 'bs_detorres_christian_school_inc',
            'Dila Elementary School' => 'bs_dila_es',
            'Dita Elementary School' => 'bs_dita_es',
            'Dominican College of Sta. Rosa Laguna Inc.' => 'bs_dominican_college_of_sta_rosa_laguna_inc',
            'Don Jose Elementary School' => 'bs_don_jose_es',
            'Don Jose Integrated High School' => 'bs_don_jose_integrated_hs',
            'Dolce Malluch Academe' => 'bs_dolce_malluch_academe',
            'Elohim Christian School' => 'bs_elohim_christian_school',
            'Emmanuels Christian School of Santa Rosa Laguna Inc. (Annex)' => 'bs_emmanuels_christian_school_of_santa_rosa_laguna_inc_annex',
            'Emmanuels Christian School of Santa Rosa Laguna Inc. (Main)' => 'bs_emmanuels_christian_school_of_santa_rosa_laguna_inc_main',
            'Faithful Grace Christian School of Sta. Rosa Inc.' => 'bs_faithful_grace_christian_school_of_sta_rosa_inc',
            'Faithlife Academy Inc. (Annex)' => 'bs_faithlife_academy_inc_annex',
            'Faithlife Academy Inc. (Tagapo)' => 'bs_faithlife_academy_inc_tagapo',
            'Full Life School for the Deaf Inc.' => 'bs_full_life_school_for_the_deaf_inc',
            'GRACE Inc.' => 'bs_grace_inc',
            'Green Fields Integrated School of Laguna Inc.' => 'bs_green_fields_integrated_school_of_laguna_inc',
            'Harvesters Baptist Academy of Sta. Rosa City Inc.' => 'bs_harvesters_baptist_academy_of_sta_rosa_city_inc',
            'Hawks Prairie School of Sta. Rosa Laguna Inc.' => 'bs_hawks_prairie_school_of_sta_rosa_laguna_inc',
            'Holy Rosary College of Sta. Rosa Laguna Inc.' => 'bs_holy_rosary_college_of_sta_rosa_laguna_inc',
            'HSOL School of Laguna' => 'bs_hsol_school_of_laguna',
            'Ignite Learning Center of Sta. Rosa Inc.' => 'bs_ignite_learning_center_of_sta_rosa_inc',
            'International Montessori School IMS Sta. Rosa Laguna' => 'bs_international_montessori_school_ims_sta_rosa_laguna',
            'Jesus the Exalted Name Full Gospel Ministries Inc. (School)' => 'bs_jesus_the_exalted_name_full_gospel_ministries_inc_school',
            'Jose Zavalla MES' => 'bs_jose_zavalla_mes',
            'Kainos Learning Institute Inc.' => 'bs_kainos_learning_institute_inc',
            'Kindertech of Uno Cevita Inc.' => 'bs_kindertech_of_uno_cevita_inc',
            'La Primera Eskwela Child Development Center' => 'bs_la_primera_eskwela_child_development_center',
            'Laguna Eastern Academy of Santa Rosa Inc.' => 'bs_laguna_eastern_academy_of_santa_rosa_inc',
            'Laguna Northwestern College-Corinthian Center' => 'bs_laguna_northwestern_college_corinthian_center',
            'Labas Elementary School' => 'bs_labas_es',
            'Labas Senior High School' => 'bs_labas_shs',
            'Lakeside Early Academic Development (LEAD) Christian School' => 'bs_lakeside_early_academic_development_lead_christian_school',
            'Learning Ladder Child Development Center' => 'bs_learning_ladder_child_development_center',
            'Macabling Elementary School' => 'bs_macabling_es',
            'Malitlit Elementary School' => 'bs_malitlit_es',
            'Maranatha Christian Academy of Sta. Rosa Inc.' => 'bs_maranatha_christian_academy_of_sta_rosa_inc',
            'Maranatha Living Hope Academy Inc.' => 'bs_maranatha_living_hope_academy_inc',
            'Marie Margarette School Inc.' => 'bs_marie_margarette_school_inc',
            'Mary Immaculate Academy of Sta. Rosa Inc.' => 'bs_mary_immaculate_academy_of_sta_rosa_inc',
            'Meridian Educational Institution Inc.' => 'bs_meridian_educational_institution_inc',
            'Mt. Rushmore Academy of Laguna Inc.' => 'bs_mt_rushmore_academy_of_laguna_inc',
            'New Sinai School & Colleges of Sta. Rosa' => 'bs_new_sinai_school_colleges_of_sta_rosa',
            'Our Lady in Pink and Blue School Inc.' => 'bs_our_lady_in_pink_and_blue_school_inc',
            'Our Lady of Assumption College of Laguna Inc.' => 'bs_our_lady_of_assumption_college_of_laguna_inc',
            'Our Lady of Fatima University-Laguna' => 'bs_our_lady_of_fatima_university_laguna',
            'Our Lady of Pilar Academy of Sta. Rosa Laguna Inc.' => 'bs_our_lady_of_pilar_academy_of_sta_rosa_laguna_inc',
            'Panorama Montessori School Inc.' => 'bs_panorama_montessori_school_inc',
            'Philippine Technological Institute of Science Arts and Trade-Central Inc.' => 'bs_ptisat_inc',
            'Plica Learning Center Inc.' => 'bs_plica_learning_center_inc',
            'Pulong Sta. Cruz Elementary School' => 'bs_pulong_sta_cruz_es',
            'Pulong Sta. Cruz National High School' => 'bs_pulong_sta_cruz_nhs',
            'Precious Treasures Christian School of Cabuyao Inc' => 'bs_precious_treasures_christian_school_of_cabuyao_inc',
            'Princeton Academy Inc. (GardenVillas)' => 'bs_princeton_academy_inc_gardenvillas',
            'Princeton Academy Inc. (Paseo)' => 'bs_princeton_academy_inc_paseo',
            'Queen Anne School of Sta. Rosa Inc' => 'bs_queen_anne_school_of_sta_rosa_inc',
            'Saint Francis of Assisi College' => 'bs_saint_francis_of_assisi_college',
            'Saint Ruiz Montessori School' => 'bs_saint_ruiz_montessori_school',
            'Saint Theodore Holy Family School OPC' => 'bs_saint_theodore_holy_family_school_opc',
            'Saints Peter & Paul Early Childhood Center' => 'bs_saints_peter_paul_early_childhood_center',
            'San Geronimo Emiliani School of Sta Rosa' => 'bs_san_geronimo_emiliani_school_of_sta_rosa',
            'San Lorenzo Christian School' => 'bs_san_lorenzo_christian_school',
            'San Lorenzo Rhythm Academy of Learning Inc.' => 'bs_san_lorenzo_rhythm_academy_of_learning_inc',
            'Santa Rosa Educational Institution Inc.' => 'bs_santa_rosa_educational_institution_inc',
            'Santa Rosa Laguna Christian School (SANROLACS)' => 'bs_santa_rosa_laguna_christian_school_sanrolacs',
            'Santa Rosa Science & Technology High School' => 'bs_santa_rosa_science_technology_hs',
            'Seven Pillars Catholic School' => 'bs_seven_pillars_catholic_school',
            'Shepherd of Faith SPED Center Inc.' => 'bs_shepherd_of_faith_sped_center_inc',
            'Sinalhan Elementary School' => 'bs_sinalhan_es',
            'Sinalhan Integrated High School' => 'bs_sinalhan_integrated_hs',
            // Add more schools here
        ];

        // Determine the table names based on dose_id and school
        $dose_table = isset($dose_table_mappings[$dose_id]) ? $dose_table_mappings[$dose_id] : null;
        $school_table = isset($school_table_mappings[$school]) ? $school_table_mappings[$school] : null;

    


        // Check if valid dose table and school table were found
        if ($dose_table && $school_table) {
            // Insert data into the appropriate dose and school tables
            $dose_sql = "INSERT INTO $dose_table (id, FirstName, LastName, Age, Gender, School, vaccine_id, dose_id, submitted_at, status)
                         VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$school', '$vaccine_id', '$dose_id', NOW(), 'Pending')";
            $school_sql = "INSERT INTO $school_table (id, FirstName, LastName, Age, Gender, School, vaccine_id, dose_id, submitted_at, status)
                          VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$school', '$vaccine_id', '$dose_id', NOW(), 'Pending')";

            if ($conn->query($dose_sql) === TRUE && $conn->query($school_sql) === TRUE) {
                echo "New record created successfully in $dose_table and $school_table tables.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Invalid dose_id or school.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Invalid vaccine_id.";
}

$conn->close();
?>
