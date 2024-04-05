<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Database View</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<body>

    <div class="container mt-5">
        <h2>Database Entries</h2>

        @foreach ($data as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Entry ID: {{ $item->id }}</h5>
                    <p class="card-text">Text: {{ $item->textbox }}</p>
                    <p class="card-text">Selected: {{ $item->radiobutton }}</p>
                    <p class="card-text">Checkbox: {{ implode(', ', json_decode($item->checkbox, true)) }}</p>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Uploaded Image" style="max-width: 100%;">
                    @endif
                </div>
            </div>
        @endforeach

        @if (isset($randomData))
            @if (isset($randomData))
                <div class="card mt-4">
                    <div class="card-header">
                        Random Cat Fact
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Updated At</th>
                            </tr>
                            <tr>
                                <td>{{ $randomData['_id'] }}</td>
                                <td>{{ $randomData['text'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($randomData['updatedAt'])->toDayDateTimeString() }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif

            <footer class="blockquote-footer">Cat Facts API</footer>
            </blockquote>


        @endif

        <a href="{{ route('form.show') }}" class="btn btn-primary">Back to Form</a>
    </div>

</body>

</html>
