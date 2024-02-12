@extends('layout.app')
@section('title','Edit Profile')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Show Profile</h1>
        </div>

        <div class="section-body">
            <div class="section-body">
                <h2 class="section-title">Data Profile, {{$user->name}}</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">187</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Followers</div>
                                        <div class="profile-widget-item-value">6,8K</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Following</div>
                                        <div class="profile-widget-item-value">2,1K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Role : {{$user->role}}</div></div>
                                {!! $user->bio !!}  <b>'{{$user->name}}'</b>.
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">Nama : {{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->role}}</div></div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">Email : {{$user->email}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->role}}</div></div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">Phone : {{$user->phone}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->role}}</div></div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">Created : {{\Carbon\Carbon::parse($user->created_at)->format('d F, Y')}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->role}}</div></div>
                            </div>

                            <div class="profile-widget-description">
                                @if($user->email_verified_at != null)
                                    <div class="badge badge-success">Status : Active</div>
                                @else
                                    <div class="badge badge-warning">Status : Pending</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customCss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
@endpush

@push('customJS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
@endpush
