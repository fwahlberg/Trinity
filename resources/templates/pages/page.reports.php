<h1>Grade Reports</h1>
<hr>
<form method="POST">
  <div class="form-group">
    <label for="gradeSelect">Grade</label>
    <select class="form-control" id="gradeSelect" name="grade">
      <?php foreach ($memberGrades as $grade) {
        // code...
        echo "<option>" . $grade['Grade'] . "</option>";
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">View Report</button>
</form>
