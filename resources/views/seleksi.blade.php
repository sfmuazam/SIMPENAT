@extends('components.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Seleksi</h3>
                @if(auth()->user()->id > '0')
                @if($kelas_terdaftar == null)
                <div class="alert alert-danger alert-dismissible show fade">
                    Anda belum terdaftar di kelas manapun. Silahkan memilih kelas yang diminati!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if($status == "Diterima")
                <div class="alert alert-success alert-dismissible show fade">
                    Proses seleksi telah selesai. Selamat kelas Anda adalah kelas {{ $kelas_terdaftar }}. Semangat
                    belajar dan terus berprestasi!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if($kelas_terdaftar != null && $status != "Diterima")
                <div class="alert alert-warning alert-dismissible show fade">
                    Anda telah terdaftar di kelas {{ $kelas_terdaftar }}. Silahkan terus pantau peringkat Anda!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Mapel Peminatan</th>
                                <th>Mapel Penilaian</th>
                                <th>Nilai</th>
                                <th>Kapasitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>
<div class="modal fade" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
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
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Mapel</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody id="nilai">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center">Lainnya</td>
                                <td class="text-center" id="lainya"></td>
                            </tr>
                            <tr>
                                <th class="text-center">Nilai Akhir</th>
                                <th class="text-center" id="nilai_akhir"></th>
                            </tr>
                        </tfoot>
                    </table>

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
            dom: 'Bfrtip',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }],
            lengthMenu: [
                [-1],
                ["All"]
            ],
            processing: true,
            serverSide: true,
            order: [[ 0, 'asc' ]],
            ajax: "{{ route('seleksi.index') }}",
            columns: [
                {data: 'nama_kelas', name: 'nama_kelas', width: "7%"},
                {data: 'mapel_peminatan', name: 'mapel_peminatan'},
                {data: 'mapel_penilaian', name: 'mapel_penilaian'},
                {data: 'nilai', name: 'nilai'},
                {data: 'kapasitas', name: 'kapasitas', width: "10%"},
                {data: 'aksi', name: 'aksi', width: "10%", searchable: false,},
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
            $.get("{{route('seleksi.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-kelas').modal('show');
                $('#kelas_tujuan').html(data.nama_kelas);

                var mpl = data.mapel_penilaian;
                mpl = mpl.split(',');
                let mapel = '';

                var nl = data.nilai;
                let nilai = [];

                nl.forEach((item,index) => {
                    nilai.push(item);
                })

                let i = 0;
                mpl.forEach((item,index) => {
                    mapel += '<tr><td class="text-center">'+titleCase(item.replace('_',' '))+'</td><td class="text-center">'+nilai[i]+'</td>';
                        i++;
                })
                $('#nilai').html(mapel);
                $('#lainya').html(data.lainya);
                $('#kapasitas').html(data.kapasitas);
                $('#nilai_akhir').html(data.jumlah_akhir);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: {
                    nis: $('#nis').html(),
                    nilai_akhir: $('#nilai_akhir').html(),
                    kelas_tujuan: $('#kelas_tujuan').html(),
                    kapasitas: $('#kapasitas').html(),
                },
                url: "{{ route('seleksi.store') }}",
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
                        url: "{{ route('seleksi.store') }}" + '/' + id_kelas,
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
