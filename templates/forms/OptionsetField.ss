<ul $AttributesHTML>
	<% loop $Options %>
		<li class="$Class radio">
			<label for="$ID">
				<input id="$ID" class="radio" name="$Name" type="radio" value="$Value"<% if $isChecked %> checked<% end_if %><% if $isDisabled %> disabled<% end_if %> <% if $Up.Required %>required<% end_if %> />
				$Title
			</label>
		</li>
	<% end_loop %>
</ul>
