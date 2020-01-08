var a: number;
var b: boolean;
var c: string;

a = 10;
b = true;
c = 'Hello';

var myArr : number[];

function add(a : number, b : number, c : number = 0, d : number = 0) : number {
    return a+b+c+d;
}

var sum = add(1,2);
console.log(sum);