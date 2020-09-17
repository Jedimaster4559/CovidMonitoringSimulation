var eventsDirectory = 'php/events/';

// See eventRequest.md for documentation
function movePerson(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'movePerson.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    requestContent = requestContent+'&personId='+formData.movePersonId.value;
    requestContent = requestContent+'&destinationId='+formData.moveDestinationSquare.value;
    requestContent = requestContent+'&wipe='+formData.movePersonWipe.checked;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4)
            processResponse();
    }

    request.send();
}

// See eventRequest.md for documentation
function updatePersonState(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'updateFace.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    requestContent = requestContent+'&personId='+formData.updatePersonId.value;
    requestContent = requestContent+'&mask='+formData.updateWearingMask.checked;
    requestContent = requestContent+'&faceshield='+formData.updateWearingFaceshield.checked;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4)
            processResponse();
    }

    request.send();
}

// See eventRequest.md for documentation
function useLysol(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'useCleaner.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    requestContent = requestContent+'&personId='+formData.useLysolPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4)
            processResponse();
    }

    request.send();
}

// See eventRequest.md for documentation
function useSanitizer(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'useCleaner.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    requestContent = requestContent+'&personId='+formData.useSanitizerPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4)
            processResponse();
    }

    request.send();
}

// See eventRequest.md for documentation
function addPerson(formData) {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'addPerson.php?';
    requestContent = requestContent+'classroomId='+formData.addPersonClassroomId.value;
    requestContent = requestContent+'&personId='+formData.addPersonPersonId.value;
    requestContent = requestContent+'&isTeacher='+formData.addPersonIsTeacher.checked;
    console.log(requestContent);
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if(request.readyState == 4)
            processResponse();
    }

    request.send();
}

// See eventRequest.md for documentation
function startClass(formData) {
    document.getElementById("startButton").style.visibility = "hidden";

    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'start.php';
    request.open("GET", requestContent);

    request.onreadystatechange = function (){
        if(request.readyState == 4)
            processResponse();
    }

    request.send();

    document.getElementById("endButton").style.visibility = "visible";
}

// See eventRequest.md for documentation
function endClass(formData) {
    document.getElementById("endButton").style.visibility = "hidden";

    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'end.php';
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if(request.readyState == 4)
            processResponse();
    }

    request.send();

    document.getElementById("startButton").style.visibility = "visible";
    
}

// See eventRequest.md for documentation
function updateClassroom() {
    request = new XMLHttpRequest();
    let requestContent = eventsDirectory+'switchRoom.php?';
    requestContent = requestContent+'classroomId='+getSelectedClassroom();
    console.log(requestContent);
    request.open("GET", requestContent);

    request.onreadystatechange = function() {
        if(request.readyState == 4)
            processResponse();
    }

    request.send();
}

// Gets the classroom that should be currently displayed
function getSelectedClassroom() {
    var e = document.getElementById("selectClassroomDropdown")
    return e.options[e.selectedIndex].value;
}

// Handles the responses from the server
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

        // Handle the people in the room
        processPeople(classroom.occupants);
        

    } else {
        console.log("Error: " + request.status);
    }
}

// Handles Processing for each of the physical spaces
// inside the classroom
function processTiles(tiles){
    let tile1 = tiles[0];
    updateEntranceGUI("001", tile1);
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

function processPeople(people){
    console.log(people);
    people.forEach(person => {
        if(person.status == "student"){
            addStudentToGUI(person);
            handleStudentAlerts(person);
        } else {
            addTeacherToGUI(person);
            handleTeacherAlerts(person);
        }
    });
}

// Adds a student to the gui display
function addStudentToGUI(student){
    let tileId = student.rectangle.destinationId.toString();
    let previousContent = document.getElementById(tileId + "-people").innerHTML;

    // Build HTML for Student Detail Display
    let personHTML = "<div class=\"student-detail\" id=\"";
    personHTML = personHTML + student.personId + "-student-detail\">";
    personHTML = personHTML + "Student #" + student.personId +"<br>";
    personHTML = personHTML + "Wearing Face Mask: <input type=\"checkbox\" ";
    personHTML = personHTML + "id=\"" + student.personId + "-student-mask\" disabled";
    if(!student.mastErrorAlarm){
        personHTML = personHTML + " checked";
    }
    personHTML = personHTML + "></div>";

    // Display and update content
    let updatedContent = previousContent + personHTML;
    document.getElementById(tileId+"-people").innerHTML = updatedContent;
}

// Adds a teacher to the gui display
function addTeacherToGUI(teacher){
    let tileId = teacher.rectangle.destinationId.toString();
    let previousContent = document.getElementById(tileId + "-people").innerHTML;

    // Build HTML for Student Detail Display
    let personHTML = "<div class=\"teacher-detail\" id=\"";
    personHTML = personHTML + teacher.personId + "-teacher-detail\">";
    personHTML = personHTML + "Teacher #" + teacher.personId +"<br>";
    personHTML = personHTML + "Wearing Face Mask: <input type=\"checkbox\" ";
    personHTML = personHTML + "id=\"" + teacher.personId + "-teacher-mask\" disabled";
    if(!teacher.maskErrorAlarm){
        personHTML = personHTML + " checked";
    }
    personHTML = personHTML + ">Wearing Face Shield: <input type=\"checkbox\" ";
    personHTML = personHTML + "id=\"" + teacher.personId + "-teacher-shield\" disabled";
    if(!teacher.shieldErrorAlarm){
        personHTML = personHTML + " checked";
    }
    personHTML = personHTML + "></div>";

    // Display and update content
    let updatedContent = previousContent + personHTML;
    document.getElementById(tileId+"-people").innerHTML = updatedContent;
    document.getElementById(teacher.personId.toString() + "-teacher-mask").checked = !teacher.maskErrorAlarm;
    document.getElementById(teacher.personId.toString() + "-teacher-shield").checked = !teacher.shieldErrorAlarm;
}

// Alarms for when students aren't wearing their facemask
function handleStudentAlerts(student){
    if(student.maskErrorAlarm){
        reportStudentError(student.personId.toString(), "A Student is not wearing their face mask");
    }
}

// Alarms for when teachers arn't wearing the faceshield
function handleTeacherAlerts(teacher){
    if(teacher.maskErrorAlarm){
        reportTeacherError(teacher.personId.toString(), "A Teacher is not wearing their face mask");
    }
    if(teacher.shieldErrorAlarm){
        reportTeacherError(teacher.personId.toString(), "A Teacher is not wearing their face shield");
    }
}

// Updates the GUI for desk tiles
function updateDeskGUI(tileId, tile){
    document.getElementById(tileId+"-lysol-number").innerHTML = tile.cleanCount;
}

// Handles alerts for desks
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
    document.getElementById("1-people").innerHTML = "";
    document.getElementById("2-people").innerHTML = "";
    document.getElementById("3-people").innerHTML = "";
    document.getElementById("4-people").innerHTML = "";
    document.getElementById("5-people").innerHTML = "";
    document.getElementById("6-people").innerHTML = "";
    document.getElementById("7-people").innerHTML = "";
    document.getElementById("8-people").innerHTML = "";
    document.getElementById("9-people").innerHTML = "";
    document.getElementById("10-people").innerHTML = "";
    document.getElementById("11-people").innerHTML = "";
    document.getElementById("12-people").innerHTML = "";
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

// Displays an error for a tile
function reportError(tileId, alertText){
    document.getElementById(tileId + "-tile").style.backgroundColor = "#FF0000";
    document.getElementById(tileId + "-tile").style.color = "#FFFFFF";

    // alert("Alert!\nTileID: " + tileId + "\nClassroom: " + request.requestContent.classroomId + "\n" + alertText);
    alert("Alert!\nTileID: " + tileId + "\nClassroom: " + getSelectedClassroom() + "\n" + alertText);

}

// Displays an error for a student
function reportStudentError(personId, alertText){
    document.getElementById(personId + "-student-detail").style.backgroundColor = "#FF0000";
    document.getElementById(personId + "-student-detail").style.color = "#FFFFFF";

    alert("Alert!\nStudentID: " + personId + "\nClassroom: " + getSelectedClassroom() + "\n" + alertText);
}

// Displays an error for a teacher
function reportTeacherError(personId, alertText){
    document.getElementById(personId + "-teacher-detail").style.backgroundColor = "#FF0000";
    document.getElementById(personId + "-teacher-detail").style.color = "#FFFFFF";

    alert("Alert!\nTeacherID: " + personId + "\nClassroom: " + getSelectedClassroom() + "\n" + alertText);
}

// Function to test that things are working properly
// function testFunction() {
//     clearGUI();
//     reportError("001", "This tile has an error");
//     //clearAlertStyling();
// }