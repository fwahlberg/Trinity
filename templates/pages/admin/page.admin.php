<!-- Page Content -->
<h1>Admin Console</h1>
<hr>
<a href="create.php"><button class="btn btn-success mb-3">Create user <i class="fa fa-plus"></i></button></a>
<div class="card">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Clients</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $key => $user) {
      // code...
      echo "<tr>";
      echo "<td>" . $user["id"] . "</td><td>" . $user["username"] . "</td><td>" . $user["email"] . "</td><td>" . $user["clients"] . "</td><td><a href='edit.php?id=" . $user["id"] . "'><button class='btn btn-primary mr-2'>Edit</button></a><a href='delete.php?id=" . $user["id"] . "'><button class='btn btn-danger'>Delete</button></a>";
      echo "</tr>";
    }

    ?>
  </tbody>
</table>
</div>
