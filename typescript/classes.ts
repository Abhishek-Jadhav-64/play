class Person{
    firstname: string;
    lastname: string;

    constructor() {

    }

    getFullName() {
        return this.firstname + " " + this.lastname;
    }
}

var manoj = new Person();
manoj.firstname = "Manoj";
manoj.lastname = "Yadav";


function personEcho<T extends Person>(person: T): T {
    return person;
}