=======================================================================================================
This text document includes information about the different functions in this file,
including their arguments, return values, and purpose.
=======================================================================================================
addTutor.php
	Arguments:
		tutor - array
			This is an array of a single tutor including their name
			and any additonal information such as email.
	Return:
		NONE
	Purpose:
		This function is used to add a tutor to the tutors.csv file and make
		an empty file for the tutor.
buildEditTutorForm.php
	Arguments:
		tutors - array
			This is an array of all the tutors and their information.
		newTutor - boolean
			This is a boolean which is true if the current tutor is
			a new tutor being added from the add tutor button.
	Return:
		editTutorForm - string
			This is a string containing the entire edit tutor form.
			The form will be filled in with default values if the
			tutor already exists.
	Purpose:
		This function is used to build the form that the user will interact
		with when trying to add, remove, and edit tutor event information.
buildEditTutorPage.php
	Arguments:
		NONE
	Return:
		editTutorPageContents - string
			This is a string of the entire edit tutor page contents including
			form, schedule, and title.
	Purpose:
		This function is used to build the edit tutor page in accordance with the
		current tutor being edited whether that be a new tutor or existing one.
buildSchedule.php
	Arguments:
		events - array
			This is an events array, it is a 3D array containing
			tutoring events split by day and sorted by time.
		tutorSchedule - boolean (default FALSE)
			This is a boolean used to determine if the schedule
			is being built for a indiviudal tutor or not.
			Will remove the tutor name from the schedule if TRUE.
	Return:
		schedule - string
			This is a string containing the schedule in an HTML table.
	Purpose:
		This function is used to build a schedule based upon the given
		event information, it is used for the main admin page, the tutoring
		blocks, the edit tutor pages, and the public tutoring page.
buildTutorBlock.phh
	Arguments:
		tutor - array
			This is an array of a single tutor including their name
			and any additonal information such as email.
	Return:
		tutorBlock - string
			This string is the entire contents of a single tutor block.
	Purpose:
		This function is used to build a tutor block specific to the given
		tutor. It includes a delete button and edit tutor button both of
		which are form submits with hidden information containing the
		tutors information.
convertTime.php
	Arguments:
		time - int
			This is the time that needs converting.
		increment - string
			This string can either be "00", "15", "30", or "45"
			and is the minutes for the time.
		mod - string
			This string can either be "am" or "pm" and is the
			am or pm modifier for the time.
	Return:
		convertedTime - int
			This is the time after converting it into 24 hour time.
	Purpose:
		This function is used to convert a 12 hour time into a 24 hour
		time format to allow for accurate and simple time based sorting.
deleteTutor.php
	Arguments:
		tutor - array
			This is an array of a single tutor including their name.
	Return:
		NONE
	Purpose:
		This function is used to delete a tutor from the data base, removing
		it from the tutors.csv file and deleting its events file.
fillEventForm.php
	Arguments:
		All event information except the name of the tutor - varies
			These variables are all used to fill in the information
			of the form with default values.
	Return:
		filledForm - string
			This is a string of a filled formed for a single event.
	Purpose:
		This function is used to build as many chunck of the form for a single
		event as needed for the tutor. They are added to the whole form in the
		buildEditTutorForm.php file.
readEvents.php
	Arguments:
		fileName - string
			This is the name of the file to read from.
	Return:
		events - array
			This is a 3D array of events from the file.
	Purpose:
		This function is used to read the events from a file and get them
		into the proper array format and sort them according to time.
readTutors.php
	Arguments:
		NONE
	Return:
		tutors - array
			This is an array of all the tutors and their information.
	Purpose:
		This function is used to read from the tutors.csv file and
		get the information into an array fur use in other parts of the website.
saveEditTutorChanges.php
	Arguments:
		NONE
	Return:
		NONE
	Purpose:
		This function is used to save the content submitted by the user into
		the tutors files.
sortEvents.php
	Arguments:
		x - array
			This is the array of the first event to compare.
		y - array
			this is the array of the second event to compare.
	Return:
		-,0,+ - int
			A positive number means the first event is later, a
			negative number means it is earlier, and 0 means
			they are at the same time.
	Purpose:
		This function is used to sort the events arrays when they are
		read using readEvents.php.
sortTutors.php
	Arguments:
		x - array
			This is the array of the first tutor.
		y - array
			This is the array of the second tutor.
	Return:
		-,0,+ - int
			A positive number means the first tutor is later in
			the alphabet, a negative number means the first tutor
			is earlier in the alphabet, and a 0 means they are both
			the same name.
	Purpose:
		This function is used to sort the tutors when they are read in
		the readTutors.php function.
writeEvents.php
	Arguments:
		tutors - array
			This is an array of all the tutors and their information.
	Return:
		NONE
	Purpose:
		This function is used to write the events of all tutors into a single events file.
writeTutorEvents.php
	Arguments:
		All event information - varies
			These variables are used to write the tutors events file.
	Return:
		NONE
	Purpose:
		This function is used to write a tutors events to their events file.
writeTutor.php
	Arguments:
		tutors - array
			This is an array of tutors including their name and additonal
			information such as emails.
	Return:
		NONE
	Purpose:
		This function is used to write an array of tutors to the tutors.csv file.