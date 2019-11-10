<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Trips</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Job Title</td>
          <td>City</td>
          <td>Country</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($trips as $trip)
        <tr>
            <td>{{$trip->id}}</td>
            <td>{{$trip->name}} </td>
            <td>{{$trip->lon}}</td>
            <td>{{$trip->lat}}</td>
            <td>{{$trip->date}}</td>
            <td>{{$trip->text_fr}}</td>
            <td>{{$trip->text_en}}</td>
            
            <td>
                <a href="{{ route('trip.edit',$trip->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('trip.destroy', $trip->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>