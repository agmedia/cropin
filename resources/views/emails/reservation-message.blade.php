@extends('emails.layouts.container')

@section('content')
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td style="padding: 20px 20px 10px 20px; font-family: sans-serif; font-size: 18px; font-weight: bold; line-height: 20px; color: #555555; text-align: center;">
                {{ __('front/common.mail.contact_title') }}<br>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 20px 20px 20px; font-family: sans-serif; font-size: 15px; line-height: 30px; color: #555555;">
                {{ __('front/common.mail.contact_received') }}<br>
                <br>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="width: 26%">{{ __('front/common.mail.contact_name') }}:</td>
                        <td style="width: 74%"><b>{{ $data['name'] }}</b></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><b>{{ $data['email'] }}</b></td>
                    </tr>

                    <tr>
                        <td>{{ __('front/apartment.qty') }}</td>
                        <td><b>{{ $data['quantity'] }}</b></td>
                    </tr>
                    <tr>
                        <td>{{ __('front/apartment.date') }}: </td>
                        <td><b>{{ $data['date'] }}</b></td>
                    </tr>

                    <tr>
                        <td>{{ __('front/apartment.time') }}: </td>
                        <td><b>{{ $data['time'] }}</b></td>
                    </tr>

                    <tr>
                        <td>{{ __('front/apartment.additional_info') }}: </td>
                        <td><b>{{ $data['message'] }}</b></td>
                    </tr>


                </table>
            </td>
        </tr>


    </table>
@endsection
