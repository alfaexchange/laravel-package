<?php

namespace AlfaExchange\Api\Objects;

use AlfaExchange\Api\Interfaces\AlfaExchangeObject;

/**
 * Class RatesObject
 * @package AlfaExchange\Api\Objects
 * @property float $AED
 * @property float $AFN
 * @property float $ALL
 * @property float $AMD
 * @property float $ANG
 * @property float $AOA
 * @property float $ARS
 * @property float $AUD
 * @property float $AWG
 * @property float $AZN
 * @property float $BAM
 * @property float $BBD
 * @property float $BDT
 * @property float $BGN
 * @property float $BHD
 * @property float $BIF
 * @property float $BMD
 * @property float $BND
 * @property float $BOB
 * @property float $BRL
 * @property float $BSD
 * @property float $BTN
 * @property float $BWP
 * @property float $BZD
 * @property float $CAD
 * @property float $CDF
 * @property float $CHF
 * @property float $CLF
 * @property float $CLP
 * @property float $CNH
 * @property float $CNY
 * @property float $COP
 * @property float $CUP
 * @property float $CVE
 * @property float $CZK
 * @property float $DJF
 * @property float $DKK
 * @property float $DOP
 * @property float $DZD
 * @property float $EGP
 * @property float $ERN
 * @property float $ETB
 * @property float $EUR
 * @property float $FJD
 * @property float $FKP
 * @property float $GBP
 * @property float $GEL
 * @property float $GHS
 * @property float $GIP
 * @property float $GMD
 * @property float $GNF
 * @property float $GTQ
 * @property float $GYD
 * @property float $HKD
 * @property float $HNL
 * @property float $HRK
 * @property float $HTG
 * @property float $HUF
 * @property float $IDR
 * @property float $ILS
 * @property float $INR
 * @property float $IQD
 * @property float $IRR
 * @property float $ISK
 * @property float $JMD
 * @property float $JOD
 * @property float $JPY
 * @property float $KES
 * @property float $KGS
 * @property float $KHR
 * @property float $KMF
 * @property float $KPW
 * @property float $KRW
 * @property float $KWD
 * @property float $KYD
 * @property float $KZT
 * @property float $LAK
 * @property float $LBP
 * @property float $LKR
 * @property float $LRD
 * @property float $LSL
 * @property float $LYD
 * @property float $MAD
 * @property float $MDL
 * @property float $MGA
 * @property float $MKD
 * @property float $MMK
 * @property float $MNT
 * @property float $MOP
 * @property float $MRU
 * @property float $MUR
 * @property float $MVR
 * @property float $MWK
 * @property float $MXN
 * @property float $MYR
 * @property float $MZN
 * @property float $NAD
 * @property float $NGN
 * @property float $NOK
 * @property float $NPR
 * @property float $NZD
 * @property float $OMR
 * @property float $PAB
 * @property float $PEN
 * @property float $PGK
 * @property float $PHP
 * @property float $PKR
 * @property float $PLN
 * @property float $PYG
 * @property float $QAR
 * @property float $RON
 * @property float $RSD
 * @property float $RUB
 * @property float $RWF
 * @property float $SAR
 * @property float $SCR
 * @property float $SDG
 * @property float $SEK
 * @property float $SGD
 * @property float $SHP
 * @property float $SLL
 * @property float $SOS
 * @property float $SRD
 * @property float $SYP
 * @property float $SZL
 * @property float $THB
 * @property float $TJS
 * @property float $TMT
 * @property float $TND
 * @property float $TOP
 * @property float $TRY
 * @property float $TTD
 * @property float $TWD
 * @property float $TZS
 * @property float $UAH
 * @property float $UGX
 * @property float $USD
 * @property float $UYU
 * @property float $UZS
 * @property float $VND
 * @property float $VUV
 * @property float $WST
 * @property float $XAF
 * @property float $XCD
 * @property float $XDR
 * @property float $XOF
 * @property float $XPF
 * @property float $YER
 * @property float $ZAR
 * @property float $ZMW
 */
class RatesObject extends AlfaExchangeObject
{
    protected function relations()
    {
        return [
            'AED'  => 'float',
            'AFN'  => 'float',
            'ALL'  => 'float',
            'AMD'  => 'float',
            'ANG'  => 'float',
            'AOA'  => 'float',
            'ARS'  => 'float',
            'AUD'  => 'float',
            'AWG'  => 'float',
            'AZN'  => 'float',
            'BAM'  => 'float',
            'BBD'  => 'float',
            'BDT'  => 'float',
            'BGN'  => 'float',
            'BHD'  => 'float',
            'BIF'  => 'float',
            'BMD'  => 'float',
            'BND'  => 'float',
            'BOB'  => 'float',
            'BRL'  => 'float',
            'BSD'  => 'float',
            'BTN'  => 'float',
            'BWP'  => 'float',
            'BZD'  => 'float',
            'CAD'  => 'float',
            'CDF'  => 'float',
            'CHF'  => 'float',
            'CLF'  => 'float',
            'CLP'  => 'float',
            'CNH'  => 'float',
            'CNY'  => 'float',
            'COP'  => 'float',
            'CUP'  => 'float',
            'CVE'  => 'float',
            'CZK'  => 'float',
            'DJF'  => 'float',
            'DKK'  => 'float',
            'DOP'  => 'float',
            'DZD'  => 'float',
            'EGP'  => 'float',
            'ERN'  => 'float',
            'ETB'  => 'float',
            'EUR'  => 'float',
            'FJD'  => 'float',
            'FKP'  => 'float',
            'GBP'  => 'float',
            'GEL'  => 'float',
            'GHS'  => 'float',
            'GIP'  => 'float',
            'GMD'  => 'float',
            'GNF'  => 'float',
            'GTQ'  => 'float',
            'GYD'  => 'float',
            'HKD'  => 'float',
            'HNL'  => 'float',
            'HRK'  => 'float',
            'HTG'  => 'float',
            'HUF'  => 'float',
            'IDR'  => 'float',
            'ILS'  => 'float',
            'INR'  => 'float',
            'IQD'  => 'float',
            'IRR'  => 'float',
            'ISK'  => 'float',
            'JMD'  => 'float',
            'JOD'  => 'float',
            'JPY'  => 'float',
            'KES'  => 'float',
            'KGS'  => 'float',
            'KHR'  => 'float',
            'KMF'  => 'float',
            'KPW'  => 'float',
            'KRW'  => 'float',
            'KWD'  => 'float',
            'KYD'  => 'float',
            'KZT'  => 'float',
            'LAK'  => 'float',
            'LBP'  => 'float',
            'LKR'  => 'float',
            'LRD'  => 'float',
            'LSL'  => 'float',
            'LYD'  => 'float',
            'MAD'  => 'float',
            'MDL'  => 'float',
            'MGA'  => 'float',
            'MKD'  => 'float',
            'MMK'  => 'float',
            'MNT'  => 'float',
            'MOP'  => 'float',
            'MRU'  => 'float',
            'MUR'  => 'float',
            'MVR'  => 'float',
            'MWK'  => 'float',
            'MXN'  => 'float',
            'MYR'  => 'float',
            'MZN'  => 'float',
            'NAD'  => 'float',
            'NGN'  => 'float',
            'NOK'  => 'float',
            'NPR'  => 'float',
            'NZD'  => 'float',
            'OMR'  => 'float',
            'PAB'  => 'float',
            'PEN'  => 'float',
            'PGK'  => 'float',
            'PHP'  => 'float',
            'PKR'  => 'float',
            'PLN'  => 'float',
            'PYG'  => 'float',
            'QAR'  => 'float',
            'RON'  => 'float',
            'RSD'  => 'float',
            'RUB'  => 'float',
            'RWF'  => 'float',
            'SAR'  => 'float',
            'SCR'  => 'float',
            'SDG'  => 'float',
            'SEK'  => 'float',
            'SGD'  => 'float',
            'SHP'  => 'float',
            'SLL'  => 'float',
            'SOS'  => 'float',
            'SRD'  => 'float',
            'SYP'  => 'float',
            'SZL'  => 'float',
            'THB'  => 'float',
            'TJS'  => 'float',
            'TMT'  => 'float',
            'TND'  => 'float',
            'TOP'  => 'float',
            'TRY'  => 'float',
            'TTD'  => 'float',
            'TWD'  => 'float',
            'TZS'  => 'float',
            'UAH'  => 'float',
            'UGX'  => 'float',
            'USD'  => 'float',
            'UYU'  => 'float',
            'UZS'  => 'float',
            'VND'  => 'float',
            'VUV'  => 'float',
            'WST'  => 'float',
            'XAF'  => 'float',
            'XCD'  => 'float',
            'XDR'  => 'float',
            'XOF'  => 'float',
            'XPF'  => 'float',
            'YER'  => 'float',
            'ZAR'  => 'float',
            'ZMW'  => 'float',
        ];
    }
}
