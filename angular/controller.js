var app = angular.module('mainApp', [])

app.controller('people', function($scope, $http){

    $http({
        method: 'GET',
        url: 'database.json'
     }).then(function (response){
        console.log(response.records);
        $scope.persons = response.records;
        console.log($scope.persons);
     },function (error){
  
     });


    /*$http.get('play.test/angular/database.json')
    .success(function(response){
        $scope.persons = response.records;
        console.log("DAta recieved");
    });

    .then(function (response){
        $scope.persons = response.records;
        console.log("Data recieved");
    },function (error){
 
    }); */
});