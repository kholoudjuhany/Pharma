@extends('layouts.app') <!-- Extend your main layout file -->

@section('content') <!-- Start the content section -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Welcome to the Main Page</h2>
                <p class="mb-4">Please add your prescription</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @else
            <!-- Photo Submission Form -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Please add your prescription</h3>
                    <form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pre_details">Choose a photo to upload:</label>
                            <input type="file" class="form-control" id="pre_details" name="pre_details" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Photo</button>
                    </form>
                </div>
            </div>
            <!-- End of Photo Submission Form -->
        @endif
    </div>
</div>
@endsection <!-- End of content section -->
