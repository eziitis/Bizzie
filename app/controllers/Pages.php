<?php

class Pages extends Controller {
  public function __construct() {
    $this->elementModel = $this->model('ELEMENT');

  }

  public function index() {
    $elements = $this->elementModel->getElements();
    $data = $elements;
    $this->view('index',$data);
  }

  public function add() {
    $data = [
      'title' => 'Home Page',
      'name' => 'Harry Strickland'
    ];
    $this->view('add',$data);
  }

  public function doa() {

    foreach ($_POST['checkbox'] as $el) {
      $this->elementModel->deleteElements($el);
    }
    $elements = $this->elementModel->getElements();
    $data = $elements;
    $this->view('index',$data);
  }

  public function addItems() {
    $data = [
      'sku' => $_POST['sku'],
      'name' => $_POST['name'],
      'price' => $_POST['price'],
      'productType' => $_POST['productType'],
      'size' => null,
      'weight' => null,
      'height' => null,
      'width' => null,
      'length' => null
    ];
    switch ($data['productType']) {
      case 'dvd':
        $data['size']= $_POST['size'];
        break;
      case 'book':
        $data['weight']= $_POST['weight'];  
        break;
      case 'furniture':
        $data['height']= $_POST['height'];
        $data['width']= $_POST['width'];
        $data['length']= $_POST['length'];
        break;  
    }
    $this->view('pages/testPage',$data);
  }
  
}