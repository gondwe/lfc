<?php 

class Middleroutes extends CI_Model {

    public function index(){
        $mx = [];

        switch(strtolower($this->uri->segment(1))){
            case "finance" : 
            $mx = [
                'finance/index'=>'DASHBOARD',
                'finance/transactions'=>'TRANSACTIONS',
                'finance/items'=>'ITEMS',
            ];
            break;
            case "patient" : 
            $mx = [
                'patient/profile'=>'PROFILE',
                'patient/svc/prescription'=>'PRESCRIPTION',
                'patient/svc/diagnosis'=>'DIAGNOSIS',
                'patient/svc/billing'=>'BILLING',
            ];
            break;
            case "auth" : 
            $mx = [
                'systems/admin'=>'DASHBOARD',
                'auth'=>'USERS',
                'auth/create_group'=>'GROUPS',
                'auth/create_group'=>'GROUPS',
                'systems/access_control'=>'ACCESS CONTROL',
            ];
            break;
            case "systems" : 
            $mx = [
                'auth'=>'USERS & GROUPS',
                'systems/audit_trail'=>'LOGS',
            ];
            break;
            
            case "chaplain" : 
            $mx = [
                'chaplain'=>'DASHBOARD',
                'chaplain/religion'=>'RELIGIONS',
            ];
            break;

            default : 
            $mx = [
                '/'=>"DASHBOARD",
                'finance/index'=>"SALES LIST",
                // 'cbcmstat'=>"CBM STATISTICS",
            ]; 
            break;
        }

        return $mx;

    }
}