<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dropdown extends CI_Controller
{
    private $_tableState = 'state';
    private $_tableArea = 'area';
    private $_tableBuildingType = 'lkp_building_type';
    private $_tableFinishing = 'lkp_finishing';
    private $_tableGuage = 'lkp_gauge';
    private $_tablePropertyType = 'lkp_property_type';
    private $_tablePaymentMethod = 'lkp_payment_method';
    private $_tableTowerSide = 'lkp_tower_side';
    private $_tableLkpNotificationType = 'lkp_notification_type';
    private $_tableLkpFollowUp = 'lkp_follow_up_type';
    private $_tableLkpDealStatus = 'lkp_deal_status';
    private $_tableTower = 'tower';
    private $_User = 'user';
    private $_role = 'user_role';



    // the state of address
    public function ddlState()
    {
        $state = $this->model_db->read($this->_tableState, array('state_id', 'state_name'), array('is_displayed' => 1));
         echo json_encode($state);
    }
    
    // the area of address
    public function ddlArea($state_id)
    {
        $area = $this->model_db->read($this->_tableArea, array('area_id', 'area_name'), array('state_id' => $state_id,'is_displayed' => 1));
        echo json_encode($area);
    }
    
    // building type of property
    public function ddlBuildingType()
    {
        $building = $this->model_db->read($this->_tableBuildingType, array('building_type', 'building_name'));
        echo json_encode($building);
    }
    
    // the finishing of property
    public function ddlFinishing()
    {
        $finishing = $this->model_db->read($this->_tableFinishing, array('finishing_id', 'finishing_name'));
        echo json_encode($finishing);
    }
    
    // get the guage
    public function ddlGauge()
    {
        $gauge = $this->model_db->read($this->_tableGuage, array('gauge_id','gauge_name'));
        echo json_encode($gauge);
    }
    
    // get the property type
    public function ddlPropertyType()
    {
        $propertyType = $this->model_db->read($this->_tablePropertyType, array('property_type', 'property_type_name'));
        echo json_encode($propertyType);
    }
    
    public function ddlPaymentMethod()
    {
        $paymentMethod = $this->model_db->read($this->_tablePaymentMethod, array('payment_method', 'method_name'));
        echo json_encode($paymentMethod);
    }
    
    public function ddlTowerSide()
    {
        $tower_side = $this->model_db->read($this->_tableTowerSide, array('tower_side', 'tower_side_name'));
        echo json_encode($tower_side);
    }
    
    public function ddlNotificationType()
    {
        $notification_type = $this->model_db->read($this->_tableLkpNotificationType, array('notification_type', 'notification_name'));
        echo json_encode($notification_type);
    }
    
    public function ddlFollowUpType()
    {
        $follow_type = $this->model_db->read($this->_tableLkpFollowUp, array('follow_up_type', 'follow_up_name'));
        echo json_encode($follow_type);
    }
    
    public function ddlDealStatus()
    {
        $deal_status = $this->model_db->read($this->_tableLkpDealStatus, array('deal_status', 'status_name'));
        echo json_encode($deal_status);
    }
    
    public function ddlTowers()
    {
        $towers = $this->model_db->read($this->_tableTower, array('tower_id', 'tower_name'));
        echo json_encode($towers);
    }
    
    public function ddlUsers()
    {
        $users = $this->model_db->read($this->_User, array('user_id', 'username'), array('role_id'=>3));
        echo json_encode($users);
    }
    
    public function ddlRole()
    {
        $Roles = $this->model_db->read($this->_role, array('role_id', 'role_name'));
        echo json_encode($Roles);
    }
    
}