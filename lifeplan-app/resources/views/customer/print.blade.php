<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Print Customer</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <div class="buttons-container">
      <a href="{{ route('home') }}">
        <button id="back">Back</button>
      </a>
      <button id="save">Save</button>
      <button id="print">Print</button>
    </div>
    <a id="save_to_image">
      <div class="invoice-container">
            <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                <table>
                    <tr>
                    <td class="title">
                        <img
                        src="{{ asset('img/logo.jpg') }}"
                        style="width: 100%; max-width: 100px; border-radius: 5px"
                        />
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                <table>
                    <tr>
                    <td>
                        {{ Auth::user()->last_name }}, {{ Auth::user()->first_name }}, {{ Auth::user()->middle_name }}<br />
                        {{ Auth::user()->address }}<br />
                        {{ Auth::user()->email }} <br />
                        {{ Auth::user()->civil_status }}
                    </td>
                    <td>
                        {{ Auth::user()->contact_number }} <br />
                        {{ Auth::user()->birthday }} <br />
                        {{ Auth::user()->sex }}
                    </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Product Plan</td>
                <td>Price</td>
            </tr>
            <tr class="details">
                <td>{{ Auth::user()->product }}</td>
                <td>{{ Auth::user()->price }}</td>
            </tr>
            </table>
      </div>
    </a>
   
    <script src="{{ asset('js/canva.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
  </body>
</html>