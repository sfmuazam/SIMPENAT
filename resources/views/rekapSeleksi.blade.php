@extends('components.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rekap Seleksi</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <input type="hidden" id="nama_kelas" value="{{ $namakelas }}">
        <div class="card">
            @if(auth()->user()->id == '0')
            <div class="card-header">
                <div class="justify-content-between d-flex">
                    <div class="form-group">
                    </div>
                    <div class="tambah">
                        <button type="button" id="createNewSiswa" class="btn btn-primary block" data-bs-toggle="modal"
                            data-bs-target="#modal-siswa">
                            Tambah Siswa
                        </button>
                    </div>
                </div>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                @if(auth()->user()->id == '0')
                                <th class="text-center" style="width: 5px;">
                                    <div data-toggle="tooltip" data-original-title="Delete"
                                        class="btn btn-sm btn-icon btn-danger btn-circle mr-2 delete_all"><i
                                            class="bi bi-x-lg"></i></div>
                                </th>
                                @endif
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Asal Kelas</th>
                                <th>Nilai</th>
                                @if(auth()->user()->id == '0')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>

                    @if(auth()->user()->id == '0')
                        <!-- Tambah Data -->
                        <div class="modal fade" id="modal-siswa" tabindex="-1" role="dialog"
                            aria-labelledby="tambahDataTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary p-4">
                                        <h5 class="modal-title white" id="tambahDataTitle">Tambah siswa
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form class="form mb-0" id="s" name="s">
                                        <div class="modal-body py-0">
                                            <section id="multiple-column-form">
                                                <div class="row match-height">
                                                    <div class="col-12">
                                                        <div class="card mb-0">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <input type="hidden" name="id_siswa"
                                                                            id="id_siswa">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="nama-column"
                                                                                    class="form-label">Nama
                                                                                    Lengkap</label>
                                                                                <select class="form-select nama"
                                                                                    id="nis" name="nis"
                                                                                    data-placeholder="Pilih Nama Siswa"
                                                                                    required>
                                                                                    <option></option>
                                                                                    @foreach($datasiswa as $rowsiswa)
                                                                                    <option
                                                                                        value="{{ $rowsiswa->nis }}">
                                                                                        {{ $rowsiswa->kelas }} {{
                                                                                        $rowsiswa->nama }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-light-secondary">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <button type="submit" class="btn btn-primary ml-1" id="saveBtn">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Simpan</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
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
            dropdownParent: '#modal-siswa',
        });
        @if(auth()->user()->id == '0')
        $('#table1 thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table1 thead');
        @endif
    // table serverside
    var table = $('#table1').DataTable({
            dom: 'lBfrtip',
            orderCellsTop: true,

            buttons: [{
                extend: 'csv',
                title: '{{ $namakelas }}',
                exportOptions: {
                    @if(auth()->user()->id == '0')
                    columns: [1,2,3,4,5]
                    @endif
                }
            },
            {
                extend: 'excel',
                title: '{{ $namakelas }}',
                exportOptions: {
                    @if(auth()->user()->id == '0')
                    columns: [1,2,3,4,5]
                    @endif
                }
            },
            {
                extend: 'pdf',
                title: '{{ $namakelas }}',
                exportOptions: {
                    @if(auth()->user()->id == '0')
                    columns: [1,2,3,4,5]
                    @endif
                }
            }],
            lengthMenu: [
                [36, 50, 100, -1],
                [ 36, 50, 100, "All"]
            ],
            processing: true,
            serverSide: true,
            @if(auth()->user()->id == '0')
            order: [[5, 'desc']],
            @endif
            @if(auth()->user()->id > '0')
            order: [[ 4, 'desc' ]],
            @endif
            ajax: "{{ url('/seleksi') }}"+ '/' + $('#nama_kelas').val(),
            columns: [
                @if(auth()->user()->id == '0')
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                @endif
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "5%"},
                {data: 'nis', name: 'nis', width: "7%"},
                {data: 'nama', name: 'nama'},
                {data: 'kelas', name: 'kelas', width: "15%"},
                {data: 'nilai_akhir', name: 'nilai_akhir', width: "15%"},
                @if(auth()->user()->id == '0')

                {data: 'aksi', name: 'aksi', searchable: false,},
                @endif
            ],
            @if(auth()->user()->id == '0')
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
                .columns(1)
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
        @endif
        });

        $('body').on('click', '.editKelas', function () {
            var nis = $(this).data('nis');
            $.ajax({
                data: {
                    nis: nis,
                    kelas_tujuan: $('#nama_kelas').val()
                },
                url: "{{ route('seleksi.store') }}"+ '/' + nis,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#formsiswa').trigger("reset");
                    $('#modal-siswa').modal('hide');
                    swal_success();
                    table.draw();
                },
                error: function (data) {
                    console.log(data);
                    swal_error();
                }
            });
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: {
                    nis: $('#nis').val(),
                    kelas_tujuan: $('#nama_kelas').val()
                },
                url: "{{ route('seleksi.tambah') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#formKelas').trigger("reset");
                    $('#modal-siswa').modal('hide');
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
                    url: "{{ route('seleksi.deleteAll') }}",
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
