<div class="table-responsive">
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama Satuan</th>
                <th width="15%" align="center">Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
    $(document).ready(function() {


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
</script>