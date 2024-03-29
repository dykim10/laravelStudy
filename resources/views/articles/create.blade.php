<html>
    <head>
        TEST :: header
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container p-5">
            <h1 class="text-2xl">글쓰기</h1>
            <form action="/articles/save" method="post" class="mt-3" >
                @csrf
                <label>
                    <input type="text" name="body" class="block w-auto mb-3 rounded">
                </label>
                @error('body')
                <p class="text-xs">{{ $message }}</p>
                @enderror
                <button class="py-1 px-3 w-full text-xs rounded-full">저장하기</button>
            </form>
        </div>
    </body>
</html>
