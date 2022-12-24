const main = document.getElementById('main')
const imagesPath = '../uploads/img_menu/'

const loadItems = async () => {
    const response = await fetch('api/menu.php?getall')
    const res = await response.json()

    return res
}

const refreshItems = async () => {
    main.innerHTML = ''
    const items = await loadItems()

    items.forEach(element => {
        const item = createItem(element)
        main.append(item)
    });
}

const deleteItem = async (id) => {
    const data = new FormData();
    data.append('action', 'delete')
    data.append('id', id)
    const response = await fetch('api/menu.php', {
        method: 'POST',
        body: data
    })
    const res = await response.json()
    refreshItems()

    console.log(res)
}

const updateItem = () => {

}

const createItem = (item) => {
    const { id, image, title } = item

    const element = document.createElement('div')
    element.className = 'w-40 h-56 bg-white rounded shadow-md m-2'

    const img = document.createElement('img')
    img.setAttribute('src', imagesPath+image)
    img.className = 'w-full h-36 object-contain'

    const paragraph = document.createElement('p')
    paragraph.textContent = title
    paragraph.className = 'w-full overflow-hidden text-center px-2'

    const panel = document.createElement('div')
    panel.className = 'flex justify-evenly my-2'

    const btnDelete = document.createElement('button')
    btnDelete.className = 'h-8 w-8 bg-red-600 text-white rounded'
    btnDelete.innerHTML = "<i class='bx bx-trash-alt' ></i>"
    btnDelete.addEventListener('click', () => { deleteItem(id) })

    const btnEdit = document.createElement('button')
    btnEdit.className = 'h-8 w-8 bg-neutral-900 text-white rounded'
    btnEdit.innerHTML = "<i class='bx bx-edit'></i>"

    const input = document.createElement('input')
    input.setAttribute('type', 'hidden')
    input.setAttribute('value', id)

    panel.append(btnDelete)
    panel.append(btnEdit)

    element.append(img)
    element.append(paragraph)
    element.append(panel)
    element.append(input)

    return element
}

window.addEventListener('load', async () => {
    const items = await loadItems()

    items.forEach(element => {
        const item = createItem(element)
        main.append(item)
    });

})