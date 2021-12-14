<?php

include  'C:/xampp/htdocs/projetlivraison/lib/fpdf/fpdf.php';

//include "../core/clientC.php";
include "C:/xampp/htdocs/projetlivraison/controller/livraisonC.php";



$livraisonC = new livraisonC();
$listeliv=$livraisonC->afficherlivraison();
/**
 *  
 */
class myPDF extends FPDF
{

function header()
{    
//$this->Image('images/eye.jpg',10,6);
$this->SetFont('Arial','B',14);
$this->Cell(276,5,'les reclamtions',0,0,'C');
$this->Ln(20);
$this->SetFont('Times','',12);

$this->Text(8,60,'Liste des reclamations:');
//$this->Text(8,65,'Date :'.date("d-m-Y"));
//$this->Text(8,70,'Mode de reglement : check');
$this->Text(230,60,'esprit');
$this->Text(230,65,'19 rue xxxx , Ariana');
$this->Text(230,70,'7070');
$this->Ln(50);


}
function footer()
{
$this->SetY(-15);
$this->SetFont('Arial','',0);
$this->Cell(196,5,' TEL:+71 xxx xxx ' ,0,0,'C');///////
$this->LN();

$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
function headerTable(){

$this->SetFont('Arial','B',12);
$this->Cell(40,10,'idCommande ',1,0,'C');



$this->LN();



}
function viewTable($lis)
{
$this->SetFont('times','',12);
foreach($listeliv as $livraison):
    $this->Cell(40,10,  $livraison->idCommande ,1,0,'C');



$this->LN();

endforeach;
$this->LN();

}


}

$format=array(3,5);
$pdf=new FPDF('P','in',$format);
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->h/eaderTable();
$pdf->viewTable($listereclamation);
$pdf->Output();

?>