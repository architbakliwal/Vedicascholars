<?php

// require_once('loaddata.php');

// print_r($response[0]['firstname']);

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('JBIMS');
$pdf->SetAuthor('JBIMS');
$pdf->SetTitle('Jamnalal Bajaj Institute of Management Studies Online Application Form 2015-2017');
$pdf->SetSubject('Jamnalal Bajaj Institute of Management Studies Online Application Form 2015-2017');

// set default header data
// $pdf->SetHeaderData('', '0', 'Jamnalal Bajaj Institute of Management Studies Online Application Form 2015-2017');
$pdf->setPrintHeader(false);

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

$pdf->SetFont('times', 'BU', 14);

$image_file = K_PATH_IMAGES.'logo.jpg';
$pdf->Image($image_file, 0, 15, 0, 0, 'JPG', '', 'M', false, 150, 'C', false, false, 1, false, false, false);

$pdf->Ln(6);

$pdf->writeHTML('Jamnalal Bajaj Institute of Management Studies Online Application Form 2015-2017', true, false, false, false, 'C');

$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<style>
    body {
        padding: 40px;
    }
    table {

    }
    table th {
        background-color: #22313F;
        text-align: left;
        font-size: 15px;
        font-weight: bold;
        color: #ffffff;
    }
    table td {
        text-align: left;
    }
    .specialrow {
        background-color:#BFBFBF;
        text-align:left;
        font-size:11px;
        font-weight:bold;
    }
    .tablestyle {

    }
    .boldstyle {
        font-weight: bold;
    }
</style>
<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <td colspan="2" align="left" style="text-align:left; font-size:18px; font-weight:bold; padding:7px;">Application ID: JB2015000562</td>
        <td colspan="2" align="right" style="text-align:right; font-size:18px; font-weight:bold; padding:7px;">MMS, MSc Finance</td>
    </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Personal Details</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of Applicant:</td>
        <td colspan="3">$f_name $m_name $l_name</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Date of Birth:</td>
        <td>$user_dob</td>
        <td class="boldstyle">Gender:</td>
        <td>$gender</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">PAN/SSN:</td>
        <td>$pan_ssn</td>
        <td class="boldstyle">Passport Number:</td>
        <td>$passport_number</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Passport Issued by:</td>
        <td>$passport_issued_by</td>
        <td class="boldstyle">Expiry Date of Passport:</td>
        <td>$passport_expiry_date</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Differently abled:</td>
        <td>$differently_abled</td>
        <td class="boldstyle">Category:</td>
        <td>$category</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Category others:</td>
        <td>$category_other</td>
        <td class="boldstyle">University graduated from:</td>
        <td>$university_of_graduation</td>
    </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Contact Details</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Email Address:</td>
        <td>$email_id</td>
        <td class="boldstyle">Mobile Number:</td>
        <td>$mobile_number</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Phone Number:</td>
        <td>$phone_number</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Current Address</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Address:</td>
        <td colspan="3">$current_address_line1, $current_address_line2, $current_address_line3</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">City:</td>
        <td>$current_address_city</td>
        <td class="boldstyle">Country:</td>
        <td>$current_address_country</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">State:</td>
        <td>$current_address_state</td>
        <td class="boldstyle">State others:</td>
        <td>$current_address_state_other</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Pin/Zip:</td>
        <td>$current_address_pin</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Permanent Address</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Same as current:</td>
        <td>$permanent_same_as_current_address</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Address:</td>
        <td colspan="3">$permanent_address_line1, $permanent_address_line2, $permanent_address_line3</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">City:</td>
        <td>$permanent_address_city</td>
        <td class="boldstyle">Country:</td>
        <td>$permanent_address_country</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">State:</td>
        <td>$permanent_address_state</td>
        <td class="boldstyle">State others:</td>
        <td>$permanent_address_state_other</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Pin/Zip:</td>
        <td>$permanent_address_pin</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Emergency Contact</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of contact:</td>
        <td>$emergency_contact_name</td>
        <td class="boldstyle">Mobile number of contact:</td>
        <td>$emergency_contact_number</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Your relation to contact:</td>
        <td>$emergency_contact_relation</td>
    </tr>
</table>

<br pagebreak="true"/>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Academic Qualifications</th>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Class Xth</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of Institute:</td>
        <td>$tenth_name_of_institute</td>
        <td class="boldstyle">Board:</td>
        <td>$tenth_board</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Board others:</td>
        <td>$tenth_board_other</td>
        <td class="boldstyle">Xth aggregate percentage:</td>
        <td>$tenth_aggregate</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Year of completion:</td>
        <td>$tenth_year_completion</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Class XIIth / Diploma</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Course:</td>
        <td>$is_twelfth_or_diploma</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of Institute:</td>
        <td>$twelfth_name_of_institution</td>
        <td class="boldstyle">Board:</td>
        <td>$twelfth_board</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Board others:</td>
        <td>$twelfth_board_other</td>
        <td class="boldstyle">XIIth aggregate percentage:</td>
        <td>$twelfth_aggregate</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Year of completion:</td>
        <td>$twelfth_year_completion</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Graduation</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of College:</td>
        <td colspan="3">$graduation_name_of_college</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">University name:</td>
        <td>$graduation_university</td>
        <td class="boldstyle">University name others:</td>
        <td>$graduation_university_other</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Degree name:</td>
        <td>$graduation_degree_name</td>
        <td class="boldstyle">Discipline:</td>
        <td>$graduation_discipline</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Discipline other:</td>
        <td>$graduation_discipline_other</td>
        <td class="boldstyle">Specialization:</td>
        <td>$graduation_specialisation</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Graduation degree mode:</td>
        <td>$graduation_degree_mode</td>
        <td class="boldstyle">Degree completed:</td>
        <td>$graduation_degree_completed</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Year of completion:</td>
        <td>$graduation_year_completion</td>
        <td class="boldstyle">Grading system:</td>
        <td>$graduation_grading_system</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Class:</td>
        <td>$graduation_class</td>
        <td class="boldstyle">Final aggregate percentage:</td>
        <td>$graduation_aggregate</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Final GPA obtained:</td>
        <td>$graduation_gpa_obtained</td>
        <td class="boldstyle">Max GPA possible:</td>
        <td>$graduation_gpa_max</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Academic awards, extra curricular achievements and positions of responsibility held</td>
    </tr>
    <tr nobr="true">
        <td colspan="4">$achievements_awards</td>
    </tr>
</table>

EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD
<style>
    body {
        padding: 40px;
    }
    table {

    }
    table th {
        background-color: #22313F;
        text-align: left;
        font-size: 15px;
        font-weight: bold;
        color: #ffffff;
    }
    table td {
        text-align: left;
    }
    .specialrow {
        background-color:#BFBFBF;
        text-align:left;
        font-size:11px;
        font-weight:bold;
    }
    .tablestyle {

    }
    .boldstyle {
        font-weight: bold;
    }
</style>
<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Work Experience</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Do you have any work experience:</td>
        <td colspan="3">$work_experience</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">Latest Work Experience</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of the organisation:</td>
        <td>$name_of_organization</td>
        <td class="boldstyle">Organisation type:</td>
        <td>$organization_type</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Organisation type others:</td>
        <td>$organization_type_other</td>
        <td class="boldstyle">Industry type:</td>
        <td>$industry_type</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Started work in:</td>
        <td>$started_work_date</td>
        <td class="boldstyle">Completed work in:</td>
        <td>$completed_work_date</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Joined as:</td>
        <td>$joined_as</td>
        <td class="boldstyle">Current designation:</td>
        <td>$current_designation</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Annual remuneration in INR:</td>
        <td>$annual_renumeration</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Description of roles and responsibility:</td>
        <td colspan="3">$roles_and_responsibilty</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Total work experience:</td>
        <td colspan="3">$total_work_experience</td>
    </tr>
</table>

EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$tbl = <<<EOD

<br pagebreak="true"/>
<style>
    body {
        padding: 40px;
    }
    table {

    }
    table th {
        background-color: #22313F;
        text-align: left;
        font-size: 15px;
        font-weight: bold;
        color: #ffffff;
    }
    table td {
        text-align: left;
    }
    .specialrow {
        background-color:#BFBFBF;
        text-align:left;
        font-size:11px;
        font-weight:bold;
    }
    .tablestyle {

    }
    .boldstyle {
        font-weight: bold;
    }
</style>
<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">References</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Title of the refree:</td>
        <td>$title_of_refree</td>
        <td class="boldstyle">Name of the refree:</td>
        <td>$name_of_refree</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Organisation:</td>
        <td>$organization_refree</td>
        <td class="boldstyle">Designation:</td>
        <td>$designation_refree</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Contact number:</td>
        <td>$phone_number_refree</td>
        <td class="boldstyle">Email address:</td>
        <td>$email_id_refree</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">In what capacity does he/she know you?:</td>
        <td colspan="3">$capacity_of_knowing</td>
    </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Test Score Details</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Qualifying exams appearing for</td>
        <td colspan="3">$test_apprearing</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">CAT Details</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">CAT Application ID:</td>
        <td>$cat_application_id</td>
        <td class="boldstyle">Exam date:</td>
        <td>$cat_exam_date</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">MH-CET Details</td>
    </tr>
    <tr nobr="true">
        <td colspan="4">You will be contacted on your registered email id for MH-CET registration details in January.</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">GRE Details</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">GRE registration number:</td>
        <td>$gre_registration_number</td>
        <td class="boldstyle">Exam date:</td>
        <td>$gre_exam_date</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Verbal score:</td>
        <td>$gre_verbal_score</td>
        <td class="boldstyle">Quantitative score:</td>
        <td>$gre_quant_score</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Total score:</td>
        <td>$gre_total_score</td>
        <td class="boldstyle">Verbal percentile:</td>
        <td>$gre_verbal_percentile</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Quantitative percentile:</td>
        <td>$gre_quant_percentile</td>
        <td class="boldstyle">Total percentile:</td>
        <td>$gre_total_percentile</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">AWA awaited:</td>
        <td>$gre_awa_awaited</td>
        <td class="boldstyle">AWA score:</td>
        <td>$gre_awa_score</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">AWA percentile:</td>
        <td>$gre_awa_percentile</td>
    </tr>
    <tr nobr="true">
        <td colspan="4" class="specialrow">GMAT Details</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">GMAT registration number:</td>
        <td>$gmat_registration_number</td>
        <td class="boldstyle">Exam date:</td>
        <td>$gmat_exam_date</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Verbal score:</td>
        <td>$gmat_verbal_score</td>
        <td class="boldstyle">Quantitative score:</td>
        <td>$gmat_quant_score</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Total score:</td>
        <td>$gmat_total_score</td>
        <td class="boldstyle" class="boldstyle">Verbal percentile:</td>
        <td>$gmat_verbal_percentile</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Quantitative percentile:</td>
        <td>$gmat_quant_percentile</td>
        <td class="boldstyle">Total percentile:</td>
        <td>$gmat_total_percentile</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">AWA awaited:</td>
        <td>$gmat_awa_awaited</td>
        <td class="boldstyle">AWA score:</td>
        <td>$gmat_awa_score</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">AWA percentile:</td>
        <td>$gmat_awa_percentile</td>
        <td class="boldstyle">Integrated reasoning percentile:</td>
        <td>$gmat_integrated_reasoning_percentile</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Integrated reasoning score:</td>
        <td>$gmat_integrated_reasoning_score</td>
    </tr>
</table>

<br pagebreak="true"/>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Additional Information</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">How did you hear of JBIMS:</td>
        <td>$how_did_you_hear_of_jbims</td>
        <td class="boldstyle">Have you applied to JBIMS before:</td>
        <td>$applied_to_jbims_before</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">If yes, when:</td>
        <td colspan="3">$applied_to_jbims_before_year</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Additional information:</td>
        <td colspan="3">$other_support_information</td>
    </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Payment Details</th>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Payment method:</td>
        <td>$payment_mode</td>
        <td class="boldstyle">Payment amount:</td>
        <td>$payment_amount</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Payment mode:</td>
        <td>$dd_payment_mode</td>
        <td class="boldstyle">Reference/DD number:</td>
        <td>$dd_reference_number</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Name of bank:</td>
        <td>$dd_bank_name</td>
        <td class="boldstyle">DD date:</td>
        <td>$dd_date</td>
    </tr>
    <tr nobr="true">
        <td class="boldstyle">Payment status:</td>
        <td colspan="3">$payment_status</td>
    </tr>
</table>

<table border="1" cellpadding="5" cellspacing="0" align="center" width="100%" class="tablestyle">
    <tr nobr="true">
        <th colspan="4">Declaration</th>
    </tr>
    <tr nobr="true">
        <td colspan="4">I hereby declare that the information given in this application form is complete, true and correct to best of my knowledge. If admitted, I agree to comply with the rules of the institute.</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('JB2015000562.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
