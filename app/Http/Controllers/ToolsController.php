<?php

namespace App\Http\Controllers;

use App\Models\GlobalConfig;
use App\Models\ToolIpHistory;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToolsController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function IpFinder(Request $request)
    {
        $datas = collect([]);
        if(!empty($request->all()) && $request->has('ip') && $request->get('ip') != ''){
            $history = ToolIpHistory::where('ip', $request->ip)->first();
            if($history){
                $datas = collect(json_decode($history->response, true));
            }else{
                $token = GlobalConfig::where('key','findip_token')->first()->value;
                $response = Http::get("https://api.findip.net/{$request->ip}/?token={$token}");
                $datas = collect($response->json());
                ToolIpHistory::create([
                    'ip' => $request->ip,
                    'response' => json_encode($response->json())
                ]);
            }
        }
        return view('tools.ip-finder', compact('datas'));
    }
}
