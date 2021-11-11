<?php

class Pages extends Controller {
  public function __construct() {
    $this->elementModel = $this->model('ELEMENT');

  }

  public function index() {
    $elements = $this->elementModel->getElements();
    $data = $elements;
    $errorData = [
      'deleteError' => ''
    ];
    $this->view('index',$data, $errorData);
  }

  public function add() {
    $this->view('add');
  }

  public function validate($regEx, $value, $name,$type) {
    $cname = ucfirst($name);
    if (empty($value)) {
      return 'Please enter '.$name.' value';
    } else if (!preg_match($regEx,$value)) {
      return $cname.' can only contain'.$type;
    }
  }
  
  public function doa() {

    if (isset($_POST['delete'])) {
      if (empty($_POST['checkbox'])) {
        $elements = $this->elementModel->getElements();
        $data = $elements;
        $errorData = [
          'deleteError' => 'Please select elements for deletion.'
        ];
        $this->view('index',$data,$errorData);
      } else {
        foreach ($_POST['checkbox'] as $el) {
          $this->elementModel->deleteElements($el);
        }
        $elements = $this->elementModel->getElements();
        $data = $elements;
        $errorData = [
          'deleteError' => ''
        ];
        $this->view('index',$data,$errorData);
      }
    } else if (isset($_POST['add'])) {
      $lastID = $this->elementModel->lastElement();
      if (empty($lastID)) {
        $lastID = '1001';
      }
      $data=[
        'sku' => '',
        'name' => '',
        'price' => '',
        'productType' => '',
        'size' => '',
        'weight' => '',
        'height' => '',
        'width' =>'',
        'length' => '',
        'skuError'=>'',
        'nameError'=>'',
        'priceError'=>'',
        'sizeError'=>'',
        'weightError'=>'',
        'heightError'=>'',
        'widthError'=>'',
        'lengthError'=>'',
        'lastID' => $lastID
      ];
      $this->view('add',$data);
    } else {
      echo 'error 1.0';
    }

  }

  public function addItems() {
    if(isset($_POST['save'])) {

      //sanitize post post data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      //trim removes all whitespace(both sides)
      $lastID = $this->elementModel->lastElement();
      if (empty($lastID)) {
        $lastID = '1001';
      }
      $data = [
        'sku' => trim($_POST['sku']),
        'name' => trim($_POST['name']),
        'price' => trim($_POST['price']),
        'productType' => trim($_POST['productType']),
        'size' => null,
        'weight' => null,
        'height' => null,
        'width' => null,
        'length' => null,
        'skuError'=>'',
        'nameError'=>'',
        'priceError'=>'',
        'sizeError'=>'',
        'weightError'=>'',
        'heightError'=>'',
        'widthError'=>'',
        'lengthError'=>'',
        'lastID' => $lastID
      ];

      $skuValidation = "/^[a-zA-Z0-9]*$/";
      if (empty($data['sku'])) {
        $data['skuError'] = 'Please enter SKU value';
      } elseif (!preg_match($skuValidation,$data['sku'])) {
        $data['skuError'] = 'SKU can contain letters or numbers';
      } else if ($this->elementModel->skuCheck($data['sku'] == true)) {
        $data['skuError'] = 'SKU value must be unique';
      }

      $nameValidation = "/^[a-zA-Z0-9]*$/";
      $data['nameError'] = $this->validate($nameValidation,$data['name'],'name','letters and numbers');

      $priceValidation = "/^[0-9]*$/";
      $data['priceError'] = $this->validate($priceValidation,$data['price'],'price','numbers and comma');

      switch ($data['productType']) {
        case 'DVD':
          $data['size']= $_POST['size'];
          $sizeValidation = "/^[0-9]*$/";
          $data['sizeError'] = $this->validate($sizeValidation,$data['size'],'size','numbers');
          break;
        case 'BOOK':
          $data['weight']= $_POST['weight']; 
          $weightValidation = "/^[0-9]*$/";
          $data['weightError'] = $this->validate($weightValidation,$data['weight'],'weight','numbers');
          break;
        case 'Furniture':
          $data['height']= $_POST['height'];
          $heightValidation = "/^[0-9]*$/";
          $data['heightError'] = $this->validate($heightValidation,$data['height'],'height','numbers');
          $data['width']= $_POST['width'];
          $widthValidation = "/^[0-9]*$/";
          $data['widthError'] = $this->validate($widthValidation,$data['width'],'width','numbers');
          $data['length']= $_POST['length'];
          $lengthValidation = "/^[0-9]*$/";
          $data['lengthError'] = $this->validate($lengthValidation,$data['length'],'length','numbers');
          break;  
      }
      if (empty($data['skuError'])&&empty($data['nameError'])&&empty($data['priceError'])&&empty($data['sizeError'])&&empty($data['weightError'])&&empty($data['widthError'])&&empty($data['heightError'])&&empty($data['lengthError'])) {
        $this->elementModel->addElements($data);
        $this->index();
      } else {
        $lastEl = $this->elementModel->lastElement();

        $this->view('add',$data);
      }

    } else if (isset($_POST['cancel'])) {
      $this->index();
    } else {
      echo 'error 2.0';
    }
    
  }
  
}