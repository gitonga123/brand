@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-body">
      <h3 class="text-center card-title">Register</h3>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 offset-1">
            
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-2G">
                    <h5><i class="fas fa-chart-line" style="color: #e91e63"></i>&nbsp&nbsp Marketing</h5>
                    <p>
                        We've created the marketing campaign of the website. It was a very interesting collaboration.
                    </p>
                    <h5><i class="far fa-money-bill-alt" style="color: #9c27b0"></i>&nbsp&nbsp Rewarding</h5>
                        <p>
                            We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub
                        </p>
                    <h5><i class="fas fa-user-plus" style="color: #00acc1"></i>&nbsp&nbsp Join Us</h5>
                    <p>
                        There is also a Fully Customizable CMS Admin Dashboard for this product.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="card-header" style="margin-left: -10%">
                       
                        <div class="text-center social-btn">
                            <a href="/register" class="btn btn-primary"><i class="fab fa-facebook"></i>&nbsp; Facebook</a>
                            <a href="#" class="btn btn-info"><i class="fab fa-twitter"></i>&nbsp; Twitter</a>
                            <a href="#" class="btn btn-danger"><i class="fab fa-google"></i>&nbsp; Google</a>
                        </div>
                    </div>
                    <div>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control border-danger" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control border-danger" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<style>
    .social-btn .btn {
            border: none;
            margin: 10px 3px 0;
            opacity: 1;
    }
    .social-btn .btn:hover {
        opacity: 0.9;
    }
    .social-btn .btn-primary {
        background: #507cc0;
    }
    .social-btn .btn-info {
        background: #64ccf1;
    }
    .social-btn .btn-danger {
        background: #df4930;
    }
</style>
@endsection
