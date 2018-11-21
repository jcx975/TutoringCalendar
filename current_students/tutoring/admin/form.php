<form action="saveSchedule.php" method="POST">
	<select name="day">
		<option value="Sunday">Sunday</option>
		<option value="Monday">Monday</option>
		<option value="Tuesday">Tuesday</option>
		<option value="Wednesday">Wednesday</option>
		<option value="Thursday">Thursday</option>
		<option value="Friday">Friday</option>
		<option value="Saturday">Saturday</option>
	</select>
	<label for="start">Start Time</label>
	<input type="number" id="start" name="start" min="1" max="12" step="1" required>
	<select name="startMod">
		<option value="am">AM</option>
		<option value="pm">PM</option>
	</select>
	<label for="end">End Time</label>
	<input type="number" id="end" name="end" min="1" max="12" step="1" required>
	<select name="endMod">
		<option value="am">AM</option>
		<option value="pm">PM</option>
	</select>
	<input type="submit">
</form>