var eventsDirectory = 'php/events/';

function movePerson(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'movePerson.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    requestContent = requestContent+'&personId='+formData.movePersonId.value;
    requestContent = requestContent+'&destinationId='+formData.moveDestinationSquare.value;
    requestContent = requestContent+'&wipe='+formData.movePersonWipe.checked;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            processResponse();
    }

    request.send();
}

function updatePersonState(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'updateFace.php?';
    requestContent = requestContent+'personId='+formData.updatePersonId.value;
    requestContent = requestContent+'&mask='+formData.updateWearingMask.checked;
    requestContent = requestContent+'&faceshield='+formData.updateWearingFaceshield.checked;

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            processResponse();
    }

    request.send();
}

function useLysol(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'useCleaner.php?';
    requestContent = requestContent+'personId='+formData.useLysolPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            processResponse();
    }

    request.send();
}

function useSanitizer(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'useCleaner.php?';
    requestContent = requestContent+'personId='+formData.useSanitizerPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            processResponse();
    }

    request.send();
}

function addPerson(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'addPerson.php?';
    requestContent = requestContent+'classroomId='+formData.addPersonClassroomId.value;
    requestContent = requestContent+'&personId='+formData.addPersonPersonId.value;
    requestContent = requestContent+'&isTeacher='+formData.addPersonIsTeacher.checked;
    console.log(requestContent);
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if(request.readyState == 4);
            processResponse();
    }

    request.send();
}

function startClass(formData) {
    testFunction();
    document.getElementById("startButton").style.visibility = "hidden";

    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'start.php';
    request.open("GET", requestContent);

    request.onreadystatechange = function (){
        if(request.readyState == 4);
            processResponse();
    }

    request.send();

    document.getElementById("endButton").style.visibility = "visible";
}

function endClass(formData) {
    document.getElementById("endButton").style.visibility = "hidden";

    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'end.php';
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if(request.readyState == 4);
            processResponse();
    }

    request.send();

    document.getElementById("startButton").style.visibility = "visible";
    
}

function updateClassroom() {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'switchRoom.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    console.log(requestContent);
    request.open("GET", requestContent);

    request.onreadystatechange = function() {
        if(request.readyState == 4);
            processResponse();
    }

    request.send();
}

function getSelectedClassroom() {
    var e = document.getElementById("selectClassroomDropdown")
    return e.options[e.selectedIndex].value;
}

function processResponse(){
    if(request.status == 200){
        // Debug log the response
        console.log(request.responseText);

        // Reset GUI
        clearAlertStyling();
        clearGUI();

        // Read response
        var classroom = JSON.parse(request.responseText);

        // Handle the physical locations in the room
        processTiles(classroom.rectangles);
        

    } else {
        console.log("Error: " + request.status);
    }
}

// Handles Processing for each of the physical spaces
// inside the classroom
function processTiles(tiles){
    let tile1 = tiles[0];
    updateEntranceGUI("001", tile);
    handleEntranceAlerts("001", tile1);
    let tile2 = tiles[1];
    handleAislewayAlerts("002", tile2);
    let tile3 = tiles[2];
    updateDeskGUI("003", tile3);
    handleDeskAlerts("003", tile3);
    let tile4 = tiles[3];
    handleAislewayAlerts("004", tile4);
    let tile5 = tiles[4];
    updateDeskGUI("005", tile5);
    handleDeskAlerts("005", tile5);
    let tile6 = tiles[5];
    updateDeskGUI("006", tile6);
    handleDeskAlerts("006", tile6);
    let tile7 = tiles[6];
    handleAislewayAlerts("007", tile7);
    let tile8 = tiles[7];
    updateDeskGUI("008", tile8);
    handleDeskAlerts("008", tile8);
    let tile9 = tiles[8];
    handleAislewayAlerts("009", tile9);
    let tile10 = tiles[9];
    updateDeskGUI("010", tile10);
    handleDeskAlerts("010", tile10);
    let tile11 = tiles[10];
    updateDeskGUI("011", tile11);
    handleDeskAlerts("011", tile11);
    let tile12 = tiles[11];
    handleAislewayAlerts("0012", tile12);
}

// Updates the GUI for desk tiles
function updateDeskGUI(tileId, tile){
    document.getElementById(tileId+"-lysol-number").innerHTML = tile.cleanCount;
}

function handleDeskAlerts(tileId, tile){
    if(tile.noLysolUsedAlarm){
        reportError(tileId, "Someone Left the tile without using the Hand Sanitizer");
    }
    if(tile.tooManyPeopleAlarm){
        reportError(tileId, "There are too many people in this tile");
    }
}

// Updates the GUI for entrance tiles
function updateEntranceGUI(tileId, tile){
    if(tile.cleanCount > 0){
        document.getElementById(tileId+"-sanitizer-box").checked = true;
    }
}

// Handle alerts for an Entrance Tile
function handleEntranceAlerts(tileId, tile){
    if(tile.noSanitizerUsedAlarm){
        reportError(tileId, "Someone Left the tile without using the Hand Sanitizer");
    }
    if(tile.tooManyPeopleAlarm){
        reportError(tileId, "There are too many people in this tile");
    }
}

function handleAislewayAlerts(tileId, tile){
    if(tile.tooManyPeopleAlarm){
        reportError(tileId, "There are too many people in this tile");
    }
}

// Clears the state of the GUI
function clearGUI(){
    document.getElementById("001-sanitizer-box").checked = false;
}

// Clears the Styling on all tiles so new alerts can
// can be reported
function clearAlertStyling(){
    document.getElementById("001-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("001-tile").style.color = "#000000";
    document.getElementById("002-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("002-tile").style.color = "#000000";
    document.getElementById("003-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("003-tile").style.color = "#000000";
    document.getElementById("004-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("004-tile").style.color = "#000000";
    document.getElementById("005-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("005-tile").style.color = "#000000";
    document.getElementById("006-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("006-tile").style.color = "#000000";
    document.getElementById("007-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("007-tile").style.color = "#000000";
    document.getElementById("008-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("008-tile").style.color = "#000000";
    document.getElementById("009-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("009-tile").style.color = "#000000";
    document.getElementById("010-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("010-tile").style.color = "#000000";
    document.getElementById("011-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("011-tile").style.color = "#000000";
    document.getElementById("012-tile").style.backgroundColor = "#FFFFFF";
    document.getElementById("012-tile").style.color = "#000000";
}

function reportError(tileId, alertText){
    document.getElementById(tileId + "-tile").style.backgroundColor = "#FF0000";
    document.getElementById(tileId + "-tile").style.color = "#FFFFFF";

    alert("Alert!\nTileID: " + tileId + "\nClassroom: " + request.requestContent.classroom + "\n" + alertText);
}

// Function to test that things are working properly
// function testFunction() {
//     clearGUI();
//     reportError("001", "This tile has an error");
//     //clearAlertStyling();
// }