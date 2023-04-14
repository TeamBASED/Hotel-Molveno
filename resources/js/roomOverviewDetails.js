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
const detailsReserveButton = document.querySelector('#details-reservation-button');

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
    console.log(detailsBedConfiguration.childNodes);
    console.log(roomDetails);
    
    setRoomDetails(roomDetails);

    detailsInfoButton.pathname = getPathToRoomInfo(roomDetails.id);
    detailsReserveButton.pathname = getPathToReservationContact(roomDetails.id);
}

function setRoomDetails(data) {
    setElementText(detailsNumber, data.room_number);
    setElementText(detailsType, data.room_type.type);
    setElementText(detailsPricePerNight, data.base_price_per_night);
    setElementText(detailsCapacity, data.capacity);
    setElementText(detailsView, data.room_view.view);
    setElementText(detailsCleaningStatus, data.cleaning_status.status);
    updateBedConfiguration(data.bed_configurations);
}

function updateBedConfiguration(bedConfigurations) {
    removeAllChildNodes(detailsBedConfiguration);

    for(const config of bedConfigurations) {
        detailsBedConfiguration.appendChild(
            buildBedConfigurationRow(config.configuration, config.pivot.amount)
        );
    }
}

function setElementText(element, text) {
    element.innerText = text;
}

function getPathToRoomInfo(id) {
    return `/room/${id}/info`;
}

function getPathToReservationContact(id) {
    return `/reservation/${id}/contact`;
}

function buildBedConfigurationRow(bedType, amount) {
    let textElement = document.createElement("p");
    textElement.innerText = `${amount}x ${bedType}`;
    return textElement;
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}