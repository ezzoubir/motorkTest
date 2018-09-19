<?php

namespace Motork;

use Motork\DB;

class CarModel {

    /**
     * Detail Action
     *
     * This should contain the list of cars.
     */
    public static function getCars()
	{
		$listcars = json_decode(file_get_contents('http://localhost:8889/api.php/search'));
        $cars = $listcars->data;

        return $cars;
	}

    /**
     * Detail Action
     *
     * This should contain the detail of car.
     */
	public static function getDetailCar($detailId)
	{
		$detailCars = json_decode(file_get_contents('http://localhost:8889/api.php/detail/'.$detailId));
        $car = $detailCars->data;

        return $car;
	}

    /**
     * Detail Action
     *
     * This should contain similar cars.
     */
	public static function getSimilarCars($carDetail)
	{
		$cars = json_decode(file_get_contents('http://localhost:8889/api.php/search'));
        $cars = $cars->data;
        $items = array();
        foreach ($cars as $key => $value) {
        	if($carDetail->tags->Look === $value->tags->Look && $carDetail->tags->Segment === $value->tags->Segment && $carDetail->tags->{'Fuel type'} === $value->tags->{'Fuel type'} && $carDetail->tags->{'Internal space'} === $value->tags->{'Internal space'} && $carDetail->attrs->carId != $value->attrs->carId):
        		$items[] = $value;
        	endif;
        }

        return (object) $items;
	}

    /**
     * Detail Action
     *
     * This should contain the save data.
     */
	public function submitQuote($data)
	{
		$db = new DB('root', '', 'motork_dev_test');

		if($db->insert('leads', $data))
		{
			return true;
		}

		return false;
	}
}