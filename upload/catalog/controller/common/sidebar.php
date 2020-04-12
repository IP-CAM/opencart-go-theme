<?php
class ControllerCommonSidebar extends Controller {
    public function index() {
        $logged = $this->customer->isLogged();
        $customer = $this->customer;
        $data = ['logged' => $logged];

        if ($logged) {
            $data['customer'] = $customer;
        }

        $data['telegram_bot'] = TELEGRAM_BOT;
        $data['telegram_redirect_url'] = TELEGRAM_REDIRECT_URL;

        return $this->load->view('common/sidebar', $data);
    }
}