<h1 class="title is-1">My Projects</h1>

<ul>
    @foreach ($projects as $project)
        <li>{{ $project->name }}</li>
    @endforeach
</ul>