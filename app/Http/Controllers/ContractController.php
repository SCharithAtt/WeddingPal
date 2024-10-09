<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contract;
use App\Models\Vendor;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContractController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        if ($user->hasRole('vendor')) {
            $vendor = Vendor::where('user_id', auth()->id())->first();
            $contracts = Contract::where('vendor_id', $vendor->id)->get();

            return Inertia::render('Vendor/Contracts/Index', [
                'contracts' => $contracts,
            ]);

        } elseif ($user->hasRole('client')) {
            $client = Client::where('user_id', auth()->id())->first();
            $contracts = Contract::where('client_id', $client->id)->get();

            return Inertia::render('Client/Contracts/Index', [
                'contracts' => $contracts,
            ]);
        } else {
            //forbidden error
            abort(403);
        }
    }

    public function store(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $client_id = Client::where('user_id', auth()->id())->first()->id;
        $wedding_id = Wedding::where('client_id', $client_id)->first()->id;
        Contract::create(
            [
                'vendor_id' => $vendor_id,
                'client_id' => $client_id,
                'wedding_id' => $wedding_id,
            ]
        );

        dd('Still at the store method');
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'vendor_confirm' => 'boolean',
            'client_confirm' => 'boolean',
        ]);

        $contract->update($request->all());

        return redirect()->back()->with('success', 'Contract updated successfully!');
    }

    public function edit(Contract $contract)
    {
        $user = auth()->user();
        if ($user->hasRole('vendor')) {
            return Inertia::render('Vendor/Contracts/Edit', [
                'contract' => $contract,
            ]);
        } elseif ($user->hasRole('client')) {
            return Inertia::render('Client/Contracts/Edit', [
                'contract' => $contract,
            ]);
        } else {
            //forbidden error
            abort(403);
        }
    }
}
