@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"> Doctor </h1>
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
                            <th class="text-center">Patient Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Doctor Name</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $key=>$appointment)
                        <tr>
                            <td class="text-center text-muted">{{$key+1}}</td>
                            <td class="text-center">{{$appointment->name}}</td>
                            <td class="text-center">{{$appointment->email}}</td>
                            <td class="text-center">{{$appointment->phone}}</td>
                            <td class="text-center">{{$appointment->doctor}}</td>
                            <td class="text-center">{{$appointment->message}}</td>
                            <td class="text-center">{{$appointment->status}}</td>
                            <td class="text-center">
                                @if ($appointment->status == 'Approved')
                                <a style="pointer-events: none;" class="btn btn-light" href="{{route('admin.appointment.approve',$appointment->id)}}">Approve</a>
                                @else
                                <a class="btn btn-primary" href="{{route('admin.appointment.approve',$appointment->id)}}">Approve</a>
                                @endif

                                @if ($appointment->status == 'Cancelled')
                                <a style="pointer-events: none;" class="btn btn-light" href="{{route('admin.appointment.cancel',$appointment->id)}}">Cancel</a>
                                @else
                                <a class="btn btn-danger" href="{{route('admin.appointment.cancel',$appointment->id)}}">Cancel</a>
                                @endif


                                <a class="btn btn-info" href="{{route('admin.appointment.email',$appointment->id)}}">Email</a>

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
