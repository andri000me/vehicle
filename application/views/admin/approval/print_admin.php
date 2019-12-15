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
   margin-top: 20px;
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
	padding: 5px;
	border-style: solid;
	font-size: 16px;
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
</head>

<?php
   $row = $surat->row();
?>
<body onLoad="window.print();" background="<?php echo base_url();?>asset/images/C.jpg">
<div id="main-content">

<div id="ataskiri">
	<strong>
		<p class="style11 style12">PT PEMBANGKITAN JAWA BALI SERVICES</p>
		<p><u>SURAT PERINTAH JALAN</u></p>
	</strong>
</div>

<div id="ataskanan">
  <table id="table_atas">
    <tr>
      <td width="72" >Nomor</td>
      <td width="170"><?php echo $row->ID_PEMINJAMAN; ?></td>
    </tr>
    <tr>
      <td>Tgl.</td>
      <td><?php echo date("d-m-Y"); ?></td>
    </tr>
  </table>
</div>

<div id="tengah">
	<table width="700">
	  <tr>
		<td width="150">Nama Pengemudi</td>
		<td width="6">:</td>
		<td colspan="4"><?php echo $row->NAMA; ?></td>
	  </tr>
	  <tr>
		<td>No. Polisi</td>
		<td>:</td>
		<td colspan="4"><?php echo $row->NO_POLISI; ?></td>
	  </tr>
	  <tr>
		<td>Kendaraan</td>
		<td>:</td>
		<td colspan="4"><?php echo $row->NAMA_KENDARAAN; ?></td>
	  </tr>
	</table>
</div>

<div align="center" style="position:absolute; top:430px; left:0px; float:left; z-index:1; width:700px;">
<hr/>
<span class="style5"><u>PERMOHONAN PEMAKAIAN KENDARAAN DINAS</u></span><br/>
</div>

<br/>

<div style="position:absolute; top:500px; left:0px; z-index:1;">
	<?php 
		foreach($surat_detail->result() as $sd){
	?>
	<table width="687" border="0">
	  <tr>
		<td width="173">Nama Pemohon</td>
		<td width="6">:</td>
		<td colspan="4"><?php echo $sd->NAMA; ?></td>
	  </tr>
	  <tr>
		<td>Jumlah Penumpang/Pengikut</td>
		<td>:</td>
		<td colspan="4"><?php echo $sd->PENUMPANG."&nbsp;Orang"; ?></td>
	  </tr>
	  <tr>
		<td>Tujuan</td>
		<td>:</td>
		<td colspan="4"><?php echo $sd->TUJUAN; ?></td>
	  </tr>
	  <tr>
		<td>Tanggal Berangkat</td>
		<td>:</td>
		<td colspan="4"><?php echo $sd->TGL_BERANGKAT; ?></td>
	  </tr>
	  <tr>
		<td>Tanggal Kembali</td>
		<td>:</td>
		<td colspan="4"><?php echo $sd->TGL_KEMBALI; ?></td>
	  </tr>
	</table>
	<?php } ?>
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
    <td><div align="center">( <?php echo $sd->APPROVED_BY; ?> )</div></td>
    <td>&nbsp;</td>
    <td><div align="center">( <?php echo $admin->row()->NAMA; ?> )</div></td>
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
