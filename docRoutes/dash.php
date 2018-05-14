<html>
    <body>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Notes</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
               <form>
                <div style="width:250px;">
                  <input name="searchBar" placeholder="Search" type="text" id="searchbox" size="30" style="width:100%;" onkeyup="showResult(this.value)" onfocus="showResult(this.value)" autofocus> 
                </div>
              </form>
            </div>
          </div>
       
          <div class="form-group" style="align:left">
            <form action="addnote.php" method="post">
              <input name="newNote" type="text" class="form-control" style = "width:70%;display:inline;vertical-align:top;">
              <input type="submit" value="Add Note" class="btn btn-submit" style="vertical-align:top;">
            </form>
          </div>
          <div id="notes">
            <table id="notesTable" class="table" style="text-align:left">
              <thead>   
              <tr>
                <th>Note</th>
                <th>Date</th>
              </tr> 
            </thead>
          </table> 
    </div>
        
    </body>
</html>
