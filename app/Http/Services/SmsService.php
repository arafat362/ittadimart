<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Http;

class SmsService
{
    private $api_key;
    private $client_id;
    private $sender_id;
    private $api_base_url;
    
    public function __construct()
    {
        $this->api_key = "qryaKwabaEVGTICIV4A+KoRRttSnf7F2M5JdVQbL7GM=";
        $this->client_id = "e5aea375-ca44-4d50-8520-070675702296";
        $this->sender_id = "8809617611877";
        $this->api_base_url = "https://sms.desiredhost.com/api/v2";
    }

    public function sendSms($mobile, $message, $is_unicode = true)
    {
        $api_url = $this->api_base_url . "/SendSMS?ApiKey=" . $this->api_key . "&ClientId=" . $this->client_id . "&SenderId=" . $this->sender_id . "&Message=" . urlencode($message) . "&MobileNumbers=88" . $mobile . ($is_unicode ? "&Is_Unicode=true" : "&Is_Unicode=flase");
        $response = Http::get($api_url);
        return $response;
    }

    public function checkBalance(){
        $api_url = $this->api_base_url . "/Balance?ApiKey=" . $this->api_key . "&ClientId=" . $this->client_id;
        $response = Http::get($api_url);

        $creditBalance = 0;
        $responseArray = json_decode($response->body(), true);
        if ($responseArray && isset($responseArray['Data'][0]['Credits'])) {
            $creditBalanceWithSymbol = $responseArray['Data'][0]['Credits'];
            $creditBalance = floatval(str_replace('৳', '', $creditBalanceWithSymbol));
        }

        return $creditBalance;
    }
}