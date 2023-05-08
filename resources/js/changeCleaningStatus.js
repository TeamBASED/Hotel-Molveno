"use strict";

const cleaningStatusPanel = document.querySelector('#cleaning-status-panel');
const cleaningStatusForm = document.querySelector('#cleaning-status-form');

const detailsCleaningStatus = document.querySelector('#details-cleaning-status');

const toggleMenuButtons = document.querySelectorAll('.cleaning-menu-button, #cancel-status-change');

const cleaningStatusOptions = document.querySelectorAll('#status-selector > .filter-field-option');

const darkenedBackground = document.querySelector('.darken-bg');

toggleMenuButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        toggleCleaningStatusMenu(e);
    })
})

function toggleCleaningStatusMenu(e) {
    cleaningStatusPanel.classList.toggle('hidden')
    cleaningStatusPanel.classList.toggle('cleaning-status-panel')

    const target = e.target;
    if (target.closest('.room-item')) {
        darkenedBackground.style.display = 'block';
        handleRoomSelect(target.closest('.room-item'));
    } else if (target.matches("#cancel-status-change")) {
        darkenedBackground.style.display = 'none';
        for (const option of cleaningStatusOptions) {
            option.removeAttribute('selected', '');
        }
    }
}

function handleRoomSelect(room) {
    const roomDetails = JSON.parse(room.dataset.roomDetails);
    console.log(roomDetails);

    setCleaningStatus(roomDetails);

    cleaningStatusForm.action = getPathToRoom(roomDetails.id);
}

function getPathToRoom(id) {
    return `/room/${id}/status`;
}

function setCleaningStatus(data) {
    for (const option of cleaningStatusOptions) {
        if (option.value == data.cleaning_status.id) {
            option.setAttribute('selected', '');
        }
    }
};
