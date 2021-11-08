<?php

class Pages extends Controller {
  public function __construct() {
    $this->elementModel = $this->model('ELEMENT');

  }

  public function index() {
    $elements = $this->elementModel->getElements();
    $data = $elements;
    $this->view('pages/index',$data);
  }

  public function add() {
    $data = [
      'title' => 'Home Page',
      'name' => 'Harry Strickland'
    ];
    $this->view('pages/add',$data);
  }

  public function deleteOrADD() {

    foreach ($_POST['checkbox'] as $el) {
      $this->elementModel->deleteElements($el);
    }
    $elements = $this->elementModel->getElements();
    $data = $elements;
    $this->view('pages/index',$data);
  }
  
}