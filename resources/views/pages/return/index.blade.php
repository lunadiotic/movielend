@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-secondary mb-3">
                <div class="card-header">
                    <h3 class="panel-title">
                        Returned List
                    </h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Member</th>
                                <th>Movie</th>
                                <th>Lending Date</th>
                                <th>Returned Date</th>
                                <th>Late?</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('return.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'member.name', name: 'member'},
                {data: 'movie.title', name: 'movie'},
                {data: 'lending', name: 'lending'},
                {data: 'returned', name: 'returned'},
                {data: function(data) {
                    return data.lateness_charge ? 'Yes' : 'No';
                }, name: 'lateness_charge'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
