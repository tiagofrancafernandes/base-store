<?php

namespace App\Http\Controllers;

use App\CallbackPicPay;
use Illuminate\Http\Request;

class CallbackGatewayController extends Controller
{
    function indexCallback(Request $request)
    {
        $logs = CallbackPicPay::paginate(50);
        return response()->json($logs, 200);
    }

    function storeCallback(Request $request)
    {
        $data = [
            'referenceId'   => $request->referenceId,
            'authorizationId'   => $request->authorizationId.date('His')
        ];
        $cg = new CallbackPicPay($data); $cg->save();//Insere novos
        /*
        //Atualiza se existir, se não existir cria
        $cg = CallbackPicPay::updateOrCreate(
            ['referenceId' => $data['referenceId']],
            ['authorizationId' => $data['authorizationId']]
        );
        */
        return response()->json($data, 200);
    }

    function deleteCallBackLog($id)
    {
        $cb_log = CallbackPicPay::find($id);

        $status = false;

        if($cb_log)
            $status = ($cb_log->delete());

        return response()->json(['success' => $status], 200);
    }
}
