This documentation is an easy way to learn the purpose of each function in this folder

blankEventForm.php
	This function takes a day of the week and returns a blank event form.
buildAdminPage.php
	This function performs all the steps needed to display the admin page.
	It makes all temp files equal to the core files to ensure only intended
	changes are made by the user. It reads the tutors.csv to get a list of
	all tutors and make a block containing their event information. It writes
	the events.csv file using each individual tutorEvents.csv file. It reads
	the events.csv file and then makes a schedule with that to produce a preview
	of what the schedule will appear as for the students.
buildSchedule.php
	This function takes the events array and converts it into a HTML approriate
	table in the form of a string.
buildTutorBlock.php
	This function takes a tutor and a path as an argument and builds a block
	with the tutors name and schedule all within a div tag with an id equal
	to their first and last name no spaces. Returns the string of this block.
buildTutoringSchedule.php
	This function reads the tutor list, builds the events.csv file
	and then reads that file and builds the events schedule.
compareStart.php
	This function is used to sort the events based upon start time.
filledEventForm.php
	This function takes the content of a single event and returns a
	form for an event with the content already filled in.
readEvents.php
	This function reads the events.csv and returns a sorted events array.
readTutorEvents.php
	This function reads the tutorEvents.csv and returns a sorted events array.
readTutors.php
	This function reads the tutors.csv and returns a sorted tutors array.
sortTutors.php
	This function is used to sort the tutors based upon last then first name.
writeEvents.php
	This function writes the events.csv file based upon the tutorEvents.csv files.
