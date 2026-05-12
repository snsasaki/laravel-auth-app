<x-layouts::app :title="'Todo一覧'">
	<h2>Todo一覧</h2>

    <p>
        <form action="{{ route('todos.search') }}" method="get">
            <input type="search" name="keyword" placeholder="キーワードを入力">
            <input type="submit" name="検索" value="検索">
        </form>
    </p>
    

	{{-- <a href="{{ route('todos.create') }}">新規作成</a>	 --}}

	@foreach ($todos as $todo)
        {{-- @if ($todo->name == Auth) --}}
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
        {{-- @endif --}}
	@endforeach

</x-layouts::app>
