<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My App</title>
    </head>
    <body>
        <div id="app">
            {{-- <input type="text" v-model="coupon"> --}}
            {{-- <input type="text" :value="coupon" @input="coupon = $event.target.value"> --}}

            <coupon v-model="coupon">
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
