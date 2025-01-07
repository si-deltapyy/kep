
<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
</head>
<style>
    .pdf {
        width: 100%;
        aspect-ratio: 4 / 3;
    }

    .pdf,
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

<body>
        <iframe class="pdf" src="{{ asset('app/' . $doc['doc_path']) }}" frameborder="0" width="100%" height="600px"></iframe>
</body>

</html>

