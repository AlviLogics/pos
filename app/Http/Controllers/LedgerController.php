<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\JournalEntry;
use App\Models\ChartOfAccount;
use DB;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    public function index(){
        $data['sideMenu'] = 'vendor';
        // Retrieve all journal entries
    //$journalEntries = JournalEntry::orderBy('date')->get();

        // Retrieve all journal entries with account names
        $journalEntries = DB::table('journal_entries')
            ->join('chart_of_accounts', 'journal_entries.chart_of_account_id', '=', 'chart_of_accounts.id')
            ->select('journal_entries.*', 'chart_of_accounts.name as account_name')
            ->orderBy('journal_entries.date')
            ->get();


        return view('ledgers.journal_entries_ledger', compact('journalEntries', 'data'));

    }
    public function showJournalEntries()
    {
        // Retrieve all journal entries
        $journalEntries = JournalEntry::orderBy('date')->get();

        return view('ledgers.journal_entries_ledger', compact('journalEntries'));
    }

    public function showVendorLedger($vendorId)
    {
        // Retrieve the vendor
        $data['sideMenu'] = 'vendor';
        $vendor = Vendor::findOrFail($vendorId);
        //dd($vendor);
        $account = ChartOfAccount::findOrFail($vendor->account_id);

        // Retrieve ledger entries for the vendor (assuming you have a relationship set up)
        $ledgerEntries = $account->ledgerEntries()->orderBy('date')->get();
//dd($ledgerEntries);
        // Calculate balance
        $balance = 0;
        //dd($ledgerEntries);
        foreach ($ledgerEntries as $entry) {
            if($entry->type == 'credit'){
                $balance -=  $entry->credit;
            }else{
                $balance += $entry->debit;
            }

            $entry->balance = $balance;
        }

        return view('ledgers.vendor', compact('account', 'ledgerEntries', 'vendor', 'data'));
    }
}
