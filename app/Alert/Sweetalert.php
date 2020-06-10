<?php

namespace App\Alert;

use RealRashid\SweetAlert\Facades\Alert;

class Sweetalert{

    public function alert(){
        
        if(session('success')){
            Alert::success('success',session('success'));
        }
    }
}