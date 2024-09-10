<?php

namespace Sujan7a\SteadfastCourier;

use Illuminate\Support\Facades\Http;

class SteadfastCourier
{
  protected $apiKey;
  protected $secretKey;
  protected $baseUrl;

  public function __construct()
  {
    $this->apiKey = config('steadfast.api_key');
    $this->secretKey = config('steadfast.secret_key');
    $this->baseUrl = config('steadfast.base_url');
  }

  public function placeOrder($data)
  {
    $response = Http::withHeaders([
      'Api-Key' => $this->apiKey,
      'Secret-Key' => $this->secretKey,
      'Content-Type' => 'application/json',
    ])->post($this->baseUrl . '/create_order', $data);

    return $response->json();
  }

  public function bulkCreate($data)
  {
    $response = Http::withHeaders([
      'Api-Key' => $this->apiKey,
      'Secret-Key' => $this->secretKey,
      'Content-Type' => 'application/json',
    ])->post($this->baseUrl . '/create_order/bulk-order', [
      'data' => $data,
    ]);

    return $response->json();
  }

  public function getDeliveryStatusByConsignmentId($id)
  {
    $response = Http::withHeaders([
      'Api-Key' => $this->apiKey,
      'Secret-Key' => $this->secretKey,
    ])->get($this->baseUrl . '/status_by_cid/' . $id);

    return $response->json();
  }

  public function getCurrentBalance()
  {
    $response = Http::withHeaders([
      'Api-Key' => $this->apiKey,
      'Secret-Key' => $this->secretKey,
    ])->get($this->baseUrl . '/get_balance');

    return $response->json();
  }
}