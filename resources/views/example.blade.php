<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Basic BotDetect CAPTCHA Example</title>
    <link href="{{ URL::asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- include the BotDetect layout stylesheet -->
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
</head>
<body>
    <h2>Laravel Basic BotDetect CAPTCHA Example</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ url('/example') }}" method="POST">
        {!! csrf_field() !!}

        <!-- show captcha image html -->
        <label>Retype the characters from the picture</label>
        {!! captcha_image_html('ExampleCaptcha') !!}
        <input type="text" id="CaptchaCode" name="CaptchaCode">

        @if ($errors->has('CaptchaCode'))
            <span class="help-block">
                <strong>{{ $errors->first('CaptchaCode') }}</strong>
            </span>
        @endif

        <br>
        <button type="submit" class="btn">Submit</button>
    </form>



    <p style="margin-top: 30px">Another example:</p>
    <ul>
        <li><a href="{{ URL::to('contact') }}">Form Example</a></li>
    </ul>
</body>
</html>
