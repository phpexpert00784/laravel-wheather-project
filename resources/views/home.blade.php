@extends('layouts.app')

@section('content')
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">Enter User Location</h2>
                    <form method="POST" action="{{ route('location') }}">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter Location Latitude</label>
                            <input type="number" step="0.0001"  name="lat" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Latitude">
                            <small id="emailHelp" class="form-text text-muted"></small>
                          </div>
                          <br/>
                          <div class="form-group mb-10">
                            <label for="exampleInputPassword1">Enter Location Longitude</label>
                            <input type="number" step="0.0001" class="form-control" name="long" required id="exampleInputPassword1" placeholder="Enter Longitude">
                          </div>
                          <br/>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                    <h2 class="text-center">Wheather Info</h2>
                    <table style="width:100%">
                      <tr>
                        <th>Month</th>
                        <td>$100</td>
                      </tr>
                      <tr>
                        <th>Month</th>
                        <td>$100</td>
                      </tr>
                      <tr>
                        <th>Month</th>
                       <td>$100</td>
                      </tr>
                      
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
