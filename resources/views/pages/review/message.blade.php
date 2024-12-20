@foreach($sub as $submission)
    <h3>Submission ID: {{ $submission->id }}</h3>
    @if($submission->log_id && $submission->log_id->doc_id)
        <ul>
            @foreach($submission->log_id->doc_id as $doc)
                <li>Document Name: {{ $doc->doc_name }}</li>
            @endforeach
        </ul>
    @else
        <p>No documents available</p>
    @endif
@endforeach
