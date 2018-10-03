<?php 

namespace App\Classes;
use App\interfaces\IResultApi;
use App\Classes\Cache;
/**
 * 
 */
class ResultApi implements IResultApi
{
	public function fetch()
	{
		$ch = curl_init();
		
		curl_setopt_array($ch, [
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_URL => 'https://www.magayo.com/api/results.php?api_key=Qs538dw5akaBasBmLd&game=euromillions',
    		// CURLOPT_HEADER => true
		]);
		
		$response = curl_exec($ch);
		
		$statusCode = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
		
		curl_close($ch);
		
		if ($statusCode !== 200) {
			# Realizando llamado al FakeApi
			$secondApi = curl_init();

			curl_setopt_array($secondApi, [
	    		CURLOPT_RETURNTRANSFER => 1,
	    		CURLOPT_URL => 'http://localhost:3004/result' 
			]);

			$response = curl_exec($secondApi);
		}
		
		return $response;
	}
}