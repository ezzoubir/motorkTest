<?php

namespace Motork;

use PHPUnit\Framework\TestCase;
use Motork\CarModel;

class CarModelTest extends TestCase {
	
	public function testgetCars() {
		$data = file_get_contents('http://localhost:8889/api.php/search');
	    $result = json_decode($data, true);
	    $this->assertArrayHasKey('data', $result);
	    $this->assertEquals(200, $result['status']);
	}

	public function testgetDetailCar() {

		$data = file_get_contents('http://localhost:8889/api.php/detail/622');
	    $result = json_decode($data, true);
	    $this->assertArrayHasKey('data', $result);
	    $this->assertEquals(200, $result['status']);
	}

	public function testsubmiteQuote() {

		$data = array(
			'carID'=>616,
			'name'=>'ezzoubiro',
			'lastname'=>'Douider',
			'email'=>'douiderezzoubir@gmail.com',
			'phone'=>3286666666,
			'cap'=>99999,
			'privacy'=>'Y'
		);

		$car = new CarModel();

		$result = $car->submitQuote($data);

		$this->assertEquals(true, $result);
	}
}