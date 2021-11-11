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
    $this->view('add');
  }
  
  public function doa() {

    if (isset($_POST['delete'])) {
      foreach ($_POST['checkbox'] as $el) {
        $this->elementModel->deleteElements($el);
      }
      $elements = $this->elementModel->getElements();
      $data = $elements;
      $this->view('index',$data);
    } else if (isset($_POST['add'])) {
      $this->view('add');
    } else {
      echo 'error 1.0';
    }

  }

  public function addItems() {
    if(isset($_POST['save'])) {
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
        case 'DVD':
          $data['size']= $_POST['size'];
          break;
        case 'BOOK':
          $data['weight']= $_POST['weight'];  
          break;
        case 'Furniture':
          $data['height']= $_POST['height'];
          $data['width']= $_POST['width'];
          $data['length']= $_POST['length'];
          break;  
      }
      $this->elementModel->addElements($data);
      $this->index();

    } else if (isset($_POST['cancel'])) {
      $this->index();
    } else {
      echo 'error 2.0';
    }
    
  }
  
}