@php 
use App\Models\DBU;
use App\Models\DLPR;
use App\Models\DLPJ;
use App\Models\DRT;
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
            <h5>Laporan Operasional Perjalanan Bus</h5><br>
            <h5>PT.XYZ</h5><br>
            <h6>Tanggal : {{$tanggal}}</h6><br>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode Bus</th>
                        <th>Rute</th>
                        <th>Kilometer</th>
                        <th>Konsumsi Bahan Bakar</th>
                        <th>Kondisi Bus</th>
                        <th>Kondisi Ban</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $jalan)
                        <tr>
                            <?php $ljalan =
                            DLPJ::where('id_laporan', $jalan->id)
                            ->get(); ?>
                            <?php $cod = DBU::find($jalan->id_bus); ?>
                            <td>{{ $jalan->tanggal }}</td>
                            <td>{{ $cod->kode }}</td>
                            @foreach ($ljalan as $ljalan)
                            <?php $rute = DRT::find($ljalan->id_rute); ?>
                                <td>{{ $rute->kode }}</td>
                                <td>{{ $ljalan->kilometer }}</td>
                                <td>{{ $ljalan->konsumsi }}</td>
                                <td>{{ $ljalan->kondisi }}</td>
                                <td>{{ $ljalan->ban }}</td>
                            @endforeach
                            <td>{{ $jalan->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    
    </div>
</body>

</html>