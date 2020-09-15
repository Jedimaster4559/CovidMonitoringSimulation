# Event Requests
This documentation outlines the structure of event requests and how they can be interacted with

# General
Callbacks are currently not implemented yet. Additionally, all scripts currently call one php file called `events.php`. This can easily be changed to be either a different file name or multiple files for different events

## Move Person Requests
This event is designed to move a person from one location to another. The `personId` should move the person with that id from their current location to the tile of the `destinationId`
```
Format: GET
```
Fields
```
classroomId: int
personId: int
destinationId: int
wipe: boolean
```
Example Request
```
events.php?classroomId=3&personId=4&destinationId=7&wipe=false
```

## Update Person State
This event is designed to update the state of a person. This can be used to control if a person is wearing a face mask or face shield. The `personId` should update the person to be wearing or not wearing the `mask` and `faceshield`
```
Format: GET
```
Fields
```
personId: int
mask: boolean
faceshield: boolean
```
Example Request
```
events.php?personId=2&mask=true&faceshield=false
```

## Use Lysol
This event is designed to indicate that a person of a specific `personId` has used the lysol at their current location
```
Format: GET
```
Fields
```
personId: int
```
Example Request
```
events.php?personId=5
```

## Use Hand Sanitizer
This event is designed to indicate that a person of a specific `personId` has used the lysol at their current location
```
Format: GET
```
Fields
```
personId: int
```
Example Request
```
events.php?personId=5
```

## Request Data Update
This event is designed to request an update of the data model for a specific classroom.
```
Format: GET
```
Fields
```
classroomId: int
```
Example Request
```
events.php?classroomId=3
```

## Start Classes
This event represents the beginning of classes. This can be implemented as initializing the data model
```
Format: GET
```
Fields
```
None
```
Example Request
```
events.php
```

## End Classes
This event represents the ending of classes. This can be implemented as clearing the data model
```
Format: GET
```
Fields
```
None
```
Example Request
```
events.php
```

## Add Person
This event represents adding a new person to a specific class.
```
Format: GET
```
Fields
```
classroomId: int
personId: int
isTeacher: boolean
```
Example Request
```
events.php?classroomId=2&personId=4&isTeacher=false
```