@php
use App\Models\DBU;
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan (PDF)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <style>
        body {
        margin: 0;
        }

        .heading {
        text-align: center;
        padding: 3em 0;
        }
    </style>

    <div class="container">

        <div class="heading">
            <h5>Laporan Operasional Bus</h5><br>
            <h5>PT.XYZ</h5><br>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode Bus</th>
                        <th>Operasional</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->tanggal }}</td>
                         <?php $bus = DBU::find($data->id_bus);?>
                        <td>{{ $bus->kode }}</td>
                        <td>{{ $data->operasional }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    
    </div>
</body>

</html>