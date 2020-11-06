let form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', function() {
    alert('Submitted!')
    event.preventDefault()

    addNewElement()
})

function addNewElement() {
    let inputs = document.getElementsByTagName('form')[0].elements;
    let desc = inputs.description.value
    let quant = inputs.quantity.value

    const table = document.getElementById("products")
    const row = table.insertRow(-1)

    console.log(desc)

    let x = row.insertCell(0)
    x.innerHTML = desc
    x = row.insertCell(1)
    x.innerHTML = `<input value="${quant}">`
    x = row.insertCell(2)
    x.innerHTML = `<input type="button" value="Remove">`
}