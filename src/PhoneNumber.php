<?php

namespace Viecngay\PhoneNumber;

class PhoneNumber
{
    public function toStandardize($phone)
    {
        return $this->convertPhone($phone);
    }

    private function convertPhone($phone){
        $newPhone = $phone;
        $newPhone = preg_replace('/[^0-9]/', '', $newPhone);
        $newPhone = preg_replace('/^84/', '0', $newPhone);
        if (strlen($newPhone) && $newPhone[0] != 0) {
            $newPhone = '0'. $newPhone;
        }
        if (strlen($phone) == 11) {
            $transformPhoneRule = [
                //Viettel
                '0169' => '039',
                '0168' => '038',
                '0167' => '037',
                '0166' => '036',
                '0165' => '035',
                '0164' => '034',
                '0163' => '033',
                '0162' => '032',
                //Mobifone
                '0120' => '070',
                '0121' => '079',
                '0122' => '077',
                '0126' => '076',
                '0128' => '078',
                //  VinaPhone:
                '0123' => '083',
                '0124' => '084',
                '0125' => '085',
                '0127' => '081',
                '0129' => '082',
                //Gmobile:
                '01992' => '0592',
                '01993' => '0593',
                '01998' => '0598',
                '01999' => '0599',
                //Vnmobile
                '0186' => '056',
                '0188' => '058'
            ];
            $firstFourNumber = substr($phone, 0, 4);
            $firstFiveNumber = substr($phone, 0, 5);

            if (!empty($transformPhoneRule[$firstFiveNumber])) {
                $newPhone = $transformPhoneRule[$firstFiveNumber].substr($phone, 5);
            }else if (!empty($transformPhoneRule[$firstFourNumber])) {
                $newPhone = $transformPhoneRule[$firstFourNumber].substr($phone, 4);
            }
        }
        return  $newPhone;
    }
}
