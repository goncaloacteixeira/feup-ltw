
let output = document.getElementsByTagName("form")
console.log(output[0].outerHTML)

output = document.querySelector('form input[name="quantity"]')
console.log(output.outerHTML)

output = document.querySelectorAll('form input')
console.log(output)

