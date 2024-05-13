<?php
return [
    'custom' => function( $data = ['info', 'Info'] ){ return $data; },
    'API' => [
        'method_not_found' => ['fail', 'Terjadi Kesalahan Pada Client'],
    ],
    'auth' => [
        'auth_failed' => ['fail', 'Autentikasi Gagal'],
        'not_admin' => ['fail', 'Anda Bukan Admin'],
        'not_murid' => ['fail', 'Anda Bukan Murid'],
    ],
    'rfid' => [
        'card_id_unregistered' => ['ID Kartu Tidak Terdaftar'],
    ],
    'scanner' => [
        'invalid' => ['fail', 'Barang Tidak Valid'],
        'scan_success' => ['success', 'Barang Berhasil Di Scan'],
        'cart_add' => ['info', 'Barang Berhasil Ditambahkan'],
        'cart_add_exist' => ['info', 'Barang Sudah Ditambahkan'],
        'cart_add_fail' => ['fail', 'Barang Gagal Ditambahkan'],
        'cart_delete' => ['info', 'Barang Berhasil Dihapus'],
        'cart_delete_fail' => ['fail', 'Barang Gagal Dihapus'],
        'return_items' => ['success', 'Barang Berhasil Dikembalikan'],
        'return_items_fail' => ['fail', 'Barang Gagal Dikembalikan'],
    ],
    'cart' => [
        'something_wrong' => ['fail', 'Terjadi Kesalahan Pada Server'],
        'checkout' => ['success', 'Barang Berhasil Dipinjam'],
        'checkout_fail' => ['fail', 'Barang Gagal Dipinjam']
    ],
    'items' => [
        'invalid' => ['fail', 'Terjadi Kesalahan Pada Server'],
        'invalid_type' => ['fail', 'Jenis Barang Tidak Ditemukan'],
        'add_items' => ['success', 'Items Berhasil Dibuat'],
        'delete_success' => ['success', 'Items Berhasil Dihapus'],
    ]
];
