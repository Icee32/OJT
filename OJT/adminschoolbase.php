<?php 
include 'api/school-get.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname1 = "starosaschoolforms";
    
    // Create connections
    $conn1 = new mysqli($servername, $username, $password, $dbname1);
    
    // Check connections
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }
    // Queries to get the data
    $sqlTotalFormsSubmitted = "SELECT COUNT(*) as totalFormsSubmitted FROM users ";
    $sqlTotal9to15 = "SELECT COUNT(*) as total9to15 FROM users WHERE age BETWEEN 9 AND 15";
    $sqlTotal16to20 = "SELECT COUNT(*) as total16to20 FROM users WHERE age BETWEEN 16 AND 20";
    $sqlTotal21to59 = "SELECT COUNT(*) as total21to59 FROM users WHERE age BETWEEN 21 AND 59";
    $sqlTotal60plus = "SELECT COUNT(*) as total60plus FROM users Where age >= 60";
    $sqlTotalMales = "SELECT COUNT(*)  as totalMales FROM users WHERE gender = 'male'";
    $sqlTotalFemales = "SELECT COUNT(*) as totalFemales FROM users WHERE gender = 'female'";
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

   // Queries to get the count of users for each school
    $sqlAcaciaFoundationSchool = "SELECT COUNT(*) as totalAcaciaFoundationSchool FROM bs_acacia_foundation_school";
    $sqlAcademiaDeMariaElenaInc = "SELECT COUNT(*) as totalAcademiaDeMariaElenaInc FROM bs_academia_de_maria_elena_inc";
    $sqlAchieversHeartOfKnowledgeMontessoriInc = "SELECT COUNT(*) as totalAchieversHeartOfKnowledgeMontessoriInc FROM bs_achievers_heart_of_knowledge_montessori_inc";
    $sqlAplayaES = "SELECT COUNT(*) as totalAplayaES FROM bs_aplaya_es";
    $sqlAplayaNationalHS = "SELECT COUNT(*) as totalAplayaNationalHS FROM bs_aplaya_national_hs";
    $sqlAplayaNHSAnnex1Apex = "SELECT COUNT(*) as totalAplayaNHSAnnex1Apex FROM bs_aplaya_nhs_annex_1_apex";
    $sqlAsiaTechnologicalSchoolOfScienceAndArts = "SELECT COUNT(*) as totalAsiaTechnologicalSchoolOfScienceAndArts FROM bs_asia_technological_school_of_science_and_arts";
    $sqlBalibagoES = "SELECT COUNT(*) as totalBalibagoES FROM bs_balibago_es";
    $sqlBalibagoIntegratedHS = "SELECT COUNT(*) as totalBalibagoIntegratedHS FROM bs_balibago_integrated_hs";
    $sqlBlessedChristianSchoolDeStaRosaInc = "SELECT COUNT(*) as totalBlessedChristianSchoolDeStaRosaInc FROM bs_blessed_christian_school_de_sta_rosa_inc";
    $sqlBrightonDomeAcademicCenterInc = "SELECT COUNT(*) as totalBrightonDomeAcademicCenterInc FROM bs_brighton_dome_academic_center_inc";
    $sqlBuildUpChristianSchoolInc = "SELECT COUNT(*) as totalBuildUpChristianSchoolInc FROM bs_build_up_christian_school_inc";
    $sqlCainginES = "SELECT COUNT(*) as totalCainginES FROM bs_caingin_es";
    $sqlCanossaSchoolInc = "SELECT COUNT(*) as totalCanossaSchoolInc FROM bs_canossa_school_inc";
    $sqlCasaDelNinoMontessoriSchoolSanLorenzoInc = "SELECT COUNT(*) as totalCasaDelNinoMontessoriSchoolSanLorenzoInc FROM bs_casa_del_nino_montessori_school_san_lorenzo_inc";
    $sqlChairOfStPeterSchool = "SELECT COUNT(*) as totalChairOfStPeterSchool FROM bs_chair_of_st_peter_school";
    $sqlChildFormationCenterOfStaRosaInc = "SELECT COUNT(*) as totalChildFormationCenterOfStaRosaInc FROM bs_child_formation_center_of_sta_rosa_inc";
    $sqlCitiGlobalCollegeInc = "SELECT COUNT(*) as totalCitiGlobalCollegeInc FROM bs_citi_global_college_inc";
    $sqlCOLCLearningAcademyInc = "SELECT COUNT(*) as totalCOLCLearningAcademyInc FROM bs_colc_learning_academy_inc";
    $sqlColegioDeStaRosaDeLimaInc = "SELECT COUNT(*) as totalColegioDeStaRosaDeLimaInc FROM bs_colegio_de_sta_rosa_de_lima_inc";
    $sqlContezzaLearningCenterInc = "SELECT COUNT(*) as totalContezzaLearningCenterInc FROM bs_contezza_learning_center_inc";
    $sqlDetorresChristianSchoolInc = "SELECT COUNT(*) as totalDetorresChristianSchoolInc FROM bs_detorres_christian_school_inc";
    $sqlDilaES = "SELECT COUNT(*) as totalDilaES FROM bs_dila_es";
    $sqlDitaES = "SELECT COUNT(*) as totalDitaES FROM bs_dita_es";
    $sqlDolceMalluchAcademe = "SELECT COUNT(*) as totalDolceMalluchAcademe FROM bs_dolce_malluch_academe";
    $sqlDominicanCollegeOfStaRosaLagunaInc = "SELECT COUNT(*) as totalDominicanCollegeOfStaRosaLagunaInc FROM bs_dominican_college_of_sta_rosa_laguna_inc";
    $sqlDonJoseES = "SELECT COUNT(*) as totalDonJoseES FROM bs_don_jose_es";
    $sqlDonJoseIntegratedHS = "SELECT COUNT(*) as totalDonJoseIntegratedHS FROM bs_don_jose_integrated_hs";
    $sqlElohimChristianSchool = "SELECT COUNT(*) as totalElohimChristianSchool FROM bs_elohim_christian_school";
    $sqlEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex = "SELECT COUNT(*) as totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex FROM bs_emmanuels_christian_school_of_santa_rosa_laguna_inc_annex";
    $sqlEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain = "SELECT COUNT(*) as totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain FROM bs_emmanuels_christian_school_of_santa_rosa_laguna_inc_main";
    $sqlFaithfulGraceChristianSchoolOfStaRosaInc = "SELECT COUNT(*) as totalFaithfulGraceChristianSchoolOfStaRosaInc FROM bs_faithful_grace_christian_school_of_sta_rosa_inc";
    $sqlFaithlifeAcademyIncAnnex = "SELECT COUNT(*) as totalFaithlifeAcademyIncAnnex FROM bs_faithlife_academy_inc_annex";
    $sqlFaithlifeAcademyIncTagapo = "SELECT COUNT(*) as totalFaithlifeAcademyIncTagapo FROM bs_faithlife_academy_inc_tagapo";
    $sqlFullLifeSchoolForTheDeafInc = "SELECT COUNT(*) as totalFullLifeSchoolForTheDeafInc FROM bs_full_life_school_for_the_deaf_inc";
    $sqlGraceInc = "SELECT COUNT(*) as totalGraceInc FROM bs_grace_inc";
    $sqlGreenFieldsIntegratedSchoolOfLagunaInc = "SELECT COUNT(*) as totalGreenFieldsIntegratedSchoolOfLagunaInc FROM bs_green_fields_integrated_school_of_laguna_inc";
    $sqlHarvestersBaptistAcademyOfStaRosaCityInc = "SELECT COUNT(*) as totalHarvestersBaptistAcademyOfStaRosaCityInc FROM bs_harvesters_baptist_academy_of_sta_rosa_city_inc";
    $sqlHawksPrairieSchoolOfStaRosaLagunaInc = "SELECT COUNT(*) as totalHawksPrairieSchoolOfStaRosaLagunaInc FROM bs_hawks_prairie_school_of_sta_rosa_laguna_inc";
    $sqlHolyRosaryCollegeOfStaRosaLagunaInc = "SELECT COUNT(*) as totalHolyRosaryCollegeOfStaRosaLagunaInc FROM bs_holy_rosary_college_of_sta_rosa_laguna_inc";
    $sqlHSOLSchoolOfLaguna = "SELECT COUNT(*) as totalHSOLSchoolOfLaguna FROM bs_hsol_school_of_laguna";
    $sqlIgniteLearningCenterOfStaRosaInc = "SELECT COUNT(*) as totalIgniteLearningCenterOfStaRosaInc FROM bs_ignite_learning_center_of_sta_rosa_inc";
    $sqlInternationalMontessoriSchoolIMSSantaRosaLaguna = "SELECT COUNT(*) as totalInternationalMontessoriSchoolIMSSantaRosaLaguna FROM bs_international_montessori_school_ims_sta_rosa_laguna";
    $sqlJesusTheExaltedNameFullGospelMinistriesIncSchool = "SELECT COUNT(*) as totalJesusTheExaltedNameFullGospelMinistriesIncSchool FROM bs_jesus_the_exalted_name_full_gospel_ministries_inc_school";
    $sqlJoseZavallaMES = "SELECT COUNT(*) as totalJoseZavallaMES FROM bs_jose_zavalla_mes";
    $sqlKainosLearningInstituteInc = "SELECT COUNT(*) as totalKainosLearningInstituteInc FROM bs_kainos_learning_institute_inc";
    $sqlKindertechOfUnoCevitaInc = "SELECT COUNT(*) as totalKindertechOfUnoCevitaInc FROM bs_kindertech_of_uno_cevita_inc";
    $sqlLabasES = "SELECT COUNT(*) as totalLabasES FROM bs_labas_es";
    $sqlLabasSHS = "SELECT COUNT(*) as totalLabasSHS FROM bs_labas_shs";
    $sqlLagunaEasternAcademyOfSantaRosaInc = "SELECT COUNT(*) as totalLagunaEasternAcademyOfSantaRosaInc FROM bs_laguna_eastern_academy_of_santa_rosa_inc";
    $sqlLagunaNorthwesternCollegeCorinthianCenter = "SELECT COUNT(*) as totalLagunaNorthwesternCollegeCorinthianCenter FROM bs_laguna_northwestern_college_corinthian_center";
    $sqlLakesideEarlyAcademicDevelopmentLeadChristianSchool = "SELECT COUNT(*) as totalLakesideEarlyAcademicDevelopmentLeadChristianSchool FROM bs_lakeside_early_academic_development_lead_christian_school";
    $sqlLaPrimeraEskwelaChildDevelopmentCenter = "SELECT COUNT(*) as totalLaPrimeraEskwelaChildDevelopmentCenter FROM bs_la_primera_eskwela_child_development_center";
    $sqlLearningLadderChildDevelopmentCenter = "SELECT COUNT(*) as totalLearningLadderChildDevelopmentCenter FROM bs_learning_ladder_child_development_center";
    $sqlMacablingES = "SELECT COUNT(*) as totalMacablingES FROM bs_macabling_es";
    $sqlMalitlitES = "SELECT COUNT(*) as totalMalitlitES FROM bs_malitlit_es";
    $sqlMaranathaChristianAcademyOfStaRosaInc = "SELECT COUNT(*) as totalMaranathaChristianAcademyOfStaRosaInc FROM bs_maranatha_christian_academy_of_sta_rosa_inc";
    $sqlMaranathaLivingHopeAcademyInc = "SELECT COUNT(*) as totalMaranathaLivingHopeAcademyInc FROM bs_maranatha_living_hope_academy_inc";
    $sqlMarieMargaretteSchoolInc = "SELECT COUNT(*) as totalMarieMargaretteSchoolInc FROM bs_marie_margarette_school_inc";
    $sqlMaryImmaculateAcademyOfStaRosaInc = "SELECT COUNT(*) as totalMaryImmaculateAcademyOfStaRosaInc FROM bs_mary_immaculate_academy_of_sta_rosa_inc";
    $sqlMeridianEducationalInstitutionInc = "SELECT COUNT(*) as totalMeridianEducationalInstitutionInc FROM bs_meridian_educational_institution_inc";
    $sqlMtRushmoreAcademyOfLagunaInc = "SELECT COUNT(*) as totalMtRushmoreAcademyOfLagunaInc FROM bs_mt_rushmore_academy_of_laguna_inc";
    $sqlNewSinaiSchoolCollegesOfStaRosa = "SELECT COUNT(*) as totalNewSinaiSchoolCollegesOfStaRosa FROM bs_new_sinai_school_colleges_of_sta_rosa";
    $sqlOurLadyInPinkAndBlueSchoolInc = "SELECT COUNT(*) as totalOurLadyInPinkAndBlueSchoolInc FROM bs_our_lady_in_pink_and_blue_school_inc";
    $sqlOurLadyOfAssumptionCollegeOfLagunaInc = "SELECT COUNT(*) as totalOurLadyOfAssumptionCollegeOfLagunaInc FROM bs_our_lady_of_assumption_college_of_laguna_inc";
    $sqlOurLadyOfFatimaUniversityLaguna = "SELECT COUNT(*) as totalOurLadyOfFatimaUniversityLaguna FROM bs_our_lady_of_fatima_university_laguna";
    $sqlOurLadyOfPilarAcademyOfStaRosaLagunaInc = "SELECT COUNT(*) as totalOurLadyOfPilarAcademyOfStaRosaLagunaInc FROM bs_our_lady_of_pilar_academy_of_sta_rosa_laguna_inc";
    $sqlPanoramaMontessoriSchoolInc = "SELECT COUNT(*) as totalPanoramaMontessoriSchoolInc FROM bs_panorama_montessori_school_inc";
    $sqlPlicaLearningCenterInc = "SELECT COUNT(*) as totalPlicaLearningCenterInc FROM bs_plica_learning_center_inc";
    $sqlPreciousTreasuresChristianSchoolOfCabuyaoInc = "SELECT COUNT(*) as totalPreciousTreasuresChristianSchoolOfCabuyaoInc FROM bs_precious_treasures_christian_school_of_cabuyao_inc";
    $sqlPrincetonAcademyIncGardenvillas = "SELECT COUNT(*) as totalPrincetonAcademyIncGardenvillas FROM bs_princeton_academy_inc_gardenvillas";
    $sqlPrincetonAcademyIncPaseo = "SELECT COUNT(*) as totalPrincetonAcademyIncPaseo FROM bs_princeton_academy_inc_paseo";
    $sqlPTISATInc = "SELECT COUNT(*) as totalPTISATInc FROM bs_ptisat_inc";
    $sqlPulongStaCruzES = "SELECT COUNT(*) as totalPulongStaCruzES FROM bs_pulong_sta_cruz_es";
    $sqlPulongStaCruzNHS = "SELECT COUNT(*) as totalPulongStaCruzNHS FROM bs_pulong_sta_cruz_nhs";
    $sqlQueenAnneSchoolOfStaRosaInc = "SELECT COUNT(*) as totalQueenAnneSchoolOfStaRosaInc FROM bs_queen_anne_school_of_sta_rosa_inc";
    $sqlSaintsPeterPaulEarlyChildhoodCenter = "SELECT COUNT(*) as totalSaintsPeterPaulEarlyChildhoodCenter FROM bs_saints_peter_paul_early_childhood_center";
    $sqlSaintFrancisOfAssisiCollege = "SELECT COUNT(*) as totalSaintFrancisOfAssisiCollege FROM bs_saint_francis_of_assisi_college";
    $sqlSaintRuizMontessoriSchool = "SELECT COUNT(*) as totalSaintRuizMontessoriSchool FROM bs_saint_ruiz_montessori_school";
    $sqlSaintTheodoreHolyFamilySchoolOPC = "SELECT COUNT(*) as totalSaintTheodoreHolyFamilySchoolOPC FROM bs_saint_theodore_holy_family_school_opc";
    $sqlSantaRosaEducationalInstitutionInc = "SELECT COUNT(*) as totalSantaRosaEducationalInstitutionInc FROM bs_santa_rosa_educational_institution_inc";
    $sqlSantaRosaLagunaChristianSchoolSANROLACS = "SELECT COUNT(*) as totalSantaRosaLagunaChristianSchoolSANROLACS FROM bs_santa_rosa_laguna_christian_school_sanrolacs";
    $sqlSantaRosaScienceTechnologyHS = "SELECT COUNT(*) as totalSantaRosaScienceTechnologyHS FROM bs_santa_rosa_science_technology_hs";
    $sqlSanGeronimoEmilianiSchoolOfStaRosa = "SELECT COUNT(*) as totalSanGeronimoEmilianiSchoolOfStaRosa FROM bs_san_geronimo_emiliani_school_of_sta_rosa";
    $sqlSanLorenzoChristianSchool = "SELECT COUNT(*) as totalSanLorenzoChristianSchool FROM bs_san_lorenzo_christian_school";
    $sqlSanLorenzoRhythmAcademyOfLearningInc = "SELECT COUNT(*) as totalSanLorenzoRhythmAcademyOfLearningInc FROM bs_san_lorenzo_rhythm_academy_of_learning_inc";
    $sqlSevenPillarsCatholicSchool = "SELECT COUNT(*) as totalSevenPillarsCatholicSchool FROM bs_seven_pillars_catholic_school";
    $sqlShepherdOfFaithSPEDCenterInc = "SELECT COUNT(*) as totalShepherdOfFaithSPEDCenterInc FROM bs_shepherd_of_faith_sped_center_inc";
    $sqlSinalhanES = "SELECT COUNT(*) as totalSinalhanES FROM bs_sinalhan_es";
    $sqlSinalhanIntegratedHS = "SELECT COUNT(*) as totalSinalhanIntegratedHS FROM bs_sinalhan_integrated_hs";

    // Execute queries
    $resultAcaciaFoundationSchool = $conn->query($sqlAcaciaFoundationSchool);
    $resultAcademiaDeMariaElenaInc = $conn->query($sqlAcademiaDeMariaElenaInc);
    $resultAchieversHeartOfKnowledgeMontessoriInc = $conn->query($sqlAchieversHeartOfKnowledgeMontessoriInc);
    $resultAplayaES = $conn->query($sqlAplayaES);
    $resultAplayaNationalHS = $conn->query($sqlAplayaNationalHS);
    $resultAplayaNHSAnnex1Apex = $conn->query($sqlAplayaNHSAnnex1Apex);
    $resultAsiaTechnologicalSchoolOfScienceAndArts = $conn->query($sqlAsiaTechnologicalSchoolOfScienceAndArts);
    $resultBalibagoES = $conn->query($sqlBalibagoES);
    $resultBalibagoIntegratedHS = $conn->query($sqlBalibagoIntegratedHS);
    $resultBlessedChristianSchoolDeStaRosaInc = $conn->query($sqlBlessedChristianSchoolDeStaRosaInc);
    $resultBrightonDomeAcademicCenterInc = $conn->query($sqlBrightonDomeAcademicCenterInc);
    $resultBuildUpChristianSchoolInc = $conn->query($sqlBuildUpChristianSchoolInc);
    $resultCainginES = $conn->query($sqlCainginES);
    $resultCanossaSchoolInc = $conn->query($sqlCanossaSchoolInc);
    $resultCasaDelNinoMontessoriSchoolSanLorenzoInc = $conn->query($sqlCasaDelNinoMontessoriSchoolSanLorenzoInc);
    $resultChairOfStPeterSchool = $conn->query($sqlChairOfStPeterSchool);
    $resultChildFormationCenterOfStaRosaInc = $conn->query($sqlChildFormationCenterOfStaRosaInc);
    $resultCitiGlobalCollegeInc = $conn->query($sqlCitiGlobalCollegeInc);
    $resultCOLCLearningAcademyInc = $conn->query($sqlCOLCLearningAcademyInc);
    $resultColegioDeStaRosaDeLimaInc = $conn->query($sqlColegioDeStaRosaDeLimaInc);
    $resultContezzaLearningCenterInc = $conn->query($sqlContezzaLearningCenterInc);
    $resultDetorresChristianSchoolInc = $conn->query($sqlDetorresChristianSchoolInc);
    $resultDilaES = $conn->query($sqlDilaES);
    $resultDitaES = $conn->query($sqlDitaES);
    $resultDolceMalluchAcademe = $conn->query($sqlDolceMalluchAcademe);
    $resultDominicanCollegeOfStaRosaLagunaInc = $conn->query($sqlDominicanCollegeOfStaRosaLagunaInc);
    $resultDonJoseES = $conn->query($sqlDonJoseES);
    $resultDonJoseIntegratedHS = $conn->query($sqlDonJoseIntegratedHS);
    $resultElohimChristianSchool = $conn->query($sqlElohimChristianSchool);
    $resultEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex = $conn->query($sqlEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex);
    $resultEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain = $conn->query($sqlEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain);
    $resultFaithfulGraceChristianSchoolOfStaRosaInc = $conn->query($sqlFaithfulGraceChristianSchoolOfStaRosaInc);
    $resultFaithlifeAcademyIncAnnex = $conn->query($sqlFaithlifeAcademyIncAnnex);
    $resultFaithlifeAcademyIncTagapo = $conn->query($sqlFaithlifeAcademyIncTagapo);
    $resultFullLifeSchoolForTheDeafInc = $conn->query($sqlFullLifeSchoolForTheDeafInc);
    $resultGraceInc = $conn->query($sqlGraceInc);
    $resultGreenFieldsIntegratedSchoolOfLagunaInc = $conn->query($sqlGreenFieldsIntegratedSchoolOfLagunaInc);
    $resultHarvestersBaptistAcademyOfStaRosaCityInc = $conn->query($sqlHarvestersBaptistAcademyOfStaRosaCityInc);
    $resultHawksPrairieSchoolOfStaRosaLagunaInc = $conn->query($sqlHawksPrairieSchoolOfStaRosaLagunaInc);
    $resultHolyRosaryCollegeOfStaRosaLagunaInc = $conn->query($sqlHolyRosaryCollegeOfStaRosaLagunaInc);
    $resultHSOLSchoolOfLaguna = $conn->query($sqlHSOLSchoolOfLaguna);
    $resultIgniteLearningCenterOfStaRosaInc = $conn->query($sqlIgniteLearningCenterOfStaRosaInc);
    $resultInternationalMontessoriSchoolIMSSantaRosaLaguna = $conn->query($sqlInternationalMontessoriSchoolIMSSantaRosaLaguna);
    $resultJesusTheExaltedNameFullGospelMinistriesIncSchool = $conn->query($sqlJesusTheExaltedNameFullGospelMinistriesIncSchool);
    $resultJoseZavallaMES = $conn->query($sqlJoseZavallaMES);
    $resultKainosLearningInstituteInc = $conn->query($sqlKainosLearningInstituteInc);
    $resultKindertechOfUnoCevitaInc = $conn->query($sqlKindertechOfUnoCevitaInc);
    $resultLabasES = $conn->query($sqlLabasES);
    $resultLabasSHS = $conn->query($sqlLabasSHS);
    $resultLagunaEasternAcademyOfSantaRosaInc = $conn->query($sqlLagunaEasternAcademyOfSantaRosaInc);
    $resultLagunaNorthwesternCollegeCorinthianCenter = $conn->query($sqlLagunaNorthwesternCollegeCorinthianCenter);
    $resultLakesideEarlyAcademicDevelopmentLeadChristianSchool = $conn->query($sqlLakesideEarlyAcademicDevelopmentLeadChristianSchool);
    $resultLaPrimeraEskwelaChildDevelopmentCenter = $conn->query($sqlLaPrimeraEskwelaChildDevelopmentCenter);
    $resultLearningLadderChildDevelopmentCenter = $conn->query($sqlLearningLadderChildDevelopmentCenter);
    $resultMacablingES = $conn->query($sqlMacablingES);
    $resultMalitlitES = $conn->query($sqlMalitlitES);
    $resultMaranathaChristianAcademyOfStaRosaInc = $conn->query($sqlMaranathaChristianAcademyOfStaRosaInc);
    $resultMaranathaLivingHopeAcademyInc = $conn->query($sqlMaranathaLivingHopeAcademyInc);
    $resultMarieMargaretteSchoolInc = $conn->query($sqlMarieMargaretteSchoolInc);
    $resultMaryImmaculateAcademyOfStaRosaInc = $conn->query($sqlMaryImmaculateAcademyOfStaRosaInc);
    $resultMeridianEducationalInstitutionInc = $conn->query($sqlMeridianEducationalInstitutionInc);
    $resultMtRushmoreAcademyOfLagunaInc = $conn->query($sqlMtRushmoreAcademyOfLagunaInc);
    $resultNewSinaiSchoolCollegesOfStaRosa = $conn->query($sqlNewSinaiSchoolCollegesOfStaRosa);
    $resultOurLadyInPinkAndBlueSchoolInc = $conn->query($sqlOurLadyInPinkAndBlueSchoolInc);
    $resultOurLadyOfAssumptionCollegeOfLagunaInc = $conn->query($sqlOurLadyOfAssumptionCollegeOfLagunaInc);
    $resultOurLadyOfFatimaUniversityLaguna = $conn->query($sqlOurLadyOfFatimaUniversityLaguna);
    $resultOurLadyOfPilarAcademyOfStaRosaLagunaInc = $conn->query($sqlOurLadyOfPilarAcademyOfStaRosaLagunaInc);
    $resultPanoramaMontessoriSchoolInc = $conn->query($sqlPanoramaMontessoriSchoolInc);
    $resultPlicaLearningCenterInc = $conn->query($sqlPlicaLearningCenterInc);
    $resultPreciousTreasuresChristianSchoolOfCabuyaoInc = $conn->query($sqlPreciousTreasuresChristianSchoolOfCabuyaoInc);
    $resultPrincetonAcademyIncGardenvillas = $conn->query($sqlPrincetonAcademyIncGardenvillas);
    $resultPrincetonAcademyIncPaseo = $conn->query($sqlPrincetonAcademyIncPaseo);
    $resultPTISATInc = $conn->query($sqlPTISATInc);
    $resultPulongStaCruzES = $conn->query($sqlPulongStaCruzES);
    $resultPulongStaCruzNHS = $conn->query($sqlPulongStaCruzNHS);
    $resultQueenAnneSchoolOfStaRosaInc = $conn->query($sqlQueenAnneSchoolOfStaRosaInc);
    $resultSaintsPeterPaulEarlyChildhoodCenter = $conn->query($sqlSaintsPeterPaulEarlyChildhoodCenter);
    $resultSaintFrancisOfAssisiCollege = $conn->query($sqlSaintFrancisOfAssisiCollege);
    $resultSaintRuizMontessoriSchool = $conn->query($sqlSaintRuizMontessoriSchool);
    $resultSaintTheodoreHolyFamilySchoolOPC = $conn->query($sqlSaintTheodoreHolyFamilySchoolOPC);
    $resultSantaRosaEducationalInstitutionInc = $conn->query($sqlSantaRosaEducationalInstitutionInc);
    $resultSantaRosaLagunaChristianSchoolSANROLACS = $conn->query($sqlSantaRosaLagunaChristianSchoolSANROLACS);
    $resultSantaRosaScienceTechnologyHS = $conn->query($sqlSantaRosaScienceTechnologyHS);
    $resultSanGeronimoEmilianiSchoolOfStaRosa = $conn->query($sqlSanGeronimoEmilianiSchoolOfStaRosa);
    $resultSanLorenzoChristianSchool = $conn->query($sqlSanLorenzoChristianSchool);
    $resultSanLorenzoRhythmAcademyOfLearningInc = $conn->query($sqlSanLorenzoRhythmAcademyOfLearningInc);
    $resultSevenPillarsCatholicSchool = $conn->query($sqlSevenPillarsCatholicSchool);
    $resultShepherdOfFaithSPEDCenterInc = $conn->query($sqlShepherdOfFaithSPEDCenterInc);
    $resultSinalhanES = $conn->query($sqlSinalhanES);
    $resultSinalhanIntegratedHS = $conn->query($sqlSinalhanIntegratedHS);

    // Fetch results
    $totalAcaciaFoundationSchool = $resultAcaciaFoundationSchool->fetch_assoc()['totalAcaciaFoundationSchool'];
    $totalAcademiaDeMariaElenaInc = $resultAcademiaDeMariaElenaInc->fetch_assoc()['totalAcademiaDeMariaElenaInc'];
    $totalAchieversHeartOfKnowledgeMontessoriInc = $resultAchieversHeartOfKnowledgeMontessoriInc->fetch_assoc()['totalAchieversHeartOfKnowledgeMontessoriInc'];
    $totalAplayaES = $resultAplayaES->fetch_assoc()['totalAplayaES'];
    $totalAplayaNationalHS = $resultAplayaNationalHS->fetch_assoc()['totalAplayaNationalHS'];
    $totalAplayaNHSAnnex1Apex = $resultAplayaNHSAnnex1Apex->fetch_assoc()['totalAplayaNHSAnnex1Apex'];
    $totalAsiaTechnologicalSchoolOfScienceAndArts = $resultAsiaTechnologicalSchoolOfScienceAndArts->fetch_assoc()['totalAsiaTechnologicalSchoolOfScienceAndArts'];
    $totalBalibagoES = $resultBalibagoES->fetch_assoc()['totalBalibagoES'];
    $totalBalibagoIntegratedHS = $resultBalibagoIntegratedHS->fetch_assoc()['totalBalibagoIntegratedHS'];
    $totalBlessedChristianSchoolDeStaRosaInc = $resultBlessedChristianSchoolDeStaRosaInc->fetch_assoc()['totalBlessedChristianSchoolDeStaRosaInc'];
    $totalBrightonDomeAcademicCenterInc = $resultBrightonDomeAcademicCenterInc->fetch_assoc()['totalBrightonDomeAcademicCenterInc'];
    $totalBuildUpChristianSchoolInc = $resultBuildUpChristianSchoolInc->fetch_assoc()['totalBuildUpChristianSchoolInc'];
    $totalCainginES = $resultCainginES->fetch_assoc()['totalCainginES'];
    $totalCanossaSchoolInc = $resultCanossaSchoolInc->fetch_assoc()['totalCanossaSchoolInc'];
    $totalCasaDelNinoMontessoriSchoolSanLorenzoInc = $resultCasaDelNinoMontessoriSchoolSanLorenzoInc->fetch_assoc()['totalCasaDelNinoMontessoriSchoolSanLorenzoInc'];
    $totalChairOfStPeterSchool = $resultChairOfStPeterSchool->fetch_assoc()['totalChairOfStPeterSchool'];
    $totalChildFormationCenterOfStaRosaInc = $resultChildFormationCenterOfStaRosaInc->fetch_assoc()['totalChildFormationCenterOfStaRosaInc'];
    $totalCitiGlobalCollegeInc = $resultCitiGlobalCollegeInc->fetch_assoc()['totalCitiGlobalCollegeInc'];
    $totalCOLCLearningAcademyInc = $resultCOLCLearningAcademyInc->fetch_assoc()['totalCOLCLearningAcademyInc'];
    $totalColegioDeStaRosaDeLimaInc = $resultColegioDeStaRosaDeLimaInc->fetch_assoc()['totalColegioDeStaRosaDeLimaInc'];
    $totalContezzaLearningCenterInc = $resultContezzaLearningCenterInc->fetch_assoc()['totalContezzaLearningCenterInc'];
    $totalDetorresChristianSchoolInc = $resultDetorresChristianSchoolInc->fetch_assoc()['totalDetorresChristianSchoolInc'];
    $totalDilaES = $resultDilaES->fetch_assoc()['totalDilaES'];
    $totalDitaES = $resultDitaES->fetch_assoc()['totalDitaES'];
    $totalDolceMalluchAcademe = $resultDolceMalluchAcademe->fetch_assoc()['totalDolceMalluchAcademe'];
    $totalDominicanCollegeOfStaRosaLagunaInc = $resultDominicanCollegeOfStaRosaLagunaInc->fetch_assoc()['totalDominicanCollegeOfStaRosaLagunaInc'];
    $totalDonJoseES = $resultDonJoseES->fetch_assoc()['totalDonJoseES'];
    $totalDonJoseIntegratedHS = $resultDonJoseIntegratedHS->fetch_assoc()['totalDonJoseIntegratedHS'];
    $totalElohimChristianSchool = $resultElohimChristianSchool->fetch_assoc()['totalElohimChristianSchool'];
    $totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex = $resultEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex->fetch_assoc()['totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex'];
    $totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain = $resultEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain->fetch_assoc()['totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain'];
    $totalFaithfulGraceChristianSchoolOfStaRosaInc = $resultFaithfulGraceChristianSchoolOfStaRosaInc->fetch_assoc()['totalFaithfulGraceChristianSchoolOfStaRosaInc'];
    $totalFaithlifeAcademyIncAnnex = $resultFaithlifeAcademyIncAnnex->fetch_assoc()['totalFaithlifeAcademyIncAnnex'];
    $totalFaithlifeAcademyIncTagapo = $resultFaithlifeAcademyIncTagapo->fetch_assoc()['totalFaithlifeAcademyIncTagapo'];
    $totalFullLifeSchoolForTheDeafInc = $resultFullLifeSchoolForTheDeafInc->fetch_assoc()['totalFullLifeSchoolForTheDeafInc'];
    $totalGraceInc = $resultGraceInc->fetch_assoc()['totalGraceInc'];
    $totalGreenFieldsIntegratedSchoolOfLagunaInc = $resultGreenFieldsIntegratedSchoolOfLagunaInc->fetch_assoc()['totalGreenFieldsIntegratedSchoolOfLagunaInc'];
    $totalHarvestersBaptistAcademyOfStaRosaCityInc = $resultHarvestersBaptistAcademyOfStaRosaCityInc->fetch_assoc()['totalHarvestersBaptistAcademyOfStaRosaCityInc'];
    $totalHawksPrairieSchoolOfStaRosaLagunaInc = $resultHawksPrairieSchoolOfStaRosaLagunaInc->fetch_assoc()['totalHawksPrairieSchoolOfStaRosaLagunaInc'];
    $totalHolyRosaryCollegeOfStaRosaLagunaInc = $resultHolyRosaryCollegeOfStaRosaLagunaInc->fetch_assoc()['totalHolyRosaryCollegeOfStaRosaLagunaInc'];
    $totalHSOLSchoolOfLaguna = $resultHSOLSchoolOfLaguna->fetch_assoc()['totalHSOLSchoolOfLaguna'];
    $totalIgniteLearningCenterOfStaRosaInc = $resultIgniteLearningCenterOfStaRosaInc->fetch_assoc()['totalIgniteLearningCenterOfStaRosaInc'];
    $totalInternationalMontessoriSchoolIMSSantaRosaLaguna = $resultInternationalMontessoriSchoolIMSSantaRosaLaguna->fetch_assoc()['totalInternationalMontessoriSchoolIMSSantaRosaLaguna'];
    $totalJesusTheExaltedNameFullGospelMinistriesIncSchool = $resultJesusTheExaltedNameFullGospelMinistriesIncSchool->fetch_assoc()['totalJesusTheExaltedNameFullGospelMinistriesIncSchool'];
    $totalJoseZavallaMES = $resultJoseZavallaMES->fetch_assoc()['totalJoseZavallaMES'];
    $totalKainosLearningInstituteInc = $resultKainosLearningInstituteInc->fetch_assoc()['totalKainosLearningInstituteInc'];
    $totalKindertechOfUnoCevitaInc = $resultKindertechOfUnoCevitaInc->fetch_assoc()['totalKindertechOfUnoCevitaInc'];
    $totalLabasES = $resultLabasES->fetch_assoc()['totalLabasES'];
    $totalLabasSHS = $resultLabasSHS->fetch_assoc()['totalLabasSHS'];
    $totalLagunaEasternAcademyOfSantaRosaInc = $resultLagunaEasternAcademyOfSantaRosaInc->fetch_assoc()['totalLagunaEasternAcademyOfSantaRosaInc'];
    $totalLagunaNorthwesternCollegeCorinthianCenter = $resultLagunaNorthwesternCollegeCorinthianCenter->fetch_assoc()['totalLagunaNorthwesternCollegeCorinthianCenter'];
    $totalLakesideEarlyAcademicDevelopmentLeadChristianSchool = $resultLakesideEarlyAcademicDevelopmentLeadChristianSchool->fetch_assoc()['totalLakesideEarlyAcademicDevelopmentLeadChristianSchool'];
    $totalLaPrimeraEskwelaChildDevelopmentCenter = $resultLaPrimeraEskwelaChildDevelopmentCenter->fetch_assoc()['totalLaPrimeraEskwelaChildDevelopmentCenter'];
    $totalLearningLadderChildDevelopmentCenter = $resultLearningLadderChildDevelopmentCenter->fetch_assoc()['totalLearningLadderChildDevelopmentCenter'];
    $totalMacablingES = $resultMacablingES->fetch_assoc()['totalMacablingES'];
    $totalMalitlitES = $resultMalitlitES->fetch_assoc()['totalMalitlitES'];
    $totalMaranathaChristianAcademyOfStaRosaInc = $resultMaranathaChristianAcademyOfStaRosaInc->fetch_assoc()['totalMaranathaChristianAcademyOfStaRosaInc'];
    $totalMaranathaLivingHopeAcademyInc = $resultMaranathaLivingHopeAcademyInc->fetch_assoc()['totalMaranathaLivingHopeAcademyInc'];
    $totalMarieMargaretteSchoolInc = $resultMarieMargaretteSchoolInc->fetch_assoc()['totalMarieMargaretteSchoolInc'];
    $totalMaryImmaculateAcademyOfStaRosaInc = $resultMaryImmaculateAcademyOfStaRosaInc->fetch_assoc()['totalMaryImmaculateAcademyOfStaRosaInc'];
    $totalMeridianEducationalInstitutionInc = $resultMeridianEducationalInstitutionInc->fetch_assoc()['totalMeridianEducationalInstitutionInc'];
    $totalMtRushmoreAcademyOfLagunaInc = $resultMtRushmoreAcademyOfLagunaInc->fetch_assoc()['totalMtRushmoreAcademyOfLagunaInc'];
    $totalNewSinaiSchoolCollegesOfStaRosa = $resultNewSinaiSchoolCollegesOfStaRosa->fetch_assoc()['totalNewSinaiSchoolCollegesOfStaRosa'];
    $totalOurLadyInPinkAndBlueSchoolInc = $resultOurLadyInPinkAndBlueSchoolInc->fetch_assoc()['totalOurLadyInPinkAndBlueSchoolInc'];
    $totalOurLadyOfAssumptionCollegeOfLagunaInc = $resultOurLadyOfAssumptionCollegeOfLagunaInc->fetch_assoc()['totalOurLadyOfAssumptionCollegeOfLagunaInc'];
    $totalOurLadyOfFatimaUniversityLaguna = $resultOurLadyOfFatimaUniversityLaguna->fetch_assoc()['totalOurLadyOfFatimaUniversityLaguna'];
    $totalOurLadyOfPilarAcademyOfStaRosaLagunaInc = $resultOurLadyOfPilarAcademyOfStaRosaLagunaInc->fetch_assoc()['totalOurLadyOfPilarAcademyOfStaRosaLagunaInc'];
    $totalPanoramaMontessoriSchoolInc = $resultPanoramaMontessoriSchoolInc->fetch_assoc()['totalPanoramaMontessoriSchoolInc'];
    $totalPlicaLearningCenterInc = $resultPlicaLearningCenterInc->fetch_assoc()['totalPlicaLearningCenterInc'];
    $totalPreciousTreasuresChristianSchoolOfCabuyaoInc = $resultPreciousTreasuresChristianSchoolOfCabuyaoInc->fetch_assoc()['totalPreciousTreasuresChristianSchoolOfCabuyaoInc'];
    $totalPrincetonAcademyIncGardenvillas = $resultPrincetonAcademyIncGardenvillas->fetch_assoc()['totalPrincetonAcademyIncGardenvillas'];
    $totalPrincetonAcademyIncPaseo = $resultPrincetonAcademyIncPaseo->fetch_assoc()['totalPrincetonAcademyIncPaseo'];
    $totalPTISATInc = $resultPTISATInc->fetch_assoc()['totalPTISATInc'];
    $totalPulongStaCruzES = $resultPulongStaCruzES->fetch_assoc()['totalPulongStaCruzES'];
    $totalPulongStaCruzNHS = $resultPulongStaCruzNHS->fetch_assoc()['totalPulongStaCruzNHS'];
    $totalQueenAnneSchoolOfStaRosaInc = $resultQueenAnneSchoolOfStaRosaInc->fetch_assoc()['totalQueenAnneSchoolOfStaRosaInc'];
    $totalSaintsPeterPaulEarlyChildhoodCenter = $resultSaintsPeterPaulEarlyChildhoodCenter->fetch_assoc()['totalSaintsPeterPaulEarlyChildhoodCenter'];
    $totalSaintFrancisOfAssisiCollege = $resultSaintFrancisOfAssisiCollege->fetch_assoc()['totalSaintFrancisOfAssisiCollege'];
    $totalSaintRuizMontessoriSchool = $resultSaintRuizMontessoriSchool->fetch_assoc()['totalSaintRuizMontessoriSchool'];
    $totalSaintTheodoreHolyFamilySchoolOPC = $resultSaintTheodoreHolyFamilySchoolOPC->fetch_assoc()['totalSaintTheodoreHolyFamilySchoolOPC'];
    $totalSantaRosaEducationalInstitutionInc = $resultSantaRosaEducationalInstitutionInc->fetch_assoc()['totalSantaRosaEducationalInstitutionInc'];
    $totalSantaRosaLagunaChristianSchoolSANROLACS = $resultSantaRosaLagunaChristianSchoolSANROLACS->fetch_assoc()['totalSantaRosaLagunaChristianSchoolSANROLACS'];
    $totalSantaRosaScienceTechnologyHS = $resultSantaRosaScienceTechnologyHS->fetch_assoc()['totalSantaRosaScienceTechnologyHS'];
    $totalSanGeronimoEmilianiSchoolOfStaRosa = $resultSanGeronimoEmilianiSchoolOfStaRosa->fetch_assoc()['totalSanGeronimoEmilianiSchoolOfStaRosa'];
    $totalSanLorenzoChristianSchool = $resultSanLorenzoChristianSchool->fetch_assoc()['totalSanLorenzoChristianSchool'];
    $totalSanLorenzoRhythmAcademyOfLearningInc = $resultSanLorenzoRhythmAcademyOfLearningInc->fetch_assoc()['totalSanLorenzoRhythmAcademyOfLearningInc'];
    $totalSevenPillarsCatholicSchool = $resultSevenPillarsCatholicSchool->fetch_assoc()['totalSevenPillarsCatholicSchool'];
    $totalShepherdOfFaithSPEDCenterInc = $resultShepherdOfFaithSPEDCenterInc->fetch_assoc()['totalShepherdOfFaithSPEDCenterInc'];
    $totalSinalhanES = $resultSinalhanES->fetch_assoc()['totalSinalhanES'];
    $totalSinalhanIntegratedHS = $resultSinalhanIntegratedHS->fetch_assoc()['totalSinalhanIntegratedHS'];
    
    // Check if the queries executed successfully and fetch the results
    if ($resultTotalFormsSubmitted && $resultTotal9to15 && $resultTotal16to20 && 
        $resultTotal21to59 && $resultTotal60plus && $resultTotalMales && $resultTotalFemales && 
        $resultTotalHPVRegistrants && $resultTotalFluRegistrants && $resultTotalInfluenzaCount && 
        $resultTotalVaccines) {
    
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
        // Handle query failure
        die("Error fetching data: " . $conn1->error . " or " . $conn2->error);
    }
    
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
    <!-- My CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
                <a href="adminindex.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="adminwalkin.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Walk-In Forms</span>
                </a>
            </li>
            <li class="active">
                <a href="adminschoolbase.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">School-Base Forms</span>
                </a>
            </li>
            <li>
                <a href="adminlogs.php">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Logs</span>
                </a>
            </li>
            <li>
                <a href="adminteam.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
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
                    <p>Total Pneumonia Count</p>
                </span>
            </li>
        </ul>

        <ul class="box-info schools">
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAcaciaFoundationSchool; ?></h3>
            <p>Acacia Foundation School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAcademiaDeMariaElenaInc; ?></h3>
            <p>Academia De Maria Elena Inc</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAchieversHeartOfKnowledgeMontessoriInc; ?></h3>
            <p>Achievers Heart of Knowledge Montessori Inc</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAplayaES; ?></h3>
            <p>Aplaya Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAplayaNationalHS; ?></h3>
            <p>Aplaya National High School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalAplayaNHSAnnex1Apex; ?></h3>
            <p>Aplaya NHS Annex 1 Apex</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalBlessedChristianSchoolDeStaRosaInc; ?></h3>
            <p>Blessed Christian School de Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalBrightonDomeAcademicCenterInc; ?></h3>
            <p>Brighton Dome Academic Center Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalBuildUpChristianSchoolInc; ?></h3>
            <p>Build Up Christian School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalCainginES; ?></h3>
            <p>Caingin Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalCanossaSchoolInc; ?></h3>
            <p>Canossa School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalCasaDelNinoMontessoriSchoolSanLorenzoInc; ?></h3>
            <p>Casa Del Niño Montessori School San Lorenzo Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalChairOfStPeterSchool; ?></h3>
            <p>Chair of St. Peter School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalChildFormationCenterOfStaRosaInc; ?></h3>
            <p>Child Formation Center of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalCitiGlobalCollegeInc; ?></h3>
            <p>Citi Global College Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalCOLCLearningAcademyInc; ?></h3>
            <p>COLC Learning Academy Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalColegioDeStaRosaDeLimaInc; ?></h3>
            <p>Colegio de Sta. Rosa de Lima Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalContezzaLearningCenterInc; ?></h3>
            <p>Contezza Learning Center Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDetorresChristianSchoolInc; ?></h3>
            <p>De Torres Christian School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDilaES; ?></h3>
            <p>Dila Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDitaES; ?></h3>
            <p>Dita Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDolceMalluchAcademe; ?></h3>
            <p>Dolce Malluch Academe</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDominicanCollegeOfStaRosaLagunaInc; ?></h3>
            <p>Dominican College of Sta. Rosa Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDonJoseES; ?></h3>
            <p>Don Jose Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalDonJoseIntegratedHS; ?></h3>
            <p>Don Jose Integrated High School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalElohimChristianSchool; ?></h3>
            <p>Elohim Christian School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncAnnex; ?></h3>
            <p>Emmanuel's Christian School of Santa Rosa Laguna Inc. - Annex</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalEmmanuelsChristianSchoolOfSantaRosaLagunaIncMain; ?></h3>
            <p>Emmanuel's Christian School of Santa Rosa Laguna Inc. - Main</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalFaithfulGraceChristianSchoolOfStaRosaInc; ?></h3>
            <p>Faithful Grace Christian School of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalFaithlifeAcademyIncAnnex; ?></h3>
            <p>Faithlife Academy Inc. - Annex</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalFaithlifeAcademyIncTagapo; ?></h3>
            <p>Faithlife Academy Inc. - Tagapo</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalFullLifeSchoolForTheDeafInc; ?></h3>
            <p>Full Life School for the Deaf Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalGraceInc; ?></h3>
            <p>Grace Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalGreenFieldsIntegratedSchoolOfLagunaInc; ?></h3>
            <p>Green Fields Integrated School of Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalHarvestersBaptistAcademyOfStaRosaCityInc; ?></h3>
            <p>Harvesters Baptist Academy of Sta. Rosa City Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalHawksPrairieSchoolOfStaRosaLagunaInc; ?></h3>
            <p>Hawks Prairie School of Sta. Rosa Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalHolyRosaryCollegeOfStaRosaLagunaInc; ?></h3>
            <p>Holy Rosary College of Sta. Rosa Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalHSOLSchoolOfLaguna; ?></h3>
            <p>HSOL School of Laguna</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalIgniteLearningCenterOfStaRosaInc; ?></h3>
            <p>Ignite Learning Center of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalInternationalMontessoriSchoolIMSSantaRosaLaguna; ?></h3>
            <p>International Montessori School (IMS) Santa Rosa Laguna</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalJesusTheExaltedNameFullGospelMinistriesIncSchool; ?></h3>
            <p>Jesus the Exalted Name Full Gospel Ministries Inc. School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalJoseZavallaMES; ?></h3>
            <p>Jose Zavalla MES</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalKainosLearningInstituteInc; ?></h3>
            <p>Kainos Learning Institute Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalKindertechOfUnoCevitaInc; ?></h3>
            <p>Kindertech of Uno Cevita Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLabasES; ?></h3>
            <p>Labas Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLabasSHS; ?></h3>
            <p>Labas Senior High School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLagunaEasternAcademyOfSantaRosaInc; ?></h3>
            <p>Laguna Eastern Academy of Santa Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLagunaNorthwesternCollegeCorinthianCenter; ?></h3>
            <p>Laguna Northwestern College Corinthian Center</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLakesideEarlyAcademicDevelopmentLeadChristianSchool; ?></h3>
            <p>Lakeside Early Academic Development Lead Christian School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLaPrimeraEskwelaChildDevelopmentCenter; ?></h3>
            <p>La Primera Eskwela Child Development Center</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalLearningLadderChildDevelopmentCenter; ?></h3>
            <p>Learning Ladder Child Development Center</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMacablingES; ?></h3>
            <p>Macabling Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMalitlitES; ?></h3>
            <p>Malitlit Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMaranathaChristianAcademyOfStaRosaInc; ?></h3>
            <p>Maranatha Christian Academy of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMaranathaLivingHopeAcademyInc; ?></h3>
            <p>Maranatha Living Hope Academy Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMarieMargaretteSchoolInc; ?></h3>
            <p>Marie Margarette School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMaryImmaculateAcademyOfStaRosaInc; ?></h3>
            <p>Mary Immaculate Academy of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMeridianEducationalInstitutionInc; ?></h3>
            <p>Meridian Educational Institution Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalMtRushmoreAcademyOfLagunaInc; ?></h3>
            <p>Mt. Rushmore Academy of Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalNewSinaiSchoolCollegesOfStaRosa; ?></h3>
            <p>New Sinai School & Colleges of Sta. Rosa</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalOurLadyInPinkAndBlueSchoolInc; ?></h3>
            <p>Our Lady in Pink and Blue School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalOurLadyOfAssumptionCollegeOfLagunaInc; ?></h3>
            <p>Our Lady of Assumption College of Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalOurLadyOfFatimaUniversityLaguna; ?></h3>
            <p>Our Lady of Fatima University Laguna</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalOurLadyOfPilarAcademyOfStaRosaLagunaInc; ?></h3>
            <p>Our Lady of Pilar Academy of Sta. Rosa Laguna Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPanoramaMontessoriSchoolInc; ?></h3>
            <p>Panorama Montessori School Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPlicaLearningCenterInc; ?></h3>
            <p>Plica Learning Center Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPreciousTreasuresChristianSchoolOfCabuyaoInc; ?></h3>
            <p>Precious Treasures Christian School of Cabuyao Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPrincetonAcademyIncGardenvillas; ?></h3>
            <p>Princeton Academy Inc. - Gardenvillas</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPrincetonAcademyIncPaseo; ?></h3>
            <p>Princeton Academy Inc. - Paseo</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPTISATInc; ?></h3>
            <p>PTISAT Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPulongStaCruzES; ?></h3>
            <p>Pulong Sta. Cruz Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalPulongStaCruzNHS; ?></h3>
            <p>Pulong Sta. Cruz National High School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalQueenAnneSchoolOfStaRosaInc; ?></h3>
            <p>Queen Anne School of Sta. Rosa Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSaintsPeterPaulEarlyChildhoodCenter; ?></h3>
            <p>Saints Peter & Paul Early Childhood Center</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSaintFrancisOfAssisiCollege; ?></h3>
            <p>Saint Francis of Assisi College</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSaintRuizMontessoriSchool; ?></h3>
            <p>Saint Ruiz Montessori School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSaintTheodoreHolyFamilySchoolOPC; ?></h3>
            <p>Saint Theodore Holy Family School OPC</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSantaRosaEducationalInstitutionInc; ?></h3>
            <p>Santa Rosa Educational Institution Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSantaRosaLagunaChristianSchoolSANROLACS; ?></h3>
            <p>Santa Rosa Laguna Christian School (SANROLACS)</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSantaRosaScienceTechnologyHS; ?></h3>
            <p>Santa Rosa Science & Technology High School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSanGeronimoEmilianiSchoolOfStaRosa; ?></h3>
            <p>San Geronimo Emiliani School of Sta. Rosa</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSanLorenzoChristianSchool; ?></h3>
            <p>San Lorenzo Christian School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSanLorenzoRhythmAcademyOfLearningInc; ?></h3>
            <p>San Lorenzo Rhythm Academy of Learning Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSevenPillarsCatholicSchool; ?></h3>
            <p>Seven Pillars Catholic School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalShepherdOfFaithSPEDCenterInc; ?></h3>
            <p>Shepherd of Faith SPED Center Inc.</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSinalhanES; ?></h3>
            <p>Sinalhan Elementary School</p>
        </span>
    </li>
    <li>
        <i class='bx bxs-map'></i>
        <span class="text">
            <h3><?php echo $totalSinalhanIntegratedHS; ?></h3>
            <p>Sinalhan Integrated High School</p>
        </span>
    </li>
</ul>

        <section class="box">
            <div class="table-data">
                <div class="order">
                <div class="head">
                        <h3>Recent Applicants</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter' id="filterBtn" data-toggle="collapse" data-target="#filtersPanel" aria-expanded="false" aria-controls="filtersPanel"></i>
                </div>

            <div class="collapse" id="filtersPanel">
                <table class="table table-responsive" id="userstbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch user data
                        if(isset($_GET['search'])) {
                            $filterval = $_GET['search'];
                            $users = getSchoolData($filterval);
                        } else {
                            $users = getSchoolData();
                        }
                        if($users !== false) {
                            foreach($users as $user) {
                                ?>
                                <tr>
                                    <td><?= $user['id']; ?></td>
                                    <td><?= $user['firstname']; ?></td>
                                    <td><?= $user['lastname']; ?></td>
                                    <td><?= $user['status']; ?></td>
                                    <?php
                                        $formatted_date = date("Y-m-d H:i:s", strtotime($user['submitted_at']));
                                        echo "<td>" . $formatted_date . "</td>";
                                    ?>
                                    <td><a href="#" data-user-id="<?= $user['id']; ?>" class="view-details-btn">View Details</a></td>
                                </tr>
                                
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No record found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>         
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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