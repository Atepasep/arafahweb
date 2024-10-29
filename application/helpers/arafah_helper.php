<?php
function datauser($kode, $kolom)
{
    if ($kode != '') {
        $CI = &get_instance();
        $kode = $CI->usermodel->getdatabyid($kode)->row_array();
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