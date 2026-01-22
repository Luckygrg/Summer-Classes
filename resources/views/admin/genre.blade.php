<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Genre Management - Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-papfHfScfDUX8PoZZbXB4RWOrUfrZd3lYJoPlkzqEJkJ3VUmJh9RQro5aRT8YI2sZ9WjEfbXlsuB3Gy7zT6b8g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: Arial, sans-serif; display: flex; min-height: 100vh; }

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

    .main {
      flex: 1;
      background: #f4f6f8;
      padding: 25px;
      overflow-y: auto;
    }
    .main h1 {
      font-size: 26px;
      margin-bottom: 20px;
      color: #333;
    }

    /* Form Styles */
    .form-container {
      background: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
      margin-bottom: 30px;
    }
    .form-container h2 {
      margin-bottom: 20px;
      color: #333;
      font-size: 20px;
    }
    .genre-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    .form-row {
      display: flex;
      gap: 20px;
    }
    .form-group {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .form-group.full-width {
      width: 100%;
    }
    .form-group label {
      margin-bottom: 5px;
      font-weight: 600;
      color: #555;
      font-size: 14px;
    }
    .form-group input,
    .form-group textarea {
      padding: 10px 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      transition: border-color 0.2s;
    }
    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #3498db;
      box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }
    .form-group textarea {
      resize: vertical;
      min-height: 80px;
    }
    .form-actions {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }
    .btn-primary,
    .btn-secondary {
      padding: 12px 24px;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.2s;
    }
    .btn-primary {
      background: #3498db;
      color: white;
    }
    .btn-primary:hover {
      background: #2980b9;
    }
    .btn-secondary {
      background: #95a5a6;
      color: white;
    }
    .btn-secondary:hover {
      background: #7f8c8d;
    }
    .error {
      color: #e74c3c;
      font-size: 12px;
      margin-top: 4px;
    }

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
    tr:nth-child(even) { background-color: #f9f9f9; }

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
      .form-row {
        flex-direction: column;
        gap: 15px;
      }
      .form-actions {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <!-- Mobile menu button -->
  <button class="menu-btn" onclick="document.body.classList.toggle('menu-open')">&#9776;</button>

  <!-- Sidebar -->
  <nav class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('movie') }}">Movies</a></li>
      <li><a href="{{ route('genre') }}">Genres</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>

  <!-- Main content -->
  <main class="main">
    <h1>Genre Management</h1>

    <!-- Create/Edit Genre Form -->
    <div class="form-container">
      <h2>{{ isset($genre) ? 'Edit Genre' : 'Add New Genre' }}</h2>
      <form action="{{ isset($genre) ? route('genre.update', $genre->id) : route('genre.store') }}" method="POST" class="genre-form">
        @csrf
        @if(isset($genre))
          @method('PUT')
        @endif
        
        <div class="form-row">
          <div class="form-group">
            <label for="name">Genre Name *</label>
            <input type="text" id="name" name="name" maxlength="55" required 
                   value="{{ old('name', isset($genre) ? $genre->name : '') }}" 
                   placeholder="e.g., Action, Comedy, Drama">
            @error('name')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="form-group full-width">
          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4" placeholder="Enter genre description...">{{ old('description', isset($genre) ? $genre->description : '') }}</textarea>
          @error('description')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-primary">
            {{ isset($genre) ? 'Update Genre' : 'Add Genre' }}
          </button>
          @if(isset($genre))
            <a href="{{ route('genre') }}" class="btn-secondary" style="text-decoration: none; display: inline-block; text-align: center;">Cancel</a>
          @else
            <button type="reset" class="btn-secondary">Reset Form</button>
          @endif
        </div>
      </form>
    </div>

    <h2>Genre List</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($genres as $genre)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $genre->name }}</td>
          <td>{{ $genre->description ?? 'No description' }}</td>
          <td>{{ $genre->created_at->format('M d, Y') }}</td>
          <td>
            <a href="{{ route('genre.edit', $genre->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
            &nbsp;
            <form action="{{ route('genre.delete', $genre->id) }}" method="POST" style="display: inline;"
                  onsubmit="return confirm('Are you sure you want to delete this genre?')">
              @csrf
              @method('DELETE')
              <button type="submit" title="Delete" style="background: none; border: none; color: #dc3545; cursor: pointer;">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" style="text-align: center; color: #666; padding: 20px;">
            No genres found. Add some genres to get started.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </main>

</body>
</html>