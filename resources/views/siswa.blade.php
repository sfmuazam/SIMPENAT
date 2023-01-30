@extends('components.app')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Siswa</h3>
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
            <button type="button" id="importNilai" class="btn btn-primary block" data-bs-toggle="modal"
              data-bs-target="#modal-import-nilai">
              Import Nilai
            </button>
            <button type="button" id="importKelas" class="btn btn-primary block" data-bs-toggle="modal"
              data-bs-target="#modal-import">
              Import Siswa
            </button>
            <button type="button" id="createNewSiswa" class="btn btn-primary block" data-bs-toggle="modal"
              data-bs-target="#modal-siswa">
              Tambah Siswa
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
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Asal Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <!-- Nilai Siswa -->
            <div class="modal fade" id="modal-nilai" tabindex="-1" role="dialog" aria-labelledby="nilaiTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary p-4">
                    <h5 class="modal-title white" id="nilaiTitle">Nilai Siswa
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <div class="modal-body pb-2 px-3">
                    <div class="row">
                        <div class="col-5">
                            <h6 class="mb-0">Agama</h6>
                        </div>
                        <div class="col-7 text-secondary" id="agama">
                            Nilai
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <h6 class="mb-0">PKN</h6>
                        </div>
                        <div class="col-7 text-secondary" id="pkn">
                            Nilai
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-5">
                          <h6 class="mb-0">Bahasa Indonesia</h6>
                      </div>
                      <div class="col-7 text-secondary" id="indo">
                          Nilai
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Bahasa Inggris</h6>
                    </div>
                    <div class="col-7 text-secondary" id="inggris">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Matematika</h6>
                    </div>
                    <div class="col-7 text-secondary" id="mtk">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Fisika</h6>
                    </div>
                    <div class="col-7 text-secondary" id="fisika">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Kimia</h6>
                    </div>
                    <div class="col-7 text-secondary" id="kimia">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Biologi</h6>
                    </div>
                    <div class="col-7 text-secondary" id="biologi">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Ekonomi</h6>
                    </div>
                    <div class="col-7 text-secondary" id="eko">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Geografi</h6>
                    </div>
                    <div class="col-7 text-secondary" id="geo">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Sosiologi</h6>
                    </div>
                    <div class="col-7 text-secondary" id="sosio">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Penjaskes</h6>
                    </div>
                    <div class="col-7 text-secondary" id="penjas">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Seni Budaya</h6>
                    </div>
                    <div class="col-7 text-secondary" id="seni">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Sejarah Indonesia</h6>
                    </div>
                    <div class="col-7 text-secondary" id="sejarah">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Informatika</h6>
                    </div>
                    <div class="col-7 text-secondary" id="if">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Bahasa Jawa</h6>
                    </div>
                    <div class="col-7 text-secondary" id="jawa">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Prakarya</h6>
                    </div>
                    <div class="col-7 text-secondary" id="prakarya">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-5">
                        <h6 class="mb-0">Bimbingan Konseling</h6>
                    </div>
                    <div class="col-7 text-secondary" id="bk">
                        Nilai
                    </div>
                  </div>
                  <hr>
                  </div>
                </div>
              </div>
            </div>
            {{-- Modal Import Nilai --}}
            <div class="modal fade" id="modal-import-nilai" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary p-4">
                    <h5 class="modal-title white" id="tambahDataTitle">Import Nilai Siswa
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <form class="form mb-0" action="{{ route('siswa.import-nilai') }}" method="post"
                    enctype="multipart/form-data" id="formImport" name="formImport">
                    @csrf
                    <div class="modal-body py-0">
                      <section id="multiple-column-form">
                        <div class="row match-height">
                          <div class="col-12">
                            <div class="card mb-0">
                              <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nis-column" class="form-label">File Nilai
                                          Siswa</label>
                                        <input type="file" id="file" class="form-control" name="file"
                                          placeholder="Pilih file" required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <i class="bi bi-info-circle-fill" data-bs-toggle="tooltip" data-bs-html="true"
                                          data-bs-placement="bottom"
                                          data-bs-title="1. Jangan ganti/hapus header<br>2. Ubah value di bawah header<br>3. Kelas yang dimasukkan harus sesuai dengan format di menu Kelas"></i>
                                        <a class="badge bg-primary" download
                                          href="{{ asset('file\Template_Import_Nilai.xlsx') }}">Template Excel</a>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      Perhatikan, nama mata pelajaran di header tabel harus sama dengan yang ada di bawah ini.
                                      <div class="row">
                                        <div class="col-6">
                                          <ul>
                                            <li>Agama</li>
                                            <li>PKN</li>
                                            <li>Bahasa Indonesia</li>
                                            <li>Bahasa Inggris</li>
                                            <li>Matematika</li>
                                            <li>Fisika</li>
                                            <li>Kimia</li>
                                            <li>Biologi</li>
                                            <li>Bimbingan Konseling</li>
                                          </ul>
                                        </div>
                                        <div class="col-6">
                                          <ul>
                                            <li>Ekonomi</li>
                                            <li>Geografi</li>
                                            <li>Sosiologi</li>
                                            <li>Penjaskes</li>
                                            <li>Seni Budaya</li>
                                            <li>Sejarah Indonesia</li>
                                            <li>Informatika</li>
                                            <li>Bahasa Jawa</li>
                                            <li>Prakarya</li>
                                          </ul>
                                        </div>
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

                      <button type="submit" class="btn btn-primary ml-1" id="save">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- Modal Import Siswa --}}
            <div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary p-4">
                    <h5 class="modal-title white" id="tambahDataTitle">Import Siswa
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <form class="form mb-0" action="{{ route('siswa.import') }}" method="post"
                    enctype="multipart/form-data" id="formImport" name="formImport">
                    @csrf
                    <div class="modal-body py-0">
                      <section id="multiple-column-form">
                        <div class="row match-height">
                          <div class="col-12">
                            <div class="card mb-0">
                              <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nis-column" class="form-label">File
                                          Siswa</label>
                                        <input type="file" id="file" class="form-control" name="file"
                                          placeholder="Pilih file" required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <i class="bi bi-info-circle-fill" data-bs-toggle="tooltip" data-bs-html="true"
                                          data-bs-placement="bottom"
                                          data-bs-title="1. Jangan ganti/hapus header<br>2. Ubah value di bawah header<br>3. Kelas yang dimasukkan harus sesuai dengan format di menu Kelas"></i>
                                          <a class="badge bg-primary" download
                                          href="{{ asset('file\Template_Import_Siswa.xlsx') }}">Template Excel</a>
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

                      <button type="submit" class="btn btn-primary ml-1" id="save">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Tambah Data -->
            <div class="modal fade" id="modal-siswa" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary p-4">
                    <h5 class="modal-title white" id="tambahDataTitle">Tambah Siswa
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <i data-feather="x"></i>
                    </button>
                  </div>
                  <form class="form mb-0" id="formSiswa" name="formSiswa">
                    <div class="modal-body py-0">
                      <section id="multiple-column-form">
                        <div class="row match-height">
                          <div class="col-12">
                            <div class="card mb-0">
                              <div class="card-content">
                                <div class="card-body">
                                  <div class="row">
                                    <input type="hidden" name="id_siswa" id="id_siswa">
                                    <div class="col-12 text-center">
                                      <p class="h4">Identitas Siswa</p>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="asal_kelas" class="form-label">Kelas</label>
                                        <select class="form-select" id="asal_kelas" name="asal_kelas"
                                          data-placeholder="Pilih Kelas" required>
                                          <option value=""></option>
                                          <option value="X-01">X-01</option>
                                          <option value="X-02">X-02</option>
                                          <option value="X-03">X-03</option>
                                          <option value="X-04">X-04</option>
                                          <option value="X-05">X-05</option>
                                          <option value="X-06">X-06</option>
                                          <option value="X-07">X-07</option>
                                          <option value="X-08">X-08</option>
                                          <option value="X-09">X-09</option>
                                          <option value="X-10">X-10</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nis" class="form-label">NIS</label>
                                        <input type="text" id="nis" class="form-control" name="nis"
                                          placeholder="Masukkan NIS ...." required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nisn" class="form-label">NISN</label>
                                        <input type="text" id="nisn" class="form-control" name="nisn"
                                          placeholder="Masukkan NISN ...." required>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama"
                                          placeholder="Masukkan Nama Siswa ...." required>
                                      </div>
                                    </div>
                                    <div class="col-12 text-center mt-2">
                                      <p class="h4">Nilai Siswa</p>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input required name="n_agama" id="n_agama" placeholder="Masukkan Nilai ...."  type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="pkn" class="form-label">PKN</label>
                                        <input required name="n_pkn" id="n_pkn" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="indo" class="form-label">Bahasa Indonesia</label>
                                        <input required name="n_indo" id="n_indo" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="inggris" class="form-label">Bahasa Inggris</label>
                                        <input required name="n_inggris" id="n_inggris" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="mtk" class="form-label">Matematika</label>
                                        <input required name="n_mtk" id="n_mtk" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="fisika" class="form-label">Fisika</label>
                                        <input required name="n_fisika" id="n_fisika" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="kimia" class="form-label">Kimia</label>
                                        <input required name="n_kimia" id="n_kimia" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="biologi" class="form-label">Biologi</label>
                                        <input required name="n_biologi" id="n_biologi" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="eko" class="form-label">Ekonomi</label>
                                        <input required name="n_eko" id="n_eko" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="geo" class="form-label">Geografi</label>
                                        <input required name="n_geo" id="n_geo" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="sosio" class="form-label">Sosiologi</label>
                                        <input required name="n_sosio" id="n_sosio" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="penjas" class="form-label">Penjaskes</label>
                                        <input required name="n_penjas" id="n_penjas" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="seni" class="form-label">Seni Budaya</label>
                                        <input required name="n_seni" id="n_seni" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="sejarah" class="form-label">Sejarah Indonesia</label>
                                        <input required name="n_sejarah" id="n_sejarah" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="if" class="form-label">Informatika</label>
                                        <input required name="n_if" id="n_if" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="jawa" class="form-label">Bahasa Jawa</label>
                                        <input required name="n_jawa" id="n_jawa" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="prakarya" class="form-label">Prakarya</label>
                                        <input required name="n_prakarya" id="n_prakarya" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="bk" class="form-label">Bimbingan Konseling</label>
                                        <input required name="n_bk" id="n_bk" placeholder="Masukkan Nilai ...." value="0" type="number" step="0.01" min="0" max="100" class="form-control">
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
            dropdownParent: '#modal-siswa',
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
            lengthMenu: [
                [36, 50, 100, -1],
                [ 36, 50, 100, "All"]
            ],
            processing: true,
            serverSide: true,
            responsive: true,
            order: [[ 4, 'asc' ], [3, 'asc']],
            ajax: "{{ route('siswa.index') }}",
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                {data: 'nis', name: 'nis', width: "10%"},
                {data: 'nisn', name: 'nisn', width: "15%"},
                {data: 'nama', name: 'nama'},
                {data: 'asal_kelas', name: 'asal_kelas', width: "15%"},
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

        // initialize btn nilai
        $('body').on('click', '.nilai', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('siswa.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-nilai').modal('show');
                $('#agama').html(data.agama);
                $('#pkn').html(data.pkn);
                $('#indo').html(data.indo);
                $('#inggris').html(data.inggris);
                $('#mtk').html(data.mtk);
                $('#fisika').html(data.fisika);
                $('#kimia').html(data.kimia);
                $('#biologi').html(data.biologi);
                $('#eko').html(data.eko);
                $('#geo').html(data.geo);
                $('#sosio').html(data.sosio);
                $('#penjas').html(data.penjas);
                $('#seni').html(data.seni);
                $('#sejarah').html(data.sejarah);
                $('#if').html(data.if);
                $('#jawa').html(data.jawa);
                $('#prakarya').html(data.prakarya);
                $('#bk').html(data.bk);
            })
        });
        // initialize btn add
        $('#createNewKelas').click(function () {
            $('#id_kelas').val('');
            $('#formSiswa').trigger("reset");
            $('#modal-siswa').modal('show');
            $('#asal_kelas').val('').change();
        });
        // initialize btn edit
        $('body').on('click', '.editKelas', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('siswa.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-siswa').modal('show');
                $('#id_siswa').val(data.id);
                $('#nis').val(data.nis);
                $('#nisn').val(data.nisn);
                $('#nama').val(data.nama);
                $('#asal_kelas').val(data.asal_kelas).change();
                $('#n_agama').val(data.agama);
                $('#n_pkn').val(data.pkn);
                $('#n_indo').val(data.indo);
                $('#n_inggris').val(data.inggris);
                $('#n_mtk').val(data.mtk);
                $('#n_fisika').val(data.fisika);
                $('#n_kimia').val(data.kimia);
                $('#n_biologi').val(data.biologi);
                $('#n_eko').val(data.eko);
                $('#n_geo').val(data.geo);
                $('#n_sosio').val(data.sosio);
                $('#n_penjas').val(data.penjas);
                $('#n_seni').val(data.seni);
                $('#n_sejarah').val(data.sejarah);
                $('#n_if').val(data.if);
                $('#n_jawa').val(data.jawa);
                $('#n_prakarya').val(data.prakarya);
                $('#n_bk').val(data.bk);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#formSiswa').serialize(),
                url: "{{ route('siswa.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#formSiswa').trigger("reset");
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
                        url: "{{ route('siswa.store') }}" + '/' + id_kelas,
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
                    url: "{{ route('siswa.deleteAll') }}",
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
