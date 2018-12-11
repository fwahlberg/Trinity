$(document).ready(function() {
    $('#movementsTable').DataTable(
        {
            "order": [[ 3, "desc" ]],
            "ajax": "/API/movements.php",
            "columns": [
            { "data": "Date" },
            { "data": "Ticket" },
            { "data": "Loadtype" },
            { "data": "Passport" },
            { "data": "Location" },
            { "data": "Commodity" },
            { "data": "Marketing" },
            { "data": "prettyLink" }
        ]
        }
    );

    $('#intentionsTable').DataTable(
        {
            "ordering": false,
            "ajax": "/API/intentions.php",
            "columns": [
            { "data": "Location" },
            { "data": "Grade" },
            { "data": "Variety" },
            { "data": "IntentionTonnage" },
            { "data": "Delivered" },
            { "data": "Balance" }
        ]
        }
    );

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
