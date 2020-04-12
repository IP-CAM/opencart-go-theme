<?php
class ControllerCommonSidebar extends Controller {
    public function index() {
        $this->load->model('account/customer');
        $logged = $this->customer->isLogged();
        $data = ['logged' => $logged];

        if ($logged) {
            $customerId = $this->customer->getId();
            $customer = $this->model_account_customer->getCustomer($customerId);
            $custom_fields = $customer['custom_field'];
            $image = '';
            if (isset($custom_fields)) {
                $json = json_decode($custom_fields, true);
                $image = $json['image'];
            }

            $data['customer'] = [
                'firstname' => $customer['firstname'],
                'lastname' => $customer['lastname'],
                'image' => $image,
            ];
        }

        $data['telegram_bot'] = TELEGRAM_BOT;
        $data['telegram_redirect_url'] = TELEGRAM_REDIRECT_URL;

        return $this->load->view('common/sidebar', $data);
    }
}