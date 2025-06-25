<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
#    public function index(): string
#   {
#       return view('v_home');
#  }
#
#   public function faq(): string
#  {
#     return view('v_faq');
#}

    protected $product;
    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new Productmodel();
    }

    public function index()
    {
        $product = $this->product->findALL();
        $data['product'] = $product;

        return view('v_home', $data);
    }

    public function faq(): string
    {
        return view('v_faq');
    }

}
