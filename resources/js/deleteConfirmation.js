

const toggleButtons = document.querySelectorAll('#delete-button, #cancel-delete')
const deleteConfirmation = document.querySelector('#delete-confirmation')

toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
        deleteConfirmation.classList.toggle('hidden')
        deleteConfirmation.classList.toggle('delete-confirmation')
    })
})
