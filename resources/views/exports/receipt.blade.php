<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Receipt') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/recepit.css') }}">
</head>

<body>
    <div class="rounded">

        <h2 class="document-title">{{ __('Receipt') }}</h2>

        {{-- Logo and company info --}}
        <table width="100%">
            <tr>
                {{-- Logo --}}
                <td valign="top" align="center" width="40%">
                    <img src="{{ public_path('assets/img/no_image.jpg') }}" alt="Logo" class="logo" />
                    <p class="company-name">MUNICIPALIDAD DE SANTA MARÍA CHIQUIMULA,
                        TOTONICAPÁN</p>
                </td>
                {{-- Company info --}}
                <td class="company-table">
                    <table align="right">
                        <tr class="company-info">
                            <td>{{ __('Receipt No.') }}</td>
                            <td class="rounded-square no">0001</td>
                        </tr>
                        <tr class="company-info">
                            <td>{{ __('Amount') }}:</td>
                            <td class="rounded-square">Q 105</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>

        {{-- Client info --}}
        <div class="rounded" style="margin-top: -25px;">
            <table width="100%" style="padding: 20px, 20px;">
                <tr style="margin-bottom: 20px;">
                    <td width="22%"><strong>{{ __('To Sr.') }}:</strong></td>
                    <td class="border-bottom" width="45%">Pablo juan de la vega</td>
                    <td align="right" class="border-bottom" width="15%">{{ __('Amount of') }}:</td>
                    <td style="padding-left: 10px" class="border-bottom" width="20%">Q 500</td>
                </tr>
                <tr>
                    <td><strong>{{ __('Amount in letters') }}:</strong></td>
                    <td colspan="3" class="border-bottom">QUINIENTOS</td>
                </tr>
                <tr>
                    <td><strong>{{ __('Concept of') }}:</strong></td>
                    <td colspan="3" class="border-bottom">CAPA</td>
                </tr>
            </table>
        </div>

        {{-- Date and day of the week --}}
        <table width="100%">
            <tr align="right">
                <td width="20%"><strong>{{ __('Date') }}:</strong></td>
                <td align="left" style="padding-left: 10px">{{ date('d/m/Y', strtotime(date('d/m/Y'))) }}</td>
                <td><strong>{{ __(date('l', strtotime(date('Y-m-d')))) }}
                        {{ date('d', strtotime(date('Y-m-d'))) }} {{ __('of') }}
                        {{ __(date('F', strtotime(date('Y-m-d')))) }} {{ __('of') }}
                        {{ date('Y', strtotime(date('Y-m-d'))) }}</strong></td>
            </tr>
        </table>

        <br>
        <br>

        {{-- Signature --}}
        <table width="100%">
            <tr>
                <td width="20%"></td>
                <td class="signature">SOMOS CAPOS</td>
                <td width="20%"></td>
            </tr>
        </table>
    </div>
</body>

</html>
