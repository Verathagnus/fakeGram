@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-baseline">
        <div class="col-3">
            <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }}">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4 pr-3">{{ $user->username }}</div>
                    @can('update', $user->profile)
                    <a href="/p/create"><img src="/storage/profile/plus_icon.png" alt="Add New Post" class="rounded-circle" style="width: 40px"></a>
                    @endcan
                    <follow-button user-id="{{ $user -> id }}" follows="{{ $follows }}"></follow-button>
                </div>

            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user -> id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user -> profile -> title}}</div>
            <div>{{$user -> profile -> description}}</div>
            <div><a href="{{$user -> profile -> url}}">{{$user -> profile -> url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user -> posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post -> id }}"><img src="/storage/{{ $post -> image}}" class="w-100"></a>
        </div>
        @endforeach
        <!-- <div class="col-4">
            <img src="/c1.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/c2.jpg" class="w-100">
        </div>
        <div class="col-4">
            <img src="/c3.jpg" class="w-100">
        </div> -->
    </div>
</div>
@endsection