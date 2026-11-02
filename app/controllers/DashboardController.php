<?php
class DashboardController extends Controller {
    public function index() {
        $this->requireLogin();
        $this->view('dashboard/index', ['title'=>'Dashboard','stats'=>(new Product)->stats(),'users'=>(new User)->count(),'terbaru'=>array_slice((new Product)->all(),0,5)]);
    }
}
