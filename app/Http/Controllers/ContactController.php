<?php namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // get a validator for an incoming contact request.
    public function validator(array $data)
    {
        // custom error message for valid_captcha validation rule
        $messages  = [
            'valid_captcha' => 'Wrong code. Try again please.'
        ];

        return Validator::make($data, [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'subject' => 'required|min:10',
            'message' => 'required|min:20',
            'CaptchaCode' => 'required|valid_captcha'
        ], $messages);
    }

    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors($validator->errors());
        }

        // Captcha validation passed
        // TODO: send email

        return redirect()
                    ->back()
                    ->with('status', 'Your message was sent successfully.');
    }
}
