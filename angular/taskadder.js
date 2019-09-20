var appX = angular.module('mainApp', []);

appX.controller('app', function($scope){

    appX.filter('empty', function(){

        var s1 = function(input)
        {
            if(isNaN(input))
                return 'empty';

            else input;
        };

        return s1;
    });

    $scope.tasks = [];
    var taskData = localStorage['tasksList'];

    if(taskData != undefined)
    {
        $scope.tasks = JSON.parse(taskData);
    }

    $scope.searchEnter = function()
    {
        if(event.which == 13 && $scope.task != "")
        {
            $scope.addTask();
        }
    };

    $scope.addTask = function()
    {
        $scope.tasks.push({'taskMessage':$scope.task, 'status':false});
        console.log($scope.tasks);
        $scope.task = '';
        localStorage['tasksList'] = JSON.stringify($scope.tasks);
    };

    $scope.contentEdit = function()
    {
        event.target.contentEditable = event.target.contentEditable == "false" ? "true" : "false";

    };

    $scope.enterAgain = function(msg)
    {
        if(event.which == 13)
        {

        }
    };
});