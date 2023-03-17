"use strict";

// Declarations

const roomsContainer = document.querySelector('#rooms-container');

const detailsSection = document.querySelector('#details-section');

const detailsNumber = document.querySelector('#details-number');
const detailsType = document.querySelector('#details-type');
const detailsPricePerNight = document.querySelector('#details-price-per-night');
const detailsCapacity = document.querySelector('#details-capacity');
const detailsBedConfiguration = document.querySelector('#details-bed-configuration');
const detailsView = document.querySelector('#details-view');
const detailsDescription = document.querySelector('#details-description');
const detailsCleaningStatus = document.querySelector('#details-cleaning-status');

const detailsInfoButton = document.querySelector('#details-info-button');

// Methods

roomsContainer.addEventListener('click', e => {
    const target = e.target;

    if(target.closest('.room-item')) {
        handleRoomSelect(target.closest('.room-item'));

        if(detailsSection.matches('.hidden')) {
            showDetailsSection();
        }
    }
})

function showDetailsSection() {
    detailsSection.classList.remove('hidden');
}

function handleRoomSelect(room) {
    const roomDetails = JSON.parse(room.dataset.roomDetails);
    const roomType = room.dataset.roomType;
    const roomView = room.dataset.roomView;
    const cleaningStatus = room.dataset.cleaningStatus;
    
    setRoomDetails(roomDetails, roomType, roomView, cleaningStatus);

    detailsInfoButton.pathname = getPathName(roomDetails.id);
}

function setRoomDetails(roomDetails, roomType, roomView, cleaningStatus) {
    setElementText(detailsNumber, roomDetails.room_number);
    setElementText(detailsType, roomType);
    setElementText(detailsPricePerNight, roomDetails.base_price_per_night);
    setElementText(detailsCapacity, roomDetails.capacity);
    setElementText(detailsBedConfiguration, roomDetails.bed_configuration);
    setElementText(detailsView, roomView);
    setElementText(detailsDescription, roomDetails.description);
    setElementText(detailsCleaningStatus, cleaningStatus);
}

function setElementText(element, text) {
    element.innerText = text;
}

function getPathName(id) {
    return `/room/${id}/info`;
}