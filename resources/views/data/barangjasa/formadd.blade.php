<link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}css/customcss.css">
<script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.all.min.js"></script>
<style>
    .swal2-container {
        z-index: 10000;
    }
</style>
<!-- Sidebar-right-->
<div class="sidebar sidebar-right sidebar-animate overflow-auto" style="width: 25em;">
    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading border-0 p-3">
            <div class="card-title mb-0">FORM INPUT DATA BARU</div>
            <div class="card-options ms-auto">
                <a href="javascript:void(0);" class="sidebar-remove"><i class="fa fa-window-close"></i></a>
            </div>
        </div>

        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0 p-3">

            <form action="{{ route('barangjasa.store') }}" class="formSimpan" method="POST">
                @csrf
                <input class="form-control" hidden value="{{$id_kategori}}" type="text" name="id_kategori">
                <div class="form-group">
                    <label>Nama {{ $nm_kategori }}</label>
                    <input class="form-control" placeholder="Nama {{ $nm_kategori }}" type="text" name="nm_brgjasa">
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="" selected>--Pilih--</option>
                        @foreach($resultSatuan as $satuan)
                        <option value="{{$satuan->id_satuan}}">{{$satuan->nm_satuan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="ket_brgjasa" class="form-control" cols="2" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Status Tersedia</label>

                    <select name="status_tersedia" class="form-control">
                        <option value="" selected>--Pilih--</option>
                        <option value="1">Ada Tersedia</option>
                        <option value="2">Tidak Tersedia</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3 mb-0" id="tombolSimpan">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
<!--/Sidebar-right-->

<script>
    document.querySelector('.sidebar-remove').addEventListener('click', function() {
        document.querySelector('.viewmodal').style.display = 'none';
    });

    $(document).ready(function() {

        $('.formSimpan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#tombolSimpan').prop('disabled', true);
                    $('#tombolSimpan').html("<i class='fa fa-spin fa-spinner'></i>");
                },
                complete: function() {
                    $('#tombolSimpan').prop('disabled', false);
                    $('#tombolSimpan').html("Simpan");

                },
                success: function(response) {

                    if (response.success) {
                        document.querySelector('.sidebar-right').classList.toggle('sidebar-open');
                        Swal.fire('Berhasil', response.success, 'success').then((result) => {
                            window.location.reload();
                        })
                    }

                },
                error: function(xhr, ajaxOptons, throwError) {

                    if (xhr.status >= 500) {
                        // alert(xhr.status + '\n' + throwError);
                        Swal.fire('Error', xhr.status + '\n' + throwError, 'error');
                    }

                    if (xhr.status == 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorList = '';
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorList += '\n - ' + errors[key] + '</br>';
                            }
                        }
                        Swal.fire({
                            title: 'Gagal',
                            html: errorList,
                            icon: 'warning',
                            // backdrop: 'static', 
                            // target: 'top'

                        });
                        // or user
                        // Swal.fire('Gagal', errorList, 'warning');
                    }
                }
            });
            return false;
        });
    });
</script>