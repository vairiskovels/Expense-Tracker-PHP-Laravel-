@extends('layouts.main')

@section('title', 'Track you expenses')
@section('content')
<body id="change-pass" class="main-body">
    @extends('layouts.navbar')

    <main class="main" id="change-pass-section">
        <section id="change-pass-section">
                <div class="input-card">
                    <h2>Change password</h2>
                    <form action="">
                        <div class="input-field">
                            <div class="input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="old_password" name="old_password" placeholder="Old password">
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="new_password" name="new_password" placeholder="New password">
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="new_again" name="new_again" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
        </section>
    </main>
</body>
@endsection