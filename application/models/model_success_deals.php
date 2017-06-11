<?php


class Model_success_deals extends CI_Model{
    
    private $_v_deal_date = 'v_deal_data d';
    private $_v_user_clients = 'v_user_clients c';

    public function __construct() {
        parent::__construct();
        
    }
    
    public function get_success_deals()
    {
        /*
         * this function get the success deal when the sales give the deals status 4 
         * stataus 4 means the deal is success
         */
        $this->db->select('*');
        $this->db->from($this->_v_deal_date);
        $this->db->join('StockTable c', 'd.deal_id = c.deal_id', 'left');
        
        $this->db->where(array('d.deal_status' => 4, 'd.is_confirmed' => 0));
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }
    
    // get the success and confirmed deals
    public function get_confirmed_deals()
    {
        /*
         * this function get the confirmed of success deals
         */
        $this->db->select('*');
        $this->db->from($this->_v_deal_date);
        $this->db->join($this->_v_user_clients, 'd.deal_id = c.deal_id', 'left');
        $this->db->where(array('d.deal_status' => 4, 'd.is_confirmed' => 1));
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
            return $query->result();
        }
        return FALSE;
    }


    // add a success deal
    public function add_success_deal()
    {
        $deal_id = $this->input->get('deal_id'); // deal id
        $property_id = $this->input->get('property_id');
        $sold_status = 9;
        $deal_price = $this->input->get('deal_price'); // the price of the property
        $deal_comm_amount = $this->input->get('deal_comm_amount'); // the money of the deal
        $sales_comm_amount = $this->input->get('sales_comm_amount'); // the money commission of sales
        $sales_share_comm = $this->input->get('sales_share_comm'); // array of % foreach sales
        $sales_name = $this->input->get('sales_name'); // array of sales who share the commission
        $sales_share_amount = $this->input->get('sales_share_amount'); // array of money foreach sales
        
        // start the transaction
        $this->db->trans_start();
        // 1. confirm the deal 
        $this->model_deals->confirm_deal($deal_id, $deal_price,$deal_comm_amount, $sales_comm_amount );
        // 2. add the commission for the sales 
        for($i = 0; $i < sizeof($sales_name); $i++)
        {
            $sales = $sales_name[$i];
            if ($sales != 0) {
                $comm_percentage = $sales_share_comm[$i] / 100;
                $this->model_deals->add_deal_sales_comm($deal_id, $sales,$comm_percentage,$sales_share_amount[$i]);                
            }
        }
        
        // 3. update the property status
        $this->model_property->update_property_status($property_id, $sold_status);
        // end the transaction 
        $this->db->trans_complete();
        
        
    } // end of success deal
    
    
    
    
}
