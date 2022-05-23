@extends('layouts.admin.app')

@push('css')
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/select2/select2.min.css">
<link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
<!-- End plugin css for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> {{ isset($doctor) ? 'Edit' : 'Create New' }} Doctor </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.doctors.index')}}" type="button" class="btn-shadow mr-3 btn btn-primary"><i class="fas fa-backspace"></i> Back to list</a></li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{isset($doctor)?route('admin.doctors.update',$doctor->id):route('admin.doctors.store')}}" enctype="multipart/form-data">
                @csrf
                @isset($doctor)
                    @method('PUT')
                @endisset
                <div class="card-body">
                    <h5 class="card-title">Doctor</h5>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $doctor->name ?? old('name') }}" autofocus>
                        @error('name')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $doctor->phone ?? old('phone') }}" autofocus>
                        @error('phone')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="room">Room</label>
                        <input id="room" type="text" class="form-control @error('room') is-invalid @enderror" name="room" value="{{ $doctor->room ?? old('room') }}" autofocus>
                        @error('room')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="speciality_id">Select Doctor Speciality</label>

                        <select class="js-example-basic-single form-control @error('speciality_id') is-invalid @enderror" name="speciality_id" id="speciality_id">
                            <option value="">Select Doctor Speciality</option>
                            @foreach($specialities as $speciality)
                            <option value="{{$speciality->id}}" {{(@$doctor->speciality_id == $speciality->id)?'selected':''}}>{{$speciality->s_name}}</option>
                            @endforeach
                            <option value=0>Set New Position</option>
                            <input type="text" name="s_name" class="form-control form-control-sm" placeholder="New Doctor Speciality name" id="add_others" style="display: none;">
                        </select>

                        @error('speciality_id')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <div class="form-group col-md-2">
                        <label for="avatar">Avatar</label>
                        <input type="file" id="avatar" name="avatar" class="dropify form-control @error('avatar') is-invalid @enderror" data-default-file="{{ isset($doctor) ? $doctor->getFirstMediaUrl('avatar') : ''  }}">
                        @error('avatar')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">
                        @isset($doctor)
                        <i class="fas fa-arrow-circle-up"></i>
                        <span>Update</span>
                        @else
                        <i class="fas fa-plus-circle"></i>
                        <span>Store</span>
                        @endisset

                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('js')


<!-- Plugin js for this page -->
<script src="{{asset('admin')}}/assets/vendors/select2/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(document).on('change','#speciality_id',function(){
            var speciality_id = $(this).val();
            if(speciality_id == '0')
            {
                $('#add_others').show();
            }
            else
            {
                $('#add_others').hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

 <!-- Dropify -->
 <script src="{{asset('backend/dropify/js/dropify.js')}}"></script>
 <!-- Dropify -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
 <script type="text/javascript">
     $('.dropify').dropify();
 </script>

@endpush
