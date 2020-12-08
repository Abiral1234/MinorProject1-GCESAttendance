function searchFunction() {

    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("userInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("table1");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];

      if (td) {
        txtValue = td.textContent || td.innerText;
        
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
}


function sortTable(n) {
  
  var table, rows, switching, i, x, y, shouldSwitch, dir, 
  switchcount = 0;
  table = document.getElementById("table1");
  switching = true;
  dir = "asc"; 

  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("tr");

    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[n].innerHTML;
      y = rows[i + 1].getElementsByTagName("td")[n].innerHTML;

      if(n!=1){
        x = parseInt(x);
        y = parseInt(y);

        if (dir == "asc") {

          if (x > y) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
  
          if (x < y) {
            shouldSwitch= true;
            break;
          }
        }
      }else{
        if (dir == "asc") {

          if (x.toLowerCase() > y.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
  
          if (x.toLowerCase() < y.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        }
      }
    }
    
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
