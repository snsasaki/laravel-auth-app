<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイルアップロード</title>
</head>
<body>
    <h1>ファイルアップロード</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="file">ファイル選択</label>
            <input id="file" type="file" name="file" required>

            @error('file')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">アップロード</button>
    </form>
</body>
</html>