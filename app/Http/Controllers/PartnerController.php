<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function add(Request $request){
        $partner = Partner::create([
            'image' => '',
            'url' => $request->url
        ]);

        $image = $request->file('image');
        $image -> move('images/partner/', time().'.'.$image->getClientOriginalExtension());
        $partner -> image = time().'.'.$image->getClientOriginalExtension();
        $partner -> save();

        return back()->with('message', 'Partner telah ditambahkan');
    }

    public function hapus($id){
        $partner = Partner::findOrFail($id);
        $tumb = 'images/partner/';
        File::delete($tumb.$partner->image);
        $partner -> delete();
        return back()->with('message', 'Partner berhasil dihapus');
    }
}
