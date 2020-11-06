let form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', function() {
    alert('Submitted!')
    event.preventDefault()

    let inputs = document.getElementsByTagName('form')[0].elements;
    let desc = inputs.description.value
    let quant = inputs.quantity.value

    const table = document.getElementById("products")
    const row = table.insertRow(-1)

    let x = row.insertCell(0)
    x.innerHTML = desc
    x = row.insertCell(1)
    x.innerHTML = `<input value="${quant}">`

    x.addEventListener('change', function (event) {
        alert('Changed!')
        total.textContent = String(Number(total.textContent) - Number(quant) + Number(event.target.value))
        quant = event.target.value
    })

    x = row.insertCell(2)
    x.innerHTML = `<input type="button" value="Remove">`

    const total = document.getElementById('total')
    total.textContent = String(Number(total.textContent) + Number(quant))

    x.addEventListener('click', function () {
        alert('Removed!')
        table.deleteRow(row.rowIndex)
        total.textContent = String(Number(total.textContent) - Number(quant))
    })
})
