
<script type="text/javascript" src="/assets/js/libs/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/libs/bootstrap.bundle.min.js"></script>
<script src="/assets/js/libs/cookieconsent.min.js"></script>
<script src="/assets/js/libs/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
  $('#myTable').DataTable();

  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#edeff5",
        "text": "#838391"
      },
      "button": {
        "background": "#4b81e8"
      }
    },
    "position": "bottom-right"
  });
});
</script>


</body>
</html>
