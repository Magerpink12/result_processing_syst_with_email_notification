<?php
ini_set('memory_limit', -1);
include("../includes/config/init.php");
require('fpdf/fpdf.php');


extract($_GET);
if (!isset($student_id)) {
    header("Location: ../index.php?page=dashboard");
}




function grade($total)
{
    switch (true) {
        case $total >= 70:
            $grade = 'A';
            $remark = 'Excellent';
            break;
        case $total >= 60:
            $grade = 'B';
            $remark = 'Good';
            break;
        case $total >= 50:
            $grade = 'C';
            $remark = 'Credit';
            break;
        case $total >= 45:
            $grade = 'D';
            $remark = 'Pass';
            break;
        default:
            # code...
            $grade = 'F';
            $remark = 'Very Poor';
            break;
    }

    return array("grade" => $grade, "remark" => $remark);
}


$student = Student::find_by_id($student_id);
$class = Classes::find_by_id($student->current_class_id);
$subjects_decoded = json_decode($class->subjects) ?? array();


$class_name = $class->name;
$db_table = strtolower(str_replace(' ', '_', $class_name));

Ca_test::$db_table = $db_table;


$ca_tests = Ca_test::find_by_query("SELECT * FROM $db_table WHERE roll_no=$student_id");
$ca_tests = array_shift($ca_tests);


$first_ca_json = json_decode($ca_tests->first_ca);
$second_ca_json = json_decode($ca_tests->second_ca);
$exams_ca_json = json_decode($ca_tests->exams);

if (!$student) {
    # code...
    header("Location: ../index.php?page=dashboard");
}

class PDF extends FPDF
{

    function Header()
    {
        // Select Arial bold 15
        $this->SetFont('Times', 'B', 18);
        $this->SetTextColor(0, 0, 155);
        $this->SetDrawColor(0, 0, 155);
        $this->Cell(0, 7, 'INITIATIVE INTERNATIONAL SCHOOL', 0, 1, 'C');
        $this->SetTextColor(0);
        $this->SetFont('', '', 13);

        $this->SetFillColor(0, 0, 155);
        $this->SetTextColor(255, 255, 255);

        $this->SetFont('', 'B', 10);
        $this->Cell(44, 5, '', 0, 0, 'C', false);
        $this->Cell(100, 5, 'MOTTO: DISCIPLINE & QUALITY EDUCATION', 0, 0, 'C', true);
        $this->Cell(0, 5, '', 0, 1, 'C', false);

        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 4, 'ANGUWAR KANTI, HAUSARI WARD, GEIDAM, YOBE STATE.', 0, 1, 'C');
        $this->SetFont('', '', 10);
        $this->Cell(0, 4, '08035996177,08161838283. E-MAIL: Initiativeintisch123@gmail.com', 0, 1, 'C');

        $this->SetTextColor(0, 0, 155);
        $this->SetFont('', 'B', 12);
        $this->Cell(0, 5, 'STUDENT\'S REPORT SHEET', 0, 1, 'C');

        $this->SetTextColor(0, 0, 0);
        $this->SetFont('', 'B', 8);
        $this->Cell(0, 3, '(JUNIOR SECONDARY)', 0, 1, 'C');
        $this->Cell(0, 1, '', 'B', 1, 'C');

        $this->SetFont('', 'B', 10);
        $this->Image('logo.png', 10, 10, 30);
        // Line break 
        $this->Ln(2);
    }
    function Footer()
    {
        // Go to 0.9 cm from bottom
        $this->SetY(-9);
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}





$pdf = new PDF();


$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('', '', 10);
$pdf->SetFillColor(240, 240, 255);

$pdf->Ln(5);

$pdf->SetFont('', '', 10);
$pdf->Cell(18, 5, 'Name: ', 0, 0, 'L', false);
$pdf->Cell(55, 5, $student->name, 0, 0, 'L', false);
$pdf->Cell(18, 5, 'Class: ', 0, 0, 'L', false);
$pdf->Cell(55, 5, $class->name, 0, 0, 'L', false);
$pdf->Cell(18, 5, 'Sex: ', 0, 0, 'L', false);
$pdf->Cell(0, 5, $student->gender, 0, 1, 'L', false);

$pdf->Cell(18, 5, 'Roll No.: ', 0, 0, 'L', false);
$pdf->Cell(55, 5, $student->id, 0, 0, 'L', false);
$pdf->Cell(18, 5, 'Session: ', 0, 0, 'L', false);
$pdf->Cell(55, 5, '2022/2023', 0, 0, 'L', false);
$pdf->Cell(18, 5, 'Term: ', 0, 0, 'L', false);
$pdf->Cell(0, 5, 'Third', 0, 1, 'L', false);


$pdf->Ln(5);


$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('', 'B', 14);
$pdf->SetFillColor(0, 0, 155);
$pdf->Cell(80, 10, "SUBJECTS", 0, 0, 'C', true);

$pdf->SetFillColor(240, 240, 255);
$pdf->SetTextColor(0);

$pdf->SetFont('', 'B', 10);

$pdf->Cell(15, 5, 'C.A', 'T,L', 0, 'C', true);
$pdf->Cell(18, 5, 'EXAMS', 'T,L', 0, 'C', true);
$pdf->Cell(18, 5, 'TOTAL', 'T,L', 0, 'C', true);
// $pdf->Cell(18, 5, 'SUBJECT', 'T,L', 0, 'C', true);
$pdf->Cell(18, 10, 'GRADE', 1, 0, 'C', true);
$pdf->Cell(0, 10, 'REMARK', 1, 1, 'C', true);

$pdf->Cell(80, 0, "", 1, 0, 'L', true);
$pdf->Cell(15, -5, '40%', 'T,L', 0, 'C', true);
$pdf->Cell(18, -5, '60% ', 'T,L', 0, 'C', true);
$pdf->Cell(18, -5, '100%', 'T,L', 0, 'C', true);
// $pdf->Cell(18, -5, 'POSITION', 'T,L', 0, 'C', true);
$pdf->Cell(18, 0, '', 1, 0, 'L', true);
$pdf->Cell(0, 0, '', 1, 1, 'L', true);

$total_sub_scores = 0;
$out_of = count($subjects_decoded) * 100;

foreach ($subjects_decoded as $subject_name) :
    $total = 0;
    $ca = 0;
    $first = $first_ca_json->{$subject_name} ?? 0;
    $second = $second_ca_json->{$subject_name} ?? 0;
    $exams = $exams_ca_json->{$subject_name}  ?? 0;
    $total = $first + $second + $exams;
    $ca = $first + $second;


    $pdf->SetFont('', 'B', 10);
    $pdf->Cell(80, 6, $subject_name, 1, 0, 'L', false);
    $pdf->SetFont('', '', 10);
    $pdf->Cell(15, 6, $ca, 1, 0, 'C', false);
    $pdf->Cell(18, 6, $exams, 1, 0, 'C', false);
    $pdf->Cell(18, 6, $total, 1, 0, 'C', false);
    // $pdf->Cell(18, 6, 'POSITION', 1, 0, 'C', false);
    $pdf->Cell(18, 6, grade($total)["grade"], 1, 0, 'L', false);
    $pdf->Cell(0, 6, grade($total)["remark"], 1, 1, 'L', false);
    $total_sub_scores += $total;
endforeach;
$everage = ($total_sub_scores / $out_of) * 100;


$pdf->Ln(5);

$pdf->Cell(18, 5, 'Total Mark:', 0, 0, 'L', false);
$pdf->Cell(30, 5, $total_sub_scores, 'B', 0, 'C', false);

$pdf->Cell(12, 5, 'Out Of:', 0, 0, 'L', false);
$pdf->Cell(30, 5, $out_of, 'B', 1, 'C', false);

$pdf->Ln(3);
$pdf->Cell(22, 5, 'Class Position: ', 0, 0, 'L', false);
$pdf->Cell(68, 5, '', 'B', 1, 'L', false);

$pdf->Ln(3);

$pdf->Cell(18, 5, 'Average: ', 0, 0, 'L', false);
$pdf->Cell(72, 5, $everage . " %", 'B', 1, 'C', false);



$pdf->Ln(5);
$pdf->MultiCell(0, 5, 'NOTE:.', 0, 1, 'C', true);

$pdf->Output();