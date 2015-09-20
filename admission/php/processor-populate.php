<?php
    
    include dirname(__FILE__).'/csrf_protection/csrf-token.php';
	include dirname(__FILE__).'/csrf_protection/csrf-class.php';

	if(!isset($_SESSION)){
		$some_name = session_name( "JBIMSAdmission" );
    	session_start();
	}
    
	include dirname(__FILE__).'/config/config.php';
	include dirname(__FILE__).'/config/functions.php';
	
	$language = array('en' => 'en','pt' => 'pt');

if ( isset( $_GET['lang'] ) and array_key_exists( $_GET['lang'], $language ) ) {
		include dirname(__FILE__).'/language/'.$language[$_GET['lang']].'.php';
	} else {
		include dirname(__FILE__).'/language/en.php';
	}

	if(!$_SESSION['userLogin'] && !$_SESSION['userName'] && !isset($_SESSION['userName'])){
				
		timeout();
			
	} else {					
		$time = time();
								
		if($time > $_SESSION['expire']){
			session_destroy();
			timeout();
			exit(0);
		}		
	}

	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (60*60);

	if(strlen(trim($_SESSION['userName'])) == 0) {
		session_destroy();
		timeout();
		die();
	}
		
	$applicationid = strip_tags(trim($_SESSION['userName']));

	$finalapplicationid = htmlspecialchars($applicationid, ENT_QUOTES, 'UTF-8');

	$row_array = array();
	$row_array1 = array();
	$row_array2 = array();
	$row_array3 = array();
	$row_array4 = array();
	$row_array5 = array();
	$row_array6 = array();
	$row_array7 = array();
	$row_array8 = array();
	$row_array9 = array();
	$row_array10 = array();
	$row_array11 = array();
	$row_array12 = array();

	function htmldecode($value) {
		return htmlspecialchars_decode($value, ENT_QUOTES);
	}
	

	if ($mysql == true){
		//Create an array
	    $json_response = array();


		$sqlpersonal = "SELECT * FROM  `users_personal_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectpersonal = mysql_query($sqlpersonal);

	if ( ! $selectpersonal ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectpersonal, MYSQL_ASSOC)) {
	        $row_array['firstname'] = $row['f_name'];
			$row_array['middlename'] = $row['m_name'];
			$row_array['lastname'] = $row['l_name'];
			$row_array['dob'] = $row['user_dob'];
			$row_array['gender'] = $row['gender'];
			$row_array['panssn'] = $row['pan_ssn'];
			$row_array['passportnumber'] = $row['passport_number'];
			$row_array['passportissued'] = $row['passport_issued_by'];
			$row_array['passportexipry'] = $row['passport_expiry_date'];
			$row_array['differentailyabled'] = $row['differently_abled'];
			$row_array['category'] = $row['category'];
			$row_array['categoryothers'] = $row['category_other'];
			$row_array['universitygraduated'] = $row['university_of_graduation'];
	        
	    }

	    //push the values in the array
	    array_push($json_response,$row_array);

	    $contact = "SELECT * FROM  `users_contact_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectcontact = mysql_query($contact);

	if ( ! $selectcontact ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectcontact, MYSQL_ASSOC)) {
	        $row_array1['email'] = $row['email_id'];
			$row_array1['mobilenumber'] = $row['mobile_number'];
			$row_array1['phonenumber'] = $row['phone_number' ];
			$row_array1['currentaddress1'] = htmldecode($row['current_address_line1']);
			$row_array1['currentaddress2'] = htmldecode($row['current_address_line2']);
			$row_array1['currentaddress3'] = htmldecode($row['current_address_line3']);
			$row_array1['currentcity'] = htmldecode($row['current_address_city' ]);
			$row_array1['currentcountry'] = $row['current_address_country' ];
			$row_array1['currentstate'] = $row['current_address_state' ];
			$row_array1['currentstateother'] = $row['current_address_state_other' ];
			$row_array1['currentzip'] = $row['current_address_pin' ];
			$row_array1['permanentsameascurrent'] = $row['permanent_same_as_current_address' ];
			$row_array1['permanentaddress1'] = htmldecode($row['permanent_address_line1' ]);
			$row_array1['permanentaddress2'] = htmldecode($row['permanent_address_line2' ]);
			$row_array1['permanentaddress3'] = htmldecode($row['permanent_address_line3' ]);
			$row_array1['permanentcity'] = htmldecode($row['permanent_address_city' ]);
			$row_array1['permanentcountry'] = $row['permanent_address_country' ];
			$row_array1['permanentstate'] = $row['permanent_address_state' ];
			$row_array1['permanentstateother'] = $row['permanent_address_state_other' ];
			$row_array1['permanentzip'] = $row['permanent_address_pin' ];
			$row_array1['emergencyname'] = $row['emergency_contact_name' ];
			$row_array1['emergencymobile'] = $row['emergency_contact_number' ];
			$row_array1['emergencyrelation'] = $row['emergency_contact_relation' ];

	        
	    }

	    //push the values in the array
	    array_push($json_response,$row_array1);


	    $academic = "SELECT * FROM  `users_academic_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectacademic = mysql_query($academic);

	if ( ! $selectacademic ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectacademic, MYSQL_ASSOC)) {
	        $row_array2['tenthinstitutename'] = htmldecode($row['tenth_name_of_institute']);
			$row_array2['tenthboard'] = $row['tenth_board'];
			$row_array2['tenthboardothers'] = htmldecode($row['tenth_board_other']);
			$row_array2['tenthaggregate'] = $row['tenth_aggregate'];
			$row_array2['tenthcompletion'] = $row['tenth_year_completion'];
			$row_array2['twelfthordiploma'] = $row['is_twelfth_or_diploma'];
			$row_array2['twelfthinstitutename'] = htmldecode($row['twelfth_name_of_institution']);
			$row_array2['twelfthboard'] = $row['twelfth_board'];
			$row_array2['twelfthboardothers'] = htmldecode($row['twelfth_board_other']);
			$row_array2['twelfthaggregate'] = $row['twelfth_aggregate'];
			$row_array2['twelfthcompletion'] = $row['twelfth_year_completion'];
			$row_array2['gradutationcollegename'] = htmldecode($row['graduation_name_of_college']);
			$row_array2['gradutationunversity'] = htmldecode($row['graduation_university']);
			$row_array2['graduationuniversityothers'] = htmldecode($row['graduation_university_other']);
			$row_array2['graduatindegreename'] = htmldecode($row['graduation_degree_name']);
			$row_array2['graduationdiscipline'] = htmldecode($row['graduation_discipline']);
			$row_array2['graduationdisciplineother'] = htmldecode($row['graduation_discipline_other']);
			$row_array2['graduationspecialization'] = htmldecode($row['graduation_specialisation']);
			$row_array2['graduationdegreemode'] = $row['graduation_degree_mode'];
			$row_array2['graduationcompleted'] = $row['graduation_degree_completed'];
			$row_array2['gradationcompletionyear'] = $row['graduation_year_completion'];
			$row_array2['graduationgpaorpercentage'] = $row['graduation_grading_system'];
			$row_array2['graduationclass'] = $row['graduation_class'];
			$row_array2['graduationpercentage'] = $row['graduation_aggregate'];
			$row_array2['graduationgpaobtained'] = $row['graduation_gpa_obtained'];
			$row_array2['graduationgpamax'] = $row['graduation_gpa_max'];
			$row_array2['extraacademiccount'] = $row['extra_academic_added_count'];
			$row_array2['academicachivements'] = htmldecode($row['achievements_awards']);
	        
	        
	    }

	    //push the values in the array
        // array_push($json_response,$row_array2);


        $academicadd = "SELECT * FROM  `added_academic_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectacademicadd = mysql_query($academicadd);

	if ( ! $selectacademicadd ) {
		  die('Could not enter data: ' . mysql_error());
		}

		$y = '';
		$x = 1;

	    while ($row = mysql_fetch_array($selectacademicadd, MYSQL_ASSOC)) {

	    	$iacademicextradegreelevel = "academicextradegreelevel{$y}";
			$iacademicextradegreeother = "academicextradegreeother{$y}";
			$igradutationcollegenameextra = "gradutationcollegenameextra{$y}";
			$igradutationunversityextra = "gradutationunversityextra{$y}";
			$igraduationuniversityothersextra = "graduationuniversityothersextra{$y}";
			$igraduatindegreenameextra = "graduatindegreenameextra{$y}";
			$igraduationdisciplineextra = "graduationdisciplineextra{$y}";
			$igraduationdisciplineotherextra = "graduationdisciplineotherextra{$y}";
			$igraduationspecializationextra = "graduationspecializationextra{$y}";
			$igraduationdegreemodeextra = "graduationdegreemodeextra{$y}";
			$igraduationcompletedextra = "graduationcompletedextra{$y}";
			$igradationcompletionyearextra = "gradationcompletionyearextra{$y}";
			$igraduationgpaorpercentageextra = "graduationgpaorpercentageextra{$y}";
			$igraduationclassextra = "graduationclassextra{$y}";
			$igraduationpercentageextra = "graduationpercentageextra{$y}";
			$igraduationgpaobtainedextra = "graduationgpaobtainedextra{$y}";
			$igraduationgpamaxextra = "graduationgpamaxextra{$y}";


			$row_array2[$iacademicextradegreelevel] = $row['extra_academic_degree_level'];
			$row_array2[$iacademicextradegreeother] = htmldecode($row['extra_academic_degree_level_other']);
			$row_array2[$igradutationcollegenameextra] = htmldecode($row['extra_academic_name_of_college']);
			$row_array2[$igradutationunversityextra] = htmldecode($row['extra_academic_university']);
			$row_array2[$igraduationuniversityothersextra] = htmldecode($row['extra_academic_university_other']);
			$row_array2[$igraduatindegreenameextra] = htmldecode($row['extra_academic_degree_mode']);
			$row_array2[$igraduationdisciplineextra] = htmldecode($row['extra_academic_degree_name']);
			$row_array2[$igraduationdisciplineotherextra] = htmldecode($row['extra_academic_discipline']);
			$row_array2[$igraduationspecializationextra] = htmldecode($row['extra_academic_discipline_other']);
			$row_array2[$igraduationdegreemodeextra] = htmldecode($row['extra_academic_specialisation']);
			$row_array2[$igraduationcompletedextra] = $row['extra_academic_degree_completed'];
			$row_array2[$igradationcompletionyearextra] = $row['extra_academic_year_completion'];
			$row_array2[$igraduationgpaorpercentageextra] = $row['extra_academic_grading_system'];
			$row_array2[$igraduationclassextra] = $row['extra_academic_class'];
			$row_array2[$igraduationpercentageextra] = $row['extra_academic_aggregate'];
			$row_array2[$igraduationgpaobtainedextra] = $row['extra_academic_gpa_obtained'];
			$row_array2[$igraduationgpamaxextra] = $row['extra_academic_gpa_max'];

			$y = $x;

			$x = $x + 1;
	        
	    }

	    //push the values in the array
        array_push($json_response,$row_array2);


	    $workex = "SELECT * FROM  `users_work_experience_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectworkex = mysql_query($workex);

	if ( ! $selectworkex ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectworkex, MYSQL_ASSOC)) {

	        $row_array3['isworkex'] = $row['work_experience'];
			$row_array3['organizationname'] = htmldecode($row['name_of_organization']);
			$row_array3['organizationtype'] = $row['organization_type'];
			$row_array3['organizationtypeother'] = htmldecode($row['organization_type_other']);
			$row_array3['industrytype'] = htmldecode($row['industry_type']);
			$row_array3['workstarted'] = $row['started_work_date'];
			$row_array3['workcompleted'] = $row['completed_work_date'];
			$row_array3['comapnyjoinedas'] = htmldecode($row['joined_as']);
			$row_array3['currentdesignation'] = htmldecode($row['current_designation']);
			$row_array3['annualrenumeration'] = $row['annual_renumeration'];
			$row_array3['rolesandresponsibility'] = htmldecode($row['roles_and_responsibilty']);
			$row_array3['extraworkexcount'] = $row['extra_workex_count'];
			$row_array3['totalworkex'] = $row['total_work_experience'];			
	        
	        
	    }

	    $workexadd = "SELECT * FROM  `added_work_experience_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectworkexadd = mysql_query($workexadd);

	if ( ! $selectworkexadd ) {
		  die('Could not enter data: ' . mysql_error());
		}

		$x = 1;

	    while ($row = mysql_fetch_array($selectworkexadd, MYSQL_ASSOC)) {

		    $iisworkex = "isworkex{$x}";
			$iorganizationname = "organizationname{$x}";
			$iorganizationtype = "organizationtype{$x}";
			$iorganizationtypeother = "organizationtypeother{$x}";
			$iindustrytype = "industrytype{$x}";
			$iworkstarted = "workstarted{$x}";
			$iworkcompleted = "workcompleted{$x}";
			$icomapnyjoinedas = "comapnyjoinedas{$x}";
			$icurrentdesignation = "currentdesignation{$x}";
			$iannualrenumeration = "annualrenumeration{$x}";
			$irolesandresponsibility = "rolesandresponsibility{$x}";
			$itotalworkex = "totalworkex{$x}";

			$row_array3[$iisworkex] = $row['work_experience'];
			$row_array3[$iorganizationname] = htmldecode($row['name_of_organization']);
			$row_array3[$iorganizationtype] = $row['organization_type'];
			$row_array3[$iorganizationtypeother] = htmldecode($row['organization_type_other']);
			$row_array3[$iindustrytype] = htmldecode($row['industry_type']);
			$row_array3[$iworkstarted] = $row['started_work_date'];
			$row_array3[$iworkcompleted] = $row['completed_work_date'];
			$row_array3[$icomapnyjoinedas] = htmldecode($row['joined_as']);
			$row_array3[$icurrentdesignation] = htmldecode($row['current_designation']);
			$row_array3[$iannualrenumeration] = $row['annual_renumeration'];
			$row_array3[$irolesandresponsibility] = htmldecode($row['roles_and_responsibilty']);
			$row_array3[$itotalworkex] = $row['total_work_experience'];	

			$x = $x + 1;
		}

	    //push the values in the array
        array_push($json_response,$row_array3);

	    $sqlrefree = "SELECT * FROM  `users_reference_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectrefree = mysql_query($sqlrefree);

	if ( ! $selectrefree ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectrefree, MYSQL_ASSOC)) {
	        $row_array4['refreetitle'] = $row['title_of_refree'];
			$row_array4['refreename'] = htmldecode($row['name_of_refree']);
			$row_array4['refreeorganization'] = htmldecode($row['organization']);
			$row_array4['refreedesignation'] = htmldecode($row['designation']);
			$row_array4['refreecontact'] = $row['phone_number'];
			$row_array4['refreeemail'] = $row['email_id'];
			$row_array4['refreeknowing'] = htmldecode($row['capacity_of_knowing']);

	        
	    }

	    //push the values in the array
	    array_push($json_response,$row_array4);

	    $testscore = "SELECT * FROM  `users_test_score_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selecttestscore = mysql_query($testscore);

	if ( ! $selecttestscore ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selecttestscore, MYSQL_ASSOC)) {
	        $row_array5['testappearing'] = $row['test_apprearing'];
				        
	        
	    }

	    //push the values in the array
        array_push($json_response,$row_array5);

	    $sqldoc = "SELECT * FROM  `users_documents_uploads` WHERE application_id ='" . $finalapplicationid ."'";

		$selectdoc = mysql_query($sqldoc);

	if ( ! $selectdoc ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectdoc, MYSQL_ASSOC)) {
	        $row_array6['passportphotofake1'] = htmldecode($row['passport_photo']);
			$row_array6['hearaboutjbims'] = $row['how_did_you_hear_of_jbims'];
			$row_array6['appliedbefore'] = $row['applied_to_jbims_before'];
			$row_array6['appliedyear'] = $row['applied_to_jbims_before_year'];
			$row_array6['supportinfo'] = htmldecode($row['other_support_information']);
	        
	    }

	    //push the values in the array
        array_push($json_response,$row_array6);

	    $payment = "SELECT * FROM  `users_payment_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectpayment = mysql_query($payment);

	if ( ! $selectpayment ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectpayment, MYSQL_ASSOC)) {
	        $row_array7['paymentmode'] = $row['payment_mode'];
			$row_array7['ddpaymentmode'] = $row['dd_payment_mode'];
			$row_array7['referencenumber'] = $row['dd_reference_number'];
			$row_array7['paymentemailid'] = $row['dd_email_address'];
			$row_array7['nameofbank'] = htmldecode($row['dd_bank_name']);
			$row_array7['paymentdate'] = $row['dd_date'];
			$row_array7['paymentamount'] = $row['payment_amount'];
			$row_array7['paymentstatus'] = $row['payment_status'];
	        
	    }

	    //push the values in the array
        array_push($json_response,$row_array7);

	    $cat = "SELECT * FROM  `users_cat_score_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectcat = mysql_query($cat);

	if ( ! $selectcat ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectcat, MYSQL_ASSOC)) {
	        $row_array8['catapplicationid'] = $row['cat_application_id'];
			$row_array8['catexamdate'] = $row['cat_exam_date'];
				        
	    }

	    //push the values in the array
        array_push($json_response,$row_array8);

	    $gre = "SELECT * FROM  `users_gre_score_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectgre = mysql_query($gre);

	if ( ! $selectgre ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectgre, MYSQL_ASSOC)) {
	        $row_array9['greregnumber'] = $row['gre_registration_number'];
			$row_array9['gredate'] = $row['gre_exam_date'];
			$row_array9['greverbalscore'] = $row['gre_verbal_score'];
			$row_array9['grequantscore'] = $row['gre_quant_score'];
			$row_array9['gretotalscore'] = $row['gre_total_score'];
			$row_array9['greverbalpercentile'] = $row['gre_verbal_percentile'];
			$row_array9['grequantpercentile'] = $row['gre_quant_percentile'];
			$row_array9['gretotalpercentile'] = $row['gre_total_percentile'];
			$row_array9['greawaawaited'] = $row['gre_awa_awaited'];
			$row_array9['greawascore'] = $row['gre_awa_score'];
			$row_array9['greawapercentile'] = $row['gre_awa_percentile'];
				        
	    }

	    //push the values in the array
        array_push($json_response,$row_array9);

	    $gmat = "SELECT * FROM  `users_gmat_score_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectgmat = mysql_query($gmat);

	if ( ! $selectgmat ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectgmat, MYSQL_ASSOC)) {
	        $row_array10['gmatregnumber'] = $row['gmat_registration_number'];
			$row_array10['gmatdate'] = $row['gmat_exam_date'];
			$row_array10['gmatverbalscore'] = $row['gmat_verbal_score'];
			$row_array10['gmatquantscore'] = $row['gmat_quant_score'];
			$row_array10['gmattotalscore'] = $row['gmat_total_score'];
			$row_array10['gmatverbalpercentile'] = $row['gmat_verbal_percentile'];
			$row_array10['gmatquantpercentile'] = $row['gmat_quant_percentile'];
			$row_array10['gmattotalpercentile'] = $row['gmat_total_percentile'];
			$row_array10['gmatawaawaited'] = $row['gmat_awa_awaited'];
			$row_array10['gmatawascore'] = $row['gmat_awa_score'];
			$row_array10['gmatawapercentile'] = $row['gmat_awa_percentile'];
			$row_array10['gmatintegratedpercentile'] = $row['gmat_integrated_reasoning_percentile'];
			$row_array10['gmatintegratedscore'] = $row['gmat_integrated_reasoning_score'];
				        
	    }

	    //push the values in the array
        array_push($json_response,$row_array10);


        $status = "SELECT * FROM  `admission_section_status` WHERE application_id ='" . $finalapplicationid ."'";

		$selectstatus = mysql_query($status);

	if ( ! $selectstatus ) {
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectstatus, MYSQL_ASSOC)) {
	        $row_array11['personalstatus'] = $row['personal_details_status'];
			$row_array11['contactstatus'] = $row['contact_details_status'];
			$row_array11['academicestatus'] = $row['academic_details_status'];
			$row_array11['workexstatus'] = $row['work_ex_details_status'];
			$row_array11['refreestatus'] = $row['reference_details_status'];
			$row_array11['scorestatus'] = $row['score_details_status'];
			$row_array11['docstatus'] = $row['document_details_status'];
	        
	    }

	    //push the values in the array
        array_push($json_response,$row_array11);



        $cet = "SELECT * FROM  `users_cet_score_details` WHERE application_id ='" . $finalapplicationid ."'";

		$selectcet = mysql_query($cet);

		if(! $selectcet )
		{
		  die('Could not enter data: ' . mysql_error());
		}

	    while ($row = mysql_fetch_array($selectcet, MYSQL_ASSOC)) {
	        $row_array12['cetrollnumber'] = $row['cet_roll_number'];
			$row_array12['cetmarks'] = $row['cet_marks'];
			$row_array12['cetpercentile'] = $row['cet_percentile'];
	    }

	    //push the values in the array
        array_push($json_response,$row_array12);



	    echo json_encode($json_response);

	} else {

	}
		
?>
