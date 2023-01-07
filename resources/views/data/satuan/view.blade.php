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
                    <table id="myTable" class="border-top-0  table table-bordered text-nowrap border-bottom">
                        <thead>
                            <tr>
                                <th width=" 1%">No</th>
                                <th>Nama Satuan</th>
                                <th width="15%" align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display:none;"></div>
<!-- DATA TABLE JS-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('button-show-sidebar-right').addEventListener('click', showSidebarRight);

        myTable = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('satuan/show')}}",
            // "data": null,
            // "class": "align-top",
            // "orderable": false,
            // "searchable": false,
            columns: [{
                    // "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "data": "no",
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'nm_satuan',
                    name: 'nm_satuan'
                }, {
                    data: 'action',
                    name: 'action',
                }
            ]
        });
    });

    function showSidebarRight() {
        $.ajax({
            type: "GET",
            url: "{{ url('satuan/create') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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


    function editData(id_satuan) {
        $.ajax({
            type: "GET",
            url: "{{ url('satuan') }}" + '/' + id_satuan + '/edit',
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

    function hapusData(id_satuan) {

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
                    url: "{{ url('satuan/destroy') }}",
                    data: {
                        id_satuan: id_satuan,
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
                                    myTable.ajax.reload();
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
        myTable.ajax.reload();
    }
</script>
@endsection