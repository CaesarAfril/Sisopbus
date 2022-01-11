@php 
use App\Models\DBU;
use App\Models\DLPR;
use App\Models\DLPJ;
use App\Models\DRT;
@endphp
<div class="card-body">
    <form action="/laporanperjalanan-admin" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-sm-3">
                <input  class="form-control" type="date" name="tanggal" id="tanggal">
            </div>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Cetak .pdf</button>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%"
        cellspacing="0">
        <thead>
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
        <tfoot>
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
        </tfoot>
        <tbody>
            @php
                $jalan = DLPR::where('Operasional', 'Jalan')
                    ->get();
            @endphp
            @foreach ($jalan as $jalan)
                <tr>
                    <?php $ljalan =
                    DLPJ::where('id_laporan', $jalan->id)
                    ->get(); 
                    $cod = DBU::find($jalan->id_bus);
                    ?>
                    <td>{{ $jalan->tanggal }}</td>
                    <td>{{ $cod->kode }}</td>
                    @foreach ($ljalan as $ljalan)
                        <?php $rute = DRT::find($ljalan->id_rute);
                        ?>
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