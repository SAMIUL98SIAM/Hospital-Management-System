@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"> Doctor </h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.doctors.create')}}" type="button" class="btn-shadow mr-3 btn btn-success">Create Doctor</a></li>
          </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Doctor</h4>
                </p>
                <div class="table-responsive">
                  <table id="datatable" class="align-middle mb-0 table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Speciality</th>
                            <th class="text-center">Room</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $key=>$doctor)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">
                                <div class="widget-content-left">
                                    <img width="40" class="rounded-circle" src="{{ $doctor->getFirstMediaUrl('avatar') != null ? $doctor->getFirstMediaUrl('avatar') : config('app.placeholder').'160' }}" alt="Doctor Avatar">
                                </div>
                            </td>
                            <td class="text-center">{{$doctor->name}}</td>
                            <td class="text-center">{{$doctor->phone}}</td>
                            <td class="text-center">{{$doctor->speciality->s_name}}</td>
                            <td class="text-center">{{$doctor->room}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.doctors.edit',$doctor->id)}}" class="btn btn-primary"><span class="menu-icon"><i class="mdi mdi-edit">Edit</i></span></a>

                                @if ($doctor->deletable == true)
                                <button type="button" class="btn btn-danger" onclick="deleteData({{ $doctor->id }})"><span class="menu-icon"><i class="mdi mdi-trash-alt"></i></span>Delete</button>
                                <form id="delete-form-{{ $doctor->id }}"
                                   action="{{ route('admin.doctors.destroy',$doctor->id) }}" method="POST"
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
