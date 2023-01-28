const addCardBtns = document.getElementsByClassName('btnAdd')
const modalCart = document.getElementById('modalCart')
const cartBtn = document.getElementById('cartBtn')
const btnCloseCart = document.getElementById('btnCloseCart')
const cartContainer = document.getElementById('cartContainer')
const route = document.getElementById('route').value
const btnCloseMenu = document.getElementById('btnCloseMenu')
const menuNav = document.getElementById('menuNav')
const btnMenu = document.getElementById('btnMenu')

async function addToCar(e) {
    const item = e.target
    const itemId = item.parentElement.lastElementChild.value
    console.log(itemId)
    
    const responseAdd = await fetch(`${route}api/carrito/api-carrito.php?action=add&id=${itemId}`)
    const resId = await responseAdd.json()

    console.log(resId)
}

async function removeToCart (e) {
    const item = e.target
    const itemId = item.parentElement.lastElementChild.value
    
    const responseAdd = await fetch(`${route}api/carrito/api-carrito.php?action=remove&id=${itemId}`)
    const resId = await responseAdd.json()

    showCart()

    console.log(resId)
}

function createItem (item) {
    const { id, name, price, img, cantidad } = item

    const card = document.createElement('div')
    card.className = 'w-40 shadow-md rounded relative m-2 bg-white'

    const imgContainer = document.createElement('div')
    imgContainer.className = 'w-40 h-40'

    const itemImg = document.createElement('img')
    itemImg.className = 'h-full w-full object-contain'
    itemImg.setAttribute('alt', name)
    itemImg.setAttribute('src', `${route}uploads/${img}`)

    const infoContainer = document.createElement('div')
    infoContainer.className = 'w-full h-28 bg-gradient-to-t from-yellow-500 to-white left-0 bottom-0 rounded p-2 text-gray-900 flex flex-col items-center'

    const itemTitle = document.createElement('h2')
    itemTitle.textContent = name

    const itemPrice = document.createElement('p')
    itemPrice.className = 'text-sm'
    itemPrice.textContent = price

    const amount = document.createElement('p')
    amount.className = 'text-sm'
    amount.textContent = `Cantidad: ${cantidad}`

    const removeButton = document.createElement('button')
    removeButton.className = 'py-1 px-4 rounded-md bg-white active:bg-yellow-500 active:text-white'
    removeButton.textContent = 'Quitar'
    removeButton.addEventListener('click', removeToCart)

    const inputId = document.createElement('input')
    inputId.setAttribute('value', id)
    inputId.setAttribute('type', 'hidden')

    infoContainer.append(itemTitle)
    infoContainer.append(itemPrice)
    infoContainer.append(amount)
    infoContainer.append(removeButton)
    infoContainer.append(inputId)

    imgContainer.append(itemImg)

    card.append(imgContainer)
    card.append(infoContainer)

    return card
}

async function showCart () {
    cartContainer.innerHTML = ''
    const responseAdd = await fetch(`${route}api/carrito/api-carrito.php?action=mostrar`)
    const resId = await responseAdd.json()
    const fragment = document.createDocumentFragment()

    resId.items.forEach(item => {
        const card = createItem(item)
        fragment.append(card)
    });

    cartContainer.append(fragment)

    console.log(resId)
}

const toggleModal = () => {
    modalCart.classList.toggle('left-0');
    modalCart.classList.toggle('left-full');
}

cartBtn.addEventListener('click', () => {
    toggleModal()
    showCart()
})
btnCloseCart.addEventListener('click', toggleModal)

for(let i = 0; i < addCardBtns.length; i++) {
    addCardBtns[i].addEventListener('click', addToCar)
}

const toggleMenu = () => {
    menuNav.classList.toggle('left-0')
    menuNav.classList.toggle('left-full')
}

btnMenu.addEventListener('click', toggleMenu)
btnCloseMenu.addEventListener('click', toggleMenu)