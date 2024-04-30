<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/css/style.css?v=<?= filemtime('../src/css/style.css') ?>">
  <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"> </script>
  <title>Admin Dashboard</title>
</head>
<body>
  <div class="grid grid-cols-10">
    <div class="bg-slate-100 border-r border-r-slate-600 w-full h-screen col-span-2 p-3">
      <a href="dashboard.php" class="flex justify-center">
        <img src="../images/logo/logo.png" alt="Logo" class="w-1/4">
      </a>
      <hr class="my-2 -mx-3">

      <!-- Get action name -->
      <?php 
      
       $actionName = '';
       if (isset($_GET['action'])) {
        if ($_GET['action'] === 'userList') {
          $actionName = 'userList';
        }elseif ($_GET['action'] === 'addUser') {
          $actionName = 'addUser';
        }elseif ($_GET['action'] === 'history') {
          $actionName = 'history';
        }
       }

      ?>

      <a href="?action=userList" class="block hover:text-slate-800 hover:font-bold <?= $actionName=='userList'?'text-slate-800 font-bold':''; ?>"><i class="fa-solid fa-circle-arrow-right"></i> Users</a>
      <a href="?action=addUser" class="block hover:text-slate-800 hover:font-bold <?= $actionName=='addUser'?'text-slate-800 font-bold':''; ?>"><i class="fa-solid fa-circle-plus"></i> Add new user</a>
      <a href="?action=history" class="block hover:text-slate-800 hover:font-bold <?= $actionName=='history'?'text-slate-800 font-bold':''; ?>"><i class="fa-solid fa-clock-rotate-left"></i> History</a>
    </div>
    <div class="bg-cyan-50 w-full h-screen col-span-8">
      <?php 
        if (isset($_GET['action'])) {
          if ($_GET['action'] === 'userList') {
            require_once('pages/user-list.php');
          }elseif ($_GET['action']==='addUser') {
            require_once('pages/add-user.php');
          }elseif ($_GET['action']==='history') {
            require_once('pages/history.php');
          }
        }else{
          require_once('pages/home.php');
        }

      ?>
    </div>
  </div>
</body>
<script type="text/javascript">
  window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light1", // "light2", "dark1", "dark2"
    animationEnabled: false, // change to true		
    title:{
      text: "Basic Column Chart"
    },
    data: [
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "column",
      dataPoints: [
        { label: "apple",  y: 10  },
        { label: "orange", y: 15  },
        { label: "banana", y: 25  },
        { label: "mango",  y: 30  },
        { label: "grape",  y: 28  }
      ]
    }
    ]
  });
  chart.render();

  }
</script>
</html>