
const btnItemRemove = document.getElementById('btnItemRemove')
const btnItemAdd = document.getElementById('btnItemAdd')
const counter = document.getElementById('counter')
const itemId = document.getElementById('itemId').value

const updateCounter = async () => {
    const response = await fetch(`${route}api/carrito/api-carrito.php?action=mostrar`)
    const res = await response.json();

    res.items.forEach((item) => {
        if (item.id == itemId) {
            counter.textContent = item.cantidad
        }
    })

    console.log(res)
}

updateCounter()

btnItemRemove.addEventListener('click', (e) => {
    removeToCart(e)
    updateCounter()
})
btnItemAdd.addEventListener('click', (e) => {
    addToCar(e)
    updateCounter()
})