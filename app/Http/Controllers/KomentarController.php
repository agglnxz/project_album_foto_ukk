<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store_comments(string $id,Request $request)
    {
        Komentar::create([
            'user_id' => Auth::user()->id,
            'foto_id' => $id,
            'isi_komentar' => $request->isi_komentar
        ]);

        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $comments=Komentar::find($id);
        // $comments->isi_komentar =$request->isi_komentar;
        // $comments->save();

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $comments=Komentar::find($id);
        // $comments->delete();

        // return redirect()->back();
    }
}
