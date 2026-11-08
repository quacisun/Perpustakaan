<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h2 { color: #243b53; }
        p { padding: 10px; border-bottom: 1px solid #ddd; }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Detail Data Buku</h2>

    <p><strong>Kode Buku:</strong> {{ $buku->kode }}</p>
    <p><strong>Judul Buku:</strong> {{ $buku->judul }}</p>
    <p><strong>Penulis:</strong> {{ $buku->penulis }}</p>
    <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
    <p><strong>Stok:</strong> {{ $buku->stok }}</p>
    <p><strong>Lokasi:</strong> {{ $buku->lokasi ?? '-' }}</p>

    <a href="{{ route('buku.index') }}">Kembali ke Daftar Buku</a>

</div>
</body>
</html>
