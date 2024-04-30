<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/css/style.css?v=<?= filemtime('src/css/style.css') ?>">
  <link rel="shortcut icon" href="images/logo/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <title>Admin Login</title>
</head>
<body>
  <div class="grid content-center justify-items-center w-full h-screen">
    <div class="w-10/12 lg:w-6/12 bg-gradient-to-r from-green-100 via-blue-100 to-yellow-50 p-4 rounded-lg">
      <div class="flex justify-center">
        <img src="images/logo/logo.png" alt="Logo" class="w-4/12 md:w-2/12">
      </div>
      <h2 class="font-serif text-center text-2xl font-bold tracking-widest text-slate-700">Admin Login</h2>
      <form id="adminLogin" class="border border-slate-200 rounded-md p-4 py-5">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="w-full md:w-10/12 md:ml-3 focus:outline-none border border-slate-200 text-xs  font-mono text-slate-700 pl-2 rounded-md py-1 block md:inline">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="w-full md:w-10/12 md:ml-4 focus:outline-none border border-slate-200 text-xs  font-mono text-slate-700 pl-2 rounded-md py-1 block md:inline my-3">
        <div class="flex justify-center">
          <button type="submit" id="submit" class="px-3 py-1 w-2/4 lg:w-1/4 bg-blue-700 hover:bg-blue-800 text-slate-50 font-bold font-serif rounded-lg cursor-pointer">Login</button>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
<script>
  $("#adminLogin").submit(function(e){
    e.preventDefault();
    var username = $('#username').val();
    var password = $('#password').val();

    if (username != '' && password != '') {
      $.ajax({
        url: 'auth/admin_auth.php',
        type: 'POST',
        data: $(this).serialize(),
        beforeSend: function(){
          $('#submit').html("Login <i class='fa-solid fa-spinner animate-spin'></i>")
        },
        success:function(res){
          if ($.trim(res)==='wrong credentials') {
            $('#username, #password').attr('placeholder', 'Wrong username or password').addClass('placeholder:text-red-500 border-red-400');
          }else if($.trim(res)==='access denied'){
            $('#username, #password').attr('placeholder', 'Wrong username or password').addClass('placeholder:text-red-500 border-red-400');
          }else if($.trim(res)==='access granted'){
            $('#submit').addClass('bg-green-500 w-full lg:w-3/4').html("Access Granted <i class='fa-solid fa-fingerprint'></i>");
            $(location).prop('href', 'admin/dashboard.php');
          }else{
            console.log('something went wrong.');
          }
        }
      })
    }else{
      $('#username, #password').attr('placeholder', 'this field is required').addClass('placeholder:text-red-500 border-red-400');
    }
    // $('#username').attr('placeholder', 'username is required');
    
  })
</script>
</html>