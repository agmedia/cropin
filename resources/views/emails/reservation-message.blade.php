@extends('emails.layouts.container')

@section('content')
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td style="padding: 20px 20px 10px 20px; font-family: sans-serif; font-size: 18px; font-weight: bold; line-height: 20px; color: #555555; text-align: center;">
                {{ __('front/common.mail.contact_title') }}<br>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 20px 0 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                {{ __('front/common.mail.contact_received') }}<br>
                <br>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="width: 26%">{{ __('front/common.mail.contact_name') }}:</td>
                        <td style="width: 74%"><b>{{ $contact['name'] }}</b></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><b>{{ $contact['email'] }}</b></td>
                    </tr>
                    @if ( ! empty($contact['phone']))
                        <tr>
                            <td>{{ __('front/common.mail.contact_phone') }}:</td>
                            <td><b>{{ $contact['phone'] }}</b></td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 5px 20px 30px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                <pre>{!! $contact['message'] !!}</pre>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: center;">
                <a href="{{ route('index') }}" style="display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px; background-color: #a50000; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none;">
                    {{ __('front/common.mail.contact_btn_go') }}
                </a>
            </td>
        </tr>
    </table>
@endsection
