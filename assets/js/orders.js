const route = document.getElementById('route').value
const listContainer = document.getElementById('listContainer')
const formOrders = document.getElementById('formOrders')
const total = document.getElementById('total')

async function loadCard () {
    const response = await fetch(`${route}api/carrito/api-carrito.php?action=mostrar`)
    const res = await response.json()

    return res
}

function createItem (itm) {
    const item = document.createElement('div')
    item.className = 'w-full border-b-2 border-gray-500 flex justify-between items-center'

    const itemImgContainer = document.createElement('div')
    itemImgContainer.className = 'w-60 p-2 flex'

    const itemImg = document.createElement('img')
    itemImg.className = 'h-16 w-16 object-contain'
    itemImg.setAttribute('src', `${route}uploads/${itm.img}`)

    const titleContainer = document.createElement('div')
    titleContainer.className = 'w-40 p-1'

    const title = document.createElement('p')
    title.textContent = itm.name

    const descriptionContainer = document.createElement('div')

    const amount = document.createElement('p')
    amount.textContent = `Cantidad: ${itm.cantidad}`

    const price = document.createElement('p')
    price.textContent = `Precio: $${itm.price} COP`

    titleContainer.append(title)

    itemImgContainer.append(itemImg)
    itemImgContainer.append(titleContainer)

    descriptionContainer.append(amount)
    descriptionContainer.append(price)

    item.append(itemImgContainer)
    item.append(descriptionContainer)

    return item
}

async function showItems () {
    const cart = await loadCard()
    const items = cart.items
    console.log(cart)
    total.textContent = `$${cart.info.total} COP`

    items.forEach(data => {
        const item = createItem(data)
        listContainer.append(item)
    })
}

const getDate = () => {
    const f = new Date()
    date = `${f.getDate()}-${f.getMonth() + 1}-${f.getFullYear()}`
    return date
}

formOrders.addEventListener('submit', async (e) => {
    e.preventDefault()
    const cart = await loadCard()
    const items = cart.items

    const data = new FormData(formOrders)
    const date = getDate();
    data.append('orders', JSON.stringify(items))
    data.append('date', date)

    const response = await fetch(`${route}api/pay/pay.php`, {
        method: 'POST',
        body: data
    })

    const res = await response.json()

    if (res.status == 'success') {
        Swal.fire(
            'Pedido realizado',
            '¡Gracias por elegirnos!',
            'success'
        )
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Algo salió mal',
            footer: '<a href="">Contactanos</a>'
        })
    }
})

showItems();