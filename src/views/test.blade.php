<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST LARAVEL BLADE HELPER</title>
</head>
<body>
    <H1>Test laravel blade helper</H1>

    <form action="{{ route('testlaravelhelper') }}" method="post">
        <x-EhtuBlade::input.text   />
        <input type="text" name="name" placeholder="Your name please">
        <input type="text" name="email" placeholder="Your email please">
        <textarea name="message" cols="50" rows="10" placeholder="Your message"></textarea>
        <input type="submit" value="submit">
    </form>
</body>
</html>
