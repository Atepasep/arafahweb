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
    $jumlah = strlen($kata)*2;
    // if (strlen($kata) <= 5) {
    //     $hasil = str_repeat('*', strlen($kata) - 1) . substr($kata, strlen($kata) - 1, 1);
    // } else {
    //     $hasil = substr($kata, 0, 1) . str_repeat('*', strlen($kata) - 3) . substr($kata, strlen($kata) - 2, 2);
    // }
    return str_repeat($hasil,$jumlah);
}