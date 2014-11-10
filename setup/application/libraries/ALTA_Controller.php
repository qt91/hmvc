<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ALTA_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();

        $data = array();

        $result = $this->is_logged_in();
        if(!$result){
            redirect('login');
        }
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('user_data');
        if($user)
            return true;
        else
            return false;
    }

    public function get_full_address($province_id, $district_id = 0, $ward_id = 0){
        $this->load->model('ajax/mdl_provinces');
        $full_address = '';

        $province = $this->mdl_provinces->get_detail_province($province_id);

        if($province){
            $full_address = $province['province_type'].' '.$province['province_name'];
        }
        if($district_id){
            $district = $this->mdl_provinces->get_detail_district($district_id);
            if($district)
                $full_address = $district['district_type'].' '.$district['district_name'].', '.$full_address;
        }
        if($ward_id){
            $ward = $this->mdl_provinces->get_detail_ward($ward_id);
            if($ward)
                $full_address = $ward['ward_type'].' '.$ward['ward_name'].', '.$full_address;
        }

        return $full_address;
    }

    public function calc_age($dob){
        return date_create($dob)->diff(date_create('today'))->y;
    }
}

?>