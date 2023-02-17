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
                                <th class="text-center" style="width: 5px;">
                                    <div data-toggle="tooltip" data-original-title="Delete"
                                      class="btn btn-sm btn-icon btn-danger btn-circle mr-2 delete_all"><i class="bi bi-x-lg"></i></div>
                                  </th>
                                <th>Waktu</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas Tujuan</th>
                                <th>Nilai Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
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

        $('#table1 thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table1 thead');

    var table = $('#table1').DataTable({
            dom: 'lBfrtip',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
            }],
            lengthMenu: [
                [30,100,500,-1],
                ["30","100","500","All"]
            ],
            processing: true,
            serverSide: true,
            order: [[ 1, 'desc' ]],
            ajax: "{{ route('riwayat.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                {data: 'created_at', name: 'created_at'},
                {data: 'nis', name: 'nis', width: "7%"},
                {data: 'nama', name: 'nama'},
                {data: 'kelas_tujuan', name: 'kelas_tujuan'},
                {data: 'nilai_akhir', name: 'nilai_akhir'},
                {data: 'status', name: 'status'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
            ],
            initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" class="form-control" placeholder="' + title + '" />');

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
                api
                .columns(-1)
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('');
                });
                api
                .columns(0)
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="checkbox" id="master" name="select_all">');
                });
                $('#master').click(function (e) {
                    $('#table1 tbody :checkbox').prop('checked', $(this).is(':checked'));
                    e.stopImmediatePropagation();
                });

        },
        });

        // initialize btn delete
        $('body').on('click', '.deleteKelas', function () {
            var id_kelas = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
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

        $('.delete_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
        {
            alert("Pilih data yang akan dihapus!");
        }  else {
            Swal.fire({
            title: 'Yakin untuk menghapus?',
            text: "Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: "{{ route('riwayat.deleteAll') }}",
                    type: 'DELETE',
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            table.draw();
                            swal_success();
                        } else if (data['error']) {
                            swal_error();
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                        console.log(data);
                    }
                });


            $.each(allVals, function( index, value ) {
                $('table tr').filter("[data-row-id='" + value + "']").remove();
            });
            }
        })
        }
        });
});
</script>
@endsection
