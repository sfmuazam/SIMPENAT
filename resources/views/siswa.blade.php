@extends('components.app')

@section('content')
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
      <div class="row mt-2">
        <div class="col-5">
            <h6 class="mb-0">Nama</h6>
        </div>
        <div class="col-7 text-secondary" id="nama_">
            Nilai
        </div>
      </div>
      <hr>
      <div class="row mt-2">
        <div class="col-5">
            <h6 class="mb-0">NIS</h6>
        </div>
        <div class="col-7 text-secondary" id="nis_">
            Nilai
        </div>
      </div>
      <hr>
      <div class="row mt-2">
        <div class="col-5">
            <h6 class="mb-0">Kelas</h6>
        </div>
        <div class="col-7 text-secondary" id="kelas_">
            Nilai
        </div>
      </div>
      <hr>
      <p class="h5 text-center">Daftar Nilai</p>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Mata Pelajaran</th>
            <th class="text-center">Raport smt 1</th>
            <th class="text-center">UTS smt 2</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Agama</td>
            <td class="text-center" id="agama">Nilai</td>
            <td class="text-center" id="agama_uts">Nilai</td>
          </tr>
          <tr>
            <td>PKN</td>
            <td class="text-center" id="pkn">Nilai</td>
            <td class="text-center" id="pkn_uts">Nilai</td>
          </tr>
          <tr>
            <td>Bahasa Indonesia</td>
            <td class="text-center" id="bahasa_indonesia">Nilai</td>
            <td class="text-center" id="bahasa_indonesia_uts">Nilai</td>
          </tr>
          <tr>
            <td>Bahasa Inggris</td>
            <td class="text-center" id="bahasa_inggris">Nilai</td>
            <td class="text-center" id="bahasa_inggris_uts">Nilai</td>
          </tr>
          <tr>
            <td>Matematika</td>
            <td class="text-center" id="matematika">Nilai</td>
            <td class="text-center" id="matematika_uts">Nilai</td>
          </tr>
          <tr>
            <td>Fisika</td>
            <td class="text-center" id="fisika">Nilai</td>
            <td class="text-center" id="fisika_uts">Nilai</td>
          </tr>
          <tr>
            <td>Kimia</td>
            <td class="text-center" id="kimia">Nilai</td>
            <td class="text-center" id="kimia_uts">Nilai</td>
          </tr>
          <tr>
            <td>Biologi</td>
            <td class="text-center" id="biologi">Nilai</td>
            <td class="text-center" id="biologi_uts">Nilai</td>
          </tr>
          <tr>
            <td>Ekonomi</td>
            <td class="text-center" id="ekonomi">Nilai</td>
            <td class="text-center" id="ekonomi_uts">Nilai</td>
          </tr>
          <tr>
            <td>Geografi</td>
            <td class="text-center" id="geografi">Nilai</td>
            <td class="text-center" id="geografi_uts">Nilai</td>
          </tr>
          <tr>
            <td>Sosiologi</td>
            <td class="text-center" id="sosiologi">Nilai</td>
            <td class="text-center" id="sosiologi_uts">Nilai</td>
          </tr>
          <tr>
            <td>Penjaskes</td>
            <td class="text-center" id="penjaskes">Nilai</td>
            <td class="text-center" id="penjaskes_uts">Nilai</td>
          </tr>
          <tr>
            <td>Seni Budaya</td>
            <td class="text-center" id="seni_budaya">Nilai</td>
            <td class="text-center" id="seni_budaya_uts">Nilai</td>
          </tr>
          <tr>
            <td>Sejarah Indonesia</td>
            <td class="text-center" id="sejarah_indonesia">Nilai</td>
            <td class="text-center" id="sejarah_indonesia_uts">Nilai</td>
          </tr>
          <tr>
            <td>Informatika</td>
            <td class="text-center" id="informatika">Nilai</td>
            <td class="text-center" id="informatika_uts">Nilai</td>
          </tr>
          <tr>
            <td>Bahasa Jawa</td>
            <td class="text-center" id="bahasa_jawa">Nilai</td>
            <td class="text-center" id="bahasa_jawa_uts">Nilai</td>
          </tr>
          <tr>
            <td>Prakarya</td>
            <td class="text-center" id="prakarya">Nilai</td>
            <td class="text-center" id="prakarya_uts">Nilai</td>
          </tr>
          <tr>
            <td>Bimbingan Konseling</td>
            <td class="text-center" id="bimbingan_konseling">Nilai</td>
            <td class="text-center" id="bimbingan_konseling_uts">Nilai</td>
          </tr>
          <tr>
            <td><strong>Lainya</strong></td>
            <td class="text-center" colspan="2" id="lainya">Nilai</td>
          </tr>
        </tbody>
      </table>
      <p class="h5 text-center mt-4">Riwayat Seleksi</p>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Nilai Akhir</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody id="riwayat">
        </tbody>
      </table>
    </div>
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
      <div class="modal-body py-0">
        <form class="form mb-0" id="formSiswa" name="formSiswa">
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

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Raport smt 1</th>
                            <th class="text-center">UTS smt 2</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Agama</td>
                            <td class="text-center"><input required name="n_agama" id="n_agama" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_agama_uts" id="n_agama_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>PKN</td>
                            <td class="text-center"><input required name="n_pkn" id="n_pkn" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_pkn_uts" id="n_pkn_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Indonesia</td>
                            <td class="text-center"><input required name="n_bahasa_indonesia" id="n_bahasa_indonesia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_indonesia_uts" id="n_bahasa_indonesia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Inggris</td>
                            <td class="text-center"><input required name="n_bahasa_inggris" id="n_bahasa_inggris" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_inggris_uts" id="n_bahasa_inggris_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Matematika</td>
                            <td class="text-center"><input required name="n_matematika" id="n_matematika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_matematika_uts" id="n_matematika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Fisika</td>
                            <td class="text-center"><input required name="n_fisika" id="n_fisika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_fisika_uts" id="n_fisika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Kimia</td>
                            <td class="text-center"><input required name="n_kimia" id="n_kimia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_kimia_uts" id="n_kimia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Biologi</td>
                            <td class="text-center"><input required name="n_biologi" id="n_biologi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_biologi_uts" id="n_biologi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Ekonomi</td>
                            <td class="text-center"><input required name="n_ekonomi" id="n_ekonomi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_ekonomi_uts" id="n_ekonomi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Geografi</td>
                            <td class="text-center"><input required name="n_geografi" id="n_geografi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_geografi_uts" id="n_geografi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Sosiologi</td>
                            <td class="text-center"><input required name="n_sosiologi" id="n_sosiologi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_sosiologi_uts" id="n_sosiologi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Penjaskes</td>
                            <td class="text-center"><input required name="n_penjaskes" id="n_penjaskes" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_penjaskes_uts" id="n_penjaskes_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Seni Budaya</td>
                            <td class="text-center"><input required name="n_seni_budaya" id="n_seni_budaya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_seni_budaya_uts" id="n_seni_budaya_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Sejarah Indonesia</td>
                            <td class="text-center"><input required name="n_sejarah_indonesia" id="n_sejarah_indonesia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_sejarah_indonesia_uts" id="n_sejarah_indonesia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Informatika</td>
                            <td class="text-center"><input required name="n_informatika" id="n_informatika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_informatika_uts" id="n_informatika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Jawa</td>
                            <td class="text-center"><input required name="n_bahasa_jawa" id="n_bahasa_jawa" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_jawa_uts" id="n_bahasa_jawa_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Prakarya</td>
                            <td class="text-center"><input required name="n_prakarya" id="n_prakarya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_prakarya_uts" id="n_prakarya_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bimbingan Konseling</td>
                            <td class="text-center"><input required name="n_bimbingan_konseling" id="n_bimbingan_konseling" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bimbingan_konseling_uts" id="n_bimbingan_konseling_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td><strong>Lainya</strong></td>
                            <td class="text-center" colspan="2"><input required name="n_lainya" id="n_lainya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                        </tbody>
                      </table>
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

<!-- Edit Data -->
<div class="modal fade" id="modal-siswa-edit" tabindex="-1" role="dialog" aria-labelledby="tambahDataTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header bg-primary p-4">
      <h5 class="modal-title white" id="tambahDataTitle">Edit Siswa
      </h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
      </button>
    </div>
      <div class="modal-body py-0">
        <form class="form mb-0" id="formSiswaEdit" name="formSiswaEdit">
        <section id="multiple-column-form">
          <div class="row match-height">
            <div class="col-12">
              <div class="card mb-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <input type="hidden" name="id_siswa" id="edit_id_siswa">
                      <div class="col-12 text-center">
                        <p class="h4">Identitas Siswa</p>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="asal_kelas" class="form-label">Kelas</label>
                          <select class="form-select" id="edit_asal_kelas" name="asal_kelas"
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
                          <input type="text" id="edit_nis" class="form-control" name="nis"
                            placeholder="Masukkan NIS ...." required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="nisn" class="form-label">NISN</label>
                          <input type="text" id="edit_nisn" class="form-control" name="nisn"
                            placeholder="Masukkan NISN ...." required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" id="edit_nama" class="form-control" name="nama"
                            placeholder="Masukkan Nama Siswa ...." required>
                        </div>
                      </div>
                      <div class="col-12 text-center mt-2">
                        <p class="h4">Nilai Siswa</p>
                      </div>

                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">Raport smt 1</th>
                            <th class="text-center">UTS smt 2</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Agama</td>
                            <td class="text-center"><input required name="n_agama" id="edit_n_agama" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_agama_uts" id="edit_n_agama_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>PKN</td>
                            <td class="text-center"><input required name="n_pkn" id="edit_n_pkn" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_pkn_uts" id="edit_n_pkn_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Indonesia</td>
                            <td class="text-center"><input required name="n_bahasa_indonesia" id="edit_n_bahasa_indonesia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_indonesia_uts" id="edit_n_bahasa_indonesia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Inggris</td>
                            <td class="text-center"><input required name="n_bahasa_inggris" id="edit_n_bahasa_inggris" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_inggris_uts" id="edit_n_bahasa_inggris_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Matematika</td>
                            <td class="text-center"><input required name="n_matematika" id="edit_n_matematika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_matematika_uts" id="edit_n_matematika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Fisika</td>
                            <td class="text-center"><input required name="n_fisika" id="edit_n_fisika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_fisika_uts" id="edit_n_fisika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Kimia</td>
                            <td class="text-center"><input required name="n_kimia" id="edit_n_kimia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_kimia_uts" id="edit_n_kimia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Biologi</td>
                            <td class="text-center"><input required name="n_biologi" id="edit_n_biologi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_biologi_uts" id="edit_n_biologi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Ekonomi</td>
                            <td class="text-center"><input required name="n_ekonomi" id="edit_n_ekonomi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_ekonomi_uts" id="edit_n_ekonomi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Geografi</td>
                            <td class="text-center"><input required name="n_geografi" id="edit_n_geografi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_geografi_uts" id="edit_n_geografi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Sosiologi</td>
                            <td class="text-center"><input required name="n_sosiologi" id="edit_n_sosiologi" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_sosiologi_uts" id="edit_n_sosiologi_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Penjaskes</td>
                            <td class="text-center"><input required name="n_penjaskes" id="edit_n_penjaskes" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_penjaskes_uts" id="edit_n_penjaskes_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Seni Budaya</td>
                            <td class="text-center"><input required name="n_seni_budaya" id="edit_n_seni_budaya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_seni_budaya_uts" id="edit_n_seni_budaya_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Sejarah Indonesia</td>
                            <td class="text-center"><input required name="n_sejarah_indonesia" id="edit_n_sejarah_indonesia" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_sejarah_indonesia_uts" id="edit_n_sejarah_indonesia_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Informatika</td>
                            <td class="text-center"><input required name="n_informatika" id="edit_n_informatika" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_informatika_uts" id="edit_n_informatika_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bahasa Jawa</td>
                            <td class="text-center"><input required name="n_bahasa_jawa" id="edit_n_bahasa_jawa" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bahasa_jawa_uts" id="edit_n_bahasa_jawa_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Prakarya</td>
                            <td class="text-center"><input required name="n_prakarya" id="edit_n_prakarya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_prakarya_uts" id="edit_n_prakarya_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td>Bimbingan Konseling</td>
                            <td class="text-center"><input required name="n_bimbingan_konseling" id="edit_n_bimbingan_konseling" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                            <td class="text-center"><input required name="n_bimbingan_konseling_uts" id="edit_n_bimbingan_konseling_uts" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                          <tr>
                            <td><strong>Lainya</strong></td>
                            <td class="text-center" colspan="2"><input required name="n_lainya" id="edit_n_lainya" value="0" type="number" step="0.01" min="0" max="100" class="form-control"></td>
                          </tr>
                        </tbody>
                      </table>
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

        <button type="submit" class="btn btn-primary ml-1" id="edit_saveBtn">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Simpan</span>
        </button>
      </form>
      <form  id="formReset" name="formReset">
        <input type="text" name="auth" id="auth" hidden />
        <button type="submit" class="btn btn-secondary ml-1" id="resetBtn">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Reset Password</span>
        </button>
      </form>
      </div>

  </div>
</div>
</div>

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
                {data: 'kelas', name: 'kelas', width: "15%"},
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
                $('#nama_').html(data.nama);
                $('#nis_').html(data.nis);
                $('#kelas_').html(data.kelas);
                $('#agama').html(data.agama);
                $('#pkn').html(data.pkn);
                $('#bahasa_indonesia').html(data.bahasa_indonesia);
                $('#bahasa_inggris').html(data.bahasa_inggris);
                $('#matematika').html(data.matematika);
                $('#fisika').html(data.fisika);
                $('#kimia').html(data.kimia);
                $('#biologi').html(data.biologi);
                $('#ekonomi').html(data.ekonomi);
                $('#geografi').html(data.geografi);
                $('#sosiologi').html(data.sosiologi);
                $('#penjaskes').html(data.penjaskes);
                $('#seni_budaya').html(data.seni_budaya);
                $('#sejarah_indonesia').html(data.sejarah_indonesia);
                $('#informatika').html(data.informatika);
                $('#bahasa_jawa').html(data.bahasa_jawa);
                $('#prakarya').html(data.prakarya);
                $('#bimbingan_konseling').html(data.bimbingan_konseling);
                $('#agama_uts').html(data.agama_uts);
                $('#pkn_uts').html(data.pkn_uts);
                $('#bahasa_indonesia_uts').html(data.bahasa_indonesia_uts);
                $('#bahasa_inggris_uts').html(data.bahasa_inggris_uts);
                $('#matematika_uts').html(data.matematika_uts);
                $('#fisika_uts').html(data.fisika_uts);
                $('#kimia_uts').html(data.kimia_uts);
                $('#biologi_uts').html(data.biologi_uts);
                $('#ekonomi_uts').html(data.ekonomi_uts);
                $('#geografi_uts').html(data.geografi_uts);
                $('#sosiologi_uts').html(data.sosiologi_uts);
                $('#penjaskes_uts').html(data.penjaskes_uts);
                $('#seni_budaya_uts').html(data.seni_budaya_uts);
                $('#sejarah_indonesia_uts').html(data.sejarah_indonesia_uts);
                $('#informatika_uts').html(data.informatika_uts);
                $('#bahasa_jawa_uts').html(data.bahasa_jawa_uts);
                $('#prakarya_uts').html(data.prakarya_uts);
                $('#bimbingan_konseling_uts').html(data.bimbingan_konseling_uts);
                $('#lainya').html(data.lainya);
                // .html(data.riwayat[0]['id']);
                var i = 0;
                let history = '';
                data.riwayat.forEach(function() {
                  history += '<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data.riwayat[i]['kelas_tujuan']+'</td><td class="text-center">'+data.riwayat[i]['nilai_akhir']+'</td><td>'+data.riwayat[i]['status']+'</td></tr>';
                  i++;
                });
                $('#riwayat').html(history);
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
                $('#modal-siswa-edit').modal('show');
                $('#edit_id_siswa').val(data.id);
                $('#edit_nis').val(data.nis);
                $('#edit_nisn').val(data.nisn);
                $('#edit_nama').val(data.nama);
                $('#edit_asal_kelas').val(data.kelas).change();
                $('#edit_n_agama').val(data.agama);
                $('#edit_n_pkn').val(data.pkn);
                $('#edit_n_bahasa_indonesia').val(data.bahasa_indonesia);
                $('#edit_n_bahasa_inggris').val(data.bahasa_inggris);
                $('#edit_n_matematika').val(data.matematika);
                $('#edit_n_fisika').val(data.fisika);
                $('#edit_n_kimia').val(data.kimia);
                $('#edit_n_biologi').val(data.biologi);
                $('#edit_n_ekonomi').val(data.ekonomi);
                $('#edit_n_geografi').val(data.geografi);
                $('#edit_n_sosiologi').val(data.sosiologi);
                $('#edit_n_penjaskes').val(data.penjaskes);
                $('#edit_n_seni_budaya').val(data.seni_budaya);
                $('#edit_n_sejarah_indonesia').val(data.sejarah_indonesia);
                $('#edit_n_informatika').val(data.informatika);
                $('#edit_n_bahasa_jawa').val(data.bahasa_jawa);
                $('#edit_n_prakarya').val(data.prakarya);
                $('#edit_n_bimbingan_konseling').val(data.bimbingan_konseling);
                $('#edit_n_agama_uts').val(data.agama_uts);
                $('#edit_n_pkn_uts').val(data.pkn_uts);
                $('#edit_n_bahasa_indonesia_uts').val(data.bahasa_indonesia_uts);
                $('#edit_n_bahasa_inggris_uts').val(data.bahasa_inggris_uts);
                $('#edit_n_matematika_uts').val(data.matematika_uts);
                $('#edit_n_fisika_uts').val(data.fisika_uts);
                $('#edit_n_kimia_uts').val(data.kimia_uts);
                $('#edit_n_biologi_uts').val(data.biologi_uts);
                $('#edit_n_ekonomi_uts').val(data.ekonomi_uts);
                $('#edit_n_geografi_uts').val(data.geografi_uts);
                $('#edit_n_sosiologi_uts').val(data.sosiologi_uts);
                $('#edit_n_penjaskes_uts').val(data.penjaskes_uts);
                $('#edit_n_seni_budaya_uts').val(data.seni_budaya_uts);
                $('#edit_n_sejarah_indonesia_uts').val(data.sejarah_indonesia_uts);
                $('#edit_n_informatika_uts').val(data.informatika_uts);
                $('#edit_n_bahasa_jawa_uts').val(data.bahasa_jawa_uts);
                $('#edit_n_prakarya_uts').val(data.prakarya_uts);
                $('#edit_n_bimbingan_konseling_uts').val(data.bimbingan_konseling_uts);
                $('#edit_n_lainya').val(data.lainya);
                $('#auth').val(data.nis);
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

        // initialize btn update
        $('#edit_saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#formSiswaEdit').serialize(),
                url: "{{ route('siswa.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#formSiswaEdit').trigger("reset");
                    $('#modal-siswa-edit').modal('hide');
                    swal_success();
                    table.draw();

                },
                error: function (data) {
                    console.log(data);
                    swal_error();
                }
            });

        });

        // initialize btn reset
        $('#resetBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#formReset').serialize(),
                url: "{{ route('siswa.reset') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#formSiswaEdit').trigger("reset");
                    $('#modal-siswa-edit').modal('hide');
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
