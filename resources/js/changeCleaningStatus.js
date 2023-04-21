"use strict";

const toggleButtons = document.querySelectorAll('.cleaning-status-button, #cancel-status-change')
const cleaningStatusPanel = document.querySelector('#cleaning-status-panel')

toggleButtons.forEach((button) => {
    button.addEventListener("click", () => {
        cleaningStatusPanel.classList.toggle('hidden')
        cleaningStatusPanel.classList.toggle('cleaning-status-panel')

        if (e.target.closest('.room-item')) {
            handleRoomSelect(target.closest('.room-item'));

            if (detailsSection.matches('.hide-section')) {
                showDetailsSection();
            }
        }
    })
})

function handleRoomSelect(room) {
    const roomDetails = JSON.parse(room.dataset.roomDetails);
    console.log(detailsBedConfiguration.childNodes);
    console.log(roomDetails);

    setRoomDetails(roomDetails);

    detailsInfoButton.pathname = getPathToRoomInfo(roomDetails.id);
    detailsReserveButton.pathname = getPathToReservationContact(roomDetails.id);
}

function setRoomDetails(data) {
    setElementText(detailsCleaningStatus, data.cleaning_status.status);
    updateBedConfiguration(data.bed_configurations);
}