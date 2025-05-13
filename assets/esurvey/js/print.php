<?php
require_once '../../assets/lib/fpdf/fpdf.php';
require_once '../../config/koneksi.php';

class PDF extends FPDF
{
    //Page footer
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),200,$this->GetY());
        //Arial italic 9
        $this->SetFont('Arial','I',9);
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}


$pdf = new FPDF('p','mm','legal');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);

$pdf->Cell(30,8,'',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat

$pdf->SetFont('Courier','',10);

    $get   = $_GET['no_ppd'];
    $query = "SELECT * FROM view_ppd WHERE no_ppd = '$get'";
    $hasil = mysqli_query($db, $query);
    $data_detail_i= array();
    $number= 1;
    while ($row = mysqli_fetch_assoc($hasil)) {
    $data[] = $row;

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,30,'',0,0);
    $pdf->Cell(45,30,date('d-m-Y', strtotime($data[0]['tgl_ppd'])),0,0);
    $pdf->Cell(50,30,$data[0]['no_ppd'],0,0);
    $pdf->SetFont('Courier','',18);
    $pdf->Cell(45,25,strtoupper($data[0]['status']),0,0);
    $pdf->SetFont('Courier','',10);
    $pdf->Cell(45,30,'',0,1);

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,3,'',0,0);
    $pdf->Cell(96,3,$data[0]['username'],0,0);
    $pdf->Cell(50,2,$data[0]['divisi'],0,1);

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,14,'',0,0);
    $pdf->Cell(30,14,'Rp.'.number_format($data[0]['nominal']).',-',0,0);
    $pdf->Cell(55,14,$data[0]['terbilang'],0,0);
    $pdf->Cell(60,12,'',0,1);

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,7,'',0,0);
    $pdf->Cell(30,7,$data[0]['tujuan'],0,1);

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,7,'',0,0);
    $pdf->Cell(30,7,$data[0]['paid_to'],0,1);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(60,0,'',0,0);
    if ($data[0]['how_pay'] !== 'tunai') {
        $pdf->Cell(15,0,'',0,0);
        $pdf->Cell(0,7,'------',0,1);
    }else{
        $pdf->Cell(50,7,'------',0,1);
    }

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,10,'',0,0);
    $pdf->Cell(30,10,$data[0]['owner'].' / '.$data[0]['rekening'],0,1);

    $pdf->SetFont('Courier','',10);
    $pdf->Cell(60,7,'',0,0);
    $pdf->Cell(30,7,'',0,1);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(31,6,'',0,0);
    if ($data[0]['jenis_ppd'] == 'Uang Muka') {
        $pdf->Cell(0,6,'X',0,1);
    }elseif($data[0]['jenis_ppd'] == 'Reimbursements'){
        $pdf->Cell(53,0,'',0,0);
        $pdf->Cell(50,6,'X',0,1);
    }elseif($data[0]['jenis_ppd'] == 'Pembayaran'){
        $pdf->Cell(90,0,'',0,0);
        $pdf->Cell(50,5,'X',0,1);
    }elseif($data[0]['jenis_ppd'] == 'Lain-lain'){
        $pdf->Cell(138,0,'',0,0);
        $pdf->Cell(50,5,'X',0,1);
    }
    


    }

    $pdf->Output();
?>
