@extends('frontend.layouts.master')

@section('content')

<div class="col-sm-12">
<div class="row">
  <div class="col-sm-6 category-product">
    <a href="#">
      <img src="{{ url($type->url)}}" class="zoomImg" style="position: absolute; top: 50px; left: 50px; opacity: 1; width: 600px; height: 500px; border: none; max-width: none;">
    </a>
    <ul class="pagination pages">
    <li><a href="#">&laquo;</a></li>
    <li>
      <a href="#">
        <img class="img-responsive" src="{{ url($type->url)}}"  width="100" height="100">
    </li>
    <li>
      <a href="#">
        <img class="img-responsive" src="{{ url($type->url)}}"  width="100" height="100">
    </li>
    <li>
      <a href="#">
        <img class="img-responsive" src="{{ url($type->url)}}"  width="100" height="100">
    </li>
    <li><a href="#">&raquo;</a></li>
  </ul>
  </div>
  <div class="col-sm-6">
      <h1>{{$type->type}}</h1>
      
      <h2>{{$type->price}} Dhs</h2>
      <h3>{{$type->description}}</h3>
  </div>

</div>
</div>



@endsection