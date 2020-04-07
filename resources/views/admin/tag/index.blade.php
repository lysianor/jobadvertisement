@extends('layouts.grand.dashboard')

@section('title','Manage Tag')

@push('css')

@endpush

@section('content')
<!-- Our Dashbord -->
    <section class="cnddte_fvrt our-dashbord dashbord">
        <div class="container">
            <div class="row">
@include('layouts.grand.sidebar')
                <div class="col-sm-12 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb30">Manage Tags</h4>
                            <a href="{{ route('admin.tag.create') }}" type="button" class="btn btn-lg btn-transparent3">Create Tag</a>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="candidate_revew_search_box mt30">
                                <form class="form-inline my-2 my-lg-0" action="{{ route('admin.tag.index') }}" method="GET">
                                    <input class="form-control mr-sm-2"  name="query" value="{{ isset($query) ? $query : '' }}" type="text" placeholder="Search" aria-label="Search">
                                    <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="candidate_revew_select text-right mt30">
                                <ul>
                                    <li class="list-inline-item">Sort by:</li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker show-tick">
                                            <option>Newest</option>
                                            <option>Recent</option>
                                            <option>Old Review</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="cnddte_fvrt_job candidate_job_reivew style2">
                                <div class="table-responsive job_review_table">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Post Count</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        @if(count($tags) > 0)
                                        <tbody>
                                            <tr>
                                            @foreach($tags as $key=>$tag)
                                                <th id="title" scope="row">
                                                    <h4>{{ ucwords($tag->name) }}</h4>
                                                    <ul>
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Created: </span></a></li>
                                                        <li class="list-inline-item"><span class="color-black22">{{ Carbon\Carbon::parse($tag->created_at)->toFormattedDateString()}}</span></li>
                                                    </ul>
                                                </th>
                                                <td><span class="color-black22">{{ $tag->posts->count() }}</span> Post(s)</td>
                                                <td>
                                                    <ul class="view_edit_delete_list">
                                                        <li class="list-inline-item"><a href="{{ route('admin.tag.edit',$tag->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit"><span class="flaticon-edit"></span></a></li>
                                                        <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="deleteTag({{ $tag->id }})"><span class="flaticon-rubbish-bin"></span></a></li>
                                                        <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
            <!-- Page navigation -->
            <div class="mbp_pagination text-center">
                {{ $tags->appends(request()->input() )->links('vendor.pagination.default') }}
            </div>
            <!-- END Page navigation -->

@else
    <th scope="row">No record found.</th>
@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<a class="scrollToHome text-thm" href="#"><i class="flaticon-rocket-launch"></i></a>
</div>
@endsection
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it',
                cancelButtonText: 'No, Cancel',
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
                        'Your data is safe',
                        'error'
                    )
                }
            })
        }
</script>
@push('js')


@endpush
