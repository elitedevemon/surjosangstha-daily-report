<div class="px-4 py-5">
  <p class="font-bold text-xl font-mono">Create New User: </p>
  <div class="flex justify-center">
    <form id="addUser" class="border border-slate-400 rounded-lg p-3 w-2/4 mt-3 grid gap-2">
      <div class="grid grid-cols-10">
        <label for="name" class="col-span-2">Name: </label>
        <input type="text" name="name" class="focus:outline-none ml-3 border border-blue-200 rounded-md px-3 py-1 text-sm col-span-8">
      </div>
      <div class="grid grid-cols-10">
        <label for="name" class="col-span-2">Email: </label>
        <input type="email" name="email" class="focus:outline-none ml-3 border border-blue-200 rounded-md px-3 py-1 text-sm col-span-8">
      </div>
      <div class="grid grid-cols-10">
        <label for="name" class="col-span-2">PSO ID: </label>
        <input type="number" name="pso_id" class="focus:outline-none ml-3 border border-blue-200 rounded-md px-3 py-1 text-sm col-span-8">
      </div>
      <div class="grid grid-cols-10">
        <label for="name" class="col-span-2">Username: </label>
        <input type="text" name="username" class="focus:outline-none ml-3 border border-blue-200 rounded-md px-3 py-1 text-sm col-span-8">
      </div>
      <div class="grid grid-cols-10">
        <label for="name" class="col-span-2">Password: </label>
        <input type="password" name="password" class="focus:outline-none ml-3 border border-blue-200 rounded-md px-3 py-1 text-sm col-span-8">
      </div>
      <div class="flex justify-end">
        <button type="submit" id="submit" class="bg-blue-600 hover:bg-blue-700 cursor-pointer md:w-2/4 lg:w-4/12 rounded-md px-2 py-1 font-bold text-slate-50">Create User</button>
      </div>
    </form>
  </div>
  <div class="mt-3 flex justify-center">
    <div class="" id="notification"></div>
  </div>
</div>

<script>
  $('#addUser').submit(function(e){
    e.preventDefault();
    if ($('#addUser input[name=name]').val() == '' || $('#addUser input[name=email]').val() == '' || $('#addUser input[name=pso_id]').val() == '' || $('#addUser input[name=username]').val() == '' || $('#addUser input[name=password]').val() == '') {
      $('#addUser input').addClass('border-red-300 placeholder:text-xs placeholder:text-red-200').attr('placeholder', 'fields are required');
    }else{
      $.ajax({
        url: 'action/add-user.php',
        type: 'POST',
        data: $(this).serialize(),
        beforeSend: function(){
          $('#submit').html("Create User <i class='fa-solid fa-rotate animate-spin'></i>")
        },
        success: function(response){
          if ($.trim(response)==='inserted') {
            $('#submit').addClass('bg-green-500 hover:bg-green-600').html("User Created <i class='fa-regular fa-circle-check'></i>")
            $('#addUser').trigger('reset');
          }else{
            $('#submit').addClass('bg-red-500 hover:bg-red-600').html("Wrong User <i class='fa-regular fa-circle-xmark'></i>")
            $('#notification').addClass('text-red-300 border border-red-600 text-center font-bold font-mono w-2/4 rounded-md px-2').html(response);
          }
        }
      })
    }
    
  })
</script>