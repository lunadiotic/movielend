@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-secondary mb-3">
                <div class="card-header">
                    <h3 class="panel-title">
                        Movies
                        <a href="{{ route('movie.create') }}" class="btn btn-sm btn-success modal-show"
                            title="Create User"><i class="icon-plus"></i> Create</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Released</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Released</th>
                                <th></th>
                            </tr>
                        </tfoot>
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
            ajax: "{{ route('movie.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'genre', name: 'genre'},
                {data: 'released', name: 'released'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
