<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            color: #fff;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background: #ff5e62;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #ff9966;
        }

        a {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #ff5e62;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Hiệu ứng input focus */
        input:focus {
            outline: none;
            border-color: #ff5e62;
            box-shadow: 0 0 8px rgba(255, 94, 98, 0.5);
        }

        /* Thông báo thành công */
        p {
            font-size: 14px;
            color: green;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Đăng Nhập</h2>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit">Đăng Nhập</button>
            <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
        </form>
    </div>
</body>
</html>
