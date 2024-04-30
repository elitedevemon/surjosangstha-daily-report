<!-- <div class="m-4">
  <form id="searchForm">
    <div class="flex items-center" id="searchFor">
      <p class="font-bold text-lg font-mono">Search for: </p>
      <div class="mx-4">
        <input type="radio" name="searchItem" id="day" value="day">
        <label for="day">Day</label>
      </div>
      <div class="mx-4">
        <input type="radio" name="searchItem" id="week" value="week">
        <label for="week">Week</label>
      </div>
      <div class="mx-4">
        <input type="radio" name="searchItem" id="month" value="month">
        <label for="month">Month</label>
      </div>
    </div>
    <div id="searchDate" class="flex items-center hidden">
      <p class="font-bold text-lg font-mono">Search date: </p>
      <input type="date" name="date" id="date" class="focus:outline-none ml-3 border rounded-lg px-2">
    </div>
    <div id="searchMonth" class="flex items-center hidden">
      <p class="font-bold text-lg font-mono">Search date: </p>
      <input type="date" name="date" id="date" class="focus:outline-none ml-3 border rounded-lg px-2"> &nbsp; - 
      <input type="date" name="date" id="date" class="focus:outline-none ml-3 border rounded-lg px-2">
    </div>
    <div class="flex items-center hidden" id="searchEmployee">
      <p class="font-bold text-lg font-mono">Search employee: </p>
      <div class="mx-4">
        <input type="checkbox" name="employee" id="all" value="all">
        <label for="all">All</label>
      </div>
      <div class="mx-4">
        <input type="checkbox" name="employee" id="emon" value="emon">
        <label for="emon">Emon</label>
      </div>
    </div>
    <button type="submit" id="submit" class="px-3 py-1 bg-blue-500 border border-slate-400 hover:bg-blue-600 text-slate-50 font-bold font-serif rounded-md hidden">Search</button>
  </form>
</div>
<script>
  $('#searchFor').change(function(e){
    e.preventDefault();
    var searchFor = $('#searchForm input[name=searchItem]:checked').val();
    // console.log(searchFor);
    if (searchFor === 'day' || searchFor === 'week') {
      $('#searchDate').removeClass('hidden');
      $('#searchMonth').addClass('hidden');
    }else if(searchFor === 'month') {
      $('#searchMonth').removeClass('hidden');
      $('#searchDate').addClass('hidden');
    }else{

    }
  })

</script> -->


