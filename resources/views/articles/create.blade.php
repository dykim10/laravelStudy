<html>
    <head>
        TEST :: header
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container p-5">
            <h1 class="text-2xl">글쓰기</h1>
            <form action="/articles" method="POST" class="mt-3">
                @csrf
                <input type="text" name="contents" class="block w-auto mb-2 rounded">
                <button class="py-1 px-3 w-full text-xs rounded-full">저장하기</button>
            </form>
        </div>
    </body>
</html>
