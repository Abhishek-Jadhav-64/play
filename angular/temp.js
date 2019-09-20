var x = () => {

};

var person = {
    fullName: function(city , country)
    {
        return this.firstName + " " + this.lastName +"," + city + "," + country;
    }
}

var person1 ={
    firstName: "John",
    lastName: "Doe"
}

person.fullName.call(person1, "Mumbai", "India");


var person2 = 
{
    firstName: "John",
    lastName: "Doe"
}

person.fullName.apply(person2, ["Mumbai", "India"]);