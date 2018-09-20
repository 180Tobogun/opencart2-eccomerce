<?php

/**
 * Class ControllerExtensionPaymentECC
 */
class ControllerExtensionPaymentECC extends Controller
{
    /**
     * @var array
     */
    private $error = array();

    /**
     *
     */
    public function index()
    {
        $this->load->language('extension/payment/ecc');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('ecc', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_all_zones'] = $this->language->get('text_all_zones');

        $data['entry_email'] = $this->language->get('entry_email');
        $data['entry_total'] = $this->language->get('entry_total');
        $data['entry_order_status'] = $this->language->get('entry_order_status');
        $data['entry_pending_status'] = $this->language->get('entry_pending_status');
        $data['entry_canceled_status'] = $this->language->get('entry_canceled_status');
        $data['entry_failed_status'] = $this->language->get('entry_failed_status');
        $data['entry_chargeback_status'] = $this->language->get('entry_chargeback_status');
        $data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $data['entry_mb_id'] = $this->language->get('entry_mb_id');
        $data['entry_secret'] = $this->language->get('entry_secret');
        $data['entry_custnote'] = $this->language->get('entry_custnote');

        $data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
        $data['entry_terminal_id'] = $this->language->get('entry_terminal_id');
        $data['entry_load_pem_file'] = $this->language->get('entry_load_pem_file');
        $data['entry_load_pub_file'] = $this->language->get('entry_load_pub_file');

        $data['entry_delete'] = $this->language->get('entry_delete');

        $data['help_total'] = $this->language->get('help_total');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['email'])) {
            $data['error_email'] = $this->error['email'];
        } else {
            $data['error_email'] = '';
        }

        if (isset($this->error['merchant_id'])) {
            $data['error_merchant_id'] = $this->error['merchant_id'];
        } else {
            $data['error_merchant_id'] = '';
        }

        if (isset($this->error['terminal_id'])) {
            $data['error_terminal_id'] = $this->error['terminal_id'];
        } else {
            $data['error_terminal_id'] = '';
        }
        /**
         * @param $this ->delete
         */
        if (isset($this->error['delete'])) {
            $data['success_delete'] = $this->error['delete'];
        } else {
            $data['success_delete'] = '';
        }
        /**
         *
         */

        /**
         * @param get ->file
         */
        if (isset($this->error['ecc_load_pem_file'])) {
            $data['success_read_file'] = $this->error['ecc_load_pem_file'];
        } else {
            $data['success_read_file'] = '';
        }

        /**
         *
         */
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/payment/ecc', 'token=' . $this->session->data['token'], true)
        );

        $data['action'] = $this->url->link('extension/payment/ecc', 'token=' . $this->session->data['token'], true);

        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true);

        /*
                if (isset($this->request->post['ecc_email'])) {
                    $data['ecc_email'] = $this->request->post['ecc_email'];
                } else {
                    $data['ecc_email'] = $this->config->get('ecc_email');
                }

                if (isset($this->request->post['ecc_secret'])) {
                    $data['ecc_secret'] = $this->request->post['ecc_secret'];
                } else {
                    $data['ecc_secret'] = $this->config->get('ecc_secret');
                }

                if (isset($this->request->post['ecc_total'])) {
                    $data['ecc_total'] = $this->request->post['ecc_total'];
                } else {
                    $data['ecc_total'] = $this->config->get('ecc_total');
                }

                if (isset($this->request->post['ecc_order_status_id'])) {
                    $data['ecc_order_status_id'] = $this->request->post['ecc_order_status_id'];
                } else {
                    $data['ecc_order_status_id'] = $this->config->get('ecc_order_status_id');
                }

                if (isset($this->request->post['ecc_pending_status_id'])) {
                    $data['ecc_pending_status_id'] = $this->request->post['ecc_pending_status_id'];
                } else {
                    $data['ecc_pending_status_id'] = $this->config->get('ecc_pending_status_id');
                }

                if (isset($this->request->post['ecc_canceled_status_id'])) {
                    $data['ecc_canceled_status_id'] = $this->request->post['ecc_canceled_status_id'];
                } else {
                    $data['ecc_canceled_status_id'] = $this->config->get('ecc_canceled_status_id');
                }

                if (isset($this->request->post['ecc_failed_status_id'])) {
                    $data['ecc_failed_status_id'] = $this->request->post['ecc_failed_status_id'];
                } else {
                    $data['ecc_failed_status_id'] = $this->config->get('ecc_failed_status_id');
                }

                if (isset($this->request->post['ecc_chargeback_status_id'])) {
                    $data['ecc_chargeback_status_id'] = $this->request->post['ecc_chargeback_status_id'];
                } else {
                    $data['ecc_chargeback_status_id'] = $this->config->get('ecc_chargeback_status_id');
                }

                $this->load->model('localisation/order_status');

                $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

                if (isset($this->request->post['ecc_geo_zone_id'])) {
                    $data['ecc_geo_zone_id'] = $this->request->post['ecc_geo_zone_id'];
                } else {
                    $data['ecc_geo_zone_id'] = $this->config->get('ecc_geo_zone_id');
                }

                $this->load->model('localisation/geo_zone');

                $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
        */
        if (isset($this->request->post['ecc_status'])) {
            $data['ecc_status'] = $this->request->post['ecc_status'];
        } else {
            $data['ecc_status'] = $this->config->get('ecc_status');
        }
        /*
                if (isset($this->request->post['ecc_sort_order'])) {
                    $data['ecc_sort_order'] = $this->request->post['ecc_sort_order'];
                } else {
                    $data['ecc_sort_order'] = $this->config->get('ecc_sort_order');
                }
        */
        if (isset($this->request->post['ecc_merchant_id'])) {
            $data['ecc_merchant_id'] = $this->request->post['ecc_merchant_id'];
        } else {
            $data['ecc_merchant_id'] = $this->config->get('ecc_merchant_id');
        }

        if (isset($this->request->post['ecc_terminal_id'])) {
            $data['ecc_terminal_id'] = $this->request->post['ecc_terminal_id'];
        } else {
            $data['ecc_terminal_id'] = $this->config->get('ecc_terminal_id');
        }
        /**
         * @param $file
         */
        if (isset($this->request->post['ecc_load_pem_file'])) {
            $data['ecc_load_pem_file'] = $this->request->post['ecc_load_pem_file'];
        } else {
            $data['ecc_load_pem_file'] = $this->config->get('ecc_load_pem_file');
        }

        if (isset($this->request->post['ecc_load_pub_file'])) {
            $data['ecc_load_pub_file'] = $this->request->post['ecc_load_pub_file'];
        } else {
            $data['ecc_load_pub_file'] = $this->config->get('ecc_load_pub_file');
        }
        /**
         * @param $delete
         */

        if (isset($this->request->post['ecc_delete'])) {
            $data['ecc_delete'] = $this->request->post['ecc_delete'];
        } else {
            $data['ecc_delete'] = $this->config->get('ecc_delete');
        }
        /**
         *
         */
        /*
                if (isset($this->request->post['ecc_rid'])) {
                    $data['ecc_rid'] = $this->request->post['ecc_rid'];
                } else {
                    $data['ecc_rid'] = $this->config->get('ecc_rid');
                }

                if (isset($this->request->post['ecc_custnote'])) {
                    $data['ecc_custnote'] = $this->request->post['ecc_custnote'];
                } else {
                    $data['ecc_custnote'] = $this->config->get('ecc_custnote');
                }
        */
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/ecc', $data));
    }

    /**
     * @param $mess
     */
    protected function showAlert($mess)
    {

        echo '<script language="javascript">';
        echo 'alert("' . $mess . '")';
        echo '</script>';
    }

    /**
     * @return bool
     */
    protected function validate()
    {

        /*
        if (!$this->user->hasPermission('modify', 'extension/payment/ecc')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['ecc_email']) {
            $this->error['email'] = $this->language->get('error_email');
        }
        */

        if (!$this->request->post['ecc_merchant_id']) {
            $this->error['merchant_id'] = $this->language->get('error_merchant_id');
        }

        if (!$this->request->post['ecc_terminal_id']) {
            $this->error['terminal_id'] = $this->language->get('error_terminal_id');
        }

//        if (!$this->request->post['ecc_delete']) {
//            $this->error['delete'] = $this->language->get('success_delete');
//        }

        return !$this->error;
    }

//    public function delete()
//    {
//        $files = array(
//
//        );
//    }
}