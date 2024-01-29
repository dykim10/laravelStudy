<html>
    <head>
        TEST :: header
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="container p-5">
        <div>
            <h1>글쓰기</h1>
            <form action="/articles" method="POST">
                <input type="text" name="contents">
                <input type="button" value="저장하기">
            </form>
        </div>
    </body>
</html>
