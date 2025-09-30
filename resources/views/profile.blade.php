<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #fff;
        }
        .container {
            text-align: center;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #ccc;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px auto;
        }
        .box {
            background-color: #eae8e8ff;
            margin: 10px auto;
            padding: 10px;
            width: 200px;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="profile-pic">
            <span>😊</span>
        </div>
        <div class="box">Nama : {{ $nama }}</div>
        <div class="box">Kelas : {{ $kelas }}</div>
        <div class="box">NPM : {{ $npm }}</div>
    </div>

</body>
</html>
