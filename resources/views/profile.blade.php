@extends('layouts.app', ['title' => 'Tasks for Today | Profile'])

@section('content')
<section class="page-heading">
    <p class="eyebrow">PROFILE</p>
    <h1>The person<br><span>behind the list.</span></h1>
</section>

<section class="profile-card">
    <p class="profile-label">ACCOUNT DETAILS</p>
    <h2>{{ $profile->full_name }}</h2>
    <p class="profile-username">{{ '@' . $profile->username }}</p>
    <p>{{ $profile->email }}</p>
</section>
@endsection
