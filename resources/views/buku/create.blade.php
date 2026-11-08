<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
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
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Tambah Data Buku</h2>
    <p>Masukkan informasi buku berikut.</p>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <label>Kode Buku</label>
        <input type="text" name="kode"
               value="{{ old('kode') }}" required>

        <label>Judul Buku</label>
        <input type="text" name="judul"
               value="{{ old('judul') }}" required>

        <label>Penulis</label>
        <input type="text" name="penulis"
               value="{{ old('penulis') }}" required>

        <label>Penerbit</label>
        <input type="text" name="penerbit"
               value="{{ old('penerbit') }}" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit"
               value="{{ old('tahun_terbit') }}"
               min="1" max="9999" required>

        <label>Stok Buku</label>
        <input type="number" name="stok"
               value="{{ old('stok', 0) }}"
               min="0" required>

        <button type="submit">Simpan Buku</button>
        <a href="{{ route('buku.index') }}">Kembali</a>
        <label>Lokasi Buku</label>
        <input type="text" name="lokasi"
       value="{{ old('lokasi') }}"
       placeholder="Contoh: Rak A1">
    </form>

</div>
</body>
</html>
