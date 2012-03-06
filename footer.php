<div id="footer">
		<ul>
			<li><a href="index.php"
				{% ifequal path '/index.php' %}
					class="selected"
				{% endifequal %}
			>DogFrolic Home</a></li>
					<li><a href="/login.php"
					{% ifequal path '/login.php' %}
						class="selected"
					{% endifequal %}
			>Login</a></li>
			<li><a href="/add.php"
					{% ifequal path '/add.php' %}
						class="selected"
					{% endifequal %}
				> Join DogFrolic</a></li>				
		</ul>
</div> <!-- end nav -->