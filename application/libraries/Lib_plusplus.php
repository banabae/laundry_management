<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_plusplus
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function getTanggalLahir($dataMentah)
	{
	    // $dataMentah
		$tgl   = substr($dataMentah, -2);
		$bulan = substr($dataMentah, 5, 2);
		$tahun = substr($dataMentah, 0, 4);

		$bln = [
			"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
		];

		if ($bulan == 1) {
			$bulan = $bln[0];
		    // $tglLahir = $tgl."-".$bulan."-".$tahun;
		} else if ($bulan == 2) {
			$bulan = $bln[1];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		} else if ($bulan == 3) {
			$bulan = $bln[2];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 4) {
			$bulan = $bln[3];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 5) {
			$bulan = $bln[4];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 6) {
			$bulan = $bln[5];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 7) {
			$bulan = $bln[6];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 8) {
			$bulan = $bln[7];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 9) {
			$bulan = $bln[8];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 10) {
			$bulan = $bln[9];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 11) {
			$bulan = $bln[10];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}
		 else if ($bulan == 12) {
			$bulan = $bln[11];
		    $tglLahir = $tgl." ".$bulan." ".$tahun;
		}

	    // $tglLahir = $tgl."-".$bulan."-".$tahun;

	    return $tglLahir;
	}

	public function getTanggal($dataMentah)
	{
	    // $dataMentah
		$tgl   = substr($dataMentah, -2);
		$bulan = substr($dataMentah, 5, 2);
		$tahun = substr($dataMentah, 0, 4);

	    $tgl = $tgl."-".$bulan."-".$tahun;

	    return $tgl;
	}

	public function getDate($dataMentah)
	{
	    // $dataMentah
		$tgl   = substr($dataMentah, -7, 2);
		$bulan = substr($dataMentah, 0, 2);
		$tahun = substr($dataMentah, -4);

	    $tgl = $bulan."/".$tgl."/".$tahun;

	    return $tgl;
	}

	public function getNoHp($dataMentah)
	{
	    // $dataMentah
		$digit1 = substr($dataMentah, 0, 4);
		$digit2 = substr($dataMentah, 4, 4);
		$digit3 = substr($dataMentah, 8, 5);
		
		$noHp   = $digit1."-".$digit2."-".$digit3;

	    return $noHp;
	}

	public function getRupiah($dataMentah)
    {
        return "Rp" . number_format($dataMentah, 2, ",", ".");
    }

}

/* End of file Lib_plusplus.php */
/* Location: ./application/libraries/Lib_plusplus.php */
