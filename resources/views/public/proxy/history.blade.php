@extends('layouts.web.web')

@section('head')
    <style>
        .btn-outline-green {
            border-color: #2b845d;
            color: #2b845d;
        }

        .btn-outline-green:hover {
            background-color: #2b845d;
            color: #fff;
        }

        /* media tag devices:start */
        /*  320px — 480px: Mobile devices */
        @media screen and (max-width: 319px) {
            #proxyHistory_wrapper .dt-buttons,
            #proxyHistory_wrapper .dt-buttons .dt-button {
                margin-top: 6% !important;
                padding: 0.0875rem 0.45rem;
            }
        }

        @media screen and (min-width: 320px) and (max-width: 480px) {

            #proxyHistory_wrapper .dt-buttons,
            #proxyHistory_wrapper .dt-buttons .dt-button {
                margin-top: 5% !important;
            }
        }

        /* 481px — 768px: iPads, Tablets */
        @media screen and (min-width: 481px) and (max-width: 768px) {
            #proxyHistory_wrapper .dt-buttons {
                margin-top: 4% !important;
            }
        }

        /* 769px — 1024px: Small screens, laptops */
        @media screen and (min-width: 769px) and (max-width: 1024px) {
            #proxyHistory_wrapper .dt-buttons {
                margin-top: 2% !important;
            }
        }

        /* 1025px — 1200px: Desktops, large screens */
        @media screen and (min-width: 1025px) and (max-width: 1200px) {}
    </style>
@endsection

@section('content')
    <section>

        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <h1 class="fs-2 fs-sm-3 fs-md-4">Proxy Histories</h1>
                    <div class="header_divider"></div>
                </div>
            </div>
            @if ($histories->count() == 0)
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="alert alert-warning">
                            <h4 class="alert-heading">NO HISTORIES FOUND</h4>
                            <p class="alert-text">There are no histories for you.</p>
                        </div>
                    </div>
                </div>
            @else
                <div id="tableExample2">
                    <div class="table-responsive scrollbar">
                        <table class="table table-bordered table-striped fs--1 mb-0" id="proxyHistory">
                            <thead class="bg-200 text-900">
                                <tr>
                                    <th class="sort" data-sort="listItem">#sl</th>
                                    <th class="sort" data-sort="service_name">Service Name</th>
                                    <th class="sort" data-sort="location">location</th>
                                    <th class="sort" data-sort="username">username</th>
                                    <th class="sort" data-sort="password">password</th>
                                    <th class="sort" data-sort="porxy_ip">IP</th>
                                    <th class="sort" data-sort="porxy_port">Port</th>
                                    <th class="sort" data-sort="porxy_time">Time Priod</th>
                                    <th class="sort" data-sort="created_at">Created Time</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($histories as $history)
                                    <tr>
                                        <td class="listItem">{{ $loop->index + 1 }}</td>
                                        <td class="service_name">{{ $history->service }}</td>
                                        <td class="location">{{ $history->location }}</td>
                                        <td class="username">{{ $history->username }}</td>
                                        <td class="password">{{ $history->password }}</td>
                                        <td class="porxy_ip">{{ $history->porxy_ip }}</td>
                                        <td class="porxy_port">{{ $history->porxy_port }}</td>
                                        <td class="porxy_time">{{ $history->porxy_time }}</td>
                                        <td class="created_at">
                                            {{ $history->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        <!-- end of .container-->

    </section>
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
    {{-- CDN --}}
    <script>
        $(document).ready(function() {
            $('#proxyHistory').DataTable({
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
        });
    </script>
@endsection
