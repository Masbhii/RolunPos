<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function stepPertama(Request $request)
    {
        $reservasi = $request->session()->get('reservasi');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservasi.step-pertama', compact('reservasi', 'min_date', 'max_date'));
    }

    public function storeStepPertama(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'nomor_telp' => ['required'],
            'tanggal_reservasi' => ['required', 'date', new DateBetween, new TimeBetween],
            'nomor_meja' => ['required'],
            'kapasitas_meja' => ['required'],
            'lantai' => ['required'],
        ]);

        if (empty($request->session()->get('reservasi'))) {
            $reservasi = new Reservasi();
            $reservasi->fill($validated);
            $request->session()->put('reservasi', $reservasi);
        } else {
            $reservasi = $request->session()->get('reservasi');
            $reservasi->fill($validated);
            $request->session()->put('reservasi', $reservasi);
        }

        return to_route('reservasi.step.kedua');
    }
    public function stepKedua(Request $request)
    {
        $reservasi = $request->session()->get('reservasi');
        $res_table_ids = Reservasi::orderBy('tanggal_reservasi')->get()->filter(function ($value) use ($reservasi) {
            return $value->tanggal_reservasi->format('Y-m-d') == $reservasi->tanggal_reservasi->format('Y-m-d');
        })->pluck('table_id');
        $tables = Table::where('status', TableStatus::Avalaiable)
            ->where('no_meja', '>=', $reservasi->no_meja)
            ->whereNotIn('id', $res_table_ids)->get();
        return view('reservasi.step-two', compact('reservasi', 'tables'));
    }

    public function storeStepKedua(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservasi = $request->session()->get('reservasi');
        $reservasi->fill($validated);
        $reservasi->save();
        $request->session()->forget('reservasi');

        return to_route('Terima Kasih');
    }
}