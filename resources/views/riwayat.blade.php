@extends('components.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Riwayat</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            {{-- <div class="card-header">
                <div class="justify-content-between d-flex">
                    <div class="form-group">
                    </div>
                    <div class="tambah">
                    </div>
                </div>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas Tujuan</th>
                                <th>Nilai Akhir</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <div class="modal fade" id="modal-kelas" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary p-4">
                                        <h5 class="modal-title white" id="exampleMo dalLongTitle">Scrolling Modal</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                        <span class="text-muted font-extrabold">NIS : <font id="nis">{{ auth()->user()->id }}</font></span>
                                        <span class="text-muted font-extrabold">Nama : {{ auth()->user()->name }}</span>
                                        <span class="text-muted font-extrabold">Kelas Tujuan : <font id="kelas_tujuan"></font></span>
                                        <span class="text-muted font-extrabold">Kapasitas : <font id="kapasitas"></font></span>

                                        <div class="col-6">
                                            <div class="form-group">
                                        <span class="text-muted font-extrabold">Mapel<br></span>
                                                <span id="mapel_pilihan"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <span class="text-muted font-extrabold">Nilai<br></span>
                                                    <span id="nilai_pilihan"></span>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="form-group">
                                        <span class="">Lainnya<br></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <span class="" id="lainya">Nilai<br></span>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                        <span class="text-muted font-extrabold">Jumlah<br></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <span class="text-muted font-extrabold" id="jumlah_akhir">Nilai<br></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Batal</span>
                                        </button>

                                        <button id="saveBtn" type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Simpan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection

@section('script')
<script>
    $('document').ready(function () {

        $('.form-select').select2({
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            dropdownParent: '#modal-kelas',
            closeOnSelect: false,
            allowClear: true,
        });

    var table = $('#table1').DataTable({
            dom: 'lBfrtip',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [0]
                }
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [0]
                }
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [0]
                }
            }],
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[ 0, 'asc' ]],
            ajax: "{{ route('riwayat.index') }}",
            columns: [
                {data: 'nis', name: 'nis', width: "7%"},
                {data: 'nama', name: 'nama'},
                {data: 'kelas_tujuan', name: 'kelas_tujuan'},
                {data: 'nilai_akhir', name: 'nilai_akhir'},
                {data: 'status', name: 'status'},
            ],
        });

        // initialize btn add
        $('#createNewKelas').click(function () {
            $('#id_kelas').val('');
            $('#formKelas').trigger("reset");
            $('#modal-kelas').modal('show');
            $('#mapel_peminatan').val([]).change();
            $('#mapel_penilaian').val([]).change();
        });
        // initialize btn edit
        $('body').on('click', '.editKelas', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('riwayat.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-kelas').modal('show');
                $('#kelas_tujuan').html(data.nama_kelas);

                var mpl = data.mapel_penilaian;
                mpl = mpl.split(',');
                let mapel = '';

                mpl.forEach((item,index) => {
                    mapel += titleCase(item.replace('_',' '))+'<br>'
                })
                $('#mapel_pilihan').html(mapel);

                var nl = data.nilai;
                let nilai ='';

                nl.forEach((item,index) => {
                    nilai += item+'<br>'
                })
                $('#nilai_pilihan').html(nilai);
                $('#lainya').html(data.lainya);
                $('#kapasitas').html(data.kapasitas);
                $('#jumlah_akhir').html(data.jumlah_akhir);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: {
                    nis: $('#nis').html(),
                    nilai_akhir: $('#jumlah_akhir').html(),
                    kelas_tujuan: $('#kelas_tujuan').html(),
                    kapasitas: $('#kapasitas').html(),
                },
                url: "{{ route('riwayat.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#formKelas').trigger("reset");
                    $('#modal-kelas').modal('hide');
                    swal_success();
                    table.draw();
                },
                error: function (data) {
                    console.log(data);
                    swal_error();
                }
            });

        });
        // initialize btn delete
        $('body').on('click', '.deleteKelas', function () {
            var id_kelas = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Menghapus data kelas juga akan menghapus data siswa di dalamnya! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('riwayat.store') }}" + '/' + id_kelas,
                        success: function (data) {
                            swal_success();
                            table.draw();
                        },
                        error: function (data) {
                            swal_error();
                        }
                    });
                }
            })
        });
});
</script>
@endsection
