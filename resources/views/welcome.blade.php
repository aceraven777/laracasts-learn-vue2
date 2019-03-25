<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <menu-list :items="['one', 'two', 'three']">
                <template slot="menu-item" scope="props">
                    <div>
                        <em v-text="props.item"></em>
                    </div>
                </template>
            </menu-list>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
