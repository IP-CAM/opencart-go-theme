<?php
class ControllerCommonLoader extends Controller {
    public function index() {
        return $this->load->view('common/loader');
    }
}
