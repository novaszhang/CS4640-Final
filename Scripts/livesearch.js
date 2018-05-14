var xmlhttp;

function showResult(str) {
  if (str.length == 0) {
    //document.getElementById("livesearch").innerHTML = "";
    //document.getElementById("livesearch").style.border = "0px";
    //return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("notesTable").innerHTML = "<thead> <tr> <th>Note</th><th>Date</th> </tr> </thead>";
      var rowdata = JSON.parse(this.responseText);
      var table = document.getElementById("notesTable");
      for (var key in rowdata){
        var newRow = table.insertRow(table.rows.length);
        var newCell = "";
        var k=0;
        newCell=newRow.insertCell(0);
        newCell.innerHTML=key;
        
        newCell=newRow.insertCell(1);
        newCell.innerHTML=rowdata[key];
        
      }
    }
  }
  xmlhttp.open("GET", "getPatListSearch.php?search=" + str, true);
  xmlhttp.send();
}

