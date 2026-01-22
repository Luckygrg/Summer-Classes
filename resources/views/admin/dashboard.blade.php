<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Movie Admin Dashboard</title>
  <style>
    /* ===== basic reset ===== */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: Arial, sans-serif; display: flex; min-height: 100vh; }

    /* ===== sidebar ===== */
    .sidebar {
      width: 220px;
      background: #2c3e50;
      color: #ecf0f1;
      padding: 20px 15px;
    }
    .sidebar h2 { margin-bottom: 25px; font-size: 22px; letter-spacing: 1px; }
    .sidebar ul { list-style: none; }
    .sidebar li { margin-bottom: 12px; }
    .sidebar a {
      color: #ecf0f1;
      text-decoration: none;
      font-size: 15px;
      display: block;
      padding: 8px 10px;
      border-radius: 4px;
      transition: background .2s;
    }
    .sidebar a:hover { background: #34495e; }

    /* ===== main content ===== */
    .main {
      flex: 1;
      background: #f4f6f8;
      padding: 25px;
      overflow-y: auto;
    }
    .main h1 { font-size: 26px; margin-bottom: 20px; color: #333; }

    /* ===== cards ===== */
    .cards {
      display: grid;
      gap: 20px;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      margin-bottom: 35px;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      padding: 20px 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
    }
    .card h3 { font-size: 14px; color: #666; margin-bottom: 10px; }
    .card p  { font-size: 28px; font-weight: bold; color: #3498db; }

    /* ===== table section ===== */
    .table-section h2 { font-size: 20px; margin-bottom: 12px; color: #333; }
    table {
      width: 100%;
      background: #fff;
      border-collapse: collapse;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
      font-size: 14px;
    }
    th { background: #ecf0f1; }
    tr:last-child td { border-bottom: none; }

    /* ===== small-screen tweaks ===== */
    @media (max-width: 700px){
      .sidebar { position: fixed; left: -220px; top: 0; height: 100%; transition: left .3s; z-index: 99; }
      .sidebar.open { left: 0; }
      .menu-btn {
        position: absolute; top: 15px; left: 15px;
        background: #2c3e50; color:#ecf0f1; border:none; padding:8px 10px; border-radius:4px;
        cursor:pointer; font-size:18px;
      }
      body.menu-open .sidebar { left: 0; }
      body.menu-open .menu-btn { left: 240px; }
      .main { padding-top: 60px; }
    }
  </style>
</head>
<body>

  <!-- mobile menu button -->
  <button class="menu-btn" onclick="document.body.classList.toggle('menu-open')">&#9776;</button>

  <!-- sidebar -->
  <nav class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li><a href="{{route('movie')}}">Movies</a></li>
      <li><a href="{{route('genre')}}">Genres</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>

  <!-- main area -->
  <main class="main">
    <h1>Dashboard Overview</h1>

    <!-- quick‑stat cards -->
    <section class="cards">
      <div class="card">
        <h3>Total Movies</h3>
        <p>{{$statistics['totalmovies']}}</p>
      </div>
      <div class="card">
        <h3>Genres</h3>
        <p>{{$statistics['totalgenre']}}</p>
      </div>
      <div class="card">
        <h3>Users</h3>
        <p>{{$statistics['totaluser']}}</p>
      </div>
  
    </section>

    <!-- recent movies table -->
    <section class="table-section">
      <h2>Latest Movies</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
          
          </tr>
        </thead>
       <tbody>
    @foreach($movies as $movie)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $movie->name }}</td>
        </tr>
    @endforeach
</tbody>

      </table>
    </section>
  </main>

</body>
</html>
