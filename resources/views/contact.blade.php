
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Form BotDetect CAPTCHA Example</title>
    <link href="{{ URL::asset('css/styles.css') }}" type="text/css" rel="stylesheet">

    <!-- include the BotDetect layout stylesheet -->
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
</head>
<body>
    <h2>Laravel Form BotDetect CAPTCHA Example</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ url('/contact') }}" method="POST">
        {!! csrf_field() !!}

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="txt-input">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif

        <label>Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="txt-input">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <label>Subject</label>
        <input type="text" name="subject" value="{{ old('subject') }}" class="txt-input">
        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif

        <label>Message</label>
        <textarea name="message" class="txt-area">{{ old('message') }}</textarea>
        @if ($errors->has('message'))
            <span class="help-block">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @endif

        <!-- show captcha image html -->
        <label>Retype the characters from the picture</label>
        {!! captcha_image_html('ContactCaptcha') !!}
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
        <li><a href="{{ URL::to('example') }}">Basic Example</a></li>
    </ul>
</body>
</html>
