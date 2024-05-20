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
    <table style="width: 100%">

        <tr>
            <div class="rounded">
                <h2 class="document-title">{{ __('Receipt') }}</h2>

                {{-- Logo and company info --}}
                <table width="100%">
                    <tr>
                        {{-- Logo --}}
                        <td valign="top" align="center" width="40%">
                            <img src="{{ public_path('storage/' . $setting->img_logo) }}" alt="Logo"
                                class="logo" />
                            <p class="company-name">{{ $setting->nombre_compania }}</p>
                        </td>
                        {{-- Company info --}}
                        <td class="company-table">
                            <table align="right">
                                <tr class="company-info">
                                    <td>{{ __('Receipt No.') }}</td>
                                    <td class="rounded-square no">{{ str_pad($document->numero, 4, '0', STR_PAD_LEFT) }}
                                    </td>
                                </tr>
                                <tr class="company-info">
                                    <td>{{ __('Amount') }}:</td>
                                    <td class="rounded-square">{{ 'Q ' . number_format($document->total, 2) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <br>

                {{-- Client info --}}
                @foreach ($document->lines as $line)
                    <div class="rounded" style="margin-top: -25px;">
                        <table width="100%" style="padding: 20px, 20px;">
                            <tr style="margin-bottom: 20px;">
                                <td width="22%"><strong>{{ __('To Sr.') }}:</strong></td>
                                <td class="border-bottom" width="45%">{{ $document->customer->nombre }}</td>
                                <td align="right" class="border-bottom" width="15%">{{ __('Amount of') }}:</td>
                                <td style="padding-left: 10px" class="border-bottom" width="20%">
                                    {{ 'Q ' . number_format($line->total, 2) }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Amount in letters') }}:</strong></td>
                                <td colspan="3" class="border-bottom">{{ $total_in_letters }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Concept of') }}:</strong></td>
                                <td colspan="3" class="border-bottom">{{ $line->descripcion }}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach

                {{-- Date and day of the week --}}
                <table width="100%">
                    <tr align="right">
                        <td width="20%"><strong>{{ __('Date') }}:</strong></td>
                        <td align="left" style="padding-left: 10px">{{ date('d/m/Y', strtotime($document->fecha)) }}
                        </td>
                        <td><strong>{{ __(date('l', strtotime($document->fecha))) }}
                                {{ date('d', strtotime($document->fecha)) }} {{ __('of') }}
                                {{ __(date('F', strtotime($document->fecha))) }} {{ __('of') }}
                                {{ date('Y', strtotime($document->fecha)) }}</strong></td>
                    </tr>
                </table>

                <br>
                <br>

                {{-- Signature --}}
                <table width="100%">
                    <tr>
                        <td width="20%"></td>
                        <td class="signature">{{ $setting->nombre_representante }}</td>
                        <td width="20%"></td>
                    </tr>
                </table>
            </div>
        </tr>

        <!-- Espaciador para empujar la línea divisora al centro -->
        <tr>
            <div style="height: 170px;"></div>
            <div style=" width: 100%; border-top: 1px dotted ">
            <div style="height: 170px;"></div>
        </tr>

        <tr>
            <div class="rounded">
                <h2 class="document-title">{{ __('Receipt') }}</h2>

                {{-- Logo and company info --}}
                <table width="100%">
                    <tr>
                        {{-- Logo --}}
                        <td valign="top" align="center" width="40%">
                            <img src="{{ public_path('storage/' . $setting->img_logo) }}" alt="Logo"
                                class="logo" />
                            <p class="company-name">{{ $setting->nombre_compania }}</p>
                        </td>
                        {{-- Company info --}}
                        <td class="company-table">
                            <table align="right">
                                <tr class="company-info">
                                    <td>{{ __('Receipt No.') }}</td>
                                    <td class="rounded-square no">
                                        {{ str_pad($document->numero, 4, '0', STR_PAD_LEFT) }}
                                    </td>
                                </tr>
                                <tr class="company-info">
                                    <td>{{ __('Amount') }}:</td>
                                    <td class="rounded-square">{{ 'Q ' . number_format($document->total, 2) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <br>

                {{-- Client info --}}
                @foreach ($document->lines as $line)
                    <div class="rounded" style="margin-top: -25px;">
                        <table width="100%" style="padding: 20px, 20px;">
                            <tr style="margin-bottom: 20px;">
                                <td width="22%"><strong>{{ __('To Sr.') }}:</strong></td>
                                <td class="border-bottom" width="45%">{{ $document->customer->nombre }}</td>
                                <td align="right" class="border-bottom" width="15%">{{ __('Amount of') }}:</td>
                                <td style="padding-left: 10px" class="border-bottom" width="20%">
                                    {{ 'Q ' . number_format($line->total, 2) }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Amount in letters') }}:</strong></td>
                                <td colspan="3" class="border-bottom">{{ $total_in_letters }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Concept of') }}:</strong></td>
                                <td colspan="3" class="border-bottom">{{ $line->descripcion }}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach

                {{-- Date and day of the week --}}
                <table width="100%">
                    <tr align="right">
                        <td width="20%"><strong>{{ __('Date') }}:</strong></td>
                        <td align="left" style="padding-left: 10px">{{ date('d/m/Y', strtotime($document->fecha)) }}
                        </td>
                        <td><strong>{{ __(date('l', strtotime($document->fecha))) }}
                                {{ date('d', strtotime($document->fecha)) }} {{ __('of') }}
                                {{ __(date('F', strtotime($document->fecha))) }} {{ __('of') }}
                                {{ date('Y', strtotime($document->fecha)) }}</strong></td>
                    </tr>
                </table>

                <br>
                <br>

                {{-- Signature --}}
                <table width="100%">
                    <tr>
                        <td width="20%"></td>
                        <td class="signature">{{ $setting->nombre_representante }}</td>
                        <td width="20%"></td>
                    </tr>
                </table>
            </div>
        </tr>

    </table>
</body>

</html>
