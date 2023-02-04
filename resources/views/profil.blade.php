@extends('components.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil</h3>
            </div>
        </div>
    </div>

    <section class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="card col-md-11">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-7">
                                        <h6 class="mb-0 text-secondary">{{ $nilai->nama }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <h6 class="mb-0">NIS</h6>
                                    </div>
                                    <div class="col-7">
                                        <h6 class="mb-0 text-secondary">{{ $nilai->nis }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <h6 class="mb-0">NISN</h6>
                                    </div>
                                    <div class="col-7">
                                        <h6 class="mb-0 text-secondary">{{ $nilai->nisn }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <h6 class="mb-0">Asal Kelas</h6>
                                    </div>
                                    <div class="col-7">
                                        <h6 class="mb-0 text-secondary">{{ $nilai->kelas }}</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-4 text-center">
                                    <div class="col-12">
                                        <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-password">Ubah Kata Sandi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-11">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <p class="h5 text-center mb-3">Riwayat Seleksi</p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($riwayat as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td class="text-center">{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <p class="h5 text-center mb-3">Daftar Nilai</p>
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
                                        <td class="text-center" id="agama">{{ $nilai->agama }}</td>
                                        <td class="text-center" id="agama_uts">{{ $nilai->agama_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>PKN</td>
                                        <td class="text-center" id="pkn">{{ $nilai->pkn }}</td>
                                        <td class="text-center" id="pkn_uts">{{ $nilai->pkn_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Indonesia</td>
                                        <td class="text-center" id="bahasa_indonesia">{{ $nilai->bahasa_indonesia }}</td>
                                        <td class="text-center" id="bahasa_indonesia_uts">{{ $nilai->bahasa_indonesia_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Inggris</td>
                                        <td class="text-center" id="bahasa_inggris">{{ $nilai->bahasa_inggris }}</td>
                                        <td class="text-center" id="bahasa_inggris_uts">{{ $nilai->bahasa_inggris_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Matematika</td>
                                        <td class="text-center" id="matematika">{{ $nilai->matematika }}</td>
                                        <td class="text-center" id="matematika_uts">{{ $nilai->matematika_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fisika</td>
                                        <td class="text-center" id="fisika">{{ $nilai->fisika }}</td>
                                        <td class="text-center" id="fisika_uts">{{ $nilai->fisika_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kimia</td>
                                        <td class="text-center" id="kimia">{{ $nilai->kimia }}</td>
                                        <td class="text-center" id="kimia_uts">{{ $nilai->kimia_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biologi</td>
                                        <td class="text-center" id="biologi">{{ $nilai->biologi }}</td>
                                        <td class="text-center" id="biologi_uts">{{ $nilai->biologi_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ekonomi</td>
                                        <td class="text-center" id="ekonomi">{{ $nilai->ekonomi }}</td>
                                        <td class="text-center" id="ekonomi_uts">{{ $nilai->ekonomi_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Geografi</td>
                                        <td class="text-center" id="geografi">{{ $nilai->geografi }}</td>
                                        <td class="text-center" id="geografi_uts">{{ $nilai->geografi_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sosiologi</td>
                                        <td class="text-center" id="sosiologi">{{ $nilai->sosiologi }}</td>
                                        <td class="text-center" id="sosiologi_uts">{{ $nilai->sosiologi_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penjaskes</td>
                                        <td class="text-center" id="penjaskes">{{ $nilai->penjaskes }}</td>
                                        <td class="text-center" id="penjaskes_uts">{{ $nilai->penjaskes_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Seni Budaya</td>
                                        <td class="text-center" id="seni_budaya">{{ $nilai->seni_budaya }}</td>
                                        <td class="text-center" id="seni_budaya_uts">{{ $nilai->seni_budaya_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sejarah Indonesia</td>
                                        <td class="text-center" id="sejarah_indonesia">{{ $nilai->sejarah_indonesia }}</td>
                                        <td class="text-center" id="sejarah_indonesia_uts">{{ $nilai->sejarah_indonesia_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Informatika</td>
                                        <td class="text-center" id="informatika">{{ $nilai->informatika }}</td>
                                        <td class="text-center" id="informatika_uts">{{ $nilai->informatika_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Jawa</td>
                                        <td class="text-center" id="bahasa_jawa">{{ $nilai->bahasa_jawa }}</td>
                                        <td class="text-center" id="bahasa_jawa_uts">{{ $nilai->bahasa_jawa_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Prakarya</td>
                                        <td class="text-center" id="prakarya">{{ $nilai->prakarya }}</td>
                                        <td class="text-center" id="prakarya_uts">{{ $nilai->prakarya_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bimbingan Konseling</td>
                                        <td class="text-center" id="bimbingan_konseling">{{ $nilai->bimbingan_konseling }}</td>
                                        <td class="text-center" id="bimbingan_konseling_uts">{{ $nilai->bimbingan_konseling_uts }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lainya</strong></td>
                                        <td class="text-center" colspan="2" id="lainya">{{ $nilai->lainya }}</td>
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

{{-- Modal Import Nilai --}}
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="passwordTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header bg-primary p-4">
      <h5 class="modal-title white" id="tambahDataTitle">Ubah Kata Sandi
      </h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
      </button>
    </div>
    <form autocomplete="off" class="form mb-0" id="formPass" name="formPass">
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
                              <label for="nis" class="form-label">Kata Sandi Lama</label>
                              <input type="text" id="old" class="form-control" name="old"
                                placeholder="Masukkan Kata Sandi Lama ...." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <label for="nis" class="form-label">Kata Sandi Baru</label>
                              <input type="text" id="new" class="form-control" name="new"
                                placeholder="Masukkan Kata Sandi Baru ...." required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                              <label for="nis" class="form-label">Konfirmasi Kata Sandi Baru</label>
                              <input type="text" id="conf" class="form-control" name="conf"
                                placeholder="Masukan Kembali Kata Sandi Baru ...." required>
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
@endsection

@section('script')
<script>
    // initialize btn save
    $('#save').click(function (e) {
        e.preventDefault();
        $.ajax({
            data: $('#formPass').serialize(),
            url: "{{ route('profil.pass') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#formPass').trigger("reset");
                $('#modal-password').modal('hide');
                if(data.failed != null) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: ''+data.failed,
                        showConfirmButton: false,
                        timer: 1000
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: ''+data.success,
                        showConfirmButton: false,
                        timer: 1000
                    })
                }

            },
            error: function (data) {
                console.log(data);
                swal_error();
            }
        });
    });
</script>
@endsection
