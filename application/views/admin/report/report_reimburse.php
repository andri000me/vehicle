<?php
 

date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("L","cm","A4");
$this->fpdf->SetMargins(1,1,1);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
 
// Setting Font : String Family, String Style, Font size
$nama = $this->session->userdata('nama');
//$this->fpdf->Cell(9.5, 0.5, 'Print : '.date('d/m/Y H:i').' | Petugas : '.$nama,0,'LR','L');
$this->fpdf->Ln();
$this->fpdf->SetFont('helvetica','B',14);
$this->fpdf->Cell(30,0.5,'PT PJB Services',0,0,'C');
 
$this->fpdf->Ln();
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(30,0.5,'Jalan Juanda No. 17 Sidoarjo, Jawa Timur Telp : 1234-875847 Fax : 1234-875123',0,0,'C');
 
$this->fpdf->Ln();
$this->fpdf->Cell(30,0.5,'Homepage : www.pjbservices.com  email : mail@ptpjbs.com',0,0,'C');
$this->fpdf->Line(1,3,29,3); 
/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->fpdf->Ln(1);
$this->fpdf->SetFont('helvetica','B',12);
$this->fpdf->Cell(30,1,'LAPORAN REIMBURSE KENDARAAN');
 
/* setting header tr table */
$this->fpdf->Ln(1);
$this->fpdf->SetFont('helvetica','B',10);
$this->fpdf->Cell(5  , 0.8, 'Nomor Transaksi'   , 1, 'LR', 'L');
$this->fpdf->Cell(7 , 0.8, 'Keterangan' , 1, 'LR', 'L');
$this->fpdf->Cell(7 , 0.8, 'Tanggal Pemberian' , 1, 'LR', 'L');
$this->fpdf->Cell(6 , 0.8, 'Nominal' , 1, 'LR', 'L');
 
/* generate hasil td query disini */
foreach($request->result() as $data)
{
    $this->fpdf->Ln();
    $this->fpdf->SetFont('helvetica','',9);
    $this->fpdf->Cell(5 , 0.6, $data->ID_REIMBURSE  , 1, 'LR', 'L');
	$this->fpdf->Cell(7 , 0.6, $data->KETERANGAN , 1, 'LR', 'L');
	$this->fpdf->Cell(7 , 0.6, $data->TGL_PEMBERIAN , 1, 'LR', 'L');
	$this->fpdf->Cell(6 , 0.6, 'Rp. '.number_format($data->NOMINAL) , 1, 'LR', 'R');
}
/* setting posisi footer 3 cm dari bawah */
$this->fpdf->Ln(2);
// $this->fpdf->Image(base_url() . "asset/images/grafik/contoh.png", 1);


$this->fpdf->SetY(-3);
/* setting font untuk footer */
$this->fpdf->SetFont('helvetica','',8);
/* setting cell untuk waktu pencetakan */ //;
$this->fpdf->Cell(9.5, 0.5, 'Print : '.date('d/m/Y H:i').' | Petugas : '.$nama,0,'LR','L');
/* setting cell untuk page number */
$this->fpdf->Cell(18, 0.5, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'R');
/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output("data_karyawan.pdf","I");
?>