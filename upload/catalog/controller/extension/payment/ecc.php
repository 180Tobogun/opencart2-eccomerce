<?php

define("DATA_PATH", 'controller/extension/data/ecc/');

require_once(DIR_APPLICATION . DATA_PATH . 'functions.php');

class ControllerExtensionPaymentECC extends Controller
{
    public function index()
    {
        $this->load->model('checkout/order');

        $this->load->language('extension/payment/ecc');

        $data['button_confirm'] = $this->language->get('button_confirm');

        $data['action'] = 'https://ecg.test.upc.ua/ecgtest/enter';

        /*
		$data['pay_to_email']   = $this->config->get('ecc_email');
		$data['platform']       = '31974336';
		$data['description']    = $this->config->get('config_name');
		$data['transaction_id'] = $this->session->data['order_id'];
		$data['return_url']     = $this->url->link('checkout/success');
		$data['cancel_url']     = $this->url->link('checkout/checkout', '', true);
		$data['status_url']     = $this->url->link('extension/payment/ecc/callback');
		$data['language']       = $this->session->data['language'];
		$data['logo']           = $this->config->get('config_url') . 'image/' . $this->config->get('config_logo');

		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$data['pay_from_email'] = $order_info['email'];
		$data['firstname']      = $order_info['payment_firstname'];
		$data['lastname']       = $order_info['payment_lastname'];
		$data['address']        = $order_info['payment_address_1'];
		$data['address2']       = $order_info['payment_address_2'];
		$data['phone_number']   = $order_info['telephone'];
		$data['postal_code']    = $order_info['payment_postcode'];
		$data['city']           = $order_info['payment_city'];
		$data['state']          = $order_info['payment_zone'];
		$data['country']        = $order_info['payment_iso_code_3'];
		$data['amount']         = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
		$data['currency']       = $order_info['currency_code'];
		
		
		$products = '';

		foreach ($this->cart->getProducts() as $product) {
			$products .= $product['quantity'] . ' x ' . $product['name'] . ', ';
		}

		$data['detail1_text'] = $products;

		$data['order_id'] = $this->session->data['order_id'];
		
		*/


        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);


        $order_id = $this->session->data['order_id'];

// 		$merchantID = '1754975';
// 		$terminalID = 'E7882983';
// 		$merchantID = '1754998';
// 		$terminalID = 'E7883008';
        $merchantID = $this->config->get('ecc_merchant_id');
        $terminalID = $this->config->get('ecc_terminal_id');
        $purchaseTime = date("ymdHis");
        $totalAmount = $order_info['total'] * 10000;  // здесь нужно указать всю сумму В КОПЕЙКАХ!!!

        $dataECC = "$merchantID;$terminalID;$purchaseTime;$order_id;980;$totalAmount;aa;";

        $pemFile = DIR_APPLICATION . DATA_PATH . 'keys/' . $merchantID . '.pem';

        $fp = fopen($pemFile, "r");
        $priv_key = fread($fp, 8192);
        fclose($fp);
        $pkeyid = openssl_get_privatekey($priv_key);
        openssl_sign($dataECC, $signature, $pkeyid);
        openssl_free_key($pkeyid);
        $b64sign = base64_encode($signature); //Подпись данных в формате base64


        $data['Version'] = '1';
        $data['redirect'] = 'https://google.com';
        $data['MerchantID'] = $merchantID;
        $data['TerminalID'] = $terminalID;
        $data['TotalAmount'] = $totalAmount;
        $data['Currency'] = '980';
        $data['locale'] = 'en';
        $data['SD'] = 'aa';
        $data['OrderID'] = $order_id;
        $data['PurchaseTime'] = date("ymdHis");

        $products = '';
        foreach ($this->cart->getProducts() as $product) {
            $products .= $product['quantity'] . ' x ' . $product['name'] . ', ';
        }

        $data['PurchaseDesc'] = $products;
        $data['Signature'] = $b64sign;


        return $this->load->view('extension/payment/ecc', $data);
    }

    public function callback()
    {

        echo 'CallBack!!';

        process_transaction_code();

        process_signatures();

        $order_id_from_gateway = 0;

        if (isset($this->request->post['OrderID'])) {
            $order_id_from_gateway = $this->request->post['OrderID'];
            $this->load->model('checkout/order');


// 			echo '<br>';
// 			echo 'if';
// 			echo '<br>';
// 			echo '>> '.$order_id_from_gateway;


// 			$order1 = $this->model_checkout_order->getOrder($order_id_from_gateway);

// 			echo '<br>';
// 			echo '<pre>';
// 			print_r($order1);


// 			echo 'BEFORE';
            $this->model_checkout_order->addOrderHistory($order_id_from_gateway, 5, 'History test.', true);
// 			echo 'AFTER';

// 			echo '<br>';
// 			echo 'addOrderHistory...';
// 			echo '<br>';


// 			$order2 = $this->model_checkout_order->getOrder($order_id_from_gateway);

// 			echo '<br>';
// 			echo '<pre>';
// 			print_r($order2);


            $this->response->redirect($this->url->link('checkout/success', '', 'SSL'));

        } else {
            echo '<br>';
            echo 'else';

            $this->response->redirect($this->url->link('checkout/checkout', '', 'SSL'));  // notify about problem!!
        }
    }
}