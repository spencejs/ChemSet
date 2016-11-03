<p>The <code>fieldset</code> element enables you to group related fields within a form, and each one should contain a corresponding <code>legend</code>. The <code>label</code> element ensures field descriptions are associated with their corresponding form widgets.</p>

<form>
	<fieldset>
		<legend>Legend</legend>
		<p><small>Required fields are marked</small></p>
		<p>
			<label for="text">Text Input</label>
			<input id="text" type="text" required/>
			<small>Note about this field</small>
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password" type="password" required/>
			<small>Note about this field</small>
		</p>
		<p>
			<label for="email">Email Address</label>
			<input id="email" type="email" placeholder="you@example.com" required/>
			<small>Note about this field</small>
		</p>
		<p>
			<label for="url">Web Address</label>
			<input id="url" type="url" placeholder="http://example.com" required/>
			<small>Note about this field</small>
		</p>
		<p>
			<label for="select">Select</label>
			<select id="select">
				<optgroup label="Option Group">
					<option>Option One</option>
					<option>Option Two</option>
					<option>Option Three</option>
				</optgroup>
			</select>
			<small>Note about this selection</small>
		</p>
		<fieldset class="options">
			<legend>Checkbox</legend>
			<label for="checkbox1">
				<input id="checkbox1" name="checkbox" type="checkbox" checked="checked"/>
				Choice A
			</label>
			<label for="checkbox2">
				<input id="checkbox2" name="checkbox" type="checkbox"/>
				Choice B
			</label>
			<label for="checkbox3">
				<input id="checkbox3" name="checkbox" type="checkbox"/>
				Choice C
			</label>
			<small>Note about these options</small>
		</fieldset>
		<fieldset class="options">
			<legend>Radio</legend>
			<label for="radio1">
				<input id="radio1" name="radio" type="radio" checked="checked"/>
				Option 1
			</label>
			<label for="radio2">
				<input id="radio2" name="radio" type="radio" checked="checked"/>
				Option 2
			</label>
			<label for="radio3">
				<input id="radio3" name="radio" type="radio" checked="checked"/>
				Option 3
			</label>
			<small>Note about these options</small>
		</fieldset>
		<p>
			<label for="textarea">Textarea</label>
			<textarea id="textarea" rows="8" cols="32" required></textarea>
			<small>Note about this field</small>
		</p>
		<p>
			<label for="checkbox">
				<input id="checkbox" type="checkbox" required/>
				Single checkbox
			</label>
			<small>Note about this field</small>
		</p>
		<div class="button-group">
			<input type="submit" value="Submit"/>
			<button>Button</button>
			<a href="#">Cancel</a>
		</div>
	</fieldset>
</form>