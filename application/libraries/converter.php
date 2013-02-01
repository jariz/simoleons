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

    //convert a currency to simoleons
    //example $this->converter->toSIM('EUR', 100);
    public function toSIM($from, $amount) {
        var_dump($from, $this->currency);
        if(array_key_exists($from, $this->currency) && is_numeric("")) {
            if($from != "USD") {
                $data = file_get_contents("http://rate-exchange.appspot.com/currency?from=$from&to=USD&q=$amount");
                if($data !== FALSE) {
                    var_dump($data);
                } else throw new Exception("Unable to connect to API :(");
            } else $dollar = $this->sim;

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
