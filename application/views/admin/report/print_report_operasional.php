<html>

<head>
<title>Report Operasional</title>
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
   width:800px;
   min-height:500px;
}

#atas {
	width:700px;
	position:relative;
	margin:auto;
	margin-top:25px;
}

#tengah{
	margin-top:25px;
   	float: left;
}

table#table {
	border-color: #000000;
	border-collapse: collapse;
}

table#table td {
	border-width: 2px;
	border-style: solid;
	border-color: #000000;

}
 
.style8 {
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif
		}
		
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
   $tanggal = explode('|', $tgl);
?>

<body onLoad="window.print(); window.close();">
<div id="main-content">

<div id="atas">
<p align="center"><span class="style3"><b>REPORT DATA OPERASIONAL KENDARAAN</b></span></p>
<p align="center"><span class="style3">PT PEMBANGKITAN JAWA-BALI SERVICES <?php echo $tanggal[0]." s/d ".$tanggal[1]?></span></p>
</div>

<div id="tengah">
<table width="780" id="table" style="margin-left:8px">
  <tr>
    <td width="2%"  class="style5" >No</td>
    <td width="27%" class="style5" align="center">Nama</td>
    <td width="30%" class="style5" align="center">Sopir / Kendaraan</td>
    <td width="15%" class="style5" align="center">Waktu Berangkat</td>
    <td width="15%" class="style5" align="center">Waktu Kembali</td>
    <td width="10%" class="style5" align="center">Tujuan</td>
  </tr>
<?php
  	$no = 1;
	foreach($user->result() as $row)
	{ 
?>
  <tr>
  	<td width="2%"  class="style8" ><?php echo $no;?></td>
    <td width="27%" class="style8" ><?php echo $row->PEMOHON;?></td>
    <td width="30%" class="style8" ><?php echo $row->NAMA_SOPIR." - ".$row->JENIS_KENDARAAN." ".$row->NO_POLISI; ?></td>
    <td width="15%" class="style8" align="center"><?php echo $row->TGL_BERANGKAT." ".$row->JAM_KELUAR; ?></td>
    <td width="15%" class="style8" align="center"><?php echo $row->TGL_KEMBALI." ".$row->JAM_KEMBALI; ?></td>
    <td width="10%" class="style8" ><?php echo $row->KETERANGAN_TUJUAN; ?></td>
  </tr>
<?php
	$no++;
	}
?>
</table>
  <br/>

<br/>
<table width="780" border="0">
  <tr>
    <td width="196"><div align="center">Mengetahui / Menyetujui</div></td>
    <td width="161">&nbsp;</td>
    <td width="214"><div align="center">Surabaya, <?php echo date("d-m-Y"); ?></div></td>
  </tr>
  <tr>
    <td><div align="center">Sekertaris Perusahaan,</div></td>
    <td>&nbsp;</td>
    <td><div align="center">Pengelola Kendaraan Dinas</div></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">( HARTANTO WIBOWO )</div></td>
    <td>&nbsp;</td>
    <td><div align="center">( IVAN YULIANTO )</div></td>
  </tr>
</table>

<br/>
<!--<b><u>Keterangan:</u></b><br/>
Perubahan / Penyimpangan route SPJ ini menjadi tanggung jawab Pengemudi &amp; Pemakai Utama.
</div>-->

</div>  <!-- End of div tengah -->

</div>
</body>

</html>