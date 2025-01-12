<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dummy;
use App\Models\Pesan;
use App\Models\Message;
use App\Models\Document;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;




    /**
     * message page logic//
     *step 1 = get data by grouping dummy_id
     *step 2 = get data by grouping document_id
     *step 3 = get data by checking if document_id on page = document id then foreach for each reviewer
     *step 4 = show message from each reviewer
     */

class MessageController extends Controller
{
    /**
     * Display a listing of review that grouped from dummy_id.
     */
    public function index()
    {
        $pesan = Pesan::all()->groupBy('dummy_id')->map(function ($group) {
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
     * Menyimpan Pesan untuk setiap dokumen yang telah direview
     */

    public function store(Request $request)
    {

        //butuh sekeretaris id biar sekre bias tau mana yng chatnya mana yang bukan

        $validated = $request->validate([
            'doc_id' => 'required|exists:document,id',
            'dummy_id' => 'required|string',
            'reviewer_id' => 'required|exists:user,id',
            'review' => 'required|string',
        ]);

        try {

            Pesan::create([
                'document_id' => $validated['doc_id'],
                'dummy_id' => $validated['dummy_id'],
                'reviewer_id' => $validated['reviewer_id'],
                'review' => $validated['review'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);


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
        $documents = Pesan::where('dummy_id', $dummy_id)
            ->get()
            ->groupBy('document_id'); // Mengelompokkan berdasarkan document_id

        // Ambil semua reviewer_id unik
        $reviewerIds = $documents->flatten()->pluck('reviewer_id')->unique();
        $reviewers = User::whereIn('id', $reviewerIds)->pluck('name', 'id');

        // Periksa jika data ditemukan
        if ($documents->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan untuk dummy_id: ' . $dummy_id);
        }

        // Kirim data ke view
        return view('pages.pesan.sekertaris.show', [
            'documents' => $documents,
            'dummy_id' => $dummy_id,
            'reviewers' => $reviewers,
        ]);
    }

    /**
     * Membaca feedback
     */
    public function edit(string $id)
    {
    $pesan = Pesan::find($id);

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
