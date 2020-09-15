var targetScript = 'events.php?';

function movePerson(formData) {
    request = new XMLHttpRequest();
    let requestContent = targetScript;
    requestContent = requestContent+'personId='+formData.movePersonId.value;
    requestContent = requestContent+'&destinationId='+formData.moveDestinationSquare.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            // TODO implement callback
    }

    request.send();
}

function updatePersonState(formData) {
    request = new XMLHttpRequest();
    let requestContent = targetScript;
    requestContent = requestContent+'personId='+formData.updatePersonId.value;
    requestContent = requestContent+'&mask='+formData.updateWearingMask.checked;
    requestContent = requestContent+'&faceshield='+formData.updateWearingFaceshield.checked;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            // TODO implement callback
    }

    request.send();
}

function useLysol(formData) {
    request = new XMLHttpeRequest();
    let requestContent = targetScript;
    requestContent = requestContent+'personId='+formData.useLysolPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            // TODO implement callback
    }

    request.send();
}

function useSanitizer(formData) {
    request = new XMLHttpeRequest();
    let requestContent = targetScript;
    requestContent = requestContent+'personId='+formData.useSanitizerPersonId.value;
    request.open("GET", requestContent);

    request.onreadystatechange = function () {
        if (request.readyState == 4);
            // TODO implement callback
    }

    request.send();
}