<div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/img/logostore2.png') }}" alt="" class="navbar-brand"
                        height="30">
                    <h6 class="text-uppercase mt-4 ms-1 text-primary" style="font-weight: 700; font-size: 16px">
                        Clothes <span class="text-warning">Store </span> |
                        <span class="text-dark">Users Details</span>
                    </h6>
                </div>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <!-- Profile Picture Section -->
                    <div class="col-12 col-md-12 text-center">
                        @if ($user->picture_url)
                            <div class="form-group">
                                <p class="fw-bolder text-uppercase">Profile Picture</p>
                                <img src="{{ Storage::url($user->picture_url) }}" alt="User Image"
                                    class="img-thumbnail rounded-circle shadow-lg"
                                    style="width: 150px; height: 150px; object-fit: cover;">

                            </div>
                        @else
                            <img src="{{ asset('assets/img/Default_pfp.svg.png') }}"
                                class="img-thumbnail rounded-circle shadow-lg"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                        <h5 class="mb-3"><strong>Username:</strong> <span
                                class="text-warning">{{ $user->name }}</span></h5>
                        <h5 class="mb-3"><strong>Email:</strong> <span class="text-dark">{{ $user->email }}</span>
                        </h5>
                        <h5 class="mb-3"><strong>Role:</strong>
                            <span
                                class="badge 
                            {{ $user->role == 'admin' ? 'bg-success' : ($user->role == 'customer' ? 'bg-warning' : 'bg-info') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
