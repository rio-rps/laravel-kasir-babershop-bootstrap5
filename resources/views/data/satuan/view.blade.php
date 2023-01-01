 @extends('layout.main')


 @section('isi')


 <div class="breadcrumb-header justify-content-between">
     <div class="my-auto">
         <div class="d-flex">
             <h4 class="content-title mb-0 my-auto">SATUAN</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ -</span>
         </div>
     </div>
     <div class="d-flex my-xl-auto right-content">
         <div class="pe-1 mb-xl-0">
             <button type="button" class="btn btn-primary me-2" id="button-show-sidebar-right"><i class=" fa fa-plus-circle"></i> Tambah Data</button>
         </div>
         <div class="pe-1 mb-xl-0">
             <button type="button" class="btn btn-warning  btn-icon me-2" onclick="refresh()"><i class="mdi mdi-refresh"></i></button>
         </div>
     </div>
 </div>


 <div class="row row-sm">
     <div class="col-lg-12">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">DATA SATUAN</h3>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="example2" class="border-top-0  table table-bordered text-nowrap border-bottom">
                         <thead>
                             <tr>
                                 <th width="1%">No</th>
                                 <th>Nama Satuan</th>
                                 <th>Nama Satuan</th>
                                 <th>Nama Satuan</th>
                                 <th width="5%">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>Tiger Nixon</td>
                                 <td>Tiger Nixon</td>
                                 <td>Tiger Nixon</td>
                                 <td>
                                     <div class="btn-icon-list btn-list">
                                         <button type="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
                                         <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                     </div>
                                 </td>
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="viewmodal" style="display:none;"></div>
 <script>
     document.getElementById('button-show-sidebar-right').addEventListener('click', showSidebarRight);

     function showSidebarRight() {
         var ket = "test";
         $.ajax({
             type: "GET",
             url: "{{ url('satuan/create') }}",
             // headers: {
             //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             // },
             // data: {
             //     ket: ket,
             // },
             //dataType: "json",
             success: function(response) {
                 $('.viewmodal').html(response).show();
                 document.querySelector('.sidebar-right').classList.toggle('sidebar-open');

             },
             error: function(xhr, ajaxOptons, throwError) {
                 alert(xhr.status + '\n' + throwError);
             }
         });

     }
 </script>





 <script>
     function refresh() {
         window.location.href = "{{ url('satuan') }}";
     }
 </script>
 @endsection