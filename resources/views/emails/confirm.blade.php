<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>激活您的 Sample 账号</title>
</head>
<body>
<h1>激活您的 Sample 账号</h1>
<p>
    请点击如下链接进行账号激活:
    <a href="{{ route('activate_account',$user->activation_token) }}">{{ route('activate_account',$user->activation_token) }}</a>
</p>

<p>
    如果这不是您的操作, 请忽略此邮件.
</p>
</body>
</html>