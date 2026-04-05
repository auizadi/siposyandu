<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Data Balita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            text-transform: uppercase;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Data Balita</h2>

    {{-- table --}}
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th scope="col">
                        No.
                    </th>
                    <th scope="col">
                        nik anak
                    </th>
                    <th scope="col">
                        nama anak
                    </th>
                    <th scope="col">
                        jk
                    </th>
                    <th scope="col">
                        tgl lahir
                    </th>
                    <th scope="col">
                        nama ayah
                    </th>
                    <th scope="col">
                        nama ibu
                    </th>
                    <th scope="col">
                        alamat
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($balita as $index => $item)
                    <tr>
                        <th scope="row">
                            {{ $index + 1 }}
                        </th>
                        <td>
                            {{ $item->nik_anak }}
                        </td>
                        <td>
                            {{ $item->nama_anak }}
                        </td>
                        <td>
                            {{ $item->jenis_kelamin === 'Laki-laki' ? 'L' : 'P' }}
                        </td>
                        <td>
                            {{ $item->tanggal_lahir->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            {{ $item->nama_ayah }}
                        </td>
                        <td>
                            {{ $item->nama_ibu }}
                        </td>
                        <td>
                            {{ $item->alamat }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
