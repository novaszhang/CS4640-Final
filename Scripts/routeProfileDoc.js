var app = angular.module("myApp", ["ngRoute"]);
var patients = "Eduardo";
app.config(function($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "docRoutes/dash.php"
        })
        .when("/dash", {
            templateUrl: "docRoutes/dash.php"
        })
        .when("/patList", {
            templateUrl: "docRoutes/patList.php",
            controller: "myController"
        })
        .when("/viewPat/:param1/", {
            templateUrl: "docRoutes/viewPat.php",
            controller: "myController"

            // })
            // .when("/doc1", {
            //   templateUrl : "sampDoc1.php"
            //})
            //.when("/doc2", {
            //   templateUrl : "sampDoc1.php"
        });
});

app.controller("myController", function($scope, $routeParams, $location, $http) {
    //$scope.patients = ["Eduardo Nardo","bill","yumyum","moonman","buzzbaldrin","plsizza"];
    $scope.patients = patnamelist;
    $scope.currPat = "default";
    var url = $location.path().split("/");
    $scope.currPat = url[2];

    var onSuccess = function(data, status, headers, config) {
        var patientData = data["data"];
        $scope.fn = patientData["firstname"];
        $scope.ln = patientData["lastname"];
        $scope.email = patientData["email"];
        $scope.bday = patientData["birthday"];
        $scope.phone = patientData["phone"];
        $scope.sex = patientData["sex"];
        $scope.lastvisit = patientData["lastvisit"];
        $scope.nextvisit = patientData["nextvisit"];
    };

    var onError = function(data, status, headers, config) {
        $scope.error = status;
    };
    
    $scope.goback = function(){
        window.location = "javascript:history.back()";
    }
    
    var promise = $http.get("getPatData.php?pat="+$scope.currPat).then(onSuccess, onError);
    //console.log(promise);
});
