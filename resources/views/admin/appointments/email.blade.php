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
      <h3 class="page-title">Send Mail to {{$appointmentEmail->name}} </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.appointments.index')}}" type="button" class="btn-shadow mr-3 btn btn-primary"><i class="fas fa-backspace"></i> Back to list</a></li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="{{route('admin.appointment.email.send',$appointmentEmail->id)}}">
                @csrf
                @isset($doctor)
                    @method('PUT')
                @endisset
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Greeting</label>
                        <input id="greeting" type="text" class="form-control @error('greeting') is-invalid @enderror" name="greeting"  autofocus required>
                        @error('greeting')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="body">Body</label>
                        <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" autofocus required>
                        @error('body')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="actiontext">Action Text</label>
                        <input id="actiontext" type="text" class="form-control @error('actiontext') is-invalid @enderror" name="actiontext" autofocus required>
                        @error('actiontext')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="actionurl">Action Url</label>
                        <input id="actionurl" type="text" class="form-control @error('actionurl') is-invalid @enderror" name="actionurl" autofocus required>
                        @error('actionurl')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="endpart">End Part</label>
                        <input id="endpart" type="text" class="form-control @error('endpart') is-invalid @enderror" name="endpart" autofocus required>
                        @error('endpart')
                        <p class="p-2">
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </p>
                        @enderror
                    </div>




                    <button type="submit" class="btn btn-primary">
                        <span>Send</span>

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
