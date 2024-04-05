<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
    <!-- Include Bootstrap CSS or any other styling frameworks if you like -->
</head>
<body>

<div class="container mt-5">
    <h2>PHP-MySQL Form</h2>

    <!-- Display errors if there are any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('form.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="textbox">Text Box (100 Characters)</label>
            <input type="text" class="form-control" id="textbox" name="textbox" maxlength="100" required>
        </div>
        
        <div class="form-group">
            <label>Radio Button</label>
            <div>
                <input type="radio" id="hi" name="radiobutton" value="Hi" required>
                <label for="hi">Hi</label>
            </div>
            <div>
                <input type="radio" id="hello" name="radiobutton" value="Hello" required>
                <label for="hello">Hello</label>
            </div>
        </div>
        
        <div class="form-group">
            <label>Check Box</label>
            <div>
                <input type="checkbox" id="world" name="checkbox[]" value="World">
                <label for="world">World!</label>
            </div>
            <div>
                <input type="checkbox" id="web" name="checkbox[]" value="Web">
                <label for="web">Web!</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="image">Attach Image</label>
            <input type="file" class="form-control-file" id="image" name="image" accept=".jpg, .jpeg, .png, .gif">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('database.view') }}" class="btn btn-info">View Database</a>
    </form>
</div>

</body>
</html>
