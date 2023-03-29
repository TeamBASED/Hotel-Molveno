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
    console.log(roomDetails);
    // const roomType = room.dataset.roomType;
    // const roomView = room.dataset.roomView;
    // const cleaningStatus = room.dataset.cleaningStatus;
    
    setRoomDetails(roomDetails);

    detailsInfoButton.pathname = getPathName(roomDetails.id);
}

function setRoomDetails(data) {
    setElementText(detailsNumber, data.room_number);
    setElementText(detailsType, data.room_type.type);
    setElementText(detailsPricePerNight, data.base_price_per_night);
    setElementText(detailsCapacity, data.capacity);
    // setElementText(detailsBedConfiguration, roomDetails.bed_configuration);
    setElementText(detailsView, data.room_view.type);
    setElementText(detailsCleaningStatus, data.cleaning_status.status);
}

function setBedConfiguration() {

}

function setElementText(element, text) {
    element.innerText = text;
}

function getPathName(id) {
    return `/room/${id}/info`;
}

function buildBedConfigurationRow(bedType, amount) {
    let textElement = document.createElement("p");
    // textElement.innerText = 
    // TODO: fill in text, first amount then type maybe? use this to make a list of the bed configs
}