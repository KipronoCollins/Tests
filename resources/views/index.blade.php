<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

   
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('routetest') }}">Users</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('routetest') }}">View All Users</a></li>
        <li><a href="{{ URL::to('routetest/create') }}">Create a User</a>
    </ul>
</nav>
<h1>All the Users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<img class="center-block" src="{{URL::asset('../public/images/loading.gif')}}" alt="Loading..." />
<div class="infinite-scroll">
    @foreach($users as $key => $value)
        <article class="post">
            <header>
                <div class="title">
                    <h2>{{ $value->name }}</h2>
                </div>
            </header>
        </article>
    @endforeach
    {{ $users->links() }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            debug: true,
            loadingHtml: '<img class="center-block" src="{{URL::asset('../images/loading.gif')}}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: '.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
</body>
</html>