 @extends('layout.main')


 @section('isi')
 <link rel="stylesheet" href="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.css">
 <script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.all.min.js"></script>

 <div class="breadcrumb-header justify-content-between">
     <div class="my-auto">
         <div class="d-flex">
             <h4 class="content-title mb-0 my-auto">{{ $title }}</h4>
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
                 <h3 class="card-title">DATA {{ $title }}</h3>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="example2" class="border-top-0  table table-bordered text-nowrap border-bottom">
                         <thead>
                             <tr>
                                 <th width="1%">No</th>
                                 <th>Nama Potongan</th>
                                 <th>Keterangan Potongan</th>
                                 <th width="5%" align="center">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($result as $row)
                             <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ $row->nm_pot }}</td>
                                 <td>{{ $row->ket_pot }}</td>
                                 <td>
                                     <div class="btn-icon-list btn-list">
                                         <button type="button" class="btn btn-sm btn-success" onclick="editData('{{$row->id_pot}}')" title="Edit Data"><i class="fa fa-edit"></i></button>
                                         <button type="button" class="btn btn-sm btn-danger" onclick="hapusData('{{$row->id_pot}}')" title="Hapus Data"><i class="fa fa-trash"></i></button>

                                         <!-- <form action="{{url('satuan/destroy')}}" method="post" style="display: inline;" onsubmit="return hapusData()">
                                             @method('delete')
                                             @csrf
                                             <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                             </form> -->

                                     </div>
                                 </td>
                             </tr>
                             @endforeach
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
         //var ket = "test";
         $.ajax({
             type: "GET",
             url: "{{ url('potongan/create') }}",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
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


     function editData(id) {
         $.ajax({
             type: "GET",
             url: "{{ url('potongan') }}" + '/' + id + '/edit',
             //dataType: "json",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function(response) {
                 $('.viewmodal').html(response).show();
                 document.querySelector('.sidebar-right').classList.toggle('sidebar-open');
             },
             error: function(xhr, ajaxOptons, throwError) {
                 alert(xhr.status + '\n' + throwError);
             }
         });
     }

     function hapusData(id) {

         Swal.fire({
             title: 'Apakah Anda Yakin ',
             text: "Data Akan dihapus ! ",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya, Hapus!'
         }).then((result) => {
             if (result.isConfirmed) {
                 $.ajax({
                     type: "DELETE",
                     url: "{{ url('potongan/destroy') }}",
                     data: {
                         id: id,
                     },
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     dataType: "json",
                     success: function(response) {
                         if (response.success) {
                             Swal.fire(
                                     'Berhasil',
                                     response.success,
                                     'success'
                                 )
                                 .then((result) => {
                                     window.location.reload();
                                 })
                         }
                     },
                     error: function(xhr, ajaxOptons, throwError) {
                         alert(xhr.status + '\n' + throwError);
                     }
                 });

             }
         })



         //  pesan = confirm('Yakin data ini dihapus ?');

         //  if (pesan)
         //      return true;
         //  else
         //      return false;
     }
 </script>





 <script>
     function refresh() {
         window.location.href = "{{ url('satuan') }}";
     }
 </script>
 @endsection