<!DOCTYPE html>
<html>
<head>
    <title>Badminton Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Badminton</a>

    <div>
      <a class="btn btn-sm btn-light" href="{{ route('teams.index') }}">Teams</a>

      <form class="d-inline" method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-sm btn-danger">Logout</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
