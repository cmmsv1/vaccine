@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach ($oxies as $item)
            
        
        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <a href="{{route('oxy.detail',$item->slug)}}">
                    <img class="card-img-top" src="{{asset('assets/images/products')}}/{{$item->image}}" alt="{{$item->name}}">
                </a>
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <p class="card-text">{{$item->short_desc}}</p>
                  <a href="{{route('oxy.detail',$item->slug)}}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection