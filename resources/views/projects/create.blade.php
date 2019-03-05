<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <style>body { padding-top: 40px; }</style>
</head>
<body>
    <div id="app" class="container">
        @include ('projects.list')

        <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
            <div class="field">
                <label for="name" class="label">Project Name:</label>

                <div class="control">
                    <input type="text" id="name" name="name" class="input" v-model="name">

                    <span class="help is-danger" v-if="errors.has('name')">@{{ errors.get('name') }}</span>
                </div>
            </div>

            <div class="field">
                <label for="description" class="label">Project Description:</label>

                <div class="control">
                    <input type="text" id="description" name="description" class="input" v-model="description" @keydown="errors.clear('description')">

                    <span class="help is-danger" v-if="errors.has('description')">@{{ errors.get('description') }}</span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" :disabled="errors.any()">Create</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="/js/app.js"></script>
</body>
</html>