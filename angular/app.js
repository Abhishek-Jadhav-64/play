var app = angular.module('app', []);
app.controller('AppController', function($scope) {

    var lowercaseCheck = /^(?=.*[a-z])/;
    var uppercaseCheck = /^(?=.*[A-Z])/;
    var numberCheck = /^(?=.*[0-9])/;
    var specialCharacterCheck = /^(?=.*[!@#\$%\^&\*])/;
    var minimumLengthCheck = /^(?=.{8,})/;

    $scope.passwordValidation = function() {

        console.log(uppercaseCheck.test($scope.user.password));

        if (!uppercaseCheck.test($scope.user.password)) {
            $scope.errorMessage = 'Password must contain uppercase';
        } else if (!lowercaseCheck.test($scope.user.password)) {
            $scope.errorMessage = 'Password must contain lowercase';
        } else if (!numberCheck.test($scope.user.password)) {
            $scope.errorMessage = 'Password must contain number';
        } else if (!specialCharacterCheck.test($scope.user.password)) {
            $scope.errorMessage = 'Password must contain special character';
        } else if (!minimumLengthCheck.test($scope.user.password)) {
            $scope.errorMessage = 'Password must be atleast 8 characters in length';
        }
    }

    $scope.submitForm = function(isValid) {
        // check to make sure the form is completely valid
        if (isValid) {
          alert('our form is amazing');
        }
        
    };
    $scope.usernameRegex = /^\w+$/;

    $scope.compare = function (repass) { 
        $scope.isconfirm = $scope.password == repass ? 
                true : false; 
    } 
});
