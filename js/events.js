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
    request.open("GET", requestContent);

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
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if(request.readyState == 4);
            processResponse();
    }

    request.send();
}

function startClass(formData) {
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
        console.log(request.responseText);
    } else {
        console.log("Error: " + request.status);
    }
}