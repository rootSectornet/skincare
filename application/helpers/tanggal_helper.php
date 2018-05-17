<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tanggal'))
{
	function tanggal($var = '')
	{
	$tgl = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$pecah = explode("-", $var);
	return $pecah[2]." ".$tgl[$pecah[1] - 1]." ".$pecah[0];
	}
	function umur($param = ''){
		// Tanggal Lahir
		$birthday = $param;

		// Convert Ke Date Time
		$biday = new DateTime($birthday);
		$today = new DateTime();

		$diff = $today->diff($biday);
		return  $diff->y ." Tahun ";
	}
	// All Method Btn
	function BtnView($link,$nama){
		return '<a href="'.base_url().$link.'" class="btn bg-maroon btn-flat" data-toggle="tooltip" data-placement="top" title="View '.$nama.'"><i class="fa fa-eye"></i></a>';
	}
	function BtnEdit($link,$nama){
		return '<a href="'.base_url().$link.'" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="Edit '.$nama.'"><i class="fa fa-pencil"></i></a>';
	}
	function BtnDelete($link,$nama){
		return '<a href="'.base_url().$link.'" onclick="return ConfirmDialog()" class="btn btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Delete '.$nama.'"><i class="fa fa-trash"></i></a>';
	}
	function BtnCreate($link,$nama){
		return '<a href="'.base_url().$link.'" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Tambah '.$nama.'"><i class="fa fa-plus"></i> Tambah</a>';
	}
	function BtnSave($nama){
		return '<button type="submit" nama="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Simpan">'.$nama.'</button>';
	}
	function BtnBack($link){
		return '<a class="btn btn-danger btn-flat" href="'.base_url().$link.'" data-toggle="tooltip" data-placement="top" title="Kembali">Kembali</a>';
	}
	function BtnVerif($link,$nama){
		return '<a class="btn btn-info btn-flat" onclick="return ConfirmVerif()" href="'.base_url().$link.'" data-toggle="tooltip" data-placement="top" title="Verifikasi '.$nama.'"><i class="fa fa-check"></i></a>';
	}
	function BtnunVerif($link,$nama){
		return '<a class="btn btn-warning btn-flat" onclick="return ConfirmVerif()" href="'.base_url().$link.'" data-toggle="tooltip" data-placement="top" title="Batalkan Verifikasi '.$nama.'"><i class="fa fa-check"></i></a>';
	}
	function BtnPrint($link,$nama){
		return '<a class="btn btn-default btn-flat" href="'.base_url().$link.'" data-toggle="tooltip" data-placement="top" title="Print '.$nama.'"><i class="fa fa-print"></i></a>';
	}
	function AlertSuccess($message){
		return "<div class='alert bg-blue alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4><i class='icon fa fa-ban'></i> Information !!!</h4>".$message."</div>";
	}
	function AlertFailed($message){
		return "<div class='alert bg-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4><i class='icon fa fa-ban'></i> Information !!!</h4>".$message."</div>";
	}
	//end all method btn
}
