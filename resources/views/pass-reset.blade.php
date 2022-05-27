@extends('layouts.main')

@section('title', 'Reset password')
@section('content')
<body>
    <section id="reset-section" class="input-section">
        <div class="container">
            <div class="input-card">
                <h2>Reset password</h2>
                <form action="" id="reset-form">
                    <div class="input-field">
                        <div class="input-wrap">
                            <i class="fa-solid fa-at"></i>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="input-field">
                        <input type="submit" value="Reset password" class="btn btn-primary">
                    </div>
                    <p class="message error"></p>
                </form>
                <p><a href="/login" class="text-hover" id="login">Login</a> or <a href="/register" class="text-hover" id="register">Create an account</a></p>
            </div>
        </div>
    </section>
</body>
@endsection