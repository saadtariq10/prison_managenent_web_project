<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS - Prison Management System</title>
    <link rel="stylesheet" href="style.css" />

    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .sidebar {
            background-color: #f0f0f0;
            width: 200px;
            padding: 20px;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .sidebar a {
            color: black;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            color: #4caf50;
        }

        .content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
        }

        header {
            background-color: #f0f0f0;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            /* Align items to the start and end */
            align-items: center;
            /* Center items vertically */
        }

        .user-login {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        main {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1,
        h2 {
            margin-bottom: 10px;
        }

        .dashboard-blocks {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .block,
        .released,
        .today-visit {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            width: calc(33.33% - 20px);
            /* Adjusted width */
            text-align: center;
            display: inline-block;
            /* Changed to inline-block */
        }

        .block h3,
        .released h3,
        .today-visit h3 {
            margin-bottom: 5px;
        }

        .released,
        .today-visit {
            background-color: #e0e0e0;
        }

        /* New styles */
        .sidebar-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar-logo img {
            width: 50px;
            /* Adjust size as needed */
        }

        .subheading {
            font-size: 0.9em;
            margin-bottom: 5px;
        }

        .dropdown-list {
            margin-top: 10px;
        }

        /* Additional styles for inmate list */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-icons a {
            margin-right: 5px;
        }

        .create-new-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Adjustments for horizontal alignment */
        .header-controls {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-controls>* {
            margin-right: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-logo">
                <img src="https://w7.pngwing.com/pngs/582/828/png-transparent-prison-cell-prisoners-rights-bail-bondsman-prison-miscellaneous-text-logo-thumbnail.png"
                    alt="PMS Logo"> <!-- Add your logo image path -->
                <h1>PMS</h1>
            </div>
            <ul>
            <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="inmatelist.php">Inmate List</a></li>
                <li><a href="visitorlist.php">Visitor List</a></li>
                <li><a href="prisonlist.php">Prison List</a></li>
                <li><a href="cellblock.php">Cell Block List</a></li>
            </ul>
        </div>
        <div class="content">
            <header>
                <div>
                    <h1>Prison Management System</h1>
                </div>
                <div class="user-login">
                    <div class="dropdown">
                        <div class="user-avatar">
                            <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png"
                                alt="User Avatar"> <!-- Add your avatar image path -->
                        </div>
                        <div class="dropdown-content">
                            <a href="login.html">Log Out</a>
                        </div>
                    </div>
                </div>
            </header>
            <main>
                <div class="header-controls">
                    <h1>Visitor list</h1>
                    
                    <a href="visitorform.html" class="create-new-button" style="text-decoration: none;">Create New</a>
                </div>
                <table>
                    <?php
                    include 'visitorconnect.php'; ?>
                </table>


            </main>
        </div>
    </div>
</body>

</html>