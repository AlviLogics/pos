<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $data['sideMenu'] = 'account';
        $accounts = Account::all();
        return view('accounts.index', compact('accounts', 'data'));
    }

    public function create()
    {
        $data['sideMenu'] = 'account';
        return view('accounts.create', compact( 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:asset,liability,equity,revenue,expense',
        ]);

        Account::create($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:asset,liability,equity,revenue,expense',
        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully!');
    }
}