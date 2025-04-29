<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Artikel & Event</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f2f4f8;
    }

    /* Top navbar */
    .topbar {
      background-color: #7bc043;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .topbar nav a {
      color: white;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #f0f0f0;
      padding: 20px;
      height: 100vh;
    }
    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      margin: 15px 0;
      font-weight: bold;
      color: #555;
      cursor: pointer;
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 30px;
    }

    .section {
      background: white;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .section-header {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 5px;
      margin-bottom: 10px;
    }
    .section-header h2 {
      margin: 0;
    }
    .create-btn {
      background-color: #d6ccf2;
      color: white;
      border: none;
      padding: 6px 16px;
      border-radius: 12px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
      transition: background 0.3s ease;
    }
    .create-btn:hover {
      background-color: #c2b2e4;
    }

    .search-box {
      float: right;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
      font-size: 14px;
    }

    .action-buttons .edit {
      background-color: gold;
      border: none;
      padding: 6px 10px;
      border-radius: 6px;
      cursor: pointer;
    }
    .action-buttons .delete {
      background-color: #f87171;
      border: none;
      padding: 6px 10px;
      border-radius: 6px;
      cursor: pointer;
      color: white;
      margin-left: 5px;
    }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="logo">Ecozense</div>
    <nav>
      <a href="#">Beranda</a>
      <a href="#">Toko</a>
      <a href="#">Artikel</a>
      <a href="#">Events</a>
      <a href="#">About Us</a>
    </nav>
    <div class="profile">👤 Profile</div>
  </div>

  <div class="container">
    <div class="sidebar">
      <h2>Dashboard</h2>
      <ul>
        <li>📄 Artikel & Event</li>
        <li>📑 Pengajuan</li>
        <li>👥 Data user</li>
      </ul>
    </div>

    <div class="main">
      <div class="section">
        <div class="section-header">
          <h2>Artikel</h2>
          <button class="create-btn">Create</button>
        </div>
        <input type="text" class="search-box" placeholder="Search...">
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Short Description</th>
              <th>Category</th>
              <th>Likes</th>
              <th>Writer</th>
              <th>Published at</th>
              <th>Edit & Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Manfaat Eco Enzim</td>
              <td>Eco Enzim bermanfaat...</td>
              <td>Cell Tests</td>
              <td>410</td>
              <td>David Guerra</td>
              <td>25/04/25 13:42</td>
              <td class="action-buttons">
                <button class="edit">Edit</button>
                <button class="delete">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="section">
        <div class="section-header">
          <h2>Event</h2>
          <button class="create-btn">Create</button>
        </div>
        <input type="text" class="search-box" placeholder="Search...">
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Banner Gambar</th>
              <th>Deskripsi</th>
              <th>Lokasi</th>
              <th>Konten</th>
              <th>Link Formulir</th>
              <th>Edit & Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Manfaat Eco Enzim</td>
              <td>Cell Tests</td>
              <td>Eco Enzim berkhasiat...</td>
              <td>Kalimantan</td>
              <td>JANGAN LUPA...</td>
              <td>www.docs.com</td>
              <td class="action-buttons">
                <button class="edit">Edit</button>
                <button class="delete">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
