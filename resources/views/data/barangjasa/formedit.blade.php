<link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/') }}css/customcss.css">
<script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.all.min.js"></script>
<style>
    .swal2-container {
        z-index: 10000;
    }
</style>
<!-- Sidebar-right-->
<div class="sidebar sidebar-right sidebar-animate" style="width: 25em;">
    <div class="panel panel-primary card mb-0 box-shadow">
        <div class="tab-menu-heading border-0 p-3">
            <div class="card-title mb-0">FORM EDIT DATA</div>
            <div class="card-options ms-auto">
                <a href="javascript:void(0);" class="sidebar-remove"><i class="fa fa-window-close"></i></a>
            </div>
        </div>
        <div class="panel-body tabs-menu-body latest-tasks p-0 border-0 p-3">
            <form action="{{ route('barangjasa.update',$id_brgjasa) }}" class="formUpdate" method="POST">
                @csrf
                <input class="form-control" type="hidden" name="id_kategori" value="{{ $row->id_kategori }}">
                <div class="form-group">
                    <label>Nama {{ $row->nm_kategori }}</label>
                    <input class="form-control" placeholder="Nama {{ $row->nm_kategori }}" type="text" name="nm_brgjasa" value="{{ $row->nm_brgjasa }}">
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="{{$row->id_satuan}}">{{$row->nm_satuan}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="ket_brgjasa" class="form-control" cols="2" rows="3">{{ $row->ket_brgjasa }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status Tersedia</label>

                    <select name="status_tersedia" class="form-control">
                        <option value="" {{ $row->status_tersedia == '' ? 'selected' : '' }}>--Pilih--</option>
                        <option value="1" {{ $row->status_tersedia == 1 ? 'selected' : '' }}>Ada Tersedia</option>
                        <option value="2" {{ $row->status_tersedia == 2 ? 'selected' : '' }}>Tidak Tersedia</option>
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
        $('.formUpdate').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "PUT",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#tombolUpdate').prop('disabled', true);
                    $('#tombolUpdate').html("<i class='fa fa-spin fa-spinner'></i>");
                },
                complete: function() {
                    $('#tombolUpdate').prop('disabled', false);
                    $('#tombolUpdate').html("Simpan");

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
                        Swal.fire('Gagal', errorList, 'warning');
                    }
                }
            });
            return false;
        });
    });
</script>