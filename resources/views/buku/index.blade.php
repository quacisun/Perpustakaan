
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku Perpustakaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            color: #243b53;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #243b53;
            color: white;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 9px 13px;
            text-decoration: none;
            border-radius: 5px;
        }

        .success {
            background: #d1fae5;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .stok-habis {
            color: red;
            font-weight: bold;
        }

        .aksi form {
            display: inline;
        }

        .aksi button {
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>Perpustakaan Digital</h1>
    <p>Sistem Informasi Pengelolaan Data Buku</p>

    @if(session('sukses'))
        <div class="success">
            {{ session('sukses') }}
        </div>
    @endif

    <a href="{{ route('buku.create') }}" class="btn">
        + Tambah Buku
    </a>

    <form action="{{ route('buku.index') }}" method="GET" style="margin-top: 15px;">
    <input type="text"
           name="keyword"
           value="{{ $keyword }}"
           placeholder="Cari judul buku..."
           style="padding: 9px; width: 250px;">

    <button type="submit" class="btn">
        Cari
    </button>
</form>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bukus as $buku)
                <tr>
                    <td>{{ $buku->kode }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>

                    <td>
                        @if($buku->stok == 0)
                            <span class="stok-habis">
                                {{ $buku->stok }}
                            </span>
                        @else
                            {{ $buku->stok }}
                        @endif
                    </td>

                    <td>{{ $buku->lokasi ?? '-' }}</td>

                    <td class="aksi">
                        <a href="{{ route('buku.show', $buku->id) }}">
                            Detail
                        </a>
                        |
                        <a href="{{ route('buku.edit', $buku->id) }}">
                            Edit
                        </a>
                        |
                        <form action="{{ route('buku.destroy', $buku->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="8">
                        Belum ada data buku.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $bukus->links() }}

</div>
</body>
</html>
