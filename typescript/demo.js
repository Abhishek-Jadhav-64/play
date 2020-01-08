var a;
var b;
var c;
a = 10;
b = true;
c = 'Hello';
var myArr;
function add(a, b, c, d) {
    if (c === void 0) { c = 0; }
    if (d === void 0) { d = 0; }
    return a + b + c + d;
}
var sum = add(1, 2);
console.log(sum);
