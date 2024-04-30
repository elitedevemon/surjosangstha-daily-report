<?php 
require_once('../database/select.php');
class User_list extends Select{
  public function getUser(){
    return $this->select('users', '*');
  }
}
$select = new User_list();
$data = $select->getUser();
$userList = json_decode(json_encode($data));
print('<pre>');
print_r($data );
print('</pre>');

if ($userList) {
?>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Name
              </th>
              <th scope="col" class="px-6 py-3">
                  Email
              </th>
              <th scope="col" class="px-6 py-3">
                  PSO ID
              </th>
              <th scope="col" class="px-6 py-3">
                  Username
              </th>
              <th scope="col" class="px-6 py-3">
                  Password
              </th>
          </tr>
      </thead>
      <tbody>
        <?php foreach ($userList as $key => $value) { ?>
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $value->name ?>
              </td>
              <!-- <td class="px-6 py-4">
                <?= $value->email ?>
              </td>
              <td class="px-6 py-4">
                <?= $value->pso_id ?>
              </td>
              <td class="px-6 py-4">
                <?= $value->usernamee ?>
              </td>
              <td class="px-6 py-4">
                <?= $value->password ?>
              </td> -->
          </tr>
        <?php } ?>
      </tbody>
  </table>
</div>

<?php }else{ ?>

<div class="grid place-content-center h-screen">
  <p class="font-bold text-slate-400 text-2xl font-mono">No record found</p>
</div>

<?php } ?>




