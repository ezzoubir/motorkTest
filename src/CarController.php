<?php

namespace Motork;

use Motork\CarModel;

class CarController
{
    /**
     * Index Action
     *
     * This should contain the list of cars.
     */
    public function getIndex()
    {
        
        $cars = CarModel::getCars();

        include CONFIG_VIEWS_DIR . '/index.php';
    }

    /**
     * Detail Action
     *
     * This should contain the car's detail and the form.
     */
    public function getDetail($detailId)
    {

        $carDetail = CarModel::getDetailCar($detailId);
        $similarCars = CarModel::getSimilarCars($carDetail);

        include CONFIG_VIEWS_DIR . '/detail.php';
    }

    /**
     * Detail Action
     *
     * This should contain the process of the form.
     */
    public function process()
    {
        $action = $_POST['submit']; 
        if ($action == 'Request quote')
        {
           
            $data = array(
                'carId' =>$_POST['carId'],
                'name' =>$_POST['name'],
                'lastname' =>$_POST['surname'],
                'email' =>$_POST['email'],
                'phone' => $_POST['phone'],
                'cap' => $_POST['zip'],
                'privacy' => $_POST['privacy']
            );
            $result = CarModel::submitQuote($data);

            if ($result) {
                $_SESSION['msg'] ='<div class="alert alert-success">Thank You! We will be in touch</div>';
            }else {
                $_SESSION['msg'] ='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
            }

            header('location: /detail/'.$_POST['carId']);
            
        }
    }

    /**
     * @return CarController
     */
    public static function create()
    {
        return new self();
    }
}