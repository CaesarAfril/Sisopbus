@php
use App\Models\DBU;
use App\Models\DLPR;
@endphp

<div class="card-body">
    <form action="/laporanoperasional-admin" method="post">
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
    <table class="table table-bordered" id="dataOperasi" width="100%"
        cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Bus</th>
                <th>Operasional</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tanggal</th>
                <th>Kode Bus</th>
                <th>Operasional</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <td>{{ $data->tanggal }}</td>
                    <?php $bus = DBU::find($data->id_bus); ?>
                    <td>{{ $bus->kode }}</td>
                    <td>{{ $data->operasional }}</td>
                    <td>{{ $data->status }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>