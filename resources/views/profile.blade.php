@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="dashboard" class="main-body">
    @extends('layouts.navbar')

    <main id="profile-section" class="main">
        <section id="profile">
            <h2 class="section-header">Profile</h2>
            <div class="profile-wrap">
                <form action="" id="edit-form">
                    <div class="input-field" id="input-names">
                        <div class="input-wrap">
                            <i class="fa-solid fa-id-card-clip"></i>
                            <input type="text" name="" id="" placeholder="First name">
                        </div>
                        <div class="input-wrap">
                            <i class="fa-solid fa-id-card-clip"></i>
                            <input type="text" name="" id="" placeholder="Surname">
                        </div>
                    </div>
                    
                    <div class="input-field">
                        <div class="input-wrap">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="" id="" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-wrap">
                            <i class="fa-solid fa-at"></i>
                            <input type="email" name="" id="" placeholder="Email" autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="input-field">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                    <p class="message error"></p>
                </form>
                <a href="/profile/change-password" class="btn change-pass-btn" >Change password</a>
            </div>
            <a href="" class="btn delete-btn">Delete account</a>
        </section>
    </main>
</body>
@endsection