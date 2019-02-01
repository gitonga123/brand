@extends('layouts.app')
@section('title', "The Brand")
@section('content')
  <div id="myCarousel" class="carousel slide pointer-event" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class=""></li>
      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img class="d-block" src="{{ asset('img/bg1.jpg') }}" alt="Second slide">

        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="{{ asset('img/bg1.jpg') }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect fill="#777" width="100%" height="100%"></rect></svg> --}}
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="{{ asset('img/bg3.jpg') }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect fill="#777" width="100%" height="100%"></rect></svg> --}}
        <img class="d-block" src="{{ asset('img/bg3.jpg') }}" alt="Second slide">

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">
        <img class="d-block" src="{{ asset('img/bg4.jpg') }}" alt="Second slide">
        {{-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="{{ asset('img/bg4.jpg') }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect fill="#777" width="100%" height="100%"></rect></svg> --}}
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endsection