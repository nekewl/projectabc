<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
class ProfileController extends APIController
{
    function __construct(){
    	$this->model = new Profile();
      $this->notRequired = array(
        'email', 'profile', 'employment_code', 'first_name', 'last_name', 'middle_name',
        'birth_date', 'sex', 'contact_number', 'address', 'position',
        'department', 'emergency_contact_name', 'emergency_contact_number', 'signature'
      );
    }

    public function checkIfExist($email, $firstName, $lastName){
      $result = Profile::where('email', '=', $email)->where('first_name', '=', $firstName)->where('last_name', '=', $lastName)->get();
      return (sizeof($result) > 0) ? $profile[0] : null;
    }

    public function updateFromController($data){
      $this->model = new Profile();
      $this->updateDB($data);
      return $this->response['data'];
    }

    public function createFromController($data){
      $this->model = new Profile();
      $this->insertDB($data);
      return $this->response['data'];
    }
}
