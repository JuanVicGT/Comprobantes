<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Receipt') }}</title>

    <link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/pdf.css') }}">
</head>

<body>
    <div class="invoice">

        <h2 class="document-title">{{ __('Receipt') }}</h2>

        <table width="100%">
            <tr>
                <td valign="top">
                    <img src="{{ public_path('assets/img/no_image.jpg') }}" alt="Logo" class="logo" />
                </td>
                <td class="company-info">
                    <h3>Shinra Electric power company</h3>
                    <p>
                        asd
                    </p>
                </td>
            </tr>
        </table>

        <br>

        {{-- Customer data --}}
        <table width="100%">
            <tr>
                <td><strong>From:</strong> Linblum - Barrio teatral</td>
                <td><strong>To:</strong> Linblum - Barrio Comercial</td>
            </tr>
        </table>

        <br>

        <table width="100%">
            <thead class="table-title">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price $</th>
                    <th>Total $</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Playstation IV - Black</td>
                    <td align="right">1</td>
                    <td align="right">1400.00</td>
                    <td align="right">1400.00</td>
                </tr>
                <tr class="gray">
                    <th scope="row">1</th>
                    <td>Metal Gear Solid - Phantom</td>
                    <td align="right">1</td>
                    <td align="right">105.00</td>
                    <td align="right">105.00</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Final Fantasy XV - Game</td>
                    <td align="right">1</td>
                    <td align="right">130.00</td>
                    <td align="right">130.00</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Subtotal $</td>
                    <td align="right">1635.00</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Tax $</td>
                    <td align="right">294.3</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">Total $</td>
                    <td align="right" class="gray">$ 1929.3</td>
                </tr>
            </tfoot>
        </table>

    </div>
</body>

</html>
