<?php

namespace Motork;

use PHPUnit\Framework\TestCase;
use Motork\CarModel;

class CarModelTest extends TestCase {
	
	public function testgetCars() {
		$data = file_get_contents('http://localhost/motork/api/api.php/search');
	    $result = json_decode($data, true);
	    $this->assertArrayHasKey('data', $result);
	    $this->assertEquals(200, $result['status']);
	}

	public function testgetDetailCar() {

		$data = file_get_contents('http://localhost/motork/api/api.php/detail/622');
	    $result = json_decode($data, true);
	    $this->assertArrayHasKey('data', $result);
	    $this->assertEquals(200, $result['status']);
	}

	public function testgetSimilarCars() {
		$data = file_get_contents('http://localhost/motork/api/api.php/search');
	    $results = json_decode($data, true);

	    /*echo '<pre>';
	    print_r($results);
	    echo '<pre>';*/
	   
	    foreach ( $results['data'] as $value) {
	    	//$this->assertEquals('modern', $value['tags']['Look']);
	    	//$this->assertContains( 'modern', $value['tags'] );
	    	//$this->assertEquals(in_array('modern', $value['tags']), 1);
	    	//$this->assertContains('modern', $value['tags']);
	    	$this->assertAttributeEquals('modern', $value['tags']['Look'], (object) $value);
		}
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