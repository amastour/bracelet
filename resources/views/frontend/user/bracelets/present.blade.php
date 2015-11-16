@extends('frontend.layouts.master')

@section('content')

@foreach($types as $type)
<div class="col-sm-12">
<!-- La liste des bracelets -->
<div class="row">
  <div class="col-sm-4 m-15 category-product">
    <a href="/bracelets/{{$type->id}}" class="thumbnail">
      <img src="{{ url($type->url)}}">
    </a>
    <div class="no-m-b">
    <p class="text-center">{{$type->type}}</p>
    <p class="text-center">{{$type->price}} Dhs</p>
    </div>
  </div>

@endforeach
</div>
</div>

@endsection