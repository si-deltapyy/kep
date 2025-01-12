<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Feedback;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of review that grouped from dummy_id.
     */
    public function index()
    {

        $pesan = Feedback::where('receiver_id', Auth::id())
        ->when(Auth::user()->hasRole('sekertaris'), function ($query) {
            // Tambahkan kondisi `is_review` untuk role `sekretaris`
            return $query->whereHas('dummy', function ($subQuery) {
                $subQuery->where('review_status', 1);
            });
        })
        ->get()
        ->groupBy('dummy_id')
        ->map(function ($group) {
            return $group->first();
        });

        return view('pages.pesan.sekertaris.index', [
            'pesan' => $pesan,
        ]);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created message in storage.
     */

    public function store(Request $request)
    {


        $validated = $request->validate([
            'doc_id' => 'required|exists:document,id',
            'dummy_id' => 'required|string',
            'reviewer_id' => 'required|exists:user,id',
            'message' => 'required|string',
            'receiver_id' => 'required|exists:user,id',
        ]);


        try {

            Feedback::create([
                'document_id' => $validated['doc_id'],
                'dummy_id' => $validated['dummy_id'],
                'reviewer_id' => $validated['reviewer_id'],
                'message' => $validated['message'],
                'created_at' => now(),
                'updated_at' => now(),

                'sender_id' => Auth::id(),
                'receiver_id' => $request->receiver_id,
                'sender_role' => Auth::user()->getRoleNames()->first(),
                'receiver_role' => User::find($request->receiver_id)->getRoleNames()->first(),
                'message' => $request->message,
            ]);

            $updated = Submission::where('log_id', $validated['doc_id'])
                     ->where('reviewer', Auth::id())
                     ->update(['reviewer_status' => 'done']);

            return redirect()->back()->with('success', 'Message successfully assigned.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to assign message. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $dummy_id)
    {
        // Ambil data berdasarkan dummy_id
        $rawDocuments = Feedback::where('receiver_id', Auth::id())
        ->where('dummy_id', $dummy_id)
        ->get()
        ->groupBy('document_id');

        //Order paling baru
        $documents = $rawDocuments->map(function ($group) {
            return $group->sortByDesc('created_at');
        });

        // Ambil reviewer_id
        $reviewerIds = $documents->flatten()->pluck('reviewer_id')->unique();
        $reviewers = User::whereIn('id', $reviewerIds)->pluck('name', 'id');

        if ($documents->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk dummy_id: ' . $dummy_id);
        }

        // Kirim data ke view
        return view('pages.pesan.show', [
            'documents' => $documents,
            'dummy_id' => $dummy_id,
            'reviewers' => $reviewers,
        ]);
    }

    /**
     * Membaca feedback
     */
    public function detail(string $id)
    {
        //Admin hanya 1 jadi aku ambil first langsung
        $admin = User::role('admin')->first();
        $pesan = Feedback::find($id);

        $reviewerEmail = User::where('id', $pesan->reviewer_id)
            ->pluck('email', 'id');

        $reviewerName = User::where('id', $pesan->reviewer_id)
            ->pluck('name', 'id');

        if (!$pesan) {
            return redirect()->back()->with('error', 'Pesan tidak ditemukan.');
        }

        return view('pages.pesan.detail', [
            'pesan' => $pesan,
            'reviewerEmail' => $reviewerEmail,
            'reviewerName' => $reviewerName,
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
