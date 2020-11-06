let form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', function() {
    alert('Submitted!')
    event.preventDefault()
})