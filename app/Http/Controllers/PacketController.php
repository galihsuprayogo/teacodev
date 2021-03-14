<?php

namespace teaco\Http\Controllers;

use teaco\Packet;
use Illuminate\Database\Eloquent\Collection;
use teaco\Http\Controllers\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPacket()
    {
        return View('admin.Admin_CreatePacket');
    }

    public function createPacket(Request $request)
    {
        Packet::create([
            'packet_name' => $request->packetname,
        ]);

        return redirect('/viewpacket')->with('success', 'create new packet success');
    }

    public function getPacket()
    {
        $packets = Packet::paginate(10);

        return View('admin.Admin_ViewPacket', compact('packets'));
    }

    public function deletePacket($packet_id)
    {
        Packet::find($packet_id)->delete();
        return redirect('/viewpacket')->with('success', 'delete packet success');
    }
}
 