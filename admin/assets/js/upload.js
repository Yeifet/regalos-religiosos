const btnCreate = document.getElementById('btn_create')
const modal = document.getElementById('modal')
const btnClose = document.getElementById('btn_close')
const form = document.getElementById('form')

btnCreate.addEventListener('click', () => {
    modal.classList.add('left-0')
    modal.classList.remove('left-full')
})

btnClose.addEventListener('click', () => {
    modal.classList.remove('left-0')
    modal.classList.add('left-full')
})

form.addEventListener('submit', async (e) => {
    e.preventDefault()
    const data = new FormData(form)

    const response = await fetch('api/menu.php', {
        method: 'POST',
        body: data
    })
    const res = await response.json()

    if(res.message === 'success') {
        Swal.fire(
            'Success',
            'Added a product',
            'success'
        )
        modal.classList.remove('left-0')
        modal.classList.add('left-full')
        form.reset()
    }
})