<html ng-app="myApp">
    <?php
        session_start();
    ?>
     <link rel="stylesheet" href="CSS/viewPat.css">
    <body ng-controller="myController" style="text-align:left">
       
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Patient Overview for {{fn}} {{ln}}</h1>
        </div>
        
        <div class="row">
            <div class="col-4" style="text-align:left"> <p class="text-muted">First Name: </p> <big>{{fn}} </big> </div>
            <div class="col-4" style="text-align:left"><p class="text-muted"> Last Name: </p><big>{{ln}}</big></div>
            <div class="col-2" style="text-align:left"><p class="text-muted">Sex: </p><big> {{sex}}</big></div>
        </div>
        <div class="row">
            <div class="col" style="text-align:left"><p class="text-muted">Email: </p><big> {{email}}</big></div>
            <div class="col" style="text-align:left"><p class="text-muted">Date of Birth: </p><big>{{bday}}</big></div>
            <div class="col" style="text-align:left"><p class="text-muted">Phone: </p><big>{{phone}}</big></div>
        </div>
        <div class="row">
            <div class="col" style="text-align:left"><p class="text-muted">Last Visit: </p><big>{{lastvisit}}</big></div>
            <div class="col" style="text-align:left"><p class="text-muted">Next Visit: </p><big>{{nextvisit}}</big></div>
            <div class="col" style="text-align:left"></div>
        </div>
        
        <footnote >
            <button ng-click="goback()" class="btn">Back to Patient List</button>
        </footnote>
    </body>
</html>