<html>
    <?php
        session_start();
    ?>
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/patList.css">
    <body ng-controller="myController">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">List of Patients</h1>
        </div>
        
          <div class="items">
            <li ng-repeat="x in patients" style="text-align: left;">
              <a ng-href="#!viewPat/{{x.email}}"style="font-size:20px">{{x.first}} {{x.last}}</a>
            </li>
          </div>
        
        
    <script src="js/jquery-2.1.4.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>  
        
              <form style="width:100%;margin-top:2rem" action="addpat.php" method="post">
                <div class="form-group row" style="text-align:left;margin-left:0.5rem">
                  <label class="col-3 col-form-label" for="patToAdd" >Add Patient by Email:</label>
                  <div class="col-7">
                    <input class="form-control" type="text" name="patToAdd" id="patToAdd"></input>
                  </div>
                  <div class="col-2" style="text-align:left;padding:0">
                   <input type="submit" value="Add" class="btn" >
                  </div>
                </div>
              </form>
              <form style="width:100%;margin-top:15px" action="removepat.php" method="post">
                <div class="form-group row" style="text-align:left;margin-left:0.5rem">
                  <label class="col-3 col-form-label" for="patToRem">Remove Patient by Email:</label>
                  <div class="col-7" style="margin-right:0px">
                    <input class="form-control" type="text" name="patToRem" id="patToRem"></input>
                  </div>
                  <div class="col-2" style="text-align:left;margin-left:0px;padding:0">
                    <input type="submit" value="Remove" class="btn" >
                  </div>
                </div>
              </form>
            
              <!--<form style="width:100%;margin-top:15px;margin-left:1rem" action="removepat.php" method="post">
                <div class="form-group row" >
                  <label class="col-sm-2 col-form-label" for="patToRem" style="margin-right:5px">Remove Patient by Email:</label><br>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="patToRem" id="patToRem"></input>
                    <input type="submit" value="Remove" class="btn" style="margin:5px">
                  </div>
                </div>
              </form>-->
            
        
    </body>
    
</html>