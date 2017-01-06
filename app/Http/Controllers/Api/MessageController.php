<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;

class MessageController extends Controller
{
	/**
	 * Create new message
	 * @return JSON 
	 */
    
    function readMessage(Request $request){
    	$message = Message::find( $request->input('id') );
    	if($message){
    		$rs = $message->update(['status' => 1]);
    		if($rs)
    			return response()->json('Update success', 200);
    		else
    			return response()->json('Update error', 200);
    	}else{
    		return response()->json('Message not found', 401);
    	}
    }

}
