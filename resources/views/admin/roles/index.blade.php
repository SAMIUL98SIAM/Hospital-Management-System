@extends('layouts.admin.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('admin/assets/css/datatable.css')}}">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"> Role </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.roles.create')}}" type="button" class="btn-shadow mr-3 btn btn-success">Create Role</a></li>
          </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Role</h4>
                </p>
                <div class="table-responsive">
                  <table id="datatable" class="align-middle mb-0 table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permission</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key=>$role)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">{{$role->name}}</td>
                            <td class="text-center">
                                @if ($role->permissions->count() > 0)
                                <span><div class="badge badge-info">{{$role->permissions->count()}}</div></span>
                                @else
                                <span><div class="badge badge-danger">No Permission Found : (</div></span>
                                @endif
                            </td>
                            <td class="text-center">{{$role->created_at->diffForHumans()}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-primary"><i class="fa fa-edit"><span> Edit</span></i></a>

                                @if ($role->deletable == true)
                                <button type="button" class="btn btn-danger" onclick="deleteData({{ $role->id }})"><i class="fas fa-trash-alt"></i><span>Delete</span></button>
                                <form id="delete-form-{{ $role->id }}"
                                   action="{{ route('admin.roles.destroy',$role->id) }}" method="POST"
                                   style="display: none;">
                                   @csrf()
                                   @method('DELETE')
                               </form>
                                @endif
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
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin/assets/js/sweetalert.js')}}"></script>
<script>
    $(document).ready(function() {
    $('#datatable').DataTable();
    } );
</script>
@endpush
