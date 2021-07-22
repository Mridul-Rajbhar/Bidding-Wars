<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  background:linear-gradient(270deg,#09203F,#537895);
}

.sidenav {
  height: 100%;
  width: 170px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: -webkit-linear-gradient(0deg ,#7CFFCB,#7EE8FA);
  overflow-x: hidden;
  padding-top: 35px;
}

.sidenav a {
    padding: 14px 16px;
    color: #4b423e;
    text-decoration: none;
    font-family: Tw Cen MT;
    font-size: 25px;
    text-align: center;
    display: block;
}

.sidenav a:hover {
    background: linear-gradient(90deg ,#FCE043,#EEC0C6);
}


.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
        <a href="Users.php">Registered</a>
        <a href="BannedUsers.php">Banned</a>
        <a href="Queries.php">Queries</a>
        <a href="/index.php">Logout</a>
</div>
   
</body>
</html> 
