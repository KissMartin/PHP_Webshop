<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{
    private static $data = [];

    /**
     * Fetch currency data from the API.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public static function fetchCurrencyData(): Array
    {
        if(self::$data == []) {
            $response = Http::get('https://latest.currency-api.pages.dev/v1/currencies/usd.json');
            if (!$response->successful()) { 
                return response()->json(['error' => 'Failed to fetch currency data'], $response->status());
            }
            self::$data = $response->json();
        }
        return self::$data;
    }

    public static function GetAllCurrencies()
    {
        $json = self::fetchCurrencyData();
        if (isset($json['usd'])) {
            return array_keys($json['usd']);
        }
        return [];
    }

    public static function GetExchangeRate(string $currencyCode): float
    {
        $json = self::fetchCurrencyData();
        if (isset($json['usd'][$currencyCode])) {
            return (float) $json['usd'][$currencyCode];
        }
        return 1.0;
    }

    public static function CalculatePriceInCurrency(float $price, string $currencyCode, int $floatingPoints = 0): string
    {
        $price = (float) $price;
        $exchangeRate = self::GetExchangeRate($currencyCode);

        if ($exchangeRate === 0) { return 'ERROR'; }
        
        $converted = round($price * $exchangeRate, $floatingPoints);
        return number_format($converted, $floatingPoints, '.', ' ');
    }
}
?>