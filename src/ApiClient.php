<?php
// src/ApiClient.php
namespace Sujan7a\SteadfastCourier;

use Illuminate\Support\Facades\Http;

class ApiClient
{
  protected $api_key;
  protected $secret_key;
  protected $base_url;

  public function __construct()
  {
    $this->api_key = config('steadfast_courier.api_key');
    $this->secret_key = config('steadfast_courier.secret_key');
    $this->base_url = config('steadfast_courier.base_url');
  }

  public function createOrder(array $data)
  {
    $response = Http::withHeaders($this->getHeaders())
      ->post("{$this->base_url}/create_order", $data);

    return $response->json();
  }

  public function bulkCreate(array $data)
  {
    $response = Http::withHeaders($this->getHeaders())
      ->post("{$this->base_url}/create_order/bulk-order", ['data' => $data]);

    return $response->json();
  }

  public function checkStatusByConsignmentId($id)
  {
    $response = Http::withHeaders($this->getHeaders())
      ->get("{$this->base_url}/status_by_cid/{$id}");

    return $response->json();
  }

  // More methods can be added as per the API docs.

  protected function getHeaders()
  {
    return [
      'Api-Key' => $this->api_key,
      'Secret-Key' => $this->secret_key,
      'Content-Type' => 'application/json',
    ];
  }
}