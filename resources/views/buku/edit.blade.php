<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
        button {
            margin-top: 20px;
            padding: 11px 18px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">

    <h2>Edit Data Buku</h2>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Kode Buku</label>
        <input type="text" name="kode"
            value="{{ old('kode', $buku->kode) }}" required>

        <label>Judul Buku</label>
        <input type="text" name="judul"
            value="{{ old('judul', $buku->judul) }}" required>

        <label>Penulis</label>
        <input type="text" name="penulis"
            value="{{ old('penulis', $buku->penulis) }}" required>

        <label>Penerbit</label>
        <input type="text" name="penerbit"
            value="{{ old('penerbit', $buku->penerbit) }}" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit"
            value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"
            min="1" max="9999" required>

        <label>Stok</label>
        <input type="number" name="stok"
            value="{{ old('stok', $buku->stok) }}"
            min="0" required>
        
        <label>Lokasi Buku</label>
        <input type="text" name="lokasi"
        value="{{ old('lokasi', $buku->lokasi) }}"
       placeholder="Contoh: Rak A1">

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('buku.index') }}">Kembali</a>
    </form>

</div>
</body>
</html>
