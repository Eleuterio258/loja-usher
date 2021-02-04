<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * M-Pesa service class
     *
     * @var \CalvinChiulele\MPesaMz\Services\MPesaMz
     */
    protected $mpesaService;

    /**
     * Create a new instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->mpesaService = app('CalvinChiulele\MPesaMz\Services\MPesaMz');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reference = 17666;
        $thirdPartyReference = 6644;
        $payment = $this->mpesaService->payment($request->msisdn, 100, $reference, $thirdPartyReference);

        $refund = $this->mpesaService->refund($payment->getTransactionID(), 100);

        $query = $this->mpesaService->query($refund->getTransactionID());
    }
}
