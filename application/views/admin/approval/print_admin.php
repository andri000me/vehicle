<html>

<head>
<title>Surat Perintah Jalan</title>
<style type="text/css">
<!--
.style3 {font-size: 18px}
.style5 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}


-->
#main-content{
   width: 700px;
}

#ataskiri {
   float: left;
   position: relative;
   margin-top: 10px;
   width: 350px; 
   }

#ataskanan {
   float: right;
   position: relative;
   margin-top: 10px;
 }

#tengah{
   float: left;
}

table#table_atas {
	width: 244px;
	border-width: 0px;
	border-color: #000000;
	border-collapse: collapse;
}

table#table_atas td {
	border-width: 1px;
	padding: 0px;
	border-style: solid;
	border-color: #000000;
	background-color: #ffffff;
}
 
.style8 {font-size: 14px}
.style11 {font-size: 16px}
.style12 {
	font-family: Arial, Helvetica, sans-serif
}

body
{
background-repeat:no-repeat;
background-position: 130px 270px;

}  

#print-image {
    display:none; 
	position: absolute;
	left: 130px;
	top: 270px;
	z-index: -1;
	
	}

</style>

<link rel="stylesheet" href="<?php echo base_url();?>asset/css/print.css" type="text/css" media="print" />
</head>

<?php
   $row = $surat->row();
?>

<body onLoad="window.print(); window.close();" background="<?php echo base_url();?>asset/images/C.jpg">
<div id="main-content">

<div id="ataskiri">
<p align="left" class="style5 style11 style12">PT PEMBANGKITAN JAWA-BALI SERVICES</p>
<p><span class="style3"><strong><u>SURAT PERINTAH JALAN</u></strong></span></p>
</div>

<div id="ataskanan">
  <table width="251" border="0px" id="table_atas">
    <tr>
      <td width="72" ><span class="style8">Nomor</span></td>
      <td width="169" class="style8"><?php echo $row->ID_REQUEST."".$row->ID_OPERASIONAL ?></td>
    </tr>
    <tr>
      <td class="style8">Tgl.</td>
      <td class="style8"><?php echo date("d-m-Y"); ?></td>
    </tr>
    <tr>
      <td class="style8">No. Polisi</td>
      <td class="style8"><?php echo $row->NO_POLISI; ?></td>
    </tr>
    <tr>
      <td class="style8">Jenis</td>
      <td class="style8"><?php echo $row->JENIS_KENDARAAN; ?></td>
    </tr>
  </table>
</div>

<div id="tengah">
<table width="687" border="0">
  <tr>
    <td width="150">Nama Pengemudi</td>
    <td width="6">:</td>
    <td colspan="4"><?php echo $row->NAMA_PENGEMUDI; ?></td>
  </tr>
  <tr>
    <td>Tujuan</td>
    <td>:</td>
    <td colspan="3"><?php echo $row->TUJUAN; ?></td>
    <td width="27">Km.</td>
  </tr>
  <tr>
    <td>Lama Perjalanan</td>
    <td>:</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>Berangkat Tanggal</td>
    <td>:</td>
    <td width="191"><?php echo $row->TGL_BERANGKAT; ?></td>
    <td width="38">Jam :</td>
    <td colspan="2"><?php echo $row->JAM_KELUAR; ?></td>
  </tr>
  <tr>
    <td>Kembali Tanggal</td>
    <td>:</td>
    <td><?php echo $row->TGL_KEMBALI; ?></td>
    <td>Jam :</td>
    <td colspan="2"><?php echo $row->JAM_KEMBALI; ?></td>
  </tr>
  <tr>
    <td>Pengisian BB Prem/Sol</td>
    <td>:</td>
    <td>-</td>
    <td colspan="3">Ltr</td>
  </tr>
</table>
  <br/>
<table width="593" border="0">
  <tr>
    <td width="198"><div align="center">Mengetahui / Menyetujui</div></td>
    <td width="157">&nbsp;</td>
    <td width="224"><div align="center">Surabaya, <?php echo date("d-m-Y"); ?></div></td>
  </tr>
  <tr>
    <td><div align="center">Kepala,</div></td>
    <td>&nbsp;</td>
    <td><div align="center">Administrator Kendaraan</div></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">( <?php echo $row->APPROVED_BY; ?> )</div></td>
    <td>&nbsp;</td>
    <td><div align="center">( <?php echo $row->APPROVED_BY_ADMIN; ?> )</div></td>
  </tr>
</table>

<div id="bg">    
<img id="print-image" src="<?php echo base_url();?>asset/images/C.jpg" /></div>
</div>

<div align="center" style="position:absolute; top:430px; left:0px; float:left; z-index:1; width:700px;">
<hr/>
<span class="style5">PERMOHONAN PEMAKAIAN KENDARAAN BERMOTOR DINAS </span><br/>
<b><span class="style5"><u>KEPERLUAN: DINAS / SOSIAL / REKREASI</u></span></b>
</div>

<br/>

<div style="position:absolute; top:500px; left:0px; z-index:1;">
<table width="687" border="0">
  <tr>
    <td width="173">Nama Pemohon</td>
    <td width="6">:</td>
    <td colspan="4"><?php echo $row->NAMA_PEMOHON; ?></td>
  </tr>
  
  <tr>
    <td>Jumlah Penumpang/Pengikut</td>
    <td>:</td>
    <td colspan="4"><?php echo $row->JML_PENUMPANG."&nbsp;Orang"; ?></td>
  </tr>
  
  <tr>
    <td>Tujuan</td>
    <td>:</td>
    <td colspan="3"><?php echo $row->TUJUAN; ?></td>
    <td width="27">Km.</td>
  </tr>
  
  <tr>
    <td>Hari/Tanggal yang diinginkan</td>
    <td>:</td>
    <td colspan="4"><?php echo $row->TGL_BERANGKAT; ?></td>
  </tr>

  <tr>
    <td>Berangkat Tanggal</td>
    <td>:</td>
    <td width="164"><?php echo $row->TGL_BERANGKAT; ?></td>
    <td width="42">Jam :</td>
    <td colspan="2"><?php echo $row->JAM_KELUAR; ?></td>
  </tr>
  <tr>
    <td>Kembali Tanggal</td>
    <td>:</td>
    <td><?php echo $row->TGL_KEMBALI; ?></td>
    <td>Jam :</td>
    <td colspan="2"><?php echo $row->JAM_KEMBALI; ?></td>
  </tr>
</table>
<br/>
<table width="593" border="0">
  <tr>
    <td width="196"><div align="center">Mengetahui / Menyetujui</div></td>
    <td width="161">&nbsp;</td>
    <td width="214"><div align="center">Surabaya, <?php echo date("d-m-Y"); ?></div></td>
  </tr>
  <tr>
    <td><div align="center">Kepala,</div></td>
    <td>&nbsp;</td>
    <td><div align="center">Pemohon</div></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">( <?php echo $row->APPROVED_BY; ?> )</div></td>
    <td>&nbsp;</td>
    <td><div align="center">( <?php echo $row->NAMA_PEMOHON; ?> )</div></td>
  </tr>
</table>

<br/>
<b><u>Keterangan:</u></b><br/>
Perubahan / Penyimpangan route SPJ ini menjadi tanggung jawab Pengemudi &amp; Pemakai Utama.
</div>

</div>  <!-- End of div tengah -->

</div>
</body>

</html>
<?php
	
	

?>
