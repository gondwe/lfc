<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Search
 *
 * @author   ace
 * @date 26th Rab.Awwal, 1437A.H (Jan. 7th, 2016)
 */

class Search extends CI_Controller{
    protected $value;

    public function __construct() {
        parent::__construct();

        //$this->gen->checklogin();

        $this->genlib->ajaxOnly();

        $this->load->model(['transaction', 'item', 'productGroup', 'priority', 'product', 'region', 'platform', 'customer']);

        $this->load->helper('text');

        $this->value = $this->input->get('v', TRUE);
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */


    public function index(){
        /**
         * function will call models to do all kinds of search just to check whether there is a match for the searched value
         * in the search criteria or not. This applies only to global search
         */



        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function productSearch(){
        $data['allItems'] = $this->product->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('products/productslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function productGroupSearch(){
        $data['allItems'] = $this->productGroup->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('productGroups/groupslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function prioritySearch(){
        $data['allItems'] = $this->priority->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('priority/prioritieslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function regionSearch(){
        $data['allItems'] = $this->region->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('regions/regionslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function platformSearch(){
        $data['allItems'] = $this->platform->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('platforms/platformslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
    public function customerSearch(){
        $data['allItems'] = $this->customer->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('customers/customerslisttable', $data, TRUE) : "No match found {$this->value}";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */


    public function itemSearch(){
        $data['allItems'] = $this->item->itemsearch($this->value);
        $data['sn'] = 1;

        $json['itemsListTable'] = $data['allItems'] ? $this->load->view('items/itemslisttable', $data, TRUE) : "No match found";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */



    public function transSearch(){
        $data['allTransactions'] = $this->transaction->transsearch($this->value);
        $data['sn'] = 1;

        $json['transTable'] = $data['allTransactions'] ? $this->load->view('transactions/transtable', $data, TRUE) : "No match found";

        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }


    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    public function otherSearch(){


        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }


    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */

    /*
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    ********************************************************************************************************************************
    */
}