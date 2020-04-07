@extends('layouts.admin.dashboard')

@section('title','Employer')

@section('content')
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Employer List</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Employer</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Employer List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Company</th>
                                            <th>Employer</th>
                                            <th>Posted Job(s)</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employers as $key=>$employer)
                                        <tr>
                                            <td><div class="avatar">
                                            <img src="/profile/{{ $employer->image}}" alt="..." class="avatar-img rounded" data-toggle="tooltip" data-original-title="{{ ucwords($employer->company) }}">
                                            </div></td>
                                            <td>{{ ucwords($employer->company) }}</td>
                                            <td>{{ ucwords($employer->name) }}</td>
                                            <td>{{ $employer->posts_count }}</td>
                                            <td>
                                                @if($employer->verified == 1)
                                                    <small data-toggle="tooltip" class="btn btn-link btn-success btn-lg" data-original-title="Active"><i class="fa fa-check-circle"></i></small>
                                                @else
                                                    <small data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Inactive"><i class="fa fa-times-circle"></i></small>
                                                @endif  
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a data-toggle="tooltip" href="{{ route('employer.company',[$employer->id, str_slug($employer->company)]) }}" class="btn btn-link btn-primary btn-lg" data-original-title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="deleteAuthors({{ $employer->id }})">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $employer->id }}" action="{{ route('admin.employer.destroy',$employer->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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
        </div>
        @include('layouts.admin.footer')
    </div>
</div>
@endsection
@section('scripts')
<!-- Datatables -->
<script src="{{asset ('assets/admin/js/plugin/datatables/datatables.min.js')}}"></script>
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 10,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });
    });
</script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
        function deleteAuthors(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection