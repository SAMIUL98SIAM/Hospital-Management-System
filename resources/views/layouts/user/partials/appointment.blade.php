<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form action="{{route('appointment.store')}}" class="main-form" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input name="name" type="text" class="form-control" placeholder="Full name" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="email" name="email" class="form-control" placeholder="Email address.." required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control" required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="doctor" class="custom-select" required>
                <option>----Select Doctor-----</option>
                @foreach (App\Models\Admin\Doctor::latest()->get() as $doctor)
                    <option value="{{$doctor->name}}">{{$doctor->name}} ---Speciality--- {{$doctor->speciality->s_name}}</option>
                @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="number" name="number" class="form-control" placeholder="Number.." required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.." required></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
</div> <!-- .page-section -->
