<?php

namespace App\Service;

use App\Models\Dummy;
use App\Models\Feedback;
use App\Models\Logs;
use App\Models\Payment;
use App\Models\Submission;

class WorkflowService
{
    public function resetProgress($document_group){
        $doc = Dummy::find($document_group);
        $doc->update([
            'doc_status' => 'process',
            'doc_flag' => 'Waiting',
            'review_status' => 0
        ]);
        $minId = Logs::where('doc_group', $document_group)->min('id');
        Logs::where('doc_group', $document_group)
            ->where('id', '!=', $minId)
            ->delete();
        Logs::create([
            'title' => 'Konfirmasi Dokumen',
            'description' => 'Sedang dalam pengecekan kelengkapan dokumen oleh Sekretaris',
            'action_label' => 'Pengecakan Dokumen',
            'action_link' => '',
            'doc_group' => $document_group,
        ]);
        Payment::where('group_id', $document_group)->delete();
        Feedback::where('dummy_id', $document_group)->delete();
        Submission::where('doc_group',$document_group)->delete();
    }
}
