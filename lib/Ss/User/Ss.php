<?php
/**
 * User Shadowsocks  info Class
 */
namespace Ss\User;

class Ss {
    //
    public  $uid;
    public $db;
    
    public $data_array;

    function  __construct($uid=0){
        global $db;
        $this->uid = $uid;
        $this->db  = $db;
        $datas = $this->db->select("user","*",[
            "uid" => $this->uid,
            "LIMIT" => "1"
        ]);
        $this->data_array = $datas['0'];
    }

    //user info array
    function get_user_info_array(){
        /* if (!isset($data_array)){
            $datas = $this->db->select("user","*",[
                "uid" => $this->uid,
                "LIMIT" => "1"
            ]);
            $this->data_array = $datas['0'];
        } */
        return $this->data_array;
    }

    //返回端口号
    function  get_port(){
         return $this->get_user_info_array()['port'];
    }

    //获取流量
    function get_transfer(){
        return $this->get_user_info_array()['u']+$this->get_user_info_array()['d'];
    }

    //返回密码
    function  get_pass(){
        return $this->get_user_info_array()['passwd'];
    }

    //返回Plan
    function  get_plan(){
        return $this->get_user_info_array()['plan'];
    }

    //返回transfer_enable
    function  get_transfer_enable(){
        return $this->get_user_info_array()['transfer_enable'];
    }

    //get money
    function  get_money(){
        return $this->get_user_info_array()['money'];
    }

    //get unused traffic
    function unused_transfer(){
        //global $dbc;
        return $this->get_transfer_enable() - $this->get_transfer();
    }

    //get last time
    function get_last_unix_time(){
        return $this->get_user_info_array()['t'];
    }

    //get last check in time
    function get_last_check_in_time(){
        return $this->get_user_info_array()['last_check_in_time'];
    }

    //check is able to check in
    function is_able_to_check_in(){
        $now = time();
        if( $now-$this->get_last_check_in_time() > 3600*22 ){
            return 1;
        }else{
            return 0;
        }
    }

    //update last check_in time
    function update_last_check_in_time(){
        $now = time();
        $this->db->update("user",[
            "last_check_in_time" => $now
        ],[
            "uid" => $this->uid
        ]);
    }

    //add transfer 添加流量
    function  add_transfer($transfer=0){
        $transfer = $this->get_transfer_enable()+$transfer;
        $this->db->update("user",[
            "transfer_enable" => $transfer
        ],[
            "uid" => $this->uid
        ]);
    }

    //add money
    function add_money($uid,$money){
        $money = $this->get_money()+$money;
        $this->db->update("user",[
            "money" => $money
        ],[
            "uid" => $uid
        ]);
    }

    //update ss pass
    function update_ss_pass($pass){
        $this->db->update("user",[
            "passwd" => $pass
        ],[
            "uid" => $this->uid
        ]);
    }

}
