<?php
class converter
{
    //array of currencies (see config/simoleon.php)
    private $currency;
    //amount of dollars 1 simoleon is worth
    private $sim;
    //codeigniter object
    private $ci;

    public function __construct() {
        $this->ci = &get_instance();
        $this->currency = $this->ci->config->item("currency");
        $this->sim = $this->ci->config->item("sim");
    }

    public function moneyFormat($moneyz) {
        return number_format($moneyz, 2);
    }

    //convert a currency to simoleons
    //example $this->converter->toSIM('EUR', 100);
    public function toSIM($from, $amount) {
        $amount = str_replace(",", ".", $amount);
        if(array_key_exists($from, $this->currency) && is_numeric($amount)) {
            if($from != "USD") {
                $data = file_get_contents("http://rate-exchange.appspot.com/currency?from=$from&to=USD&q=$amount");
                if($data !== FALSE) {
                    $data = json_decode($data);
                    if(isset($data->v))
                        $dollar = $data->v;
                    else throw new Exception("Invalid data returned from API, Please try again later.");
                } else throw new Exception("Unable to connect to API :(");
            } else $dollar = $amount;

            //SICK CALCULATION WHERE THIS SITE IS PRETTY MUCH BUILD FOR :
            $simoleons = $dollar / $this->sim;

            $simoleons = $this->moneyFormat($simoleons);
            $amount = $this->moneyFormat($amount);

            return array("simoleons" => $simoleons, "amount" => $amount, "char" => $this->getCurrencySymbol($from));

        } else throw new Exception("Invalid input");
    }

    public function toMoney($to, $amount) {
        $amount = str_replace(",", ".", $amount);
        if(array_key_exists($to, $this->currency) && is_numeric($amount)) {
            if($to != "USD") {
                $data = file_get_contents("http://rate-exchange.appspot.com/currency?from=USD&to=$to&q=$amount");
                if($data !== FALSE) {
                    $data = json_decode($data);
                    if(isset($data->v))
                        $dollar = $data->v;
                    else throw new Exception("Invalid data returned from API, Please try again later.");
                } else throw new Exception("Unable to connect to API :(");
            } else $dollar = $amount;

            //SICK CALCULATION WHERE THIS SITE IS PRETTY MUCH BUILD FOR :
            $simoleons = $this->sim * $dollar;

            $simoleons = $this->moneyFormat($simoleons);
            $amount = $this->moneyFormat($amount);

            return array("simoleons" => $amount, "amount" => $simoleons, "char" => $this->getCurrencySymbol($to));

        } else throw new Exception("Invalid input");
    }

    //this was taken from the openbudget project.
    //code.google.com/p/clearbudget/source/browse/trunk/logic/currency.class.php?r=464
    //props to them
    public function getCurrencySymbol($currency) {
        $currencySymbol = '';
        // get the currency symbol
        $symbol = $this->currency[$currency][1];
        // if many symbols are found, rebuild the full symbol
        $symbols = explode(', ', $symbol);
        if(is_array($symbols)) {
            $symbol = "";
            foreach($symbols as $temp) {
                $symbol .= '&#x'.$temp.';';
            }
        }
        else {
            $symbol = '&#x'.$symbol.';';
        }
        return $symbol;
    }
}
