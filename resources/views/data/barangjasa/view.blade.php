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
                 <div class="card">
                     <div class="card-body">
                         <p class="card-text">{{ $sub_title }}</p>
                     </div>
                 </div>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="example2" class="border-top-0  table table-bordered text-nowrap border-bottom" style="font-size:10px;">
                         <thead>
                             <tr>
                                 <th width="1%">No</th>
                                 <th>Nama</th>
                                 @if ($status_layanan==2)
                                 <th>Stok dijual</th>
                                 @endif
                                 <th>Harga Beli/Modal</th>
                                 <th>Harga Jual</th>
                                 <th>Diskon</th>
                                 <th>Harga Jual Real</th>
                                 <th>Keterangan</th>
                                 <th>Status</th>
                                 <th width="5%" align="center">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($barangjasa as $bj)
                             <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ $bj->nm_brgjasa }}</td>
                                 @if ($status_layanan ==2)
                                 <td align="center">{{ $bj->stok }} {{ $bj->nm_satuan }}</td>
                                 @endif
                                 <td align="right">Rp. {{ format_rupiah($bj->harga_beli) }}</td>
                                 <td align="right">Rp. {{ format_rupiah($bj->harga_jual) }}</td>
                                 <td align="right">Rp. {{ format_rupiah($bj->diskon) }}</td>
                                 <td align="right">Rp. {{ format_rupiah($bj->harga_jual_real) }}</td>
                                 <td>{{ $bj->ket_brgjasa }}</td>
                                 <td>{{ status_brgjasa($bj->status_tersedia) }}</td>
                                 <td>
                                     <div class="btn-icon-list btn-list">
                                         <button type="button" class="btn btn-sm btn-warning" onclick="updateHarga('{{$bj->id_brgjasa}}')" title="Update Data Harga"><i class="far fa-closed-captioning"></i></button>
                                         @if ($status_layanan==2)
                                         <button type="button" class="btn btn-sm btn-primary" onclick="updateStokData('{{$bj->id_brgjasa}}')" title="Update Data Stok"><i class="fa fa-shopping-cart"></i></button>
                                         @endif
                                         <button type="button" class="btn btn-sm btn-success" onclick="editData('{{$bj->id_brgjasa}}')" title="Edit Data"><i class="fa fa-edit"></i></button>
                                         <button type="button" class="btn btn-sm btn-danger" onclick="hapusData('{{$bj->id_brgjasa}}')" title="Hapus Data"><i class="fa fa-trash"></i></button>

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
     document.addEventListener('DOMContentLoaded', function() {
         document.getElementById('button-show-sidebar-right').addEventListener('click', showSidebarRight);
     });

     function showSidebarRight() {
         var id_kategori = <?= $id_kategori; ?>;
         $.ajax({
             type: "GET",
             url: "{{ url('barangjasa/create') }}",
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data: {
                 id_kategori: id_kategori
             },
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

     function updateHarga(id_brgjasa) {
         $.ajax({
             type: "GET",
             url: "{{ route('harga.formedit') }}",
             data: {
                 id_brgjasa: id_brgjasa,
             },
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

     function editData(id_brgjasa) {
         $.ajax({
             type: "GET",
             url: "{{ url('barangjasa') }}" + '/' + id_brgjasa + '/edit',
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

     function hapusData(id_brgjasa) {

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
                     url: "{{ url('barangjasa/destroy') }}",
                     data: {
                         id_brgjasa: id_brgjasa,
                         // _token: '{{ csrf_token() }}'
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
     }

     function refresh() {
         window.location.reload();
     }
 </script>


 @endsection