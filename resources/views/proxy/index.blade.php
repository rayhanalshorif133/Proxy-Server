@extends('layouts.admin.admin')

@section('head')
<style>
    .col-md-3 {
        width: 30%;
    }

    .col-md-2 {
        width: 24%;
    }

    .form-select {
        font-size: 12px;
    }

    .btn-outline-green {
        color: #008000 !important;
        background: #fff;
        border: 1px solid #008000 !important;
    }

    .btn-outline-green:hover {
        color: #fff !important;
        background: #008000;
        border: 1px solid#008000 !important;
    }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card shadow-none">
            <div class="card-body p-0 pb-3">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5 class="mb-0">Proxy History List</h5>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="datefrom">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="dateto">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-center justify-content-end my-3">
                            <div class="d-none ms-3" id="bulk-select-actions">
                                <div class="d-flex">
                                    <select class="form-select form-select-sm userActionSelect"
                                        aria-label="Bulk actions">
                                        <option selected="selected">Actions</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                    <button class="btn btn-falcon-danger btn-sm ms-2 userApplyBtn"
                                        type="button">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive scrollbar">
                <table class="table mb-0 historyOfProxy">
                    <thead class="text-black bg-200">
                        <tr>
                            <th class="align-middle">
                                <div class="form-check mb-0"><input class="form-check-input" type="checkbox"
                                        data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                                </div>
                            </th>
                            <th class="align-middle">#sl</th>
                            <th class="align-middle">User</th>
                            <th class="align-middle">User Name</th>
                            <th class="align-middle">Password</th>
                            <th class="align-middle">Service Name </th>
                            <th class="align-middle">Location</th>
                            <th class="align-middle">IP</th>
                            <th class="align-middle">Port</th>
                            <th class="align-middle">Created Time</th>
                            <th class="align-middle d-none">Status</th>
                        </tr>
                    </thead>
                    <tbody id="bulk-select-body">
                        @foreach ($histories as $history)
                        <tr>
                            <td class="align-middle">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" id="checkbox-1"
                                        data-bulk-select-row="data-bulk-select-row" />
                                </div>
                            </td>
                            <td class="align-middle">{{ $loop->index + 1 }}</td>
                            <td class="align-middle">{{ $history->user->name }}</td>
                            <td class="align-middle">{{ $history->username }}</td>
                            <td class="align-middle">{{ $history->password }}</td>
                            <td class="align-middle">{{ $history->service }}</td>
                            <td class="align-middle">{{ $history->location }}</td>
                            <td class="align-middle">{{ $history->porxy_ip }}</td>
                            <td class="align-middle">{{ $history->porxy_port }}</td>
                            <td class="align-middle created_at" id="{{ $history->created_at }}">
                                {{ $history->created_at->diffForHumans() }}
                            </td>
                            <td class="align-middle d-none">
                                {{ $history->status }}
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
@endsection

@section('scripts')
{{-- CDN --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
{{-- CDN --}}
<script>
    var dateFrom = '';
    var table = "";
        var dateTo = '';
        $(document).ready(function() {
            handleDateRangePicker();
            dataTableHandler();
        });

        const dataTableHandler = () => {
          table =  $(".historyOfProxy").DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "order": [
                [8, "desc"]
                ],
                "pageLength": 25,
                "lengthMenu": [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
                ],
            });
            // desing in btn
            $('.dt-button').addClass('btn btn-outline-green btn-sm me-1');
        };
        const handleDateRangePicker = () => {
            $('input[name="datefrom"]').change(function() {
                dateFrom = $(this).val();
                if (dateFrom != '' && dateTo != '') {
                    filterByDate();
                }
            });

            $('input[name="dateto"]').change(function() {
                dateTo = $(this).val();
                if (dateFrom != '' && dateTo != '') {
                    filterByDate();
                }
            });
        };


        const filterByDate = () => {
            const URL = `/user/proxy/history/${dateFrom}/${dateTo}`;
            axios.get(URL)
            .then((response) => {
                let data = response.data.data;
                var checkBtn = `
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="checkbox-1" data-bulk-select-row="data-bulk-select-row" />
                    </div>
                    `;
                    table.clear().draw();
                    data.map(function(item,index) {

                        var time = moment(item.created_at).startOf('hour').fromNow();
                        table.row.add([
                            checkBtn,
                            index+1, 
                            item.user.name, 
                            item.username, 
                            item.password,
                            item.service,
                            item.location,
                            item.porxy_ip,
                            item.porxy_port,
                            time,
                            `
                            <span class="d-none">${item.status}</span>
                            `,
                        ]).draw(false);
                    });
                });
            
            handleDateRangePicker();
            // desing in btn
            $('.dt-button').addClass('btn btn-outline-green btn-sm me-1');
            // dataTableHandler();
        };
</script>
@endsection