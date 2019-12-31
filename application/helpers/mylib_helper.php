<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('generatehtml'))
{
	function rp($x)
       {
            if(is_int($x)==FALSE)
            {
                return '';
            }
            else
            {
           return number_format((int)$x,0,",",".");
            }
       }
       
       function waktu()
       {
           date_default_timezone_set('Asia/Jakarta');
           return date("Y-m-d H:i:s");
       }
              
       function tgl_indo($tgl)
       {
            return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4);
       }
    
    function tgl_indojam($tgl,$pemisah)
    {
        return substr($tgl, 8, 2).' '.getbln(substr($tgl, 5,2)).' '.substr($tgl, 0, 4).' '.$pemisah.' '.  substr($tgl, 11,8);
    }
    
    
    function getbln($bln)
    {
        switch ($bln) 
        {
            
            case 1:
                return "Januari";
            break;
        
            case 2:
                return "Februari";
            break;
        
            case 3:
                return "Maret";
            break;
        
            case 4:
                return "April";
            break;
        
            case 5:
                return "Mei";
            break;
        
            case 6:
                return "Juni";
            break;
        
            case 7:
                return "Juli";
            break;
        
            case 8:
                return "Agustus";
            break;
        
            case 9:
                return "September";
            break;
        
             case 10:
                return "Oktober";
            break;
        
            case 11:
                return "November";
            break;
        
            case 12:
                return "Desember";
            break;
        }
        
    }
    
	function sopirStat($stat)
	{
		switch($stat){
			case 0:
				return "Non Aktif";
			case 1:
				return "Aktif";
			break;
		}
	}
	
	function userStat($user)
	{
		switch($user){
			case 0:
				return "Non Aktif";
			case 1:
				return "Aktif";
			break;
		}
	}
	
	function oprStat($stat)
	{
		switch($stat){
			// case 0:
				// return "-";
			// case 1:
				// return "Kembali";
			// case 2:
				// return "Dibatalkan";
			// case 3:
				// return "Selesai";
			// case 4:
				// return "Berangkat";
			// case 5:
				// return "Stand By";
			// break;
			case 1:
				return "Stand By"; //Belum dipakai
			case 2:
				return "Berangkat";
			case 3:
				return "Selesai";
			break;
		}
	}
	
	function reqStat($stat)
	{
		switch($stat){
			case 0:
				return "Dibuat";
			case 1:
				return "Disetujui";
			case 2:
				return "Ditolak";
			case 3:
				return "Selesai";
			break;
		}
	}
	
	function spj($id)
	{
		switch($id){
			case 1:
				return "Dalam kota";
			case 2:
				return "Luar kota";
			break;
		}
	}
	
	function jabatanJ($j)
	{
		switch($j){
			case 0:
				return "Non Struktural";
			case 1:
				return "Struktural";
			break;
		}
	}
	
	function userTipe($t)
	{
		switch($t){
			case 1:
				return "Administrator";
			case 2:
				return "Manajer";
			case 3:
				return "User";
			case 4:
				return "Operator";
			case 5:
				return "Sopir";
			break;
		}
	}
	
	function carStat($k)
	{
		switch($k){
			case 0:
				return "Dikembalikan";
			case 1:
				return "Tersedia";
			case 2:
				return "Sedang Digunakan";
			case 3:
				return "Rusak";
			case 4:
				return "Sedang Diperbaiki";
			case 5:
				return "Dipesan";
			break;
		}
	}
	
	function check_trans($data)
	{
		switch($data){
			 case 'K':
				return "PEMINJAMAN";
			 break;
			 case 'R':
				return "REIMBURSE";
			 break;
		 }
	}
	
    function selisihTGl($tgl1,$tgl2)
    {
        $pecah1 = explode("-", $tgl1);
        $date1 = $pecah1[2];
        $month1 = $pecah1[1];
        $year1 = $pecah1[0];

        // memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
        // dari tanggal kedua

        $pecah2 = explode("-", $tgl2);
        $date2 = $pecah2[2];
        $month2 = $pecah2[1];
        $year2 =  $pecah2[0];

        // menghitung JDN dari masing-masing tanggal

        $jd1 = GregorianToJD($month1, $date1, $year1);
        $jd2 = GregorianToJD($month2, $date2, $year2);

        // hitung selisih hari kedua tanggal

        $selisih = $jd2 - $jd1;
        return $selisih;
    }
    
    function seoString($s) 
    {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d

        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }
    
    function ubahtanggal($tanggal)
    {
        return $newtanggal= substr($tanggal,8,2).'-'.substr($tanggal, 5,2).'-'.substr($tanggal, 0,4);
    }
    
    function ubahtanggal2($tanggal)
    {
        return $newtanggal=substr($tanggal,8,2 ).'/'.  substr($tanggal, 5,2).'/'.  substr($tanggal, 0,4);
    }
    
    
	function pivot_laporan($nim,$jenis_bayar,$tgl_awal,$tgl_akhir,$kode)
    {
        $CI     =   & get_instance();
		$m      =   $CI->db->query("select prodi_id,angkatan_id from student_siswa where nim='$nim'")->row_array();
		if($kode=='GT')
		{
			$sql="SELECT sum(jumlah) as total from keuangan_pembayaran_detail where jenis_bayar_id=$jenis_bayar and left(tanggal,10) BETWEEN '$tgl_awal' and '$tgl_akhir'";
		}else{
			$sql="SELECT sum(jumlah) as total from keuangan_pembayaran_detail where nim='$nim' and jenis_bayar_id=$jenis_bayar and left(tanggal,10) BETWEEN '$tgl_awal' and '$tgl_akhir'";
		}
		$data=$CI->db->query($sql);
			if($data->num_rows()>0)
				{
					$r=$data->row_array();
					return $r['total'];
				}
			else
				{
					return 0;
				}
    }
	
    function chek_bayar($nim,$jenis_bayar,$kode)
    {
        // 01 jumlah harus bayar dan 02 jumlah yang sudah dibayar
        $CI     =   & get_instance();
		$m      =   $CI->db->query("select prodi_id,angkatan_id from student_siswa where nim='$nim'")->row_array();
        if($kode==01)
        {
            $j=$CI->db->get_where('keuangan_biaya_kuliah',array( 'jenis_bayar_id'=>$jenis_bayar,'angkatan_id'=>$m['angkatan_id'],'prodi_id'=>$m['prodi_id']))->row_array();
			if($jenis_bayar==1)  //Jika SPP
			{
				return  $j['jumlah']*12;
			}else{
				return  $j['jumlah'];
			}
        }
        else
        {
            $sql="SELECT sum(jumlah) as total from keuangan_pembayaran_detail where nim='$nim' and jenis_bayar_id=$jenis_bayar";
            $data=$CI->db->query($sql);
            if($data->num_rows()>0)
            {
                $r=$data->row_array();
                return $r['total'];
            }
            else
            {
                return 0;
            }
        }
    }
    
    function chek_bayar_semester($nim,$semester)
    {
        $CI     =   & get_instance();
        $sql="  SELECT sum(jumlah) as jumlah 
                FROM keuangan_pembayaran_detail 
                WHERE nim='$nim' and jenis_bayar_id='3' and semester='$semester'";
        $data=$CI->db->query($sql);
        if($data->num_rows()>0)
        {
            $r  =   $data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 0;
        }
    }
    
    function jml_spp_konsentrasi($konsentrasi_id,$tahun_akademik_id)
    {
        $CI     =   & get_instance();
        $tahun=  getField('akademik_tahun_akademik', 'tahun_akademik_id', 'tahun', $tahun_akademik_id);
        $data=$CI->db->get_where('keuangan_biaya_kuliah',array('jenis_bayar_id'=>3,'konsentrasi_id'=>$konsentrasi_id,'angkatan_id'=>$tahun_akademik_id));
        if($data->num_rows()>0)
        {
            $r=$data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 'empty';
        }
        //return $tahun_akademik_id;
    }
    
    
    
        function jml_spp_konsentrasi2($konsentrasi_id,$tahun_akademik_id)
    {
        $CI     =   & get_instance();
        $tahun=  getField('akademik_tahun_akademik', 'tahun_akademik_id', 'tahun', $tahun_akademik_id);
        $data=$CI->db->get_where('keuangan_biaya_kuliah',array('jenis_bayar_id'=>3,'konsentrasi_id'=>$konsentrasi_id,'angkatan_id'=>$tahun_akademik_id));
        if($data->num_rows()>0)
        {
            $r=$data->row_array();
            return $r['jumlah'];
        }
        else
        {
            return 'empty';
        }
        //return $tahun_akademik_id;
    }
    
    
    function status_registrasi($tahun_akademik_id,$nim,$field)
    {
        $CI     =   & get_instance();
        $data=$CI->db->get_where('akademik_registrasi',array('nim'=>$nim,'tahun_akademik_id'=>$tahun_akademik_id));
        if($data->num_rows()<0)
        {
            return '';
        }
        else
        {
            $r=$data->row_array();
            return $r[$field];
        }
    }

    function users_keterangan($level,$keterangan)
    {
        if($level==2)
        {
            
            return getField('akademik_prodi', 'nama_prodi', 'prodi_id', $keterangan);
        }
        elseif($level==3)
        {
            return getField('app_dosen', 'nama_lengkap', 'dosen_id', $keterangan);
        }
        else
        {
            return '';
        }
    }
    
    function akses_admin()
    {
         $CI     =   & get_instance();
        $sess=$CI->session->userdata('level');
        if($sess!=1)
        {
            redirect('message'); 
        }
    }
    
    function akses_dosen()
    {
        $CI     =   & get_instance();
        $sess   =   $CI->session->userdata('level');
        $dosen  =   $CI->session->userdata('keterangan');
        if($sess==3)
        {
            // chek id ada atau tidak
            $chek   =$CI->db->get_where('app_dosen',array('dosen_id'=>$dosen))->num_rows();
            if($chek<1)
            {
                redirect('auth/login');
            }
        }
        else
        {
            redirect('auth/login');
        }
    }
}
