@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="dashboard" class="main-body">
    @extends('layouts.navbar')

    <main id="profile-section" class="main">
        <section id="profile">
            <h2 class="section-header">Profile</h2>
            <div class="profile-wrap">
                <form action="{{ url('/profile') }}" method="post" id="edit-form">
                    @csrf
                    <div class="input-field" id="input-names">
                        <div class="input-wrap">
                            <i class="fa-solid fa-id-card-clip"></i>
                            <input type="text" name="name" id="" placeholder="Name" value="{{$profile[0]->name}}">
                        </div>
                        <div class="input-wrap">
                            <i class="fa-solid fa-id-card-clip"></i>
                            <input type="text" name="surname" id="" placeholder="Surname" value="{{$profile[0]->surname}}">
                        </div>
                    </div>
                    
                    <div class="input-field">
                        <div class="input-wrap">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="username" id="" placeholder="Username" value="{{$profile[0]->username}}">
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-wrap">
                            <i class="fa-solid fa-at"></i>
                            <input type="email" name="email" id="" placeholder="Email" autocomplete="off" value="{{$profile[0]->email}}">
                        </div>
                    </div>
                    
                    <div class="input-field">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                    @if (count($errors) > 0)
                        <div class="error">
                                {{ $errors->first() }}
                        </div>
                    @elseif(session()->has('message'))
                        <div class="success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </form>
                <a href="/profile/change-password" class="btn change-pass-btn" >Change password</a>
            </div>
            <a href="/delete" class="btn delete-btn">Delete account</a>
        </section>
    </main>
</body>
@endsection