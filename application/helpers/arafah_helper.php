<?php
define('LOK_UPLOAD_USER', "./assets/images/user_avatar/");
define('LOK_UPLOAD_PERSONIL', "./assets/images/personil/");
define('LOK_UPLOAD_BARANG', "./assets/images/barang/");
function datauser($kode, $kolom)
{
    if ($kode != '') {
        $CI = &get_instance();
        $kode = $CI->usermodel->getdatabyid($kode)->row_array();
        return $kode[$kolom];
    }
}
function datacabang($kode, $kolom)
{
    if ($kode != '') {
        $CI = &get_instance();
        $kode = $CI->usermodel->getdatacabang($kode)->row_array();
        return $kode[$kolom];
    }
}
function visibpass($kata)
{
    $hasil = '•';
    $jumlah = strlen($kata) >= 6 ? strlen($kata) : strlen($kata)*2;
    return str_repeat($hasil,$jumlah);
}
function cekmodul($kode,$ke){
    $string = '';
    $hasil = substr($kode,$ke*2-2,2);
    if($hasil=='10'){
        $string = 'checked';
    }
    return $string;
}
function max_upload()
{
	$max_filesize = (int) (ini_get('upload_max_filesize'));
	$max_post     = (int) (ini_get('post_max_size'));
	$memory_limit = (int) (ini_get('memory_limit'));
	return min($max_filesize, $max_post, $memory_limit);
}
function addnik(){
    $CI = &get_instance();
    $kode = $CI->personilmodel->getnik();
    if($kode->num_rows()==0){
        $norut = 0;
    }else{
        $ada = $kode->row_array();
        $norut = $ada['niko'];
    }
    $norut = (int) $norut;
    $norut++;
    return 'ARM.'.sprintf('%02d', date('m')).date('y').sprintf("%04s", $norut);
}
function kodesupplier(){
    $CI = &get_instance();
    $kode = $CI->suppliermodel->kodesupplier();
    if($kode->num_rows()==0){
        $norut = 0;
    }else{
        $ada = $kode->row_array();
        $norut = $ada['niko'];
    }
    $norut = (int) $norut;
    $norut++;
    return 'ARM.SUP.'.sprintf("%04s", $norut);
}
function kodecustomer(){
    $CI = &get_instance();
    $kode = $CI->customermodel->kodecustomer();
    if($kode->num_rows()==0){
        $norut = 0;
    }else{
        $ada = $kode->row_array();
        $norut = $ada['niko'];
    }
    $norut = (int) $norut;
    $norut++;
    return 'ARM.CST.'.sprintf("%04s", $norut);
}
function kodebarang(){
    $CI = &get_instance();
    $kode = $CI->barangmodel->kodebarang();
    if($kode->num_rows()==0){
        $norut = 0;
    }else{
        $ada = $kode->row_array();
        $norut = $ada['niko'];
    }
    $norut = (int) $norut;
    $norut++;
    return 'BRG.'.sprintf("%06s", $norut);
}
function tglmysql($tgl)
{
    if ($tgl == '') {
        $rubah = '';
    } else {
        $x = explode('-', $tgl);
        $rubah = $x[2] . '-' . $x[1] . '-' . $x[0];
    }
    if ($rubah == '00-00-0000' || $rubah == '0000-00-00') {
        $rubah = '';
    }
    return $rubah;
}
function rupiah($nomor, $dec)
{
    if ($nomor == '0' || $nomor == '-6.821210263297E-13' || $nomor == '' || $nomor == NULL || is_null($nomor)) {
        $hasil = '-  ';
    } else {
        if ($nomor >= 0) {
            $hasil = number_format($nomor, $dec, '.', ',');
        } else {
            if ($nomor != '0.00') {
                $nomor = $nomor * -1;
                $hasil = number_format($nomor, $dec, '.', ',');
                $hasil = '(' . $hasil . ')';
            } else {
                $hasil = '-  ';
            }
        }
    }
    return $hasil;
}
function tgl_indo($tanggal, $kode = 0)
{
    $namahari = '';
    $tanggal = is_null($tanggal) ? '0000-00-00' : $tanggal;
    if ($kode == 1) {
        $hari = date("D", strtotime($tanggal));
        switch ($hari) {
            case 'Mon':
                $namahari = 'Senin';
                break;
            case 'Tue':
                $namahari = 'Selasa';
                break;
            case 'Wed':
                $namahari = 'Rabu';
                break;
            case 'Thu':
                $namahari = 'Kamis';
                break;
            case 'Fri':
                $namahari = 'Jum\'at';
                break;
            case 'Sat':
                $namahari = 'Sabtu';
                break;
            case 'Sun':
                $namahari = 'Minggu';
                break;
            default:
                $namahari = 'Error';
                break;
        }
    }
    if ($tanggal != '0000-00-00') {
        $bulan = array(
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agt',
            'Sep',
            'Okt',
            'Nop',
            'Des'
        );
        $pecahkan = explode('-', $tanggal);
        if ($kode == 0) {
            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        } else {
            return $namahari . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
    } else {
        return '';
    }
}
function umurnow($tgl){
    $tanggal_lahir = new DateTime($tgl);
    $sekarang = new DateTime("today");
    if ($tanggal_lahir > $sekarang) { 
        $thn = "0";
        $bln = "0";
        $tgl = "0";
    }
    $jadi = '';
    $thn = $sekarang->diff($tanggal_lahir)->y;
    $bln = $sekarang->diff($tanggal_lahir)->m;
    $tgl = $sekarang->diff($tanggal_lahir)->d;
    if($thn > 0){
        $jadi .= $thn."th ";
    }
    if($bln > 0){
        $jadi .= $bln."bl ";
    }
    if($tgl > 0){
        $jadi .= $tgl."hr";
    }

    return $jadi;
}
function toAngka($rp)
{
    return str_replace(',', '', $rp);
}