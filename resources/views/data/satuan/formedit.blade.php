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
             <form action="{{ route('satuan.update',$id_satuan) }}" class="formUpdate" method="POST">
                 @csrf
                 <div class="form-group">
                     <label>Nama Satuan</label>
                     <input class="form-control" placeholder="Nama Satuan" type="text" name="nm_satuan" value="{{ $nm_satuan }}">
                 </div>

                 <button type=" submit" class="btn btn-primary btn-block mt-3 mb-0" id="tombolUpdate">SIMPAN</button>
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
                             //window.location.reload();
                             myTable.ajax.reload();
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