<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function sendpost()
    {
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('POST', 'http://127.0.0.1:8001/api/test', 
        //   ['body' => ['client_id' => $client_id, 'service_id' => $service_id, 'date' => $date]]);
        // $json = $response->getBody();
        // $json = json_decode($json, true);

        // return response()->json([
        //     'data' => $json['data']
        // ], 200);
    }

    public function create()
    {
        return view('createtest');    
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
