<!DOCTYPE html>
<html>
<head>
    <title>View Data Asset</title>
</head>
<body>
    <h1>View Data Asset</h1>
    <p>Name Customer: {{ $dataAsset->Name_Customer }}</p>
    <p>Vehicle ID: {{ $dataAsset->VehicleID }}</p>
    <!-- Display other fields as needed -->
    <a href="{{ route('data_assets.edit', $dataAsset->id) }}">Edit</a>
    <form action="{{ route('data_assets.destroy', $dataAsset->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('data_assets.index') }}">Back to list</a>
</body>
</html>
