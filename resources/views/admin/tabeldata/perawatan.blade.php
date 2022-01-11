@php
use App\Models\DBU;
use App\Models\DLPR;
use App\Models\DLWT;
@endphp
<div class="card-body">
    <form action="/laporanperawatan-admin" method="post">
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
    @php
        $rawat = DLPR::where('operasional', 'Perawatan')
            ->get();
    @endphp
    <table class="table table-bordered" id="datarawat" width="100%"
        cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal Mulai</th>
                <th>Kode Bus</th>
                <th>Status</th>
                <th>Bagian</th>
                <th>Jenis Perawatan</th>
                <th>Tanggal Selesai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tanggal Mulai</th>
                <th>Kode Bus</th>
                <th>Status</th>
                <th>Bagian</th>
                <th>Jenis Perawatan</th>
                <th>Tanggal Selesai</th>
                <th>Keterangan</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($rawat as $rawat)
                <tr>
                    <?php $bus = DBU::find($rawat->id_bus);?>
                    <td>{{ $rawat->tanggal }}</td>
                    <td>{{ $bus->kode }}</td>
                    <td>{{ $rawat->status }}</td>
                    @php
                        $laporan = DLWT::where('id_laporan', $rawat->id)
                            ->first();
                    @endphp
                    <td>{{ $laporan->bagian }}</td>
                    <td>{{ $laporan->jenis }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                    <td>{{ $laporan->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>