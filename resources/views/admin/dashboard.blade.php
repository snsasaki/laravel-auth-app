<h1>管理画面</h1>

<p>この画面は管理者だけがアクセスできます。</p>

<ul>
    <li>ユーザー管理</li>
    <li>Todo全体確認</li>
    <li>操作ログ確認</li>
</ul>

@foreach ($todos as $todo)
            <article>
              {{-- <p>カテゴリ: {{ $todo->category->name }}</p> --}}
                <h3>{{ $todo->title }}</h3>
                <p>{{ $todo->body }}</p>

                @if ($todo->is_done)
                <p>状態: 完了</p>
                @else
                <p>状態: 未完了</p>
                @endif
                
                @can('update', $todo)
                <a href="{{ route('todos.edit', $todo) }}">編集</a>
                @endcan

                @can('delete', $todo)
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
                @endcan
            </article>
@endforeach

@foreach ($users as $user)
            <ul>
              <li>{{ $user->username }}</li>
            </ul>
@endforeach
<p>
    <a href="{{ route('dashboard') }}">ダッシュボードへ戻る</a>
</p>