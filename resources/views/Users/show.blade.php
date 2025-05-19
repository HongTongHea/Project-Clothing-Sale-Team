@extends('layouts.app')

@section('title', 'User Details')

@section('content')

    <div class="m-4 mt-4">
        <div class="col-md-12">
            <form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data">
                <div class="card card-profile card-plain rounded-0">

                    <div class="card-header" style="background-image: url('/assets/img/examples/product12.jpeg')">
                        <div class="profile-picture">
                            <div class="avatar avatar-xl">

                                @if ($user->picture_url)
                                    <img src="{{ asset('storage/' . $user->picture_url) }}" alt="{{ $user->name }}"
                                        class="object-fit-cover object-center avatar-img rounded-circle " width="20%">
                                @else
                                    No picture available <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                        alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-profile text-center">

                            @csrf
                            <div class="name">{{ $user->name }}</div>
                            <div class="job">Roles: {{ $user->role }}</div>
                            <div class="desc">Email: {{ $user->email }}</div>
                            <div class="social-media">
                                <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                    <span class="btn-label just-icon"><i class="icon-social-twitter"></i>
                                    </span>
                                </a>
                                <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                    <span class="btn-label just-icon"><i class="icon-social-facebook"></i>
                                    </span>
                                </a>
                                <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                    <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="view-profile">
                                <input type="file" name="profile_picture" id="profilePicture" style="display: none;"
                                    required onchange="displayFileName()">

                                <button type="button" class="btn btn-secondary "
                                    onclick="document.getElementById('profilePicture').click()">
                                    Upload Picture
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer rounded-0">
                        <div class="row user-stats text-center">
                            <div class="col">
                                <div class="title">Create at</div>
                                <div class="number">{{ $user->created_at }}</div>
                            </div>
                            <div class="col">
                                <div class="title">Updated at</div>
                                <div class="number">{{ $user->updated_at }}</div>
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm float-end m-1 rounded-5">Save</button>
                                <a href="{{ route('dashboard') }}"
                                    class="btn btn-secondary btn-sm float-end m-1 rounded-5">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        function displayFileName() {
            const fileInput = document.getElementById('profilePicture');
            const fileNameDisplay = document.getElementById('fileName');
            fileNameDisplay.textContent = fileInput.files[0] ? fileInput.files[0].name : 'No file chosen';
        }
    </script>
@endsection
