<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Coba Blade</title>
</head>
<body>

    <h1>Contoh Blade Laravel</h1>

    <p>Daftar buku:</p>

    @php
        $buku = ['The Hobbit', 'Laut Bercerita', 'The Case We Met'];
    @endphp

    <ul>
        @foreach ($buku as $judul)
            <li>{{ $judul }}</li>
        @endforeach
    </ul>

    @if (count($buku) > 2)
        <p>Jumlah buku lebih dari 2.</p>
    @endif

</body>
</html>