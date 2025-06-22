<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use App\Service\WorkflowService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RevertController extends Controller
{
    protected $workflowService;
    public function __construct(WorkflowService $workflowService)
    {
        $this->workflowService = $workflowService;
    }
    public function index(){
        // Query hanya akan dijalankan jika $docGroup tidak kosong
        $ajuan = Dummy::with(['document.ajuanType']) // Load relasi 'documents' dan 'ajuanType'
            ->where('sekertaris_id', Auth::id())
            ->whereIn('doc_status', ['new_proposal', 'process', 'on-review'])
            ->get();

        return view('pages.revert.sekertaris.index', compact('ajuan'));
    }

    public function reset($id) : RedirectResponse
    {
        $this->workflowService->resetProgress($id);
        return redirect()->back()->with('success', 'Status berhasil di-reset.');
    }
}
