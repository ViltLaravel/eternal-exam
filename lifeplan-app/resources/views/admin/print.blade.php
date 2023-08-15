<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Print Credentials</title>
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
        @foreach ($printCustomerAdmin as $customer)
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
                                {{ $customer->last_name }}, {{ $customer->first_name }}, {{ $customer->middle_name }}<br />
                                {{ $customer->address }}<br />
                                {{ $customer->email }} <br />
                                {{ $customer->civil_status }}
                            </td>
                            <td>
                                {{ $customer->contact_number }} <br />
                                {{ $customer->birthday }} <br />
                                {{ $customer->sex }}
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
                        <td>{{ $customer->product }}</td>
                        <td>{{ $customer->price }}</td>
                    </tr>
                    <tr class="heading">
                        <td>Product Plan</td>
                        <td>Payment</td>
                    </tr>
                    <tr class="details">
                        <td>{{ $customer->product }}</td>
                        <td>{{ $customer->payment }}</td>
                    </tr>
                </table>
            </div>
      @endforeach
    </a>
   
    <script src="{{ asset('js/canva.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
  </body>
</html>