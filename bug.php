function foo(a, b) {
  if (a === b) {
    return true; 
  }
  if (typeof a !== 'object' || typeof b !== 'object') {
    return false; 
  }
  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false; 
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key])) {
      return false; 
    }
  }
  return true; 
}

console.log(foo({ a: 1, b: 2 }, { a: 1, b: 2 })); // true
console.log(foo({ a: 1, b: 2 }, { a: 1, b: 3 })); // false
console.log(foo({ a: 1, b: { c: 3 } }, { a: 1, b: { c: 3 } })); // true
console.log(foo({ a: 1, b: { c: 3 } }, { a: 1, b: { c: 4 } })); // false
console.log(foo({ a: 1, b: { c: 3, d: 4 } }, { a: 1, b: { c: 3 } })); //false
console.log(foo(NaN,NaN)); //true, should be false