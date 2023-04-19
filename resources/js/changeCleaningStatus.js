const toggleButtons = document.querySelectorAll('#cleaning-status-button, #cancel-status-change')
const cleaningStatusPanel = document.querySelector('#cleaning-status-panel')

toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
        cleaningStatusPanel.classList.toggle('hidden')
        cleaningStatusPanel.classList.toggle('cleaning-status-panel')
    })
})
