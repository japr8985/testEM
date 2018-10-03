<?php 
use PHPUnit\Framework\TestCase;
/**
 * 
 */
class RequestTest extends TestCase
{
	/**
	 * Test Para el consumo del endpoint
	 * @test
	 * @return void
	 */
	public function request_api()
	{
		$req = new \App\Classes\ResultApi;

		$response = $req->fetch();
		
		$data = json_encode([
			"error" => 0,
			"draw" => "2018-10-02",
			"results" => "07,17,29,37,45,03,11"
		]);

		$this->assertJsonStringEqualsJsonString($response, $data);
	}	
}