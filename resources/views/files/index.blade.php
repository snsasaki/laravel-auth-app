<h1>アップロード済みファイル一覧</h1>

@if (empty($files))
    <p>アップロード済みファイルはありません。</p>
@endif

<ul>
    @foreach ($files as $file)
        @php
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        @endphp

        <li>
            <p>{{ basename($file) }}</p>

            @if ($isImage)
                <img
                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($file) }}"
                    width="150"
                    alt="アップロード画像"
                >
            @endif

            <p>
                <a href="{{ route('files.download', basename($file)) }}">
                    ダウンロード
                </a>
            </p>
        </li>
    @endforeach
</ul>