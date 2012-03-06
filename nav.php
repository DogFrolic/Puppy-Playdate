<div id="nav">
		<h1><a href="index.php">DogFrolic</a></h1>
		<ul>
			<li><a href="aboutus.php"
				{% ifequal path '/aboutus.html' %}
					class="selected"
				{% endifequal %}
			>About Us</a></li>
			<li><a href="/logout.php">Logout</a></li>
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
	
	