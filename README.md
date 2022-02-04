# <a href="https://alfaexchnage.io" target="_blank"><img src="https://avatars2.githubusercontent.com/u/87022758?s=20&v=4" width="20"></a> alfaexchange Laravel SDK Package

[![Build Status](https://travis-ci.com/alfaexchange/laravel-package.svg?token=E8WZTvpNHoqu5bG7wouf&branch=master)](https://travis-ci.com/alfaexchange/laravel-package)
[![Latest Stable Version](https://poser.pugx.org/alfaexchange/laravel-package/v)](//packagist.org/packages/alfaexchange/laravel-package)
[![Total Downloads](https://poser.pugx.org/alfaexchange/laravel-package/downloads)](//packagist.org/packages/alfaexchange/laravel-package)
[![License](https://poser.pugx.org/alfaexchange/laravel-package/license)](//packagist.org/packages/alfaexchange/laravel-package)

*alfaexchange Laravel Package* - PHP SDK [Laravel](https://github.com/laravel/laravel) for work with [Alfa Exchange](https://www.alfaexchnage.io/).

- [Introduction](#introduction)
- [Install](#install)
- [Configure](#configure)
- [Methods](#methods)
    - [Latest](#latest)

# Introduction
The [laravel-alfaexchange](https://github.com/alfaexchange/laravel-package) package allows you to build web and console applications based on [Laravel](https://github.com/laravel/laravel) framework that integrate with your [Alfa Exchange](https://alfaexchange.com) account.
With over 15 exchange rate data sources, the Alfa Exchange API is delivering exchanging rates data for more than 170 world currencies. This API has several endpoints, where each of them serves a different purpose, use case. The endpoints include functionalities like receiving the latest exchange rates information for a specific set, or for all currencies; conversion from one to another currency; receiving data Time-series for multiple or for one currency, and preserving the API daily for the fluctuation data.

With [laravel-alfaexchange](https://github.com/alfaexchange/laravel-package) API SDK you can:
 - Obtain real-time, accurate and reliable currency exchange rate data for hundreds of worldwide currencies, updated as often as every 60 seconds.
 - Our API is integrated with a number of highly reputable foreign exchange rate sources, offering the most recent and accurate rates for 200+ pairs.
 - Make use of a scalable infrastructure that can handle anything from a few requests a day up to thousands of API requests per second.
 - Integrate the API in under 10 minutes without the need of a credit card. You will get 250 monthly requests for free, premium plans start at only **$9.99**.
# Install
To install you can install the package via composer

```shell script
composer require alfaexchange/laravel-package
```

You should publish the migration and the `config/alfaexchange.php` config file with

```shell script
php artisan vendor:publish --provider="AlfaExchange\Api\AlfaExchangeServiceProvider"
```

# Configure
Project setup is done through the `.env` of your project

- `ALFAEXCHANGE_API_KEY` - Personal Device API key for your application
- `ALFAEXCHANGE_TIMEOUT` - Maximum wait request from Alfa Exchange API

# Methods
The `AlfaExchange\Api\AlfaExchangeService` instance can execute all methods which provided Alfa Exchange API

## Latest
Fetch a single currency exchange rate or all available currency rates

```php
(new AlfaExchangeService())->latest(string $from, ?string $to)
```

### Params

|  **Param**                | **Type**    | **Description**                                     |
|:--------------------------|:------------|:----------------------------------------------------|
| `from`                    | `string`    | Base currency 3-letter symbol                       |
| `to`                      | `string`    | Optional parameter. Target currency 3-letter symbol |

### Response object

Returned `AlfaExchange\Api\Objects\ExchangeObject` with structure
|  **Param**                | **Type**                               | **Description**                                     |
|:--------------------------|:---------------------------------------|:----------------------------------------------------|
| `success`                 | `boolean`                              | Success trigger                                     |
| `timestamp`               | `timestamp`                            | Last currency updated                               |
| `base`                    | `string`                               | Base currency 3-letter symbol                       |
| `rates`                   | `AlfaExchange\Api\Objects\RatesObject` | List of rates                                       |

Example request object

```php
AlfaExchange\Api\Objects\ExchangeObject^ {#1030
  #properties: array:4 [
    "success" => true
    "timestamp" => 1643911210
    "base" => "USD"
    "rates" => AlfaExchange\Api\Objects\RatesObject^ {#1027
      #properties: array:150 [
        "GBP" => 0.73519
        "MKD" => 54.52694
        "GEL" => 3.017
        "GHS" => 6.25082
        "GIP" => 0.73519
        "GNF" => 8999.25746
        "GTQ" => 7.68349
        "GYD" => 209.87509
        "HKD" => 7.79134
        "HNL" => 24.48849
        "HRK" => 6.59393
        "HTG" => 102.88342
        "HUF" => 309.60601
        "ILS" => 3.1943
        "INR" => 74.67339
        "KHR" => 4060.75622
        "IQD" => 1457.59048
        "ISK" => 126.21766
        "JOD" => 0.70777
        "KES" => 113.27094
        "MMK" => 1773.0023
        "MNT" => 2853.99834
        "MOP" => 7.91287
        "MRU" => 36.3883
        "MUR" => 43.98724
        "MYR" => 4.18324
        "MZN" => 63.65875
        "NAD" => 15.2317
        "AUD" => 1.40058
        "AWG" => 1.7996
        "AZN" => 1.69329
        "BBD" => 1.99911
        "BDT" => 84.84991
        "BGN" => 1.72991
        "BHD" => 0.37607
        "BIF" => 2015.49048
        "BMD" => 0.99914
        "BND" => 1.34348
        "BOB" => 6.8836
        "BSD" => 1.00148
        "BTN" => 74.95423
        "BRL" => 5.29837
        "BWP" => 11.55846
        "CAD" => 1.26775
        "CDF" => 2001.19836
        "CHF" => 0.92029
        "CLF" => 0.02581
        "CLP" => 818.21657
        "CNH" => 6.35154
        "CNY" => 6.35963
        "CZK" => 21.24887
        "DKK" => 6.51412
        "DOP" => 57.65665
        "DZD" => 140.60168
        "EGP" => 15.74045
        "ERN" => 15.13024
        "EUR" => 0.87421
        "FJD" => 2.14691
        "FKP" => 0.73519
        "GMD" => 52.87129
        "IDR" => 14363.58156
        "KGS" => 84.79477
        "KMF" => 432.70425
        "KPW" => 899.95515
        "KRW" => 1198.5605
        "KWD" => 0.30209
        "KYD" => 0.81909
        "MGA" => 4001.42627
        "COP" => 3952.05082
        "CUP" => 24.99224
        "CVE" => 96.87617
        "ETB" => 49.78422
        "KZT" => 434.20405
        "MDL" => 17.98425
        "AMD" => 481.90326
        "ANG" => 1.78644
        "AOA" => 527.09989
        "SAR" => 3.74793
        "ZAR" => 15.26912
        "WST" => 2.62287
        "NZD" => 1.50027
        "SZL" => 15.25919
        "QAR" => 3.63934
        "YER" => 249.8548
        "TJS" => 11.26196
        "PGK" => 3.49157
        "PKR" => 175.7578
        "TWD" => 27.80413
        "TTD" => 6.72663
        "XAF" => 573.44562
        "SEK" => 9.11057
        "RON" => 4.32393
        "PAB" => 0.99907
        "RWF" => 1011.29254
        "XPF" => 104.24426
        "SGD" => 1.34386
        "TRY" => 13.56605
        "PYG" => 7059.10204
        "OMR" => 0.38377
        "TMT" => 3.48959
        "PLN" => 3.96364
        "VUV" => 113.293
        "VND" => 22678.15526
        "TND" => 2.86085
        "ZMW" => 18.38949
        "XOF" => 573.43606
        "SYP" => 2512.17109
        "USD" => 1.0
        "NPR" => 115.6162
        "TZS" => 2310.23607
        "UYU" => 43.89166
        "RUB" => 76.55254
        "THB" => 33.12839
        "NOK" => 8.73474
        "SRD" => 21.0775
        "PHP" => 50.99876
        "XCD" => 2.69916
        "PEN" => 3.8587
        "XDR" => 0.71468
        "RSD" => 103.35762
        "SDG" => 440.37745
        "TOP" => 2.29196
        "SHP" => 0.73519
        "SLL" => 11352.67867
        "SOS" => 583.85961
        "JPY" => 114.8641
        "LAK" => 11324.44732
        "LSL" => 15.30154
        "LYD" => 4.58473
        "MAD" => 9.27297
        "LBP" => 1508.79657
        "LKR" => 201.42039
        "LRD" => 152.85806
        "JMD" => 155.9091
        "AFN" => 95.0154
        "SCR" => 14.53216
        "MVR" => 15.65958
        "AED" => 3.67231
        "UZS" => 10784.30219
        "DJF" => 177.89426
        "NGN" => 415.91983
        "ALL" => 107.30854
        "UAH" => 28.49109
        "ARS" => 105.31323
        "BZD" => 2.01413
        "IRR" => 42020.96766
        "MWK" => 812.43062
        "MXN" => 20.57654
        "BAM" => 1.7128
        "UGX" => 3493.85012
      ]
    ]
}
```
