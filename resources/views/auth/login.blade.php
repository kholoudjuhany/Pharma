@extends('layouts.app')
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Login</h2>
            </div>
            
            <div class="col-md-12">
                <form action="{{ route('login') }}" method="post">
                    @csrf <!-- CSRF token for protection -->
                    <div class="p-3 p-lg-5 border">
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="text-black">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                            </div>
                        </div>

                        <!-- Display errors if any -->
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                {{ $errors->first() }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
