<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Kos SJB</title>
    <style>
        *{box-sizing:border-box}
        body{
            margin:0;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#f7f5f2;
            font-family:Arial,sans-serif;
            color:#263238;
        }
        .card{
            width:100%;
            max-width:400px;
            background:white;
            border:1px solid #e3ddd6;
            border-radius:8px;
            overflow:hidden;
        }
        .head{
            background:#465d19;
            color:white;
            text-align:center;
            padding:26px 20px;
        }
        .logo{
            line-height:0;
            font-size:35px;
            font-weight:bold;
            letter-spacing:5px;
            line-height:1.1;
        }
        .head p{
            margin:10px 0 0;
            font-size:14px;
        }
        form{
            padding:26px;
        }
        label{
            display:block;
            font-weight:bold;
            font-size:14px;
            margin-bottom:8px;
        }
        input[type=text],input[type=password]{
            width:100%;
            padding:11px 12px;
            border:1px solid #ddd5cc;
            border-radius:6px;
            font:inherit;
            margin-bottom:18px;
        }
        .remember{
            display:flex;
            align-items:center;
            gap:8px;
            font-weight:normal;
            margin-bottom:20px;
        }
        .btn{
            width:100%;
            padding:12px;
            border:1px solid #ad1755;
            border-radius:6px;
            background:#ad1755;
            color:white;
            font:inherit;
            cursor:pointer;
        }
        .error{
            background:#f8dce7;
            color:#8b173f;
            padding:12px 15px;
            border-radius:6px;
            margin-bottom:18px;
            font-size:14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="head">
            <div class="logo">@include('partials.logo', ['width' => 80])</div>
            <p>Sistem Manajemen Kos &amp; Properti</p>
        </div>
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif
            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <label class="remember">
                <input type="checkbox" name="remember" value="1"> Ingat saya
            </label>

            <button class="btn" type="submit">Masuk</button>
        </form>
    </div>
</body>
</html>
