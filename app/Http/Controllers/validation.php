<?php
return [
    'add' => [
        'rules' => [
            'category_id' => 'required|exists:category,id',
            'name' => 'required',
            'amount' => 'required|min:1|max:1000',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048|dimensions:ratio=1/1'
        ],
        'errors' => [
            'category_id.required' => 'Field Kategori Harus Diisi.',
            'category_id.exists' => 'Kategori Tidak Terdaftar.',
            'name.required' => 'Field Jenis Harus Diisi.',
            'amount.required' => 'Field Jumlah Harus Diisi.',
            'amount.min' => 'Minimal Jumlah 1.',
            'amount.max' => 'Maksimal Jumlah 1000.',
            'image.required' => 'Field Gambar Harus Diisi.',
            'image.size' => 'Ukuran Gambar Tidak Boleh Lebih Dari 2MB.',
            'image.image' => 'Field Gambar Harus Berupa Gambar.',
            'image.mimes' => 'Gambar Harus Berekstensi jpeg, jpg, png.',
            'image.dimensions' => 'Rasio Gambar Harus 1:1',
        ]
    ]
];
