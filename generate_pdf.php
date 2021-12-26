<?php
//include connection file 
include_once("connection.php");
include_once('fpdf.php');

class PDF extends FPDF
{
    
// Page header
function Header()
{  
    $this->Image('logo.png',10,-1,40);
    $this->SetFont('Times','B',15);
    $this->Cell(80);
    $this->Cell(80,10,'Your Invoice',0,0,'L');
    $this->Ln(20);
}

// Page footer
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Times','B',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('id'=>'ID', 'name'=> 'Name', 'phone'=> 'Phone','email'=> 'Email','amount'=> 'Amount','pay_id'=> 'Payment ID','added_on'=> 'Payment Date');

$result = mysqli_query($connString, "SELECT id, name, phone, email, amount, pay_id, added_on FROM razorpay") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM razorpay");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Times','B',8);
foreach($header as $heading) {
$pdf->Cell(28,12,$display_heading[$heading['Field']],0,0,'C');
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(28,12,$column,0,0,'C');
}

$pdf->Output();

$pdf->Output();

?>