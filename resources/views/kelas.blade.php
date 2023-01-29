@extends('components.app')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>DataTable jQuery</h3>
        <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery
          required).</p>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-header">
        <div class="justify-content-between d-flex">
          <div class="form-group">
          </div>
          <div class="tambah">
            <button type="button" id="importKelas" class="btn btn-primary block" data-bs-toggle="modal"
              data-bs-target="#modal-import">
              Import Kelas
            </button>
            <button type="button" id="createNewKelas" class="btn btn-primary block" data-bs-toggle="modal"
              data-bs-target="#modal-kelas">
              Tambah Kelas
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table1">
            <thead>
              <tr>
                <th class="text-center" style="width: 5px;">
                  <div data-toggle="tooltip" data-original-title="Delete"
                    class="btn btn-sm btn-icon btn-danger btn-circle mr-2 delete_all"><i class="bi bi-x-lg"></i></div>
                </th>
                <th>Kelas</th>
                <th>Mapel Peminatan</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <!-- Tambah Data -->
            <div class="modal fade" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary p-4">
                    <h5 class="modal-title white" id="tambahDataTitle">Tambah Kelas
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <form class="form mb-0" id="formKelas" name="formKelas">
                    <div class="modal-body py-0">
                      <section id="multiple-column-form">
                        <div class="row match-height">
                          <div class="col-12">
                            <div class="card mb-0">
                              <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                    <input type="hidden" name="id_kelas" id="id_kelas">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nama_kelas" class="form-label">Kelas</label>
                                        <input type="text" id="nama_kelas" class="form-control" name="nama_kelas"
                                          placeholder="Masukkan Kelas Baru ...." required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="kapasitas" class="form-label">Kapasitas</label>
                                        <input type="number" id="kapasitas" class="form-control" name="kapasitas" value="36"
                                          placeholder="Masukkan Kapasitas Kelas ...." required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="mapel_peminatan" class="form-label">Mapel Peminatan</label>
                                        <select class="form-select" name="mapel_peminatan[]" id="mapel_peminatan" data-placeholder="Pilih Mapel Peminatan" multiple>
                                            @foreach($daftar_mapel as $row)
                                          <option value="{{ $row->nama_mapel }}">{{ $row->nama_mapel }}</option>
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

        $('#table1 thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table1 thead');
    // table serverside
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
            order: [[ 1, 'asc' ]],
            ajax: "{{ route('kelas.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                {data: 'nama_kelas', name: 'nama_kelas', width: "10%"},
                {data: 'mapel_peminatan', name: 'mapel_peminatan'},
                {data: 'kapasitas', name: 'kapasitas', width: "15%"},
                {data: 'aksi', name: 'aksi', searchable: false,},
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

        // initialize btn add
        $('#createNewKelas').click(function () {
            $('#id_kelas').val('');
            $('#formKelas').trigger("reset");
            $('#modal-kelas').modal('show');
            $('#mapel_peminatan').val([]).change();
        });
        // initialize btn edit
        $('body').on('click', '.editKelas', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('kelas.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-kelas').modal('show');
                $('#id_kelas').val(data.id);
                $('#nama_kelas').val(data.nama_kelas);
                $('#kapasitas').val(data.kapasitas);
                $('#mapel_peminatan').val(JSON.parse("[" + data.mapel_peminatan + "]")).change();
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#formKelas').serialize(),
                url: "{{ route('kelas.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

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
                        url: "{{ route('kelas.store') }}" + '/' + id_kelas,
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
            text: "Semua data kelas yang dipilih dan semua data siswa di dalamnnya akan terhapus! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: "{{ route('kelas.deleteAll') }}",
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
