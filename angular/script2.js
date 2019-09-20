var application = angular.module('mainApp', [])

application.provider('date', function(){
    var greet;
    return{
        setGreeting: function(value){
            greet = value;
        },
        $get: function(){
            return{
                showDate: function(){
                    var date = new Date();
                    return greet + " Its " +date.getHours();
                },
                devShowDate: function(){
                    var date = new Date();
                    return date.getHours();
                }
            }
        }
    }
});

application.config(function(dateProvider){
    var time = dateProvider.$get().devShowDate();
    if(time > 0 && time < 12)
    {
        dateProvider.setGreeting("Good Morning!");
    }
    else if(time >=12 && time <17)
    {
        dateProvider.setGreeting("Good Day!");
    }
    else if(time >= 17 && time < 19)
    {
        dateProvider.setGreeting("Good Evening!");
    }
    else
    {
        dateProvider.setGreeting("Good Night");
    }
});

application.controller('app', function($scope, date){

    $scope.greetMessage = date.showDate();

});